<?php
/**
 * 催款通知书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;

class Cuikuan
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '催款通知书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "神笔记");
        $name1 = $req->get('param2', "神笔记");
        $name1 = $name1.'元';
        $im = imagecreatetruecolor(702, 830);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/cuikuan/main.jpg');
        imagecopy($im,$bg,0,0,0,0,702,830);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        $name3 = "2018年1月1日";
        imagettftext($im, 16, 0, 85, 155, $black, $font, $text);
        imagettftext($im, 14, 0, 190, 247, $black, $font, $name1);
        imagettftext($im, 14, 0, 285, 206, $black, $font, $name3);
        imagejpeg($im);
        imagedestroy($im);
    }
}