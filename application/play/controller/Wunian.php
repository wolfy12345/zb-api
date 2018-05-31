<?php
/**
 * 五年后开什么车
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Wunian
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '五年后开什么车';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(650, 800);
        $dd = rand(1,15);
        $tt = IA_ROOT.'/example/wunian/'.$dd.".jpg";
        $bg = imagecreatefromjpeg($tt);
        imagecopy($im,$bg,0,0,0,0,650,800);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 136, 50, 59);
        $text = $name.'五年后开的车';
        $font = IA_ROOT.'/static/fonts/msyh.ttf';

        imagettftext($im, 28, 0, 155, 125, $black, $font, $text);

        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zbgs008_115.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 65, 640, 0, 0, 115, 115);

        imagejpeg($im);
        imagedestroy($im);
    }
}