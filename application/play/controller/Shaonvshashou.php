<?php
/**
 * 少女杀手证
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Shaonvshashou
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '少女杀手证';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(960, 724);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/shaonvshashou/main.jpg');
        imagecopy($im,$bg,0,0,0,0,960,724);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 76, 76, 76);
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        imagettftext($im, 22, -2, 290, 480, $black, $font, $name);
        imagettftext($im, 22, -2, 622, 172, $black, $font, $name);

        #二维码
        // $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zhuangbjun_90.png'));
        // $white = imagecolorallocate($im1 , 223 , 223 , 223);
        // imagecolortransparent($im1 , $white ) ;
        // imagefill($im1 , 100, 320 , $white);
        // imagecopy($im, $im1, 220, 270, 0, 0, 92, 92);


        //imagettftext($im, 40, 10, 498, 520, $black, $font, date('Y.m.d', time()));

        imagejpeg($im);
        imagedestroy($im);
    }
}