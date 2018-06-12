<?php
/**
 * 可乐瓶表白生成器
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Keleping
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '可乐瓶表白生成器';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $select1 = $req->get('param2', "装B高手");
        $im = imagecreatetruecolor(580, 774);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/keleping/main.jpg');
        imagecopy($im,$bg,0,0,0,0,580,774);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 204, 179, 174);
        $font = IA_ROOT.'/static/fonts/hyzyjt.ttf';

        #可乐瓶表白生成器
        imagettftext($im, 60, 0, 160, 480, $black, $font, $name);
        imagettftext($im, 25, 0, 172, 540, $black, $font, $select1);

        imagejpeg($im);
        imagedestroy($im);
    }
}