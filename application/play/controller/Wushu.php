<?php
/**
 * 武术段位证书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Wushu
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '武术段位证书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");

        $im = imagecreatetruecolor(640, 852);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/wushu/main.jpg');
        imagecopy($im,$bg,0,0,0,0,640,852);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        
        imagettftext($im, 16, 0, 125, 327, $black, $font, $name);
        
        imagejpeg($im);
        imagedestroy($im);
    }
}