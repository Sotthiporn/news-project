<?php

class Utils
{
    //resize image
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
}
