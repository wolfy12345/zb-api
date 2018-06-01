<?php
/**
 * 中山大学录取通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Zsdx
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '中山大学录取通知书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        
        $im = imagecreatetruecolor(480, 640);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/zsdx/main.jpg');
        imagecopy($im,$bg,0,0,0,0,480,640);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $black1 = imagecolorallocate($im, 94, 121, 104);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $name3 = "二零一六年二月二十二号";
        imagettftext($im, 9, 0, 60, 116, $black, $font, $text);
        imagettftext($im, 9, 0, 55, 450, $black, $font, $name);
        imagettftext($im, 9, 0, 240, 235, $black1, $font, $name3);
        imagejpeg($im);
        imagedestroy($im);
    }
}