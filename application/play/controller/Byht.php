<?php
/**
 * 包养合同
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;

class Byht
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '包养合同';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "50000");
        $name1 =  $name1.'元/月';
        $im = imagecreatetruecolor(960, 933);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/byht/main.jpg');
        imagecopy($im,$bg,0,0,0,0,960,933);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';
        $y = date('y',time());
        $m = date('m',time());
        $d = date('d',time());
        $name3 = $y.'年'.$m.'月'.$d.'日';
        imagettftext($im, 28, 0, 780, 835, $black, $font, $text);
        imagettftext($im, 28, 0, 255, 480, $black, $font, $name1);
        imagettftext($im, 28, 0, 620, 885, $black, $font, $name3);

          $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/tmp8.png'));
         $white = imagecolorallocate($im1 ,197 , 200 , 209);
         imagecolortransparent($im1 , $white ) ;
         imagefill($im1 , 0, 0 , $white);
         imagecopy($im, $im1, 155, 750, 0, 0,135, 135);
        imagejpeg($im);
        imagedestroy($im);
    }
}