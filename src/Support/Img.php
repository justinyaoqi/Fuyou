<?php
namespace Yaoqi\Fuyou\Support;
error_reporting(7);
/**
 * 将图片转换为base64
 */
class Img
{
    public static function base64EncodeImage($image_file)
    {
        $base64_image = '';
        $image_info = getimagesize($image_file);
        $image_data = fread(fopen($image_file, 'r'), filesize(trim($image_file)));
        $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
        return $base64_image;
    }
}
