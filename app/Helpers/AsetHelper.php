<?php
namespace App\Helpers;
class AsetHelper extends GeneralHelper
{
    public function generateasetcode($date,int $length)
    {
        $date = $this->generateRandomCodeCharacter($length);
        
        $generalHelper = $this->generateRandomCodeCharacterPlusNumber($length);

        $code = 'DKS'.'-'.$date.'-'.$generalHelper;

        return $code;
    }
}