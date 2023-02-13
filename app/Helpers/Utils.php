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
    public static function characterConcatDash($character)
    {
        $foramt = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", trim($character));
        return $foramt;
    }


    //Get DateTime Now
    public static function getDateTimeNow()
    {
        date_default_timezone_set("Asia/Phnom_Penh");
        $date = date("Y/m/d") . " " . date("h:i:s");
        return $date;
    }

    //Get Khmer Date Format
    public static function getKhmerDateFormat($time, $date)
    {
        $previousTimeStamp = strtotime($time . " " . $date);
        $lastTimeStamp = strtotime(date("Y-m-d h:i:sa"));
        $menos = $lastTimeStamp - $previousTimeStamp;
        $mins = $menos / 60;
        if ($mins < 1) {
            $showing = "ថ្ងៃនេះ ម៉ោង " . $time;
        } else {
            $minsfinal = floor($mins);
            $secondsfinal = $menos - ($minsfinal * 60);
            $hours = $minsfinal / 60;
            if ($hours < 1) {
                $showing = $minsfinal . " នាទីមុន";
            } else {
                $hoursfinal = floor($hours);
                $minssuperfinal = $minsfinal - ($hoursfinal * 60);
                $days = $hoursfinal / 24;
                if ($days < 1) {
                    $showing = $hoursfinal . " ម៉ោងមុន";
                } else if ($days < 2) {
                    $showing = " ម្សិលមិញ ម៉ោង " . $time;
                } else {
                    $d = date("d", strtotime($date));
                    $m = date("m", strtotime($date));
                    $y = date("Y", strtotime($date));
                    if ($m == 1) {
                        $m = 'មករា';
                    } else if ($m == 2) {
                        $m = 'កុម្ភៈ';
                    } else if ($m == 3) {
                        $m = 'មីនា';
                    } else if ($m == 4) {
                        $m = 'មេសា';
                    } else if ($m == 5) {
                        $m = 'ឧសភា';
                    } else if ($m == 6) {
                        $m = 'មិថុនា';
                    } else if ($m == 7) {
                        $m = 'កក្តដា';
                    } else if ($m == 8) {
                        $m = 'សីហា';
                    } else if ($m == 9) {
                        $m = 'កញ្ញា';
                    } else if ($m == 10) {
                        $m = 'តុលា';
                    } else if ($m == 11) {
                        $m = 'វិច្ឆិកា';
                    } else if ($m == 12) {
                        $m = 'ធ្នូ';
                    }

                    $showing = $d . "-" . $m . "-" . $y . " - ម៉ោង " . $time;
                }
            }
        }
        echo $showing;
    }
}
