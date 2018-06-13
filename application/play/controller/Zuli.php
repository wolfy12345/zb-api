<?php
/**
 * 情人节租赁
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Zuli
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '情人节租赁';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('param1', "装B高手");
        $weixin = $req->get('param2', "装B君");
        $avatar = $req->get('avatar', "");
        $type = $req->get('param4', "屌丝10块版");

        switch ($type)
        {
            case "屌丝10块版":
                $contents[0] = "陪吃饭：10块（雇主请客制）";
                $contents[1] = "陪聊：10块";
                $contents[2] = "陪喝酒：10块";
                $contents[3] = "陪哭：10块";
                $contents[4] = "陪逛街：10块";
                $contents[5] = "陪看月亮：10块（阴天半价）";
                $contents[6] = "陪压马路：10块";
                break;
            case "文艺小资版":
                $contents[0] = "陪唠嗑：10元/小时";
                $contents[1] = "陪看电影：20元/场 3场以上8折优惠（禁止看色情片）";
                $contents[2] = "陪逛街：30元/小时（鞋底要报销）";
                $contents[3] = "陪吃饭：40元/顿（雇主请客制）";
                $contents[4] = "牵手：80元/天";
                $contents[5] = "拥抱：100元/次";
                $contents[6] = "接吻：300元/次（牙缝不能有菜叶）";
                break;
            case "土豪奢华版":
                $contents[0] = "陪吃饭：188元/顿（雇主请客制）";
                $contents[1] = "陪逛街：198元/小时";
                $contents[2] = "陪看月亮：688元（阴天半价）";
                $contents[3] = "当电灯泡：80元/次";
                $contents[4] = "背黑锅：800元/次";
                $contents[5] = "接电话撒谎：80元/次";
                $contents[6] = "陪压马路：588元";
                break;
            case "吉利数字版":
                $contents[0] = "冒充男/女朋友：888元/次";
                $contents[1] = "当电灯泡：88元/次";
                $contents[2] = "背黑锅：88元/次";
                $contents[3] = "接电话撒谎：88元/次";
                $contents[4] = "陪吃饭：88元/顿";
                $contents[5] = "陪逛街：88元/小时";
                $contents[6] = "陪看月亮：888元/次";
                break;
            case "优惠大酬宾":
                $contents[0] = "陪上网：10元/小时 3小时起8折（网费要报销）";
                $contents[1] = "陪逛街：20元/小时 3小时起8折（鞋底要报销）";
                $contents[2] = "陪吃饭：10元/小时 3小时起8折（不陪酒）";
                $contents[3] = "陪唱歌：10元/小时 300元/通宵";
                $contents[4] = "拉手：5元/次 50元/包天";
                $contents[5] = "拥抱：10元/次 100元/包天";
                $contents[6] = "接吻：30元/次 300元/包天";
                break;
            case "经济适用版":
            default:
                $contents[0] = "陪逛街：15元/小时（鞋底要报销）";
                $contents[1] = "陪吃饭：18元/小时（雇主请客制）";
                $contents[2] = "陪看电影：10元/小时 3场以上8折优惠（禁止看色情片）";
                $contents[3] = "陪聚会：15元/次";
                $contents[4] = "拉手：10元/次";
                $contents[5] = "拥抱：20元/次";
                $contents[6] = "接吻：30元/次（牙缝不能有菜叶）";
                break;
        }

        $im = imagecreatetruecolor(1064, 763);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/zuli/main.jpg');
        imagecopy($im,$bg,0,0,0,0,1064,763);
        imagedestroy($bg);

        $black = imagecolorallocate($im, 52, 53, 48);
        $text = '姓名：'.$name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 40, 0, 418, 345, $black, $font, $text);

        $im1 = imagecreatefromstring(file_get_contents($avatar?(IA_ROOT.'/images/'.$avatar):(IA_ROOT.'/example/zuli/default.jpg')));
        $white = imagecolorallocate($im1 , 0 , 0 , 0);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagesavealpha($im1 , false);
        if ($avatar) {
            imagecopy($im, $im1, 155, 310, 0, 0, 240, 320);
        } else {
            imagecopy($im, $im1, 155, 310, 130, 0, 240, 320);
        }

        #微信号
        imagettftext($im, 22, 0, 418, 380, $black, $font, '微信：'.$weixin);


        imagettftext($im, 22, 0, 418, 415, $black, $font, $contents[0]);
        imagettftext($im, 22, 0, 418, 450, $black, $font, $contents[1]);
        imagettftext($im, 22, 0, 418, 485, $black, $font, $contents[2]);
        imagettftext($im, 22, 0, 418, 520, $black, $font, $contents[3]);
        imagettftext($im, 22, 0, 418, 555, $black, $font, $contents[4]);
        imagettftext($im, 22, 0, 418, 590, $black, $font, $contents[5]);
        imagettftext($im, 22, 0, 418, 625, $black, $font, $contents[6]);

        imagejpeg($im);
        imagedestroy($im);
    }
}