<?php
/**
 * 华中科技大学录取通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Hzkjdx
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '华中科技大学录取通知书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "文学院");
        $name2 = $req->get('param3', "挖掘机修理");
        $im = imagecreatetruecolor(791, 523);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/hzkjdx/main.jpg');
        imagecopy($im,$bg,0,0,0,0,791,523);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $name3 = "武汉市";
        imagettftext($im, 23, 0, 80, 205, $black, $font, $text);
        imagettftext($im, 23, 0, 120, 289, $black, $font, $name1);
        imagettftext($im, 23, 0, 385, 289, $black, $font, $name2);
        imagettftext($im, 23, 0, 155, 245, $black, $font, $name3);
        imagejpeg($im);
        imagedestroy($im);
    }
}