<?php
/**
 * 迪士尼邀请函
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Dishini
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '迪士尼邀请函';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");

        $im = imagecreatetruecolor(640, 824);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/dishini/main.jpg');
        imagecopy($im,$bg,0,0,0,0,640,824);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 50, 51, 96);
        $black1 = imagecolorallocate($im, 255, 255, 255);
        $font = IA_ROOT.'/static/fonts/fh.ttf';
        
        imagettftext($im, 35, 7, 260, 515, $black1, $font, $name);
 
        imagejpeg($im);
        imagedestroy($im);
    }
}