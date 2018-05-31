<?php
/**
 * 测试未来三年事情
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Weilai
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '测试未来三年事情 ';
        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");

        $im = imagecreatetruecolor(860, 860);
        $dd = rand(1,7);
        $tt = IA_ROOT.'/example/weilai/'.$dd.".jpg";
        $bg = imagecreatefromjpeg($tt);
        $black = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT.'/static/fonts/fh.ttf';

        imagecopy($im,$bg,0,0,0,0,860,860);
        imagedestroy($bg);

        $len = (strlen($name)+mb_strlen($name))/2;
        imagettftext($im, 43, 0, 370-($len>6?($len - 6)*30:0), 110, $black, $font, $name);

        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zbgs008_160_bai.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 350, 700, 0, 0, 160, 160);

        imagejpeg($im);
        imagedestroy($im);
    }
}