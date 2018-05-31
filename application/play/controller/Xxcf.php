<?php
/**
 * 学校处分通知单
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Xxcf
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '学校处分通知单';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(800, 1110);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/xxcf/main.jpg');
        imagecopy($im,$bg,0,0,0,0,800,1110);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT.'/static/fonts/fh.ttf';
        $year = date('Y',time());
        $month = date('m',time());
        $day = date('d',time());
        $tian = $year.'年'.$month.'月'.$day.'日'.'   '.$name;
        imagettftext($im, 16, 0, 250, 367, $black, $font, $name);
        imagettftext($im, 16, 0, 347, 275, $black, $font, $year);
        imagettftext($im, 16, 0, 125, 405, $black, $font, $tian);
        imagettftext($im, 16, 0, 150, 600, $black, $font, $name);
        imagejpeg($im);
        imagedestroy($im);
    }
}