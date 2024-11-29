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

    public static function status($status)
    {
        switch ($status) {
            case 0:
                return 'Menunggu Persetujuan';
            case 1:
                return 'Sedang Di Pinjam';
            case 2:
                return 'Ditolak';
            case 3:
                return 'Selesai';
            default:
                return 'Tidak Terdefinisi';
        }
    }

    public static function used($status){
        switch ($status) {
            case 1:
                return 'Dinas';
            case 2:
                return 'Pribadi';
            default:
                return 'Tidak Terdefinisi';
        }
    }
}
