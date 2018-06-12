<?php
/**
 * 图片管理
 *
 * @author     chenfenghua<843958575@qq.com>
 * @copyright  Copyright 2014-2017
 * @version    2.0
 */
namespace app\api\controller;

use think\facade\Config;
use think\Request;

class Upload
{
    /**
     * 基本上图片保存
     */
    public function base(Request $req)
    {
        $file = request()->file('file');
        if ($file) {
            $dir = IA_ROOT . '/images/';
            $info = $file->rule('uniqid')->move($dir);
            if ($info) {
                $file = $info->getSaveName();
                $file = str_replace('\\', '/', $file);

                $this->imageUpdatesize($dir . $file, 140, 140, 's_');

                $res = ['errCode' => 0, 'errMsg' => 'success', 'fullPath' => Config::get('user_img_host') . $file, 'source' => 's_' . $info->getFilename()];
                return json($res);
            }
        } else {
            $res = ['errCode' => 1, 'errMsg' => 'fail'];
            return json($res);
        }
        exit;


//        $base64_image_content = $req->file('base64img');
//        $width = isset($_GET['w']) && $_GET['w'] ? $_GET['w'] : 120;
//        $height = isset($_GET['h']) && $_GET['h'] ? $_GET['h'] : 120;
//
//        $output_directory = 'uploads/user';
//
//        /* 检查并创建图片存放目录 */
//        if (!file_exists($output_directory)) {
//            mkdir($output_directory, 0777);
//        }
//        $file_name = md5(date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8));
//
//        /* 根据base64编码获取图片类型 */
//        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
//            $image_type = $result[2]; //data:image/jpeg;base64,
//            $output_file = $output_directory . '/' . $file_name . '.' . $image_type;
//        }
//
//        /* 将base64编码转换为图片编码写入文件 */
//        $image_binary = base64_decode(str_replace($result[1], '', $base64_image_content));
//        if (!file_put_contents($output_file, $image_binary)) {
//
//            echo json_encode(array(
//                'code' => 400,
//            ));
//            die;
//        }
//
//        $this->imageUpdatesize($output_file, $width, $height, 's_');
//
//        $filearray = [
//            'code' => 200,
//            'real_name' => Config::get("user_img_host") . '/user/' . $file_name . '.' . $image_type,
//            'file_name' => 's_' . $file_name . '.' . $image_type,
//        ];
//        echo json_encode($filearray);
    }

    /**
     * 基本上图片保存
     */
    public function base2()
    {
        $base64_image_content = $_POST['christmasimage'];
        $width = isset($_GET['w']) && $_GET['w'] ? $_GET['w'] : 120;
        $height = isset($_GET['h']) && $_GET['h'] ? $_GET['h'] : 120;

        $output_directory = IA_ROOT . '/images';

        /* 检查并创建图片存放目录 */
        if (!file_exists($output_directory)) {
            mkdir($output_directory, 0777);
        }
        $file_name = md5(date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8));

        /* 根据base64编码获取图片类型 */
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
            $image_type = $result[2]; //data:image/jpeg;base64,
            $output_file = $output_directory . '/' . $file_name . '.' . $image_type;
        }

        /* 将base64编码转换为图片编码写入文件 */
        $image_binary = base64_decode(str_replace($result[1], '', $base64_image_content));
        if (!file_put_contents($output_file, $image_binary)) {

            echo json_encode(array(
                'code' => 400,
            ));
            die;
        }

        $this->imageUpdatesize($output_file, $width, $height, 's_');

        $filearray = [
            'code' => 200,
            'real_name' => $this->baseUrl . '/images/' . $file_name . '.' . $image_type,
            'file_name' => 's_' . $file_name . '.' . $image_type,
        ];
        echo json_encode(['imageurl' => $filearray['real_name']]);
    }

    /**
     * 文件上传
     *
     * @param $file
     * @param string $model
     * @param array $thumb [['prefix'=>'l', 'width'=>'800', 'height'=>'600']]
     * @return bool|string
     */
    public function file()
    {
        $file = $_FILES['file'];
        $width = isset($_GET['w']) && $_GET['w'] ? $_GET['w'] : 120;
        $height = isset($_GET['h']) && $_GET['h'] ? $_GET['h'] : 120;

        $file_name = md5(date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8)) . self::get_extension($file['name']);
        $model_path = IA_ROOT . '/images_mini/';

        if (!file_exists($model_path)) mkdir($model_path, 0777);
        $targetFile = str_replace('//', '/', $model_path) . $file_name;

        if (!move_uploaded_file($file['tmp_name'], $targetFile)) return false;
        $this->imageUpdatesize($targetFile, $width, $height, 's_');
        $filearray = array(
            'code' => 200,
            'real_name' => $this->baseUrl . '/images_mini/' . $file_name,
            'file_name' => 's_' . $file_name,
        );
        echo json_encode($filearray);
    }

//    /**
//     * 文件上传
//     *
//     * @param $file
//     * @param string $model
//     * @param array $thumb [['prefix'=>'l', 'width'=>'800', 'height'=>'600']]
//     * @return bool|string
//     */
//    public function actionFile()
//    {
//        $file = $_FILES['file'];
//        $width = isset($_GET['w'])&&$_GET['w']?$_GET['w']:120;
//        $height = isset($_GET['h'])&&$_GET['h']?$_GET['h']:120;
//
//        $file_name = md5(date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8)).self::get_extension($file['name']);
//        $model_path = IA_ROOT.'/images_mini/';
//
//        if (!file_exists($model_path)) mkdir($model_path,0777);
//        $targetFile = str_replace('//','/',$model_path).$file_name;
//
//        if(!move_uploaded_file($file['tmp_name'], $targetFile)) return false;
//        $this->imageUpdatesize($targetFile,$width,$height,'s_');
//        $filearray = array(
//            'code'=>200,
//            'real_name'=>$this->baseUrl.'/images_mini/'.$file_name,
//            'file_name'=>'s_'.$file_name,
//        );
//        echo json_encode($filearray, true);
//    }

    /**
     * 远程获取头像
     *
     */
    public function remote()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $width = isset($_GET['w']) && $_GET['w'] ? $_GET['w'] : 120;
        $height = isset($_GET['h']) && $_GET['h'] ? $_GET['h'] : 120;
        #s小图 m中图 b大图
        $type = isset($_GET['type']) && $_GET['type'] ? $_GET['type'] : 's';

        if (trim($url) == '') {
            echo json_encode(array(
                'code' => 400,
            ));
            die;
        };

        //图片后缀
        $ext = 'jpg';

        $output_directory = IA_ROOT . '/avatar';
        $filename = md5($url) . ($type == 'b' ? '_b' : '') . '.' . $ext;
        $output_file = $output_directory . '/' . $filename;

        //判断图片是否存在
        if (file_get_contents(IA_ROOT . '/avatar/' . $filename)) {
            $filearray = array(
                'code' => 200,
                'real_name' => $this->baseUrl . '/avatar/' . $filename,
                'file_name' => 's_' . $filename,
            );
            echo json_encode($filearray);
            die;
        }

        $url_arr = explode('/', $url);
        if ($type == 's') {
            array_pop($url_arr);
            $url_arr[] = '132';
        }
        $url = implode('/', $url_arr);

        shell_exec("curl -o " . $output_file . " " . $url . " 2>&1");
        $this->imageUpdatesize($output_file, $width, $height, 's_');
        $filearray = array(
            'code' => 200,
            'real_name' => $this->baseUrl . '/avatar/' . $filename,
            'file_name' => 's_' . $filename,
        );
        echo json_encode($filearray);
    }

    /**
     * 获取文件名后缀
     *
     * @param $filename
     * @return string
     */
    public function get_extension($filename)
    {
        $x = explode('.', $filename);
        return '.' . end($x);
    }

    /**
     *等比例缩放函数（以保存新图片的方式实现）
     * @param string $picname 被缩放的处理图片源
     * @param int $maxx 缩放后图片的最大宽度
     * @param int $maxy 缩放后图片的最大高度
     * @param string $pre 缩放后图片的前缀名
     * @return $string 返回后的图片名称（） 如a.jpg->s.jpg
     *
     **/
    public function imageUpdatesize($picname, $maxx = 100, $maxy = 100, $pre = "s_")
    {
        $info = getimageSize($picname);//获取图片的基本信息
        $w = $info[0];//获取宽度
        $h = $info[1];//获取高度
        //获取图片的类型并为此创建对应图片资源
        switch ($info[2]) {
            case 1://gif
                $im = imagecreatefromgif($picname);
                break;
            case 2://jpg
                $im = imagecreatefromjpeg($picname);
                break;
            case 3://png
                $im = imagecreatefrompng($picname);
                break;
            default:
                die("图像类型错误");
        }
        //计算缩放比例
        if (($maxx / $w) > ($maxy / $h)) {
            $b = $maxy / $h;
        } else {
            $b = $maxx / $w;
        }
        //计算出缩放后的尺寸
        $nw = floor($w * $b);
        $nh = floor($h * $b);
        //创建一个新的图像源（目标图像）
        $nim = imagecreatetruecolor($nw, $nh);
        //执行等比缩放
        imagecopyresampled($nim, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);
        //输出图像（根据源图像的类型，输出为对应的类型）
        $picinfo = pathinfo($picname);//解析源图像的名字和路径信息
        $newpicname = $picinfo["dirname"] . "/" . $pre . $picinfo["basename"];
        switch ($info[2]) {
            case 1:
                imagegif($nim, $newpicname);
                break;
            case 2:
                imagejpeg($nim, $newpicname);
                break;
            case 3:
                imagepng($nim, $newpicname);
                break;

        }
        //释放图片资源
        imagedestroy($im);
        imagedestroy($nim);
        //返回结果
        return $newpicname;
    }
}