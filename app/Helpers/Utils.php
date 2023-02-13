<?php

class Utils
{
    //Resize image
    public static function imageResize($imageResourceId, $src_w, $src_h, $dst_w, $dst_h)
    {
        $src_x = $src_y = 0;
        if (!empty($dst_w) and !empty($dst_h)) {
            if ($dst_w > $dst_h) {
                $scale_w = $dst_w;
                $scale_h = ($src_h * $dst_w / $src_w);
                if ($scale_h < $dst_h) {
                    $scale_h = $dst_h;
                    $scale_w = ($src_w * $dst_h / $src_h);
                }
            } else {
                $scale_h = $dst_h;
                $scale_w = ($src_w * $dst_h / $src_h);
                if ($scale_w < $dst_w) {
                    $scale_w = $dst_w;
                    $scale_h = ($src_h * $dst_w / $src_w);
                }
            }

            $dst_w = $scale_w;
            $dst_h = $scale_h;
        } else {
            if (empty($dst_w)) {
                if ($src_h > $dst_h) {
                    $dst_w = ($src_w / $src_h) * $dst_h;
                } else {
                    $dst_w = $src_w;
                    $dst_h = $src_h;
                }
            }
            if (empty($dst_h)) {
                if ($src_w > $dst_w) {
                    $dst_h = ($src_h / $src_w) * $dst_w;
                } else {
                    $dst_h = $src_h;
                    $dst_w = $src_w;
                }
            }
        }
        $targetLayer = imagecreatetruecolor($dst_w, $dst_h);
        imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
        return $targetLayer;
    }

    //Upload Image
    public static function uploadImage($folderPath, $FILES)
    {
        $file = $FILES['txt-file']['tmp_name'];
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $ext = pathinfo($FILES['txt-file']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
        $filesize = filesize($file);
        $dst_w = 760;
        $dst_h = '';
        if ($filesize <= (500 * 1024)) {
            move_uploaded_file($file, $folderPath . $fileNewName . "." . $ext);
            $res['imgName'] = $fileNewName . "." . $ext;
            echo json_encode($res);
            return;
        }
        switch ($imageType) {
            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file);
                $targetLayer = self::imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $dst_w, $dst_h);
                imagepng($targetLayer, $folderPath . $fileNewName . "." . $ext);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file);
                $targetLayer = self::imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $dst_w, $dst_h);
                imagegif($targetLayer, $folderPath . $fileNewName . "." . $ext);
                break;
            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file);
                $targetLayer = self::imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $dst_w, $dst_h);
                imagejpeg($targetLayer, $folderPath . $fileNewName . "." . $ext);
                break;
            default:
                echo "Invalid Image type.";
                exit;
                break;
        }
        $res['imgName'] = $fileNewName . "." . $ext;
        echo json_encode($res);
    }


    /**
     * Format character like news parameter
     * Example: Hello World => hello-world
     */
    public static function characterConcatDash($character){
        $foramt = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", trim($character));
        return $foramt;
    }


    //Get DateTime Now
    public static function getDateTimeNow(){
        date_default_timezone_set("Asia/Phnom_Penh");
        $date = date("Y/m/d") . " " . date("h:i:s");
        return $date;
    }

}
