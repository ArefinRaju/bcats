<?php


namespace Helper\Transform;


use Exception;

class Strings
{
    public static function hasPrefix(String $haystack, String $needle): bool
    {
        return substr($haystack, 0, strlen($needle)) == $needle;
    }

    public static function trimHeader(String $haystack, String $target): String
    {
        if (self::hasPrefix($haystack, $target)) {
            return substr($haystack, strlen($target));
        }

        return $haystack;
    }

    /**
     * @throws Exception
     */
    public static function uuidv4(): String
    {
        $data    = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
