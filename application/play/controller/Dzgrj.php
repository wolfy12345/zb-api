<?php
/**
 * 抵制狗肉节
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Dzgrj
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '抵制狗肉节 ';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('name', "神笔记");
        $im = imagecreatetruecolor(800, 1422);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/dzgrj/main.jpg');
        imagecopy($im,$bg,0,0,0,0,800,1422);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 255);
        $text = $name;
        $num = rand(100000,300000);

        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 38, 0, 280, 648, $black, $font, $text);
        imagettftext($im, 38, 0, 288, 1155, $black, $font, $num);

        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zbgs008_160_bai.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 100, 1220, 0, 0, 160, 160);

        imagejpeg($im);
        imagedestroy($im);
    }
}