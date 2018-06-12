<?php
/**
 * 奖杯
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;
class Jiangbei
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '奖杯生成器';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $select1 = $req->get('param2', "");
        $select2 = $req->get('param3', "");

        $im = imagecreatetruecolor(1280, 1570);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/jiangbei/bg.jpg');
        imagecopy($im,$bg,0,0,0,0,1280,1570);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT.'/static/fonts/msyh.ttf';

        #名称
        if (mb_strlen($name) == 3) imagettftext($im, 35, 0, 910, 1245, $black, $font, $name);
        elseif (mb_strlen($name) == 4) imagettftext($im, 35, 0, 885, 1245, $black, $font, $name);
        elseif (mb_strlen($name) == 5) imagettftext($im, 35, 0, 860, 1245, $black, $font, $name);
        else imagettftext($im, 35, 0, 930, 1245, $black, $font, $name);

        #荣耀
        if (mb_strlen($select2) == 4) imagettftext($im, 35, 0, 890, 1320, $black, $font, $select2);
        elseif (mb_strlen($select2) == 5) imagettftext($im, 35, 0, 865, 1320, $black, $font, $select2);
        else imagettftext($im, 35, 0, 910, 1320, $black, $font, $select2);

        $font2 = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $black2 = imagecolorallocate($im, 250, 212, 173);
        imagettftext($im, 50, 0, 250, 920, $black2, $font2, '荣誉证书');

        $font3 = IA_ROOT.'/static/fonts/rzrxnfhj.ttf';
        imagettftext($im, 30, 0, 260, 990, $black2, $font3, 'HONORARY');
        imagettftext($im, 30, 0, 240, 1040, $black2, $font3, 'CREDENTIAL');

        #组织
        if (mb_strlen($select1) == 5) imagettftext($im, 38, 0, 260, 1120, $black2, $font2, $select1);
        elseif (mb_strlen($select1) == 7) imagettftext($im, 38, 0, 230, 1120, $black2, $font2, $select1);
        elseif (mb_strlen($select1) == 8) imagettftext($im, 38, 0, 210, 1120, $black2, $font2, $select1);
        else imagettftext($im, 38, 0, 250, 1120, $black2, $font2, $select1);

        imagejpeg($im);
        imagedestroy($im);
    }
}