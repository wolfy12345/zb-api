<?php
/**
 * 凤姐老公
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Fjlg
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '凤姐老公';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $name1 = $name.'浮出水面';
        $name2 = $name.'和凤姐一起进入酒店长达数小时...';
        $im = imagecreatetruecolor(693, 500);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/fjlg/main.jpg');
        imagecopy($im,$bg,0,0,0,0,693,500);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 50, 51, 96);
        $black1 = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        
        imagettftext($im, 12, 0, 320, 218, $black, $font, $name1);
        imagettftext($im, 12, 0, 211, 300, $black1, $font, $name2);
        imagejpeg($im);
        imagedestroy($im);
    }
}