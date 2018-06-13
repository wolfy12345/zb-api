<?php
/**
 * 王者荣耀
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Wzry
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '王者荣耀';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('param2', "装B高手");
        $avatar = $req->get('avatar', "");
        $type = 2;
        $im = imagecreatetruecolor(1500, 844);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/wzry/bg.jpg');
        imagecopy($im,$bg,0,0,0,0,1500,844);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 203, 196, 188);
        $black2 = imagecolorallocate($im, 172, 148, 100);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 20, 0, 355, 125, $black, $font, $text);
        imagettftext($im, 20, 0, 355, 760, $black2, $font, $text);

        if ($type == 1) {
            $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/avatar/'.$avatar));
            $im2 = imagecreatefromstring(file_get_contents(IA_ROOT.'/avatar/'.$avatar));
        } else {
            $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/images/'.$avatar));
            $im2 = imagecreatefromstring(file_get_contents(IA_ROOT.'/images/'.$avatar));
        }

        imagecopymerge($im, $im1, 225, 100, 0, 0, 110, 100, 100);
        imagecopymerge($im, $im2, 225, 730, 0, 0, 110, 100, 100);
        $img_l_t = imagecreatefrompng(IA_ROOT.'/example/wzry/kuang.png');
        $white = imagecolorallocate($img_l_t , 255 , 255 , 255);
        imagecolortransparent($img_l_t , $white ) ;
        imagealphablending($img_l_t , false);
        imagefill($img_l_t , 0 , 0 , $white);
        imagesavealpha($img_l_t , true);
        imagecopy($im, $img_l_t, 200, 80, 0, 0, 140, 130);
        imagecopy($im, $img_l_t, 200, 710, 0, 0, 140, 130);

        imagejpeg($im);
        imagedestroy($im);
    }
}