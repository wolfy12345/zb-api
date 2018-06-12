<?php
/**
 * 滴滴代喝
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Dididaihe
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '滴滴代喝';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "装B高手");
        
        $im = imagecreatetruecolor(720, 960);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/dididaihe/main.jpg');
        imagecopy($im,$bg,0,0,0,0,720,960);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
      
        imagettftext($im, 18, 3, 150, 496, $black, $font, $text);
        imagettftext($im, 18, 3, 155, 530, $black, $font, $name1);

        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zhuangbjun_163.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 150, 20, 0, 0, 163, 163);

        imagejpeg($im);
        imagedestroy($im);
    }
}