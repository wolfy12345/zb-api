<?php
/**
 * 千层蛋糕求爱
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;

class Dangao
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '千层蛋糕求爱';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "神笔记");
        $select1 = $req->get('param2', "情人节");
        $im = imagecreatetruecolor(442, 626);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/dangao/main.jpg');
        imagecopy($im,$bg,0,0,0,0,442,626);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 0);
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';

        $arr = $this->ch2arr($name.$select1);

        if (isset($arr[0]) && $arr[0]) {
            imagettftext($im, 25, 0, 172, 75, $black, $font, $arr[0]);
            imagettftext($im, 25, 0, 173, 75, $black, $font, $arr[0]);
        }

        if (isset($arr[1]) && $arr[1]) {
            imagettftext($im, 25, 0, 178, 165, $black, $font, $arr[1]);
            imagettftext($im, 25, 0, 179, 165, $black, $font, $arr[1]);
        }

        if (isset($arr[2]) && $arr[2]) {
            imagettftext($im, 28, 0, 176, 255, $black, $font, $arr[2]);
            imagettftext($im, 28, 0, 177, 255, $black, $font, $arr[2]);
        }

        if (isset($arr[3]) && $arr[3]) {
            imagettftext($im, 35, 0, 175, 355, $black, $font, $arr[3]);
            imagettftext($im, 35, 0, 176, 355, $black, $font, $arr[3]);
        }

        if (isset($arr[4]) && $arr[4]) {
            imagettftext($im, 35, 0, 173, 452, $black, $font, $arr[4]);
            imagettftext($im, 35, 0, 174, 452, $black, $font, $arr[4]);
        }

        if (isset($arr[5]) && $arr[5]) {
            imagettftext($im, 40, 0, 177, 555, $black, $font, $arr[5]);
            imagettftext($im, 40, 0, 178, 555, $black, $font, $arr[5]);
        }

        #二维码
            // $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zhuangbjun_163.png'));
            // $white = imagecolorallocate($im1 , 223 , 223 , 223);
            // imagecolortransparent($im1 , $white ) ;
            // imagefill($im1 , 100, 320 , $white);
            // imagecopy($im, $im1, 50, 20, 0, 0, 163, 163);

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