<?php
/**
 * 高考监考员
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Jiankao
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '高考监考员';

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
        $select1 = $req->get('param3', "装B高手");
        $im = imagecreatetruecolor(480, 640);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/jiankao/main.jpg');
        imagecopy($im,$bg,0,0,0,0,480,640);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT.'/static/fonts/msyh.ttf';

        $arr = $this->ch2arr($select1);
        foreach ($arr as $k=>$v) {
            imagettftext($im, 25, 0, 190, (275+$k*45), $black, $font, $v);
        }

        imagettftext($im, 17, 0, 190, 430, $black, $font, $name);
        imagettftext($im, 17, 0, 190, 473, $black, $font, rand(100000,1000000));

        imagettftext($im, 13, 0, 145, 520, $black, $font, $name2.'教育考试院');
        imagettftext($im, 13, 0, 165, 550, $black, $font, date('Y').'年印刷');

        $this->load_ext(['circleSeal']);
        $seal = new circleSeal($name2.'教育考试院',75,5,24,0,0,18,0);

        imagecopy($im, $seal->doImg(), 200, 415, 0, 0, 222, 222);

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