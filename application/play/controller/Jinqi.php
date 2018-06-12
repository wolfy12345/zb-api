<?php
/**
 * 锦旗
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Jinqi
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '锦旗';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $select1 = $req->get('param2', "好老公");
        $name1 = $req->get('param3', "妇联");
        $im = imagecreatetruecolor(676, 900);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/jinqi/main.jpg');
        imagecopy($im,$bg,0,0,0,0,676,900);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 251, 239, 3);
        $font = IA_ROOT.'/static/fonts/stlftt.ttf';

        //授予对象
        $arr1 = $this->ch2arr($name);
        if (isset($arr1[0]) && $arr1[0]) {
            imagettftext($im, 30, 0, 500, 175, $black, $font, $arr1[0]);
        }

        if (isset($arr1[1]) && $arr1[1]) {
            imagettftext($im, 30, 0, 500, 225, $black, $font, $arr1[1]);
        }

        if (isset($arr1[2]) && $arr1[2]) {
            imagettftext($im, 30, 0, 500, 275, $black, $font, $arr1[2]);
        }

        if (isset($arr1[3]) && $arr1[3]) {
            imagettftext($im, 30, 0, 500, 325, $black, $font, $arr1[3]);
        }

        //授予称号
        $arr2 = $this->ch2arr($select1);
        if (isset($arr2[0]) && $arr2[0]) {
            imagettftext($im, 50, 0, 325, 310, $black, $font, $arr2[0]);
        }

        if (isset($arr2[1]) && $arr2[1]) {
            imagettftext($im, 50, 0, 325, 390, $black, $font, $arr2[1]);
        }

        if (isset($arr2[2]) && $arr2[2]) {
            imagettftext($im, 50, 0, 325, 470, $black, $font, $arr2[2]);
        }

        if (isset($arr2[3]) && $arr2[3]) {
            imagettftext($im, 50, 0, 325, 550, $black, $font, $arr2[3]);
        }
       
       //授予机构
        $arr3 = $this->ch2arr($name1);
        if (isset($arr3[0]) && $arr3[0]) {
            imagettftext($im, 35, 0, 170, 335, $black, $font, $arr3[0]);
        }

        if (isset($arr3[1]) && $arr3[1]) {
            imagettftext($im, 35, 0, 170, 390, $black, $font, $arr3[1]);
        }

        if (isset($arr3[2]) && $arr3[2]) {
            imagettftext($im, 35, 0, 170, 455, $black, $font, $arr3[2]);
        }

        if (isset($arr3[3]) && $arr3[3]) {
            imagettftext($im, 35, 0, 170, 510, $black, $font, $arr3[3]);
        }

        if (isset($arr3[4]) && $arr3[4]) {
            imagettftext($im, 35, 0, 170, 565, $black, $font, $arr3[4]);
        }

        //时间
       // $time = date('Y年m月d',time());
        $time = "二零一八年三月十五号";
        $arr4 = $this->ch2arr($time);
        if (isset($arr4[0]) && $arr4[0]) {
            imagettftext($im, 28, 0, 112, 335, $black, $font, $arr4[0]);
        }

        if (isset($arr4[1]) && $arr4[1]) {
            imagettftext($im, 28, 0, 112, 369, $black, $font, $arr4[1]);
        }

        if (isset($arr4[2]) && $arr4[2]) {
            imagettftext($im, 35, 0, 110, 405, $black, $font, $arr4[2]);
        }

        if (isset($arr4[3]) && $arr4[3]) {
            imagettftext($im, 35, 0, 110, 432, $black, $font, $arr4[3]);
        }

        if (isset($arr4[4]) && $arr4[4]) {
            imagettftext($im, 35, 0, 110, 471, $black, $font, $arr4[4]);
        }
        if (isset($arr4[5]) && $arr4[5]) {
            imagettftext($im, 35, 0, 110, 505, $black, $font, $arr4[5]);
        }

        if (isset($arr4[6]) && $arr4[6]) {
            imagettftext($im, 35, 0, 110, 539, $black, $font, $arr4[6]);
        }

        if (isset($arr4[7]) && $arr4[7]) {
            imagettftext($im, 35, 0, 110, 573, $black, $font, $arr4[7]);
        }

        if (isset($arr4[8]) && $arr4[8]) {
            imagettftext($im, 35, 0, 110, 607, $black, $font, $arr4[8]);
        }

        if (isset($arr4[9]) && $arr4[9]) {
            imagettftext($im, 35, 0, 110, 641, $black, $font, $arr4[9]);
        }
        if (isset($arr4[10]) && $arr4[10]) {
            imagettftext($im, 35, 0, 110, 677, $black, $font, $arr4[10]);
        }

        #二维码


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