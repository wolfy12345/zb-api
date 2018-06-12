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
class Njdx
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
        $name2 = $req->get('param2', "古汉语文学");
        $im = imagecreatetruecolor(600, 450);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/njdx/main.jpg');
        imagecopy($im,$bg,0,0,0,0,600,450);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $day = "二零一八年九月二号";
        imagettftext($im, 9, 0, 353, 194, $black, $font, $text);
        imagettftext($im, 9, 0, 425, 238, $black, $font, $name2);
         imagettftext($im, 9, 0, 428, 261, $black, $font, $day);
        imagejpeg($im);
        imagedestroy($im);
    }
}