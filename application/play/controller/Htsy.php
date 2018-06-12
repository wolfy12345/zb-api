<?php
/**
 * 海天盛筵
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Htsy
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '海天盛筵';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");

        $im = imagecreatetruecolor(720, 960);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/htsy/main.jpg');
        imagecopy($im,$bg,0,0,0,0,720,960);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 50, 51, 96);
        $black1 = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';
        
        imagettftext($im, 35, 7, 360, 475, $black, $font, $name);
 
        imagejpeg($im);
        imagedestroy($im);
    }
}