<?php

namespace App\Helpers;

class BookingHelper extends GeneralHelper
{
    public function createrandobooking(int $length)
    {
        $random = $this->generateRandomCodeCharacter($length);
        $code = $random.time();

        return $code;
    }
}
