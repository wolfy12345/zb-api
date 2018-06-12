<?php
/**
 * 武汉大学录取通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Whdx
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '武汉大学录取通知书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "法学院");
        $name2 = $req->get('param3', "植物学");
        $name1 = $name1." ".$name2;
        $im = imagecreatetruecolor(1200, 900);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/whdx/main.jpg');
        imagecopy($im,$bg,0,0,0,0,1200,900);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $name2 = "四";
        $month = "九";
        $day = "二";
        $day1 = "五";
        imagettftext($im, 28, 0, 185, 363, $black, $font, $text);
        imagettftext($im, 27, 0, 550, 447, $black, $font, $name1);
        imagettftext($im, 27, 0, 445, 520, $black, $font, $name2);
        imagettftext($im, 27, 0, 715, 520, $black, $font, $month);
        imagettftext($im, 27, 0, 845, 520, $black, $font, $day);
        imagettftext($im, 27, 0, 1025, 520, $black, $font, $day1);
        imagejpeg($im);
        imagedestroy($im);
    }
}