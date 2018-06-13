<?php
/**
 * 光棍节租赁
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Zuliggj
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '光棍节租赁';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('param1', "装B高手");
        $weixin = $req->get('param2', "");
        $avatar = $req->get('avatar', "");
        $type = $req->get('param4', "屌丝10块版");

        switch ($type)
        {
            case "1":
                $contents[0] = "15元/天";
                $contents[1] = "10元/餐（雇主请客制）";
                $contents[2] = "10元/场";
                $contents[3] = "15元/次";
                $contents[4] = "5元/次";
                $contents[5] = "5元/次";
                $contents[6] = "10元/次";
                break;
            case "2":
                $contents[0] = "20元/天";
                $contents[1] = "20元/餐（雇主请客制）";
                $contents[2] = "20元/场";
                $contents[3] = "25元/次";
                $contents[4] = "10元/次";
                $contents[5] = "10元/次";
                $contents[6] = "20元/次";
                break;
            case "3":
                $contents[0] = "100元/天";
                $contents[1] = "100元/餐（雇主请客制）";
                $contents[2] = "150元/场";
                $contents[3] = "200元/次";
                $contents[4] = "100元/次";
                $contents[5] = "100元/次";
                $contents[6] = "300元/次";
                break;
            case "4":
                $contents[0] = "500元/天";
                $contents[1] = "300元/餐（雇主请客制）";
                $contents[2] = "300元/场";
                $contents[3] = "500元/次";
                $contents[4] = "300元/次";
                $contents[5] = "500元/次";
                $contents[6] = "1000元/次";
                break;
            case "5":
                $contents[0] = "3000元/天";
                $contents[1] = "1000元/餐（雇主请客制）";
                $contents[2] = "1000元/场";
                $contents[3] = "3000元/次";
                $contents[4] = "2000元/次";
                $contents[5] = "3000元/次";
                $contents[6] = "5000元/次";
                break;
            default:
                $contents[0] = "15元/小时（鞋底要报销）";
                $contents[1] = "18元/小时（雇主请客制）";
                $contents[2] = "10元/小时 3场以上8折优惠（禁止看色情片）";
                $contents[3] = "15元/次";
                $contents[4] = "10元/次";
                $contents[5] = "20元/次";
                $contents[6] = "30元/次（牙缝不能有菜叶）";
                break;
        }

        $im = imagecreatetruecolor(1064, 763);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/zuliggj/main.jpg');
        imagecopy($im,$bg,0,0,0,0,1066,800);
        imagedestroy($bg);

        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 23, 1, 480, 380, $black, $font, $text);
        imagettftext($im, 23, 1, 481, 380, $black, $font, $text);

        $im1 = imagecreatefromstring(file_get_contents($avatar?(IA_ROOT.'/images/'.$avatar):(IA_ROOT.'/example/zuliggj/default.jpg')));
        $im1=imagerotate($im1, 1, 0);
        $white = imagecolorallocate($im1 , 0 , 0 , 0);
        imagecolortransparent($im1 , $white ) ;
        imagealphablending($im1 , false);
        imagefill($im1 , 0 , 0 , $white);
        imagesavealpha($im1 , true);
        imagecopy($im, $im1, 34, 250, 0, 0, 300, 440);

        #微信号
        if (!empty($weixin)) {
            imagettftext($im, 22, 1, 480, 420, $black, $font, $weixin);
            imagettftext($im, 22, 1, 481, 420, $black, $font, $weixin);
        }


        imagettftext($im, 19, 1, 480, 450, $black, $font, $contents[0]);
        imagettftext($im, 19, 1, 480, 480, $black, $font, $contents[1]);
        imagettftext($im, 19, 1, 505, 510, $black, $font, $contents[2]);
        imagettftext($im, 19, 1, 480, 540, $black, $font, $contents[3]);
        imagettftext($im, 19, 1, 460, 570, $black, $font, $contents[4]);
        imagettftext($im, 19, 1, 460, 600, $black, $font, $contents[5]);
        imagettftext($im, 19, 1, 460, 630, $black, $font, $contents[6]);

        imagettftext($im, 19, 1, 490, 660, $black, $font, '价格根据年龄长相面议，适当情况可倒贴');
        imagettftext($im, 19, 1, 491, 660, $black, $font, '价格根据年龄长相面议，适当情况可倒贴');


        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zbgs008_160.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 780, 350 , $white);
        imagecopy($im, $im1, 780, 312, 0, 0, 160, 160);

        imagejpeg($im);
        imagedestroy($im);
    }
}