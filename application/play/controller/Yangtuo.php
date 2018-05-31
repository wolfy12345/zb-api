<?php
/**
 * 淘宝羊驼
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Yangtuo
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '淘宝羊驼';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(640, 1134);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/yangtuo/main.jpg');
        imagecopy($im,$bg,0,0,0,0,640,1134);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 63, 67, 68);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
    
        imagettftext($im, 24, 0, 185, 235, $black, $font, $text);
     
        imagejpeg($im);
        imagedestroy($im);
    }
}