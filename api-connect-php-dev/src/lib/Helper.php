<?php

namespace com\apiconnect;

class Helper
{
    static function filterDataBasedOnSpecificKeyValue($data, $key, $value, $keep = false)
    {
        $filteredContent = [];
        foreach ($data as $obj) {
            if (isset($obj[$key])) {
                if ($keep) {
                    if (in_array($obj[$key], $value)) {
                        $filteredContent[] =  $obj;
                    }
                } else {
                    if (in_array($obj[$key], $value)) {
                        continue;
                    }
                    $filteredContent[] =  $obj;
                }
            }
        }
        return $filteredContent;
    }
}
