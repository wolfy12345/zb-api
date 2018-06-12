<?php
/**
 * 交通大学录取通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Jtdx
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '交通大学录取通知书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "农学院");
        $name2 = $req->get('param3', "影视表演");
        $im = imagecreatetruecolor(700, 514);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/jtdx/main.jpg');
        imagecopy($im,$bg,0,0,0,0,700,514);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 188, 58, 9);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $day ="二零一八年九月二号";
        imagettftext($im, 11, 0, 425, 165, $black, $font, $text);
        imagettftext($im, 11, 0, 425, 220, $black, $font, $name1);
        imagettftext($im, 11, 0, 425, 245, $black, $font, $name2);
        imagettftext($im, 10, 0, 418, 280, $black, $font, $day);
        imagejpeg($im);
        imagedestroy($im);
    }
}