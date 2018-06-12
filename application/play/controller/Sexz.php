<?php
/**
 * 十二星座
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\play\controller;
use think\Request;
class Sexz
{
    /**
     * 入口页
     */
    public function index()
    {
        $this->data['title'] = '十二星座';

        $this->render('index', $this->data);
    }

    /**
     * 生成图
     */
    public function image(Request $req)
    {
        header("content-type:image/png");
        $name = $req->get('param2', "装B高手");
        $avatar = $req->get('avatar', "");
        $name1 = $req->get('param3', "0508");
        $type = 2;
        $arr = $this->ch2arr($name1);
        $mm = $arr[0].$arr[1];
        $dd = $arr[2].$arr[3];
        if($mm == '08'|| $mm == '09'){
            $mm = $arr[1];
        }
        if($dd == '08'|| $dd == '09'){
            $dd = $arr[3];
        }
        $xz = $this->yige_constellation($mm,$dd);

        switch ($xz)
        {
        case "白羊座":
          $tp = '/example/sexz/baiyang.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/byz.png');
          break;  
        case "金牛座":
          $tp = '/example/sexz/jinniu.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/jnz.png');
          break; 
          case "双子座":
          $tp = '/example/sexz/shuangzi.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/szz.png');
          break; 
          case "巨蟹座":
          $tp = '/example/sexz/juxie.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/jxz.png');
          break; 
          case "狮子座":
          $tp = '/example/sexz/shizi.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/shiziz.png');
          break; 
          case "处女座":
          $tp = '/example/sexz/chunv.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/cnz.png');
          break; 
          case "天秤座":
          $tp = '/example/sexz/tiancheng.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/tcz.png');
          break;
          case "天蝎座":
          $tp = '/example/sexz/tianxie.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/txz.png');
          break; 
          case "射手座":
          $tp = '/example/sexz/sheshou.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/ssz.png');
          break; 
           case "摩羯座":
          $tp = '/example/sexz/mojie.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/mjz.png');
          break; 
          case "水瓶座":
          $tp = '/example/sexz/shuiping.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/spz.png');
          break;  
          default:
          $tp = '/example/sexz/shuangyu.jpg';
          $img_l_t = imagecreatefrompng(IA_ROOT.'/example/sexz/syz.png');
        }
     
        $im = imagecreatetruecolor(700, 844);
        $bg = imagecreatefromjpeg(IA_ROOT . $tp);
        imagecopy($im, $bg, 0, 0, 0, 0, 700, 844);
        imagedestroy($bg);
        $black = imagecolorallocate($im, 0, 0, 0);
        $font = IA_ROOT . '/static/fonts/msyh.ttf';
      
        if ($type == 1) {
            $qq = IA_ROOT.'/avatar/'.$avatar;
        } else {
            $qq = IA_ROOT.'/images/'.$avatar;
        }
        $this->getyuan($qq,$avatar);
        $tt = IA_ROOT.'/images/yuan'.$avatar;
        $change = $this->change($tt);
        //头像
        imagecopymerge($im, $change, 228, 222, 0, 0, 235, 235, 100);
        $white = imagecolorallocate($img_l_t , 228 , 224 , 223);
        imagecolortransparent($img_l_t , $white ) ;
        imagealphablending($img_l_t , false);
        imagefill($img_l_t , 0 , 0 , $white);
        imagesavealpha($img_l_t , true);
        imagecopy($im, $img_l_t, 0, 0, 0, 0, 700, 844);
        //姓名
        imagettftext($im, 33, 0, 230, 775, $black, $font, $name);

        #二维码
        $im1 = imagecreatefromstring(file_get_contents(IA_ROOT.'/static/qrcode/zbgs008_160_bai.png'));
        $white = imagecolorallocate($im1 , 223 , 223 , 223);
        imagecolortransparent($im1 , $white ) ;
        imagefill($im1 , 100, 320 , $white);
        imagecopy($im, $im1, 510, 690, 0, 0, 160, 160);

        imagejpeg($im);
        imagedestroy($im);
    }

    public function getyuan($imgpath,$avatar)
    {

        /**
         *  blog:http://www.zhaokeli.com
         * 处理成圆图片,如果图片不是正方形就取最小边的圆半径,从左边开始剪切成圆形
         * @param  string $imgpath [description]
         * @return [type]          [description]
         */

//        $ext = pathinfo($imgpath);
        $src_img = null;
//        switch ($ext['extension']) {
//            case 'jpg':
//                $src_img = imagecreatefromjpeg($imgpath);
//                break;
//            case 'png':
//                $src_img = imagecreatefrompng($imgpath);
//                break;
//        }
        $src_img = imagecreatefromjpeg($imgpath);
        $wh = getimagesize($imgpath);
        $w = $wh[0];
        $h = $wh[1];
        $w = min($w, $h);
        $h = $w;
        $img = imagecreatetruecolor($w, $h);
        //这一句一定要有
        imagesavealpha($img, true);
        //拾取一个完全透明的颜色,最后一个参数127为全透明
        $bg = imagecolorallocatealpha($img, 255, 255, 255, 127);
        imagefill($img, 0, 0, $bg);
        $r = $w / 2; //圆半径
        $y_x = $r; //圆心X坐标
        $y_y = $r; //圆心Y坐标
        for ($x = 0; $x < $w; $x++) {
            for ($y = 0; $y < $h; $y++) {
                $rgbColor = imagecolorat($src_img, $x, $y);
                if (((($x - $r) * ($x - $r) + ($y - $r) * ($y - $r)) < ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
            }
        }
        imagejpeg($img,IA_ROOT.'/images/yuan'.$avatar);
       // return $img;
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
        $max=235;

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

    public function yige_constellation($month, $day) {
 // 检查参数有效性
 if ($month < 1 || $month > 12 || $day < 1 || $day > 31) return false;

 // 星座名称以及开始日期
 $constellations = array(
  array( "20" => "水瓶座"),
  array( "19" => "双鱼座"),
  array( "21" => "白羊座"),
  array( "20" => "金牛座"),
  array( "21" => "双子座"),
  array( "22" => "巨蟹座"),
  array( "23" => "狮子座"),
  array( "23" => "处女座"),
  array( "23" => "天秤座"),
  array( "24" => "天蝎座"),
  array( "22" => "射手座"),
  array( "22" => "摩羯座")
 );

 list($constellation_start, $constellation_name) = each($constellations[(int)$month-1]);

 if ($day < $constellation_start) list($constellation_start, $constellation_name) = each($constellations[($month -2 < 0) ? $month = 11: $month -= 2]);

 return $constellation_name;
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

