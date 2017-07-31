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
            // '%PATH%' => '/php/task7/',
            '%PATH%' => '/~user11/myphp/task8/',
            '%POST_SEARCH%' => '',
            '%BODY%' => '',
            ];
    }

    public function sendRequest ($post)
    {
       $str = explode(' ',$post);
       foreach ($str as $item){
            $arr .= $item.'+';
       }
       
       $url = 'https://www.google.com/search?q='.$arr;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url ); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 30); 
        curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $result = curl_exec($ch);

        if(curl_errno($ch))
        {
            curl_close($ch);
            throw new Exception('Curl error: '. curl_error($ch));
        }
        else
        {
            curl_close($ch);
            return ['result' => true, 'data' => ['%BODY%' => $result, '%POST_SEARCH%' => $post]];;
        }
    }

}

