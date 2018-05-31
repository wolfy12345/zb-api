<?php
/**
 * 余罪邀请函
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Yuzuiyqh
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '余罪邀请函';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(600, 886);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/yuzuiyqh/main.jpg');
        imagecopy($im,$bg,0,0,0,0,600,886);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 255);
        $text = $name.":";
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 20, 0, 15, 645, $black, $font, $text);
        imagejpeg($im);
        imagedestroy($im);
    }
}