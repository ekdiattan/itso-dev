<?php

namespace App\Helpers;

class AsetHelper extends GeneralHelper
{
    public function generateasetcode($date, int $length)
    {
        $date = $this->generateRandomCodeCharacter($length);

        $generalHelper = $this->generateRandomCodeCharacterPlusNumber($length);

        $code = 'DKS' . '-' . $date . '-' . $generalHelper;

        return $code;
    }
    
    public function type($aset)
    {
        switch ($aset) 
        {
            case 1:
                return 'Aset Kendaraan';
            case 2:
                return 'Aset Barang';
            case 3:
                return 'Aset Ruangan';
            default:
                return 'Tidak Terdefinisi';
        }
    }
}
