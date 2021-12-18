<?php

if (! function_exists('stripos_arr')) {
    /**
     * Finds occurrence of a case-insensitive string. You can pass an array of strings (needles)
     * @param $haystack
     * @param $needles
     * @return bool
     */
    function stripos_arr($haystack, $needles) {
        if (! is_array($needles)) $needles = array($needles);
        foreach ($needles as $needle) {
            if (($pos = stripos($haystack, $needle)) !== false) return true;
        }
        return false;
    }
}
