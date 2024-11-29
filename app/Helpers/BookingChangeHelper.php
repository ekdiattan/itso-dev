<?php

namespace App\Helpers;

class BookingChangeHelper extends GeneralHelper
{
    public static function changeStatus($code)
    {
        switch ($code) {
            case 0:
                return 'Dalam Pengajuan';
                break;

            case 1:
                return 'Sedang Dipinjam';
                break;

            case 2:
                return 'Ditolak';
                break;

            case 3:
                return 'Selesai';
                break;

            default:
                return 'Status doesn\'t match any case';
                break;
        }
    }

    public static function alertColor($code)
    {
        switch ($code) {
            case 'Dalam Pengajuan':
                return 'alert alert-warning';
                break;
            case 'Sedang Dipinjam':
                return 'alert alert-success';
                break;
            case 'Ditolak':
                return 'alert alert-danger';
                break;
            case 'Selesai':
                return 'alert alert-primary';
                break;
            default:
                return 'Status doesn\'t match any case';
                break;
        }
    }
}
