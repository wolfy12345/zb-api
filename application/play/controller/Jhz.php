<?php
/**
 * 结婚证生成器
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Jhz
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '结婚证生成器';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(580, 742);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/jhz/bg.jpg');
        imagecopy($im,$bg,0,0,0,0,580,742);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 131, 117, 108);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 16, 0, 214, 195, $black, $font, $text);

        $showtime=date("Y年m月d日");
        imagettftext($im, 16, 0, 214, 288, $black, $font, $showtime);

        imagejpeg($im);
        imagedestroy($im);
    }
}