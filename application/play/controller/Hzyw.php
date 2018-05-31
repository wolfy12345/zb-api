<?php
/**
 * 猴子要闻
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Hzyw
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '猴子要闻';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
       
        $im = imagecreatetruecolor(400, 301);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/hzyw/main.jpg');
        imagecopy($im,$bg,0,0,0,0,400,301);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 101, 103, 102);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
   
        imagettftext($im, 9, -20, 205, 75, $black, $font, $text);
    
        imagejpeg($im);
        imagedestroy($im);
    }
}