<?php
/**
 * 我要嫁他
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Woyaojiata
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '我要嫁他';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $avatar = $req->get('avatar', "");

        $im = imagecreatetruecolor(720, 720);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/woyaojiata/main.jpg');
        imagecopy($im,$bg,0,0,0,0,720,720);
        imagedestroy($bg);

        $im1 = imagecreatefromstring(file_get_contents($avatar?(IA_ROOT.'/images/'.$avatar):(IA_ROOT.'/example/woyaoquta/default.jpg')));
        $white = imagecolorallocate($im1 , 0 , 0 , 0);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagesavealpha($im1 , false);
        if ($avatar) {
            imagecopy($im, $im1, 250, 250, 0, 0, 222, 222);
        } else {
            imagecopy($im, $im1, 250, 250, 130, 0, 222, 222);
        }

        imagejpeg($im);
        imagedestroy($im);
    }
}