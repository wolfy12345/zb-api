<?php
/**
 * 好声音证书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Haoshengyin
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '好声音证书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name1 = $req->get('param2', "华北");
        $select1 = $req->get('param3', "最佳歌手称号");
        $name1 = "2017《中国好声音》".$name1."赛区";
        $im = imagecreatetruecolor(800, 534);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/haoshengyin/main.jpg');
        imagecopy($im,$bg,0,0,0,0,800,534);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/fzlsjt.ttf';
        $font1 = IA_ROOT.'/static/fonts/st01.ttf';
        imagettftext($im, 28, 0, 200, 255, $black, $font, $text);
        imagettftext($im, 18, 0, 250, 310, $black, $font1, $name1);
        imagettftext($im, 18, 0, 390, 360, $black, $font1, $select1);
        imagejpeg($im);
        imagedestroy($im);
    }
}