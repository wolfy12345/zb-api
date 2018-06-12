<?php
/**
 * 毕业季
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;

class Biyeji
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '毕业季';

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
       
        $im = imagecreatetruecolor(1440, 1280);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/biyeji/main.jpg');
        imagecopy($im,$bg,0,0,0,0,1440,1280);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 255);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        
        imagettftext($im, 58, 0, 1000, 910, $black, $font, $text);
        imagettftext($im, 58, 0, 1000, 1020, $black, $font, $name1);
     
        imagejpeg($im);
        imagedestroy($im);
    }
}