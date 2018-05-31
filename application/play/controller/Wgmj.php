<?php
/**
 * 武功秘籍
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Wgmj
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '武功秘籍';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('name', "装B高手");
        $im = imagecreatetruecolor(570, 423);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/wgmj/main.jpg');
        imagecopy($im,$bg,0,0,0,0,570,423);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/lxk.ttf'; 
        $arr = $this->ch2arr($name);

        if (isset($arr[0]) && $arr[0]) {
            imagettftext($im, 20, 3, 182, 118, $black, $font, $arr[0]);
            
        }

        if (isset($arr[1]) && $arr[1]) {
            imagettftext($im, 20, 3, 188, 149, $black, $font, $arr[1]);
            
        }

        if (isset($arr[2]) && $arr[2]) {
            imagettftext($im, 20, 3, 194, 180, $black, $font, $arr[2]);
            
        }

        if (isset($arr[3]) && $arr[3]) {
            imagettftext($im, 20, 3, 200, 213, $black, $font, $arr[3]);
           
        }
      
        // #二维码
         $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/tmp2.png'));
         $white = imagecolorallocate($im1 , 174 , 55 , 77);
         imagecolortransparent($im1 , $white ) ;
         imagefill($im1 , 0, 0 , $white);
         imagecopy($im, $im1, 400, 500, 0, 0, 140, 140);
        
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