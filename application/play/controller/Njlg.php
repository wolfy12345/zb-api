<?php
/**
 * 南京理工大学录取通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Njlg
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '南京理工大学录取通知书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "商学院");
        $name2 = $req->get('param3', "舞蹈");
        $name1 = $name1." ".$name2;
        $im = imagecreatetruecolor(800, 533);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/njlg/main.jpg');
        imagecopy($im,$bg,0,0,0,0,800,533);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $name2 = "九";
        $name3 = "二";
        $name4 = "南京市";
        imagettftext($im, 8, 0, 130, 157, $black, $font, $text);
        imagettftext($im, 8, 0, 370, 230, $black, $font, $name);
        imagettftext($im, 9, 0, 390, 284, $black, $font, $name1);
        imagettftext($im, 9, 0, 418, 312, $black, $font, $name2);
        imagettftext($im, 9, 0, 468, 312, $black, $font, $name3);
        imagettftext($im, 9, 0, 390, 255, $black, $font, $name4);
        imagejpeg($im);
        imagedestroy($im);
    }
}