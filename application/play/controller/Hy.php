<?php
/**
 * 怀孕
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Hy
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '怀孕B超单生成器 ';
        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(600, 411);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/hy/bg.jpg');

        $black = imagecolorallocate($im, 55, 55, 55);

        $text = $name;
        $font = IA_ROOT.'/static/fonts/wz.ttf';
        imagecopy($im,$bg,0,0,0,0,600,411);
        imagedestroy($bg);
        imagettftext($im, 12, 0, 105, 344, $black, $font, $text);

        $showtime=date("Y.m.d");
        imagettftext($im, 9, 0, 105, 361, $black, $font, $showtime);
        imagettftext($im, 9, 0, 292, 361, $black, $font, $showtime);
        imagettftext($im, 9, 0, 474, 361, $black, $font, $showtime);

        imagejpeg($im);
        imagedestroy($im);
    }
}