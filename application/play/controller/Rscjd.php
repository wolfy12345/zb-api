<?php
/**
 * 人生成绩单
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Rscjd
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '人生成绩单';
        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "马大哈");
        $id = $req->get('param2', "男");
        $tt = ($id=='男' ?'a':'b').rand(1,7).'.jpg';
        $img1 = IA_ROOT.'/example/rscjd/'.$tt;
        $im = imagecreatetruecolor(800, 1300);
        $bg = imagecreatefromjpeg($img1);
        imagecopy($im,$bg,0,0,0,0,800,1300);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 183, 34, 38);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
         imagettftext($im, 30, 0, 40, 220, $black, $font, $text);
        imagejpeg($im);
        imagedestroy($im);
    }
}