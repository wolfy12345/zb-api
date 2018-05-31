<?php
/**
 * 东方时空
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;

class Dfsk
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '东方时空 ';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('name', "神笔记");
        $im = imagecreatetruecolor(590, 455);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/dfsk/main.jpg');
        imagecopy($im,$bg,0,0,0,0,590,455);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 255);
        $text = $name;
        $dd = date('H:i',time());
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 15, 0, 140, 430, $black, $font, $text);
        imagettftext($im, 15, 0, 30, 430, $black, $font, $dd);
        imagejpeg($im);
        imagedestroy($im);
    }
}