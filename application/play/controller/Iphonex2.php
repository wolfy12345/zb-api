<?php
/**
 * 装逼iphonex购机
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Iphonex2
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = 'iphoneX购机';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(1080, 1440);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/iphonex2/bg.jpg');
        imagecopy($im,$bg,0,0,0,0,1080,1440);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 50, 50, 50);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/qmsx.ttf';
        imagettftext($im, 35, 125, 670, 410, $black, $font, $text);
      
       $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/tmp8.png'));
         $white = imagecolorallocate($im1 , 253 ,222 , 195);
         imagecolortransparent($im1 , $white ) ;
         imagefill($im1 , 0, 0 , $white);
         imagecopy($im, $im1, 155, 600, 0, 0, 140, 140);
        imagejpeg($im);
        imagedestroy($im);
    }
}