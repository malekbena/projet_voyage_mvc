<?php
class Config{

    protected function connexion(){
        return $dbh = new PDO('mysql:dbname=pootour;host=localhost;charset=UTF8','root','root');
    }

    public function error($message){
        return ['message' => $message, 'color' => 'danger'];
    }

    public function success($message){
        return ['message' => $message, 'color' => 'success'];
    }

    public function upload($data, $inputName){     
        $uploaddir = 'public/upload/';
        $extension  = pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION);
        $rename = md5(uniqid()) .'.'. $extension;
        $res = ['execute' => false, 'imgName' => $rename];
        if(move_uploaded_file($data[$inputName]['tmp_name'], $uploaddir.$rename)){
            $res['execute'] = true;
        }
        return $res;
    }
    
     public function removeImg($img){     
        $uploaddir = 'public/upload/';
        $thumbNaildir = $uploaddir . 'thumbnail/';
         unlink($uploaddir . $img);
         unlink($thumbNaildir . $img);

  
    }
    
    public function image_resize($src, $dst,$type, $width, $height, $crop = 0)
        {
        $res = ['execute' => true, 'errorMsg' => ""]; 
        if (!list($w, $h) = getimagesize($src)){
              $res = ['execute' => false, 'errorMsg' => "Format non supporté"]; 
        }else{
          

        if ($type == 'jpeg') $type = 'jpg';
            switch ($type)
            {
                case 'bmp':
                $img = imagecreatefromwbmp($src);
                break;
                case 'gif':
                $img = imagecreatefromgif($src);
                break;
                case 'jpg':
                $img = imagecreatefromjpeg($src);
                break;
                case 'png':
                $img = imagecreatefrompng($src);
                break;
                default :
                $res = ['execute' => false, 'errorMsg' => "Format non supporté"];
            }

        /** resize **/
        if ($crop)
        {
            if ($w < $width || $h < $height) 
                $res = ['execute' => false, 'errorMsg' => "Image trop petite"];
                $ratio = max($width / $w, $height / $h);
                $h = $height / $ratio;
                $x = ($w - $width / $ratio) / 2;
                $w = $width / $ratio;
            }
            else
            {
            if ($w < $width && $h < $height) 
                $res = ['execute' => false, 'errorMsg' => "Image trop petite"];
                $ratio = min($width / $w, $height / $h);
                $width = $w * $ratio;
                $height = $h * $ratio;
                $x = 0;
            }

        $new = imagecreatetruecolor($width, $height);

        /** preserve transparency **/
        if ($type == 'gif' || $type == 'png')
        {
        imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
        imagealphablending($new, false);
        imagesavealpha($new, true);
        }

        imagecopyresampled($new, $img, 0, 0, 0, 0, $width, $height, $w, $h);

        switch ($type)
        {
            case 'bmp':
            imagewbmp($new, $dst);
            break;
            case 'gif':
            imagegif($new, $dst);
            break;
            case 'jpg':
            imagejpeg($new, $dst);
            break;
            case 'png':
            imagepng($new, $dst);
            break;
        }
        }
            return $res;
        }

}