<?php
/**
 * 一束草莓鲜花
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;
class Caomei
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '一束草莓鲜花';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $select1 = $req->get('param2', "情人节快乐");
        $im = imagecreatetruecolor(960, 1280);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/caomei/main.jpg');
        imagecopy($im,$bg,0,0,0,0,960,1280);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name.$select1;
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';
        imagettftext($im, 45, 0, 120, 470, $black, $font, $text);

        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zhuangbjun_163.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 750, 20, 0, 0, 163, 163);

        imagejpeg($im);
        imagedestroy($im);
    }
}