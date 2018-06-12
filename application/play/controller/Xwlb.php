<?php
/**
 * 新闻联播
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Xwlb
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '新闻联播';

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
        $name1 = $name.$name1;
        $name2 = $name.$name2;
        $im = imagecreatetruecolor(590, 436);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/xwlb/main.jpg');
        imagecopy($im,$bg,0,0,0,0,590,436);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 255);
        $font = IA_ROOT.'/static/fonts/fh.ttf';
        $m = date('m',time());
        $d = date('d',time());
        $day = $m."月".$d."日";
        imagettftext($im, 20, 0, 125, 387, $black, $font, $name1);
        imagettftext($im, 14, 0, 125, 425, $black, $font, $name2);
        imagettftext($im, 14, 0, 18, 425, $black, $font, $day);
        imagejpeg($im);
        imagedestroy($im);
    }
}