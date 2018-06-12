<?php
/**
 * 绿箭口香糖
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Lvjian
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '绿箭口香糖';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $select1 = $req->get('param2', "情人节快乐");
        $im = imagecreatetruecolor(900, 1200);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/lvjian/main.jpg');
        imagecopy($im,$bg,0,0,0,0,900,1200);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 255);
        $text = $name.$select1;
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';
        imagettftext($im, 34, 52, 120, 660, $black, $font, $text);
        imagettftext($im, 34, 24, 162, 762, $black, $font, $text);
        imagettftext($im, 34, 0, 140, 880, $black, $font, $text);

        // #二维码
        // $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zhuangbjun_163.png'));
        // $white = imagecolorallocate($im1 , 223 , 223 , 223);
        // imagecolortransparent($im1 , $white ) ;
        // imagefill($im1 , 100, 320 , $white);
        // imagecopy($im, $im1, 750, 20, 0, 0, 163, 163);

        imagejpeg($im);
        imagedestroy($im);
    }
}