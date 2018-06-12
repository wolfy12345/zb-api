<?php
/**
 * 视钱财如粪土
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Yxq
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '视钱财如粪土';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name = $name.'：';
        $name1 = $req->get('param2', "装B高手");
        $select1 = $req->get('param3', "装B高手");
        $im = imagecreatetruecolor(800, 924);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/yxq/main.jpg');
        imagecopy($im,$bg,0,0,0,0,800,924);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';
        imagettftext($im, 22, 6, 315, 40, $black, $font, $text);
        imagettftext($im, 22, 6, 430, 220, $black, $font, $name1);
        $arr = $this->ch2arr($select1);
        //第一行
        if (isset($arr[0]) && $arr[0]) {
            imagettftext($im, 22, 7, 316, 80, $black, $font, $arr[0]);
        }
        if (isset($arr[1]) && $arr[1]) {
            imagettftext($im, 22, 7, 346, 76, $black, $font, $arr[1]);
        }

        if (isset($arr[2]) && $arr[2]) {
            imagettftext($im, 22, 7, 376, 72, $black, $font, $arr[2]);     
        }

        if (isset($arr[3]) && $arr[3]) {
            imagettftext($im, 22, 7, 406, 68, $black, $font, $arr[3]);           
        }

        if (isset($arr[4]) && $arr[4]) {
            imagettftext($im, 22, 7, 436, 64, $black, $font, $arr[4]);           
        }

        if (isset($arr[5]) && $arr[5]) {
            imagettftext($im, 22, 7, 466, 60, $black, $font, $arr[5]);
        }
        //第二行
         if (isset($arr[6]) && $arr[6]) {
            imagettftext($im, 22, 7, 320, 125, $black, $font, $arr[6]);
        }
        if (isset($arr[7]) && $arr[7]) {
            imagettftext($im, 22, 7, 350, 121, $black, $font, $arr[7]);
        }

        if (isset($arr[8]) && $arr[8]) {
            imagettftext($im, 22, 7, 380, 117, $black, $font, $arr[8]);     
        }

        if (isset($arr[9]) && $arr[9]) {
            imagettftext($im, 22, 7, 410, 113, $black, $font, $arr[9]);           
        }

        if (isset($arr[10]) && $arr[10]) {
            imagettftext($im, 22, 7, 440, 109, $black, $font, $arr[10]);           
        }

        if (isset($arr[11]) && $arr[11]) {
            imagettftext($im, 22, 7, 470, 105, $black, $font, $arr[11]);
        }
        //第三行
         if (isset($arr[12]) && $arr[12]) {
            imagettftext($im, 22, 7, 324, 170, $black, $font, $arr[12]);
        }
        if (isset($arr[13]) && $arr[13]) {
            imagettftext($im, 22, 7, 354, 166, $black, $font, $arr[13]);
        }

        if (isset($arr[14]) && $arr[14]) {
            imagettftext($im, 22, 7, 384, 162, $black, $font, $arr[14]);     
        }

        if (isset($arr[15]) && $arr[15]) {
            imagettftext($im, 22, 7, 414, 158, $black, $font, $arr[15]);           
        }

        if (isset($arr[16]) && $arr[16]) {
            imagettftext($im, 22, 7, 444, 154, $black, $font, $arr[16]);           
        }

        if (isset($arr[17]) && $arr[17]) {
            imagettftext($im, 22, 7, 474, 150, $black, $font, $arr[17]);
        }
        //第四行
        if (isset($arr[18]) && $arr[18]) {
            imagettftext($im, 22, 7, 329, 210, $black, $font, $arr[18]);           
        }

        if (isset($arr[19]) && $arr[19]) {
            imagettftext($im, 22, 7, 359, 206, $black, $font, $arr[19]);           
        }

        imagejpeg($im);
        imagedestroy($im);
    }
    function ch2arr($str)
    {
        $length = mb_strlen($str, 'utf-8');
        $array = [];
        for ($i=0; $i<$length; $i++)
            $array[] = mb_substr($str, $i, 1, 'utf-8');
        return $array;
    }
}