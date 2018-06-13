<?php
/**
 * 急诊科医生
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Jzkys
{
    /**
     * 入口页
     */
    public function index()
    {
        echo "<img src='http://api.zb.com//play/gaokaoqian/image?param1=111&param2=所向披靡&param3=心想事成&param4=分数很高&' />";exit;
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/jpeg");
        $name = $req->get('param1', "装B高手");
        $age = $req->get('param2', "30");
        $select1 = $req->get('param3', "患者总觉得自己又瘦了。");
        $im = imagecreatetruecolor(750, 1300);
        $bg = imagecreatefromjpeg(IA_ROOT.'/example/jzkys/main.jpg');
        imagecopy($im,$bg,0,0,0,0,750,1300);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 42, 41, 39);
        $font = IA_ROOT.'/static/fonts/msyh.ttf';
        $time = date('Y-m-d',time());
        imagettftext($im, 12, 0, 468, 532, $black, $font, $time);
        imagettftext($im, 12, 0, 200, 560, $black, $font, $name);
        imagettftext($im, 12, 0, 410, 563, $black, $font, $age);
        if($select1 == "患者总觉得自己又瘦了。"){
             $select2 = "幻觉减肥法不可取，建议买个秤面对现实。";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者最近总是呼吸不畅，觉得胸闷气短。"){
             $select2 = "建议换大一号的内衣。";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者常年处于单身状态。"){
             $select2 = "虽然你单身，但是你胖若两人啊！";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "哇！怎么会有这么完美的一张脸！"){
             $select2 = "无，请多出去走走让这个世界感受到你的美好，好吗？";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者最近老被人搭讪说“土豪我们做朋友吧”"){
             $select2 = "告诉他们你这么有钱，是放弃治疗省下来的。";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者腼腆不爱说话不敢跟人多交流。"){
             $select2 = "需要有人请出去吃喝玩乐，买点礼物转点账，药到病除！";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者有剁手hold不住症状表现。"){
             $select2 = "打开窗户看看楼下花园的土，再买那就是你下个月的粮食！";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者常常出现自己又胖了的错觉。"){
             $select2 = "不存在这种错觉的，请直面体重秤！";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者看见帅哥就下肢发软，走不动路。"){
             $select2 = "请选择一个看起来强壮一点的帅哥，挂在他身上！";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者心脏部分发黑发青，但又不疼不痒。"){
             $select2 = "建议购买质量好一点的秋衣。";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者感觉身心俱疲，每天都有忙不完的事。"){
             $select2 = "好好活下去，明天还会有新的打击。";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "患者最近每晚12点过后都会对着手机一会笑一会哭。"){
             $select2 = "熬夜追剧的正常生理现象，建议身边的人珍惜这样";
             $select3 = " 真性情的小可爱。";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
             imagettftext($im, 12, 0, 223, 835, $black, $font, $select3);
        } 
       if($select1 == "患者经常觉得别人对自己有意思。"){
             $select2 = "有这种想法的，说明单身还不够久。";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        if($select1 == "聚会吃饭时患者们都会一直盯着手机。"){
             $select2 = "下次聚会请去吃小龙虾，这样大家就没有手玩手机了。";
             imagettftext($im, 12, 0, 223, 660, $black, $font, $select1);
             imagettftext($im, 12, 0, 228, 805, $black, $font, $select2);
        } 
        // #二维码
         $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/tmp8.png'));
         $white = imagecolorallocate($im1 , 211 , 210 , 208);
         imagecolortransparent($im1 , $white ) ;
         imagefill($im1 , 0, 0 , $white);
         imagecopy($im, $im1,155, 890, 0, 0, 135, 135);

        imagejpeg($im);
        imagedestroy($im);
    }
}