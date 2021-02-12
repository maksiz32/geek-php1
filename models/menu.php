<?php
function setMenu($arrMenu, $username) {
    $strOut = '<ul>';
        foreach ($arrMenu as $key) {
            if ((isset($key['role']) && is_admin($username)) || !isset($key['role'])) {
                $strOut .= "<li><a href=\"{$key['uri']}\">{$key['title']}</a>";
                if (isset($key['subitems'])) {
                    $strOut .= "<ul>";
                    $strOut .= setMenu($key['subitems'], $username);
                    $strOut .= "</ul>";
                }
                $strOut .= "</li>";
            }
        }
    $strOut .= '</ul>';
    return $strOut;
}