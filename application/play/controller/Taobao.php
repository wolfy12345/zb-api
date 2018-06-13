<?php
/**
 * 淘宝售卖自己
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Taobao
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '淘宝售卖自己';

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
        $amount = $req->get('param4', 100);
        $type = 2;
        $name = "【全球首发限量爆款──".$name."】";
        $amount = "￥".$amount;
        $im = imagecreatetruecolor(720, 1280);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/taobao/taobao.jpg');
        imagecopy($im, $bg, 0, 0, 0, 0, 720, 1280);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $black1 = imagecolorallocate($im, 255, 69, 0);
        $font = IA_ROOT . '/static/fonts/msyh.ttf';
        imagettftext($im, 18, 0, 62, 850, $black, $font, $name);
        imagettftext($im, 20, 0, 14, 885, $black, $font, $select1);
        imagettftext($im, 30, 0, 6, 945, $black1, $font, $amount);

        if ($type == 1) {
            $n_avatar = IA_ROOT.'/avatar/'.$avatar;
        } else {
            $n_avatar = IA_ROOT.'/images/'.$avatar;
        }

        $qq = $this->change($n_avatar);
        imagecopymerge($im, $qq, 0, 0, 0, 0, 720, 720, 100);
        $img_l_t = imagecreatefromjpeg(IA_ROOT.'/example/taobao/tianmao.jpg');
        $white = imagecolorallocate($img_l_t , 255 , 255 , 255);
        imagecolortransparent($img_l_t , $white ) ;
        imagealphablending($img_l_t , false);
        imagefill($img_l_t , 0 , 0 , $white);
        imagesavealpha($img_l_t , true);
        imagecopy($im, $img_l_t, 550, 600, 0, 0, 165, 111);
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
        $max=720;

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
