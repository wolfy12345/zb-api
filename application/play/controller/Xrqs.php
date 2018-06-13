<?php
/**
 * 寻人启事
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Xrqs
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '寻人启事';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('param2', "高手");
        $avatar = $req->get('avatar', "");
        $select1 = $req->get('param3', "高手");
        $lianxiq = $req->get('param5', "高手");
        $lianxi = $req->get('param6', "高手");
        $age = $req->get('param4', "100");
        $type = 2;
        $im = imagecreatetruecolor(622, 766);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/xrqs/main.jpg');
        imagecopy($im, $bg, 0, 0, 0, 0, 622, 766);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT . '/static/fonts/fh.ttf';
        imagettftext($im, 25, 0, 165, 245, $black, $font, $name);
        imagettftext($im, 23, 0, 165, 283, $black, $font, $select1);
        imagettftext($im, 23, 0, 220, 284, $black, $font, $age);
        imagettftext($im, 24, 0, 265, 644, $black, $font, $lianxiq);
        imagettftext($im, 24, 0, 285, 684, $black, $font, $lianxi);
        if ($type == 1) {
            $n_avatar = IA_ROOT.'/avatar/'.$avatar;
        } else {
            $n_avatar = IA_ROOT.'/images/'.$avatar;
        }

        $qq = $this->change($n_avatar);
        $white = imagecolorallocate($qq , 0 , 0 , 0);
        imagecolortransparent($qq , $white ) ;
        imagefill($qq , 100, 320 , $white);
        imagecopymerge($im, $qq, 380, 250, 0, 0, 130, 130, 100);
        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zbgs008_115.png'));
        $white = imagecolorallocate($im1 , 214 , 214 , 214);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 440, 550, 0, 0, 115, 115);
        imagejpeg($im);
        imagedestroy($im);
    }

    public function change($url){
        //图片的等比缩放

        //因为PHP只能对资源进行操作，所以要对需要进行缩放的图片进行拷贝，创建为新的资源
        $src=imagecreatefromjpeg($url);

        //取得源图片的宽度和高度
        $size_src=getimagesize($url);
        $w=$size_src['0'];
        $h=$size_src['1'];

        //指定缩放出来的最大的宽度（也有可能是高度）
        $max=130;

        //根据最大值为300，算出另一个边的长度，得到缩放后的图片宽度和高度
        if($w > $h){
            $w=$max;
            $h=$h*($max/$size_src['0']);
        }else{
            $h=$max;
            $w=$w*($max/$size_src['1']);
        }


        //声明一个$w宽，$h高的真彩图片资源
        $image=imagecreatetruecolor($w, $h);


        //关键函数，参数（目标资源，源，目标资源的开始坐标x,y, 源资源的开始坐标x,y,目标资源的宽高w,h,源资源的宽高w,h）
        imagecopyresampled($image, $src, 0, 0, 0, 0, $w, $h, $size_src['0'], $size_src['1']);
        return $image;
    }


}
