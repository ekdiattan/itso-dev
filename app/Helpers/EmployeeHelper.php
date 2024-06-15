<?php

namespace App\Helpers;

use App\Helpers\GeneralHelper;

class EmployeeHelper extends GeneralHelper
{
    public function generateNumber(int $length)
    {
        $generalHelper = $this->generateRandomNumber($length);
        $year = date('Y');
        
        $random = $year . $generalHelper;
        return $random;
    }

    public function generateusername($data)
    {
        $names = strtolower($data).'_'.$this->generateRandomNumber(5).'.diskominfojabar';
        $name = str_replace(' ', '', $names);

        return $name;
    }

    public function createPassword()
    {
        $password = 123456;
        return $password;
    }
}