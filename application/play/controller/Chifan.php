<?php
/**
 * 2018靠什么吃饭
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;

class Chifan
{
    /**
     * 入口页
     */
    public function index()
    {
//        $this->data['title'] = '2018靠什么吃饭';
//        $this->data['num'] = rand(1,14);

        return $this -> fetch('index');
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
//        $num = $req->get('num', 1);
        $num = rand(1, 14);
        $im = imagecreatetruecolor(750, 1000);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/chifan/'.$num.'.jpg');
        imagecopy($im,$bg,0,0,0,0,750,1000);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 45, 119, 63);
        $font = IA_ROOT.'/static/fonts/fh.ttf';
        if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$name)) {
            //全部中文
            $length = mb_strlen($name, 'utf-8');
            if($length == 4){
                imagettftext($im, 30, 0, 290, 250, $black, $font, $name);
            }elseif ($length == 3){
                imagettftext($im, 30, 0, 310, 250, $black, $font, $name);
            }elseif ($length == 2){
                imagettftext($im, 30, 0, 330, 250, $black, $font, $name);
            }else{
                imagettftext($im, 30, 0, 345, 250, $black, $font, $name);
            }
        } elseif(preg_match("/^[a-zA-Z\s]+$/",$name)){
            //全字母
            $length = mb_strlen($name, 'utf-8');
            if($length == 4){
                imagettftext($im, 30, 0, 300, 250, $black, $font, $name);
            }elseif ($length == 3){
                imagettftext($im, 30, 0, 320, 250, $black, $font,$name);
            }elseif ($length == 2){
                imagettftext($im, 30, 0, 340, 250, $black, $font, $name);
            }else{
                imagettftext($im, 30, 0, 350, 250, $black, $font, $name);
            }
        }elseif(preg_match("/^\d*$/",$name)){
            //全数字
            $length = mb_strlen($name, 'utf-8');
            if($length == 4){
                imagettftext($im, 30, 0, 330, 250, $black, $font,$name);
            }elseif ($length == 3){
                imagettftext($im, 30, 0, 340, 250, $black, $font, $name);
            }elseif ($length == 2){
                imagettftext($im, 30, 0, 350, 250, $black, $font, $name);
            }else{
                imagettftext($im, 30, 0, 360, 250, $black, $font, $name);
            }
        }else{
            //其他
            $length = mb_strlen($name, 'utf-8');
            if($length == 4){
                imagettftext($im, 30, 0, 300, 250, $black, $font,$name);
            }elseif ($length == 3){
                imagettftext($im, 30, 0, 320, 250, $black, $font, $name);
            }elseif ($length == 2){
                imagettftext($im, 30, 0, 330, 250, $black, $font, $name);
            }else{
                imagettftext($im, 30, 0, 340, 250, $black, $font, $name);
            }
        }

        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/tmp6.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 580, 860, 0, 0, 115, 115);

        imagejpeg($im);
        imagedestroy($im);
    }
}