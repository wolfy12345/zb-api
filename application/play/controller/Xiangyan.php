<?php
/**
 * 香烟生成器
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Xiangyan
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '香烟生成器';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(600, 989);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/xiangyan/main.jpg');
        imagecopy($im,$bg,0,0,0,0,600,989);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';
        imagettftext($im, 25, 0, 230, 535, $black, $font, $text);
        imagettftext($im, 25, 0, 231, 535, $black, $font, $text);

        imagejpeg($im);
        imagedestroy($im);
    }
}