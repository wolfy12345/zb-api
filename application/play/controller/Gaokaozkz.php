<?php
/**
 * 高考准考证
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Gaokaozkz
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '高考准考证';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name2 = $req->get('param2', "装B高手");
        $select1 = $req->get('param3', "理科综合");
        $select2 = $req->get('param4', "男");
        $im = imagecreatetruecolor(703, 1081);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/gaokaozkz/main.jpg');
        imagecopy($im,$bg,0,0,0,0,703,1081);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 128, 126, 128);
        $font = IA_ROOT.'/static/fonts/st01.ttf';

        imagettftext($im, 17, 0, 280, 355, $black, $font, $name);
        //高考准考证生成器

        #准考证号
        $no1 = '16' . rand(1, 70).rand(1, 50). rand(1, 99).rand(1, 5) . rand(1, 5) . rand(1000, 10000);
        imagettftext($im, 19, 0, 280, 314, $black, $font, $no1);
        #考场
        $no2 = str_pad(rand(1, 100), 3, '0', STR_PAD_LEFT);
        imagettftext($im, 19, 0, 280, 480, $black, $font, $no2);
        #座位号
        $no3 = str_pad(rand(1, 100), 3, '0', STR_PAD_LEFT);
        imagettftext($im, 19, 0, 280, 520, $black, $font, $no3);

        imagettftext($im, 17, 0, 280, 395, $black, $font, $select1);
        imagettftext($im, 17, 0, 280, 438, $black, $font, $select2);
        imagettftext($im, 17, 0, 280, 562, $black, $font, $name2);

        imagejpeg($im);
        imagedestroy($im);
    }
}