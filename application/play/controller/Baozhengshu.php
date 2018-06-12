<?php
/**
 * 保证书
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */

namespace app\play\controller;
use think\Request;

class Baozhengshu
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '保证书';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $name2 = $req->get('param2', "装B高手");
        $select1 = $req->get('param3', "老公保证书");
        $im = imagecreatetruecolor(856, 1200);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/baozhengshu/main.jpg');
        imagecopy($im,$bg,0,0,0,0,856,1200);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT.'/static/fonts/fzjljt.ttf';

        #保证书
        imagettftext($im, 60, 0, 345, 98, $black, $font, '保证书');

        if ($select1 == '老婆保证书') {
            $content[] = '亲爱的'.$name;
            $content[] = '我最爱的老公，最最帅气的老公，';
            $content[] = '在这里，我心甘情愿写下这份保证书：';
            $content[] = '１，保证对老公的权威绝对服从！';
            $content[] = '２，家务我做，孩子我带！';
            $content[] = '３，保证对老公态度要好，避免琐事产生的摩擦！';
            $content[] = '４，出门在外一定要做小鸟依人状！';
            $content[] = '５，要以极大的热忱支持老公玩网游！';
            $content[] = '６，保证对老公绝对忠诚，保证心无杂念！';
            $content[] = '７，保证老公在我们的家庭生活中的主导地位！';
            $content[] = '我愿意全心全意一生一世';
            $content[] = '都献给我最爱的男神！';
        } elseif ($select1 == '男友保证书') {
            $content[] = '亲爱的'.$name;
            $content[] = '我最爱的'.$name.'，在这里，';
            $content[] = '我谨以赤诚之心，在此立下保证书：';
            $content[] = '1，你永远是对的！';
            $content[] = '2，要关心、爱护、体贴你！';
            $content[] = '3，任何时候都不能再欺骗你！';
            $content[] = '4，不和你的吵架，就算小吵也要让着你！';
            $content[] = '5，绝对不看别的妞，目光全在你一人！';
            $content[] = '6，答应你的事情要认真对待快速完成！';
            $content[] = '7，你不开心，要哄你开心！';
            $content[] = '我愿意全心全意一生一世';
            $content[] = '都献给我最爱的女神！';
        } elseif ($select1 == '女友保证书') {
            $content[] = '亲爱的'.$name;
            $content[] = '我最爱的最最帅气的'.$name.'，在这里，';
            $content[] = '我心甘情愿写下这份保证书：';
            $content[] = '１，保证对你的权威绝对服从！';
            $content[] = '２，端正态度，不在任性！';
            $content[] = '３，学会理解，宽容，以及关爱你！';
            $content[] = '４，出门在外一定要做小鸟依人状！';
            $content[] = '５，要以极大的热忱支持你玩网游！';
            $content[] = '６，学会控制自己的情绪！';
            $content[] = '７，保证对你绝对忠诚，保证心无杂念！';
            $content[] = '我愿意全心全意一生一世';
            $content[] = '都献给我最爱的男神！';
        } elseif ($select1 == '戒烟保证书') {
            $content[] = '亲爱的'.$name;
            $content[] = '我最爱的'.$name.'，在这里，';
            $content[] = '我谨以赤诚之心，在此立下戒烟保证书：';
            $content[] = '１，两餐之间喝6－8杯水，促使排除尼古丁！';
            $content[] = '２，每天洗温水浴，忍不住烟瘾时可立即淋裕！';
            $content[] = '３，在戒烟的5日当中要充分休息！';
            $content[] = '４，饭后到户外散步，做深呼吸15—30分钟！';
            $content[] = '５，不可喝刺激性饮料，改喝牛奶';
            $content[] = '６，避免吃油炸食物、糖果和甜点';
            $content[] = '７，可吃多种维生素B群，能除掉尼古丁';
            $content[] = '我愿意全心全意一生一世';
            $content[] = '都献给我最爱的人！';
        } elseif ($select1 == '好好学习保证书') {
            $content[] = '亲爱的'.$name;
            $content[] = '你是我最爱最尊敬的人，我在这里';
            $content[] = '我谨以赤诚之心，在此立下保证书：';
            $content[] = '１，上课认真听讲，不走神，不做小动作！';
            $content[] = '２，上课不迟到不早退！';
            $content[] = '３，下课认真复习！';
            $content[] = '４，不看小说，每天看一小时课外书！';
            $content[] = '５，不和同学吵闹、打架！';
            $content[] = '６，回家不开电视、不玩电脑、不看手机！';
            $content[] = '７，听从你的命令！';
            $content[] = '我愿意全心全意一生一世';
            $content[] = '都献给我最爱的人！';
        } elseif ($select1 == '好好工作保证书') {
            $content[] = '亲爱的'.$name;
            $content[] = '你是我最敬仰的人，我在这里，';
            $content[] = '我谨以赤诚之心，在此立下保证书：';
            $content[] = '１，熟悉掌握公司的专业知识！';
            $content[] = '２，要做到在岗一分钟，做好六十秒！';
            $content[] = '３，要尊重领导，团结同事！';
            $content[] = '４，上班不迟到不早退，积极加班！';
            $content[] = '５，时刻不忘自己工作和思想上觉悟的提高！';
            $content[] = '６，树立强烈的服务意识！';
            $content[] = '７，听从你的命令！';
            $content[] = '各位领导同事，以上是我的保证书';
            $content[] = '请大家监督我！';
        } else {
            $content[] = '亲爱的'.$name;
            $content[] = '我最爱的老婆大人，至高无上的女王，在这里，';
            $content[] = '我谨以赤诚之心，在此立下保证书：';
            $content[] = '1，老婆大人永远是对的！';
            $content[] = '2，老婆劝诫要认真，下次绝对不再犯！';
            $content[] = '3，老婆逛街全陪伴，付款拍照不说累！';
            $content[] = '4，发了工资全上交，一点不留私房钱！';
            $content[] = '5，绝对不看别的妞，目光全在老婆身！';
            $content[] = '6，岳父岳母要照顾，懂的理解要孝顺！';
            $content[] = '7，如果老婆有错，请参考第一条！';
            $content[] = '我愿意全心全意一生一世';
            $content[] = '都献给我最爱的女神！';
        }

        if (isset($content[0]) && $content[0]) {
            imagettftext($im, 25, 0, 60, 220, $black, $font, $content[0]);
        }

        if (isset($content[1]) && $content[1]) {
            imagettftext($im, 25, 0, 120, 280, $black, $font, $content[1]);
        }

        if (isset($content[2]) && $content[2]) {
            imagettftext($im, 25, 0, 50, 340, $black, $font, $content[2]);
        }

        if (isset($content[3]) && $content[3]) {
            imagettftext($im, 25, 0, 115, 400, $black, $font, $content[3]);
        }

        if (isset($content[4]) && $content[4]) {
            imagettftext($im, 25, 0, 115, 460, $black, $font, $content[4]);
        }

        if (isset($content[5]) && $content[5]) {
            imagettftext($im, 25, 0, 115, 520, $black, $font, $content[5]);
        }

        if (isset($content[6]) && $content[6]) {
            imagettftext($im, 25, 0, 115, 580, $black, $font, $content[6]);
        }

        if (isset($content[7]) && $content[7]) {
            imagettftext($im, 25, 0, 115, 640, $black, $font, $content[7]);
        }

        if (isset($content[8]) && $content[8]) {
            imagettftext($im, 25, 0, 115, 700, $black, $font, $content[8]);
        }

        if (isset($content[9]) && $content[9]) {
            imagettftext($im, 25, 0, 115, 760, $black, $font, $content[9]);
        }

        if (isset($content[10]) && $content[10]) {
            imagettftext($im, 25, 0, 60, 810, $black, $font, $content[10]);
        }

        if (isset($content[11]) && $content[11]) {
            imagettftext($im, 25, 0, 195, 870, $black, $font, $content[11]);
        }

        imagettftext($im, 25, 0, 420, 1020, $black, $font, '保证人：'.$name2);

        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zhuangbjun_163.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 80, 950, 0, 0, 163, 163);

        imagejpeg($im);
        imagedestroy($im);
    }
}