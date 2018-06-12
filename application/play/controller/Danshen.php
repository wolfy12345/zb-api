<?php
/**
 * 单身
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;

class Danshen
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '单身';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('param1', "神笔记");
        $sex = $req->get('param2', "我是男生");
        $im = imagecreatetruecolor(480, 480);

        #背景
        $bg_arr = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];

        $bg = imagecreatefromjpeg(IA_ROOT.'/example/dansheng/b'.$bg_arr[rand(0, 19)].'.jpg');
        imagecopy($im,$bg,0,0,0,0,480,480);
        imagedestroy($bg);

        if ($sex == '我是男生') {
            $bg_arr_2 = [
                ['k'=>'01', 'point_x'=>'252', 'point_y'=>'257'],
                ['k'=>'02', 'point_x'=>'253', 'point_y'=>'245'],
                ['k'=>'03', 'point_x'=>'261', 'point_y'=>'265'],
                ['k'=>'04', 'point_x'=>'186', 'point_y'=>'261'],
                ['k'=>'05', 'point_x'=>'314', 'point_y'=>'249'],
                ['k'=>'06', 'point_x'=>'286', 'point_y'=>'239'],
                ['k'=>'07', 'point_x'=>'180', 'point_y'=>'231'],
                ['k'=>'08', 'point_x'=>'319', 'point_y'=>'274'],
                ['k'=>'09', 'point_x'=>'189', 'point_y'=>'274'],
                ['k'=>'10', 'point_x'=>'243', 'point_y'=>'306'],
                ['k'=>'11', 'point_x'=>'239', 'point_y'=>'235'],
                ['k'=>'12', 'point_x'=>'255', 'point_y'=>'231'],
                ['k'=>'13', 'point_x'=>'283', 'point_y'=>'292'],
                ['k'=>'14', 'point_x'=>'240', 'point_y'=>'236'],
                ['k'=>'15', 'point_x'=>'286', 'point_y'=>'277'],
                ['k'=>'16', 'point_x'=>'273', 'point_y'=>'269'],
                ['k'=>'17', 'point_x'=>'313', 'point_y'=>'275'],
                ['k'=>'18', 'point_x'=>'181', 'point_y'=>'226'],
                ['k'=>'19', 'point_x'=>'287', 'point_y'=>'272'],
                ['k'=>'20', 'point_x'=>'330', 'point_y'=>'282'],
                ['k'=>'21', 'point_x'=>'285', 'point_y'=>'211'],
                ['k'=>'22', 'point_x'=>'287', 'point_y'=>'226'],
                ['k'=>'23', 'point_x'=>'287', 'point_y'=>'226'],
                ['k'=>'24', 'point_x'=>'286', 'point_y'=>'207'],
                ['k'=>'25', 'point_x'=>'315', 'point_y'=>'259'],
            ];

            $title = $bg_arr_2[rand(0,24)];
        } else {
            $bg_arr_2 = [
                ['k'=>'02b', 'point_x'=>'253', 'point_y'=>'245'],
                ['k'=>'08b', 'point_x'=>'319', 'point_y'=>'276'],
                ['k'=>'09b', 'point_x'=>'189', 'point_y'=>'276'],
                ['k'=>'10b', 'point_x'=>'243', 'point_y'=>'306'],
                ['k'=>'11b', 'point_x'=>'239', 'point_y'=>'235'],
                ['k'=>'14b', 'point_x'=>'240', 'point_y'=>'236'],
                ['k'=>'15b', 'point_x'=>'286', 'point_y'=>'277'],
                ['k'=>'16b', 'point_x'=>'271', 'point_y'=>'269'],
                ['k'=>'18b', 'point_x'=>'181', 'point_y'=>'226'],
                ['k'=>'19b', 'point_x'=>'287', 'point_y'=>'272'],
                ['k'=>'20b', 'point_x'=>'330', 'point_y'=>'240'],
                ['k'=>'21b', 'point_x'=>'285', 'point_y'=>'211'],
                ['k'=>'22b', 'point_x'=>'287', 'point_y'=>'224'],
                ['k'=>'23b', 'point_x'=>'287', 'point_y'=>'224'],
                ['k'=>'24b', 'point_x'=>'286', 'point_y'=>'207'],
                ['k'=>'25b', 'point_x'=>'315', 'point_y'=>'259'],
            ];

            $title = $bg_arr_2[rand(0,15)];
        }

        $img_l_t = imagecreatefrompng(IA_ROOT.'/example/dansheng/'.$title['k'].'.png');
        $white = imagecolorallocate($img_l_t , 0 , 0 , 0);
        imagecolortransparent($img_l_t , $white ) ;
        imagealphablending($img_l_t , true);
        imagefill($img_l_t , 0 , 0 , $white);
        imagesavealpha($img_l_t , true);
        imagecopy($im, $img_l_t, 0, 0, 0, 0, 480, 480);

        $black = imagecolorallocate($im, 255, 255, 255);
        $text = $name;
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        imagettftext($im, 28, 0, $title['point_x'], $title['point_y'], $black, $font, $text);

        imagejpeg($im);
        imagedestroy($im);
    }
}