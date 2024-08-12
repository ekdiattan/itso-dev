<?php

namespace App\Helpers;

class EmployeeHelper extends GeneralHelper
{
    public function generateNumber(int $length)
    {
        $generalHelper = $this->generateRandomNumber($length);
        $year = date('Y');

        $random = $year.$generalHelper;

        return $random;

    }

    public function genereteStrRandom(int $length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle($characters), 0, $length);
    }

    public function generateusername($data)
    {
        $names = strtolower($data).'_'.$this->genereteStrRandom(5).'.diskominfojabar';
        $name = str_replace(' ', '', $names);

        return $name;
    }

    public function createPassword()
    {
        $password = 123456;

        return $password;
    }
}
