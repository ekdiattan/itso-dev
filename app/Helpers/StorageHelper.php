<?php

namespace App\Helpers;
use Exception;
use App\Helpers\DateHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageHelper extends GeneralHelper
{
    public static function storeFileImage(UploadedFile $image, $resource)
    {
        $date = date_create();
        
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
        $newFileName = date_timestamp_get($date) . "_" . $filename;

        $path = self::generatePathImage($resource, $newFileName);

        try {

            Storage::put($path . '/' . $newFileName, file_get_contents($image->getRealPath()));
            
            $arrData = [
                "file_original_path" => $path . '/' . $newFileName,
            ];
            
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500);
        }

        return json_encode($arrData);
    }

    public static function generatePathImage($resource)
    {
        $yearNow = date("Y");
        $monthNow = DateHelper::monthFormat(date("m"));

        return $resource . "/" . $yearNow . "/" . $monthNow . "/" . "images";
    }
}