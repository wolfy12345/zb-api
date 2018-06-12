<?php
/**
 * 人品价值单
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Rpjzd
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '人品价值单';
        $this->data['num'] = rand(1,20);
        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $num = rand(1, 20);
        $img1 = IA_ROOT.'/example/rpjzd/'.$num.'.jpg';
        $im = imagecreatetruecolor(800, 600);
        $bg = imagecreatefromjpeg($img1);
        imagecopy($im,$bg,0,0,0,0,800,600);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 43, 37, 37);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 42, 0, 70, 190, $black, $font, $text);
        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zbgs008_115.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 690, 480, 0, 0, 115, 115);

        imagejpeg($im);
        imagedestroy($im);
    }
}