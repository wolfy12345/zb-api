<?php
/**
 * 北京大学录取通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;

class Bjdx
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '北京大学录取通知书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "装B高手");
        $name2 = $req->get('param3', "装B高手");
        $im = imagecreatetruecolor(891, 1279);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/bjdx/main.jpg');
        imagecopy($im,$bg,0,0,0,0,891,1279);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $name3 = "二零一八年九月二号";
        imagettftext($im, 28, 0, 80, 615, $black, $font, $text);
        imagettftext($im, 27, 0, 550, 690, $black, $font, $name1);
        imagettftext($im, 23, 0, 305, 760, $black, $font, $name2);
        imagettftext($im, 27, 0, 235, 835, $black, $font, $name3);
        imagejpeg($im);
        imagedestroy($im);
    }
}