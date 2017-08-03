<?php
class HtmlHelper
{
    public static function getList($data)
    {
        $html = '';
        foreach($data as $item)
        {
            $html .= '<div class="col-md-12">';
            $html .= '<h3><a href="//'.$item['link'].'" target="_blank">'.$item['title'].'</a></h3>';
            $html .= '<a href="//'.$item['link'].'" target="_blank">'.$item['link'].'</a>';
            $html .= '<p>'.$item['description'].'</p>';
            $html .= '</div>';
        }

        return $html;
    }
}
?>
