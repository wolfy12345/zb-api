<?php
/**
 * 精神病证明
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Jsbzm
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '精神病证明 ';
        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "小二");
        $age = $req->get('param2', "25");
        $b = $req->get('param3', "男");
        $im = imagecreatetruecolor(1000, 1333);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/jsbzm/33.jpg');
        $black = imagecolorallocate($im, 55, 55, 55);
        $font = IA_ROOT.'/static/fonts/fh.ttf';
        imagecopy($im,$bg,0,0,0,0,1000,1333);
        imagedestroy($bg);
        imagettftext($im, 19, 0, 265, 512, $black, $font, $name);
        imagettftext($im, 19, 0, 780, 512, $black, $font, $age);
        imagettftext($im, 19, 0, 538, 512, $black, $font, $b);

        imagejpeg($im);
        imagedestroy($im);
    }
}