<?php
/**
 * 复旦大学录取通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Fddx
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '复旦大学录取通知书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(690, 503);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/fddx/bg.jpg');
        imagecopy($im,$bg,0,0,0,0,690,503);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 131, 117, 108);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/st01.ttf';
        imagettftext($im, 12, 0, 150, 180, $black, $font, $text);

        imagejpeg($im);
        imagedestroy($im);
    }
}