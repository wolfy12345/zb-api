<?php
/**
 * 验孕单三胞胎
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Sanbaotai
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '验孕单三胞胎';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(690, 515);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/sanbaotai/main.jpg');
        imagecopy($im,$bg,0,0,0,0,690,515);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';
        imagettftext($im, 30, 25, 505, 480, $black, $font, $text);
        imagettftext($im, 40, 10, 498, 520, $black, $font, date('Y.m.d', time()));

        imagejpeg($im);
        imagedestroy($im);
    }
}