<?php
/**
 * 不上班
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;

class Bushangban
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '不上班';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(401, 523);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/bushangban/main.jpg');
        imagecopy($im,$bg,0,0,0,0,401,523);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 255);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        imagettftext($im, 33, 0, 155, 445, $black, $font, $text);
        imagejpeg($im);
        imagedestroy($im);
    }
}