<?php
/**
 * 喝酒认怂书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Hjrss
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '喝酒认怂书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "怂货");
        $name1 = $req->get('param2', "碉堡君");
        $name2 = $req->get('param3', "600");
        $im = imagecreatetruecolor(640, 858);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/hjrss/main.jpg');
        imagecopy($im,$bg,0,0,0,0,640,858);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';
        $year = date('Y',time());
        $month = date('m',time());
        $day = date('d',time());
        imagettftext($im, 14, 0, 350, 155, $black, $font, $name);
        imagettftext($im, 14, 0, 126, 155, $black, $font, $year);
        imagettftext($im, 14, 0, 196, 155, $black, $font, $month);
        imagettftext($im, 14, 0, 246, 155, $black, $font, $day);
        imagettftext($im, 14, 0, 255, 225, $black, $font, $name1);
        imagettftext($im, 14, 0, 150, 330, $black, $font, $name2);
        imagettftext($im, 14, 0, 435, 400, $black, $font, $name);
        imagettftext($im, 14, 0, 396, 436, $black, $font, $year);
        imagettftext($im, 14, 0, 456, 436, $black, $font, $month);
        imagettftext($im, 14, 0, 500, 436, $black, $font, $day);
        imagejpeg($im);
        imagedestroy($im);
    }
}