<?php
/**
 * 火车票生成器
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Huoche
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '火车票生成器';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
            header("content-type:image/jpeg");
            $qidian = $req->get('param1', "北京南");
            $zhongdian = $req->get('param2', "杭州东");
            $checi = $req->get('param3', "G110");
            $jiage = $req->get('param4', "456");
            $name = $req->get('param5', "装B高手");
            $shenfen = $req->get('param6', "130130xxxxxxxx1234");
            $im = imagecreatetruecolor(379, 234);
            $bg = imagecreatefromjpeg(IA_ROOT.'/example/huoche/main.jpg');
            imagecopy($im,$bg,0,0,0,0,379,234);
            imagedestroy($bg);
            $black = imagecolorallocate($im, 60, 60, 60);
            $text = $name;
            $font = IA_ROOT.'/static/fonts/msyh.ttf';
            $blacka = imagecolorallocate($im, 15, 23, 25);
            $time_y=date("Y");
            $time_m=date("m");
            $time_d=date("d");
            $time_h=date("h:s");

            imagettftext($im, 15, 0, 45, 47, $blacka, $font, $qidian);
            imagettftext($im, 15, 0, 240, 47, $blacka, $font, $zhongdian);
            imagettftext($im, 15, 0, 155, 47, $blacka, $font, $checi);
            imagettftext($im, 13, 0, 44, 101, $blacka, $font, $jiage);
            imagettftext($im, 13, 0, 200, 150, $blacka, $font, $name);
            imagettftext($im, 13, 0, 19, 150, $blacka, $font, substr($shenfen,0,6)."********".substr($shenfen,7,4));

            //写入时间
            imagettftext($im, 9, 0, 28, 83, $blacka, $font, $time_y);
            imagettftext($im, 9, 0, 72, 83, $blacka, $font, $time_m);
            imagettftext($im, 9, 0, 109, 83, $blacka, $font, $time_d);
            imagettftext($im, 9, 0, 143, 83, $blacka, $font, $time_h);

            imagejpeg($im);
            imagedestroy($im);




    }
}