<?php
/**
 * 绝地求生吃鸡生成器
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Jdqs
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '绝地求生吃鸡生成器';

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
        if($select1 == '单排'){
            $bg = imagecreatefromjpeg(IA_ROOT.'/example/jdqs/1.jpg');
        }else{
            $bg = imagecreatefromjpeg(IA_ROOT.'/example/jdqs/2.jpg');
        }
        $im = imagecreatetruecolor(1000, 751);
        imagecopy($im,$bg,0,0,0,0,1000,751);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 255);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 30, 0, 65, 115, $black, $font, $text);
         #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zbgs008_160.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 65, 358, 0, 0, 160, 160);
        imagejpeg($im);
        imagedestroy($im);
    }
}