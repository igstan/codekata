<?php

class BinaryChop
{
    public static function chop($needle, $haystack, $prevMiddle = 0)
    {
        $length = count($haystack);

        if ($length === 0) {
            return -1;
        }

        $middle = floor($length / 2);

        if ($haystack[$middle] === $needle) {
            return $prevMiddle + $middle;
        }

        if ($haystack[$middle] < $needle) {
            $prevMiddle  = $middle + 1;
            $newHaystack = array_slice($haystack, $middle + 1);
        } else {
            $prevMiddle  = 0;
            $newHaystack = array_slice($haystack, 0, $middle);
        }

        return self::chop($needle, $newHaystack, $prevMiddle);
    }
}
