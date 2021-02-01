<?php
function setMenu($arrMenu) {
    $strOut = '<ul>';
        foreach ($arrMenu as $key) {
            $strOut .= "<li><a href=\"{$key['uri']}\">{$key['title']}</a>";
            if (isset($key['subitems'])) {
                $strOut .= "<ul>";
                $strOut .= setMenu($key['subitems']);
                $strOut .= "</ul>";
            }
            $strOut .= "</li>";
        }
    $strOut .= '</ul>';
    return $strOut;
}