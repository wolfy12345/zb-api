<?php
/**
 * 2017我的年总结
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Zongjie
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '2017我的年终总结';
        $this->data['num'] = rand(1, 8);
        $this->data['desc'] = '2017个人总结';
        $this->back = false;
        $this->type = 76;

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "装B高手");
        $sex = ($name1 == '男') ? 'a' : 'b';
        $num = rand(1, 8);
        $im = imagecreatetruecolor(600, 800);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/zongjie/'.$sex.$num.'.jpg');
        imagecopy($im,$bg,0,0,0,0,600,800);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
       
        if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$name)) {
            //全部中文
            $length = mb_strlen($name, 'utf-8');
            if($length == 4){
                imagettftext($im, 30, 0, 120, 80, $black, $font, $name.'的年终总结');
            }elseif ($length == 3){
                imagettftext($im, 30, 0, 130, 80, $black, $font, $name.'的年终总结');
            }elseif ($length == 2){
                imagettftext($im, 30, 0, 150, 80, $black, $font, $name.'的年终总结');
            }else{
                imagettftext($im, 30, 0, 160, 80, $black, $font, $name.'的年终总结');
            }
        } elseif(preg_match("/^[a-zA-Z\s]+$/",$name)){
            //全字母
            $length = mb_strlen($name, 'utf-8');
            if($length == 4){
                imagettftext($im, 30, 0, 130, 80, $black, $font, $name.'的年终总结');
            }elseif ($length == 3){
                imagettftext($im, 30, 0, 140, 80, $black, $font,$name.'的年终总结');
            }elseif ($length == 2){
                imagettftext($im, 30, 0, 150, 80, $black, $font, $name.'的年终总结');
            }else{
                imagettftext($im, 30, 0, 160, 80, $black, $font, $name.'的年终总结');
            }
        }elseif(preg_match("/^\d*$/",$name)){
            //全数字
            $length = mb_strlen($name, 'utf-8');
            if($length == 4){
                imagettftext($im, 30, 0, 135, 80, $black, $font,$name.'的年终总结');
            }elseif ($length == 3){
                imagettftext($im, 30, 0, 145, 80, $black, $font, $name.'的年终总结');
            }elseif ($length == 2){
                imagettftext($im, 30, 0, 155, 80, $black, $font, $name.'的年终总结');
            }else{
                imagettftext($im, 30, 0, 165, 80, $black, $font, $name.'的年终总结');
            }
        }else{
            //其他
            $length = mb_strlen($name, 'utf-8');
            if($length == 4){
                imagettftext($im, 30, 0, 130, 80, $black, $font,$name.'的年终总结');
            }elseif ($length == 3){
                imagettftext($im, 30, 0, 140, 80, $black, $font, $name.'的年终总结');
            }elseif ($length == 2){
                imagettftext($im, 30, 0, 150, 80, $black, $font, $name.'的年终总结');
            }else{
                imagettftext($im, 30, 0, 160, 80, $black, $font, $name.'的年终总结');
            }
        }
        
        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/tmp1.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 240, 660, 0, 0, 115, 115);
        imagejpeg($im);
        imagedestroy($im);
    }
}