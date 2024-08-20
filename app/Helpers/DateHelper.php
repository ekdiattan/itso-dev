<?php

namespace App\Helpers;


class DateHelper
{
    public static function monthFormat($month)
    {
        switch ($month) {
            case "01":
                return 'january';
                break;
            
            case "02":
                return 'february';
                break;
            
            case "03":
                return 'march';
                break;
            
            case "04":
                return 'april';
                break;

            case "05":
                return 'may';
                break;

            case "06":
                return 'june';
                break;
            
            case "07":
                return 'july';
                break;

            case "08":
                return 'august';
                break;

            case "09":
                return 'september';
                break;

            case "10":
                return 'october';
                break;
                
            case "11":
                return 'november';
                break;

            case "12":
                return 'december';
                break;
            default:
                return "Month doesn't match any case";
        }
    }
}