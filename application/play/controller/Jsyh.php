<?php
/**
 * 建设银行取款单
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Jsyh
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '建设银行取款单';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(527, 800);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/jsyh/main.jpg');
        imagecopy($im,$bg,0,0,0,0,527,800);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 134, 134, 134);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 17, -4, 225, 299, $black, $font, $text);
        imagejpeg($im);
        imagedestroy($im);
    }
}