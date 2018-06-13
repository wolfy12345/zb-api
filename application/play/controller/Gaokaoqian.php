<?php
/**
 * 高考祝福签生成器
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Gaokaoqian
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '高考祝福签生成器';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $select1 = $req->get('param2', "装B高手");
        $select2 = $req->get('param3', "装B高手");
        $select3 = $req->get('param4', "装B高手");
        $im = imagecreatetruecolor(720, 1280);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/gaokaoqian/main.jpg');
        imagecopy($im,$bg,0,0,0,0,720,1280);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 208, 170, 83);
        $font = IA_ROOT.'/static/fonts/hyzyjt.ttf';

        #高考祝福签生成器
        imagettftext($im, 20, 0, 90, 865, $black, $font, $name);
        imagettftext($im, 25, 0, 92, 1000, $black, $font, $select1);
        imagettftext($im, 25, 0, 292, 1000, $black, $font, $select2);
        imagettftext($im, 25, 0, 492, 1000, $black, $font, $select3);
        $arr1 = $this->ch2arr($select1);
        $arr2 = $this->ch2arr($select2);
        $arr3 = $this->ch2arr($select3);
             
        imagettftext($im, 30, 12, 155, 475, $black, $font, $arr1[0]);
        imagettftext($im, 30, 0, 335, 465, $black, $font, $arr2[0]);
        imagettftext($im, 30, -12, 505, 475, $black, $font, $arr3[0]);

        imagettftext($im, 30, 12, 170, 525, $black, $font, $arr1[1]);
        imagettftext($im, 30, 0, 335, 515, $black, $font, $arr2[1]);
        imagettftext($im, 30, -12, 490, 525, $black, $font, $arr3[1]);

        imagettftext($im, 30, 12, 180, 575, $black, $font, $arr1[2]);
        imagettftext($im, 30, 0, 335, 565, $black, $font, $arr2[2]);
        imagettftext($im, 30, -12, 475, 575, $black, $font, $arr3[2]);

        imagettftext($im, 30, 12, 195, 625, $black, $font, $arr1[3]);
        imagettftext($im, 30, 0, 335, 615, $black, $font, $arr2[3]);
        imagettftext($im, 30, -12, 460, 625, $black, $font, $arr3[3]);
      


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