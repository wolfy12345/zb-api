<?php
/**
 * 明星未接来电生成器
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Mxwjld
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '明星未接来电生成器 ';
        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "高手");
        $mxname =$req->get('param2', "热巴");
        $b = $req->get('param3', "，我睡不着，想你了");
        $b = str_replace("xxx", "", $b);
        $im = imagecreatetruecolor(720, 1280);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/mxwjld/33.jpg');
        $black = imagecolorallocate($im, 55, 55, 55);
        $zmxname = $mxname;
        $ymxname = "：".$name.$b;
        $font = IA_ROOT.'/static/fonts/fh.ttf';
        $font1 = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $font2 = IA_ROOT.'/static/fonts/liguofu.ttf';
        $font3 = IA_ROOT.'/static/fonts/lxk.ttf';
        $font4 = IA_ROOT.'/static/fonts/msyh.ttf';
        $font6 = IA_ROOT.'/static/fonts/rzrxnfhj.ttf';
        $font7 = IA_ROOT.'/static/fonts/simkai.ttf';
        $font8 = IA_ROOT.'/static/fonts/song.ttf';
        $font9 = IA_ROOT.'/static/fonts/wz.ttf';
        $font10 = IA_ROOT.'/static/fonts/sjl.ttf';
        imagecopy($im,$bg,0,0,0,0,720,1280);
        imagedestroy($bg);
        imagettftext($im, 19, 0, 30, 520, $black, $font, $zmxname);
        imagettftext($im, 19, 0, 103, 520, $black, $font, $ymxname);
        imagettftext($im, 19, 0, 30, 690, $black, $font7, $mxname);
        imagettftext($im, 19, 0, 30, 871, $black, $font, $mxname);



        imagejpeg($im);
        imagedestroy($im);
    }
}