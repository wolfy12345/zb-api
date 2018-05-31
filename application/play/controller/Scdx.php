<?php
/**
 * 四川大学录取通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Scdx
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '四川大学录取通知书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(725, 1000);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/scdx/main.jpg');
        imagecopy($im,$bg,0,0,0,0,725,1000);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 14, 0, 74, 257, $black, $font, $text);
        imagejpeg($im);
        imagedestroy($im);
    }
}