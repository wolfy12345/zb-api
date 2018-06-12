<?php
/**
 * 柏拉图性格标签
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;

use think\Request;

class Xgbq
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '柏拉图性格标签';
        $this->data['num'] = rand(1, 12);
        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $im = imagecreatetruecolor(600, 710);

        $name1 = $req->get('param2', "0505");
        $arr = $this->ch2arr($name1);
        $mm = $arr[0] . $arr[1];
        $dd = $arr[2] . $arr[3];
        if ($mm == '08' || $mm == '09') {
            $mm = $arr[1];
        }
        if ($dd == '08' || $dd == '09') {
            $dd = $arr[3];
        }
        $xz = $this->yige_constellation($mm, $dd);

        switch ($xz) {
            case "白羊座":
                $tp = '/example/xgbqq/4.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbq/byz.png');
                break;
            case "金牛座":
                $tp = '/example/xgbqq/5.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbq/jnz.png');
                break;
            case "双子座":
                $tp = '/example/xgbqq/6.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbq/szz.png');
                break;
            case "巨蟹座":
                $tp = '/example/xgbqq/7.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbqq/jxz.png');
                break;
            case "狮子座":
                $tp = '/example/xgbqq/8.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbqq/shiziz.png');
                break;
            case "处女座":
                $tp = '/example/xgbqq/9.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbqq/cnz.png');
                break;
            case "天秤座":
                $tp = '/example/xgbqq/10.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbqq/tcz.png');
                break;
            case "天蝎座":
                $tp = '/example/xgbqq/11.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbqq/txz.png');
                break;
            case "射手座":
                $tp = '/example/xgbqq/12.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbqq/ssz.png');
                break;
            case "摩羯座":
                $tp = '/example/xgbqq/1.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbqq/mjz.png');
                break;
            case "水瓶座":
                $tp = '/example/xgbqq/2.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbqq/spz.png');
                break;
            default:
                $tp = '/example/xgbqq/3.jpg';
                $img_l_t = imagecreatefrompng(IA_ROOT . '/example/xgbqq/syz.png');
        }

        $bg = imagecreatefromjpeg(IA_ROOT . $tp);

        imagecopy($im, $bg, 0, 0, 0, 0, 600, 710);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 255, 255, 255);
        $font = IA_ROOT . '/static/fonts/font2.ttf';
        $font1 = IA_ROOT . '/static/fonts/msyh.ttf';
        if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $name)) {
            //全部中文
            $length = mb_strlen($name, 'utf-8');
            if ($length == 6) {
                imagettftext($im, 35, 0, 155, 320, $black, $font, $name);
            } elseif ($length == 5) {
                imagettftext($im, 35, 0, 170, 320, $black, $font, $name);
            } elseif ($length == 4) {
                imagettftext($im, 35, 0, 205, 320, $black, $font, $name);
            } else {
                imagettftext($im, 35, 0, 235, 320, $black, $font, $name);
            }
        } elseif (preg_match("/^[a-zA-Z\s]+$/", $name)) {
            //全字母
            $length = mb_strlen($name, 'utf-8');
            if ($length == 6) {
                imagettftext($im, 35, 0, 225, 320, $black, $font, $name);
            } elseif ($length == 5) {
                imagettftext($im, 35, 0, 240, 320, $black, $font, $name);
            } elseif ($length == 4) {
                imagettftext($im, 35, 0, 255, 320, $black, $font, $name);
            } else {
                imagettftext($im, 35, 0, 270, 320, $black, $font, $name);
            }
        } elseif (preg_match("/^\d*$/", $name)) {
            //全数字
            $length = mb_strlen($name, 'utf-8');
            if ($length == 6) {
                imagettftext($im, 35, 0, 180, 320, $black, $font, $name);
            } elseif ($length == 5) {
                imagettftext($im, 35, 0, 240, 320, $black, $font, $name);
            } elseif ($length == 4) {
                imagettftext($im, 35, 0, 255, 320, $black, $font, $name);
            } else {
                imagettftext($im, 35, 0, 270, 320, $black, $font, $name);
            }
        } else {
            //其他
            $length = mb_strlen($name, 'utf-8');
            if ($length == 6) {
                imagettftext($im, 35, 0, 180, 320, $black, $font, $name);
            } elseif ($length == 5) {
                imagettftext($im, 35, 0, 215, 320, $black, $font, $name);
            } elseif ($length == 4) {
                imagettftext($im, 35, 0, 225, 320, $black, $font, $name);
            } else {
                imagettftext($im, 35, 0, 235, 320, $black, $font, $name);
            }
        }
        imagettftext($im, 18, 0, 160, 645, $black, $font1, '长按识别二维码');
        imagettftext($im, 18, 0, 160, 675, $black, $font1, '生成你的性格标签');
        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT . '/static/qrcode/tmp3.jpg'));
        $white = imagecolorallocate($im1, 223, 223, 223);
        imagecolortransparent($im1, $white);
        imagefill($im1, 100, 320, $white);
        imagecopy($im, $im1, 45, 600, 0, 0, 100, 100);
        imagejpeg($im);
        imagedestroy($im);
    }

    public function yige_constellation($month, $day)
    {
        // 检查参数有效性
        if ($month < 1 || $month > 12 || $day < 1 || $day > 31) return false;

        // 星座名称以及开始日期
        $constellations = array(
            array("20" => "水瓶座"),
            array("19" => "双鱼座"),
            array("21" => "白羊座"),
            array("20" => "金牛座"),
            array("21" => "双子座"),
            array("22" => "巨蟹座"),
            array("23" => "狮子座"),
            array("23" => "处女座"),
            array("23" => "天秤座"),
            array("24" => "天蝎座"),
            array("22" => "射手座"),
            array("22" => "摩羯座")
        );

        list($constellation_start, $constellation_name) = each($constellations[(int)$month - 1]);

        if ($day < $constellation_start) list($constellation_start, $constellation_name) = each($constellations[($month - 2 < 0) ? $month = 11 : $month -= 2]);

        return $constellation_name;
    }

    function ch2arr($str)
    {
        $length = mb_strlen($str, 'utf-8');
        $array = [];
        for ($i = 0; $i < $length; $i++)
            $array[] = mb_substr($str, $i, 1, 'utf-8');
        return $array;
    }

}