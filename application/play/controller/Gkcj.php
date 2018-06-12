<?php
/**
 * 高考成绩
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Gkcj
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '高考成绩 ';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "133");
        $name2 = $req->get('param3', "147");
        $name3 = $req->get('param4', "143");
        $name4 = $req->get('param5', "296");
        $im = imagecreatetruecolor(945, 1260);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/gkcj/main.jpg');
        imagecopy($im,$bg,0,0,0,0,945,1260);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $all = $name1 + $name2 + $name3 + $name4;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 24, 0, 340, 440, $black, $font, $text);
        imagettftext($im, 24, 0, 340, 512, $black, $font, $name1);
        imagettftext($im, 24, 0, 340, 580, $black, $font, $name2);
        imagettftext($im, 24, 0, 340, 646, $black, $font, $name3);
        imagettftext($im, 24, 0, 340, 712, $black, $font, $name4);
        imagettftext($im, 24, 0, 340, 782, $black, $font, $all);

        imagejpeg($im);
        imagedestroy($im);
    }
}