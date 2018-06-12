<?php
/**
 * 彩色瓶子表白生成器
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Pingzi
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '彩色瓶子表白生成器';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B君");
        $select1 = $req->get('param2', "好想你");
        $im = imagecreatetruecolor(580, 774);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/pingzi/main.jpg');
        imagecopy($im,$bg,0,0,0,0,580,774);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 204, 179, 174);
        $font = IA_ROOT.'/static/fonts/zkklt.ttf';

        $arr = $this->ch2arr($name);
        $arr2 = $this->ch2arr($select1);


        #彩色瓶子表白生成器
        imagettftext($im, 50, 0, 140, 190, $black, $font, $arr[0]);
        imagettftext($im, 50, 0, 290, 190, $black, $font, $arr[1]);
        imagettftext($im, 50, 0, 440, 190, $black, $font, $arr[2]);

        imagettftext($im, 50, 0, 140, 260, $black, $font, $arr2[0]);
        imagettftext($im, 50, 0, 290, 260, $black, $font, $arr2[1]);
        imagettftext($im, 50, 0, 440, 260, $black, $font, $arr2[2]);

        imagejpeg($im);
        imagedestroy($im);
    }

    function ch2arr($str)
    {
        $length = mb_strlen($str, 'utf-8');
        $array = [];
        for ($i=0; $i<$length; $i++)
            $array[] = mb_substr($str, $i, 1, 'utf-8');
        return $array;
    }
}