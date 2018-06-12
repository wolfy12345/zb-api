<?php
/**
 * 浙江大学录取通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Zjdx
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '浙江大学录取通知书';

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
        $name1 = $name1." ".$name2;
        $im = imagecreatetruecolor(700, 941);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/zjdx/main.jpg');
        imagecopy($im,$bg,0,0,0,0,700,941);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 75, 79, 78);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $name2 = "2018";
    
        imagettftext($im, 13, 0, 70, 378, $black, $font, $text);
        imagettftext($im, 13, 0, 250, 653, $black, $font, $name1);
        imagettftext($im, 13, 0, 325, 405, $black, $font, $name2);
        imagejpeg($im);
        imagedestroy($im);
    }
}