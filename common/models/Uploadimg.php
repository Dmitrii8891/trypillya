<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "coordinates".
 *
 * @property integer $id
 * @property string $image
 * @property string $tile
 * @property string $description
 * @property integer $x
 * @property integer $y
 * @property integer $category_map
 * @property integer $category_we
 * @property integer $portfolio_id
 */
class Uploadimg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public $file12;
    public $file2;
    public $file1;
    public $file123;
    public $file21;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file2'],  'image',
                'minWidth' => 1200, 'maxWidth' => 1920,
                'minHeight' => 300, 'maxHeight' =>1400,
                'maxFiles' => 3
                ],
            [['file12'],  'image',
                'minWidth' => 1200, 'maxWidth' => 1920,
                'minHeight' => 300, 'maxHeight' =>1400,
                'maxFiles' => 3
                ],
            [['file'],  'image',
                'minWidth' => 1200, 'maxWidth' => 1920,
                'minHeight' => 300, 'maxHeight' =>1400,
                'maxFiles' => 3
                ],
            [['file21'],  'image',
                'minWidth' => 1200, 'maxWidth' => 1920,
                'minHeight' => 300, 'maxHeight' =>1400,
                'maxFiles' => 3],
            [['file123'],  'image',
                'minWidth' => 1200, 'maxWidth' => 1920,
                'minHeight' => 300, 'maxHeight' =>1400,
                'maxFiles' => 3
                ],
            [['file1'],  'image',
                'minWidth' => 1200, 'maxWidth' => 1920,
                'minHeight' => 300, 'maxHeight' =>1400,
                'maxFiles' => 3
                ],
            
        ];
    }
    
//    public function getPortfolio()
//    {
//        return $this->hasOne(Pages::className(), ['coordinate_id' => 'id']);
//    }

    public function getPath()
    {
        return Yii::getAlias('@frontend/web/images/');
    }
    public function getPaths()
    {
        return Yii::getAlias('@frontend/web/ImageResaze/');
    }
    
    public function getResaiz($source, $dest)
    {
                $nw = 640;    // Ширина миниатюр
                $nh = 480;    // Высота миниатюр
                
                
                $stype = explode(".", $source);
                $stype = $stype[count($stype)-1];
                //var_dump($source);die();
                $size = getimagesize($source);
                $w = $size[0];    // Ширина изображения
                $h = $size[1];    // Высота изображения
                
                switch($stype) {
                case 'gif':
                $simg = imagecreatefromgif($source);
                break;
                case 'jpg':
                $simg = imagecreatefromjpeg($source);
                break;
                case 'png':
                $simg = imagecreatefrompng($source);
                break;
            }
            
            
            $dimg = imagecreatetruecolor($nw, $nh);
            $wm = $w/$nw;
            $hm = $h/$nh;
            $h_height = $nh/2;
            $w_height = $nw/2;

            if($w > $h) {
                $adjusted_width = $w / $hm;
                $half_width = $adjusted_width / 2;
                $int_width = $half_width - $w_height;
                imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
            } elseif(($w < $h) || ($w == $h)) {     
                            $adjusted_height = $h / $wm;
                            $half_height = $adjusted_height / 2;
                            $int_height = $half_height - $h_height;
                            imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
                     } else {     
                            imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h); 
                     }     
            imagejpeg($dimg,$dest,100);

                
            }
}
