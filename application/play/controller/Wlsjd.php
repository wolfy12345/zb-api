<?php
/**
 * 未来身价单
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Wlsjd
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '未来身价单';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(640, 938);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/wlsjd/'.rand(1,19).'.jpg');
        imagecopy($im,$bg,0,0,0,0,640,938);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name.'的身价单';
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
       
        imagettftext($im, 38, 0, 125, 115, $black, $font, $text);
        
        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/tmp3.jpg'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 88, 760, 0, 0, 100, 100);

        imagejpeg($im);
        imagedestroy($im);
    }
}