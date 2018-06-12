<?php
/**
 * 装逼iphonex预定单
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Iphonex
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = 'iphoneX预约订单';
        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('param1', "装B高手");
        $b = $req->get('param2', "2.jpeg");
        $im = imagecreatetruecolor(750, 1334);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/iphonex/main.jpg');
        imagecopy($im,$bg,0,0,0,0,750,1334);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 40, 40, 40);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fh.ttf';
        imagettftext($im, 23, 0, 310, 1005, $black, $font, $text);
        imagettftext($im, 17, 0, 92, 28, $black, $font, $b);
        imagejpeg($im);
        imagedestroy($im);
    }
}