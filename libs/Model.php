<?php 

class Model
{ 
    public function __construct ()
    {

    }

    public function getArray ()
    {
        return [
            '%TITLE%' => 'Search engine',
           // '%PATH%' => '/php/task8/',
            '%PATH%' => '/~user11/myphp/task8/',
            '%POST_SEARCH%' => '',
            '%BODY%' => '',
            ];
    }

    public function sendRequest ($post)
    {
       $query = str_replace(' ', '+', $post);
       
       $url = URL.$query;
       // $cookie = PATH_FILES.'cookie.txt';


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 30); 
        curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36");
        curl_setopt($ch, CURLOPT_HEADER, false);
       // curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie); //cookie
       // curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //cookie
       // curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //ssl
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //ssl
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        $result = curl_exec($ch);

        if(curl_errno($ch))
        {
            curl_close($ch);
            throw new Exception('Curl error: '. curl_error($ch));
        }
        else
        {
            curl_close($ch);
            $data = $this->parser($result);
            $list = HtmlHelper::getList($data);
            return ['result' => true, 'data' => ['%BODY%' => $list, '%POST_SEARCH%' => $post]];;
        }
    }

    private function parser ($data)
    {
        $pq = phpQuery::newDocument($data);

        $elements = $pq->find('.rc');
        
        foreach ($elements as $key=>$element)
        {
             $aData[$key]['title'] = pq($element)->find('.r')->text();
             $aData[$key]['link'] = pq($element)->find('._Rm')->text();
             $aData[$key]['description'] = pq($element)->find('.st')->text();
        }
       
       return $aData;
    }

}

