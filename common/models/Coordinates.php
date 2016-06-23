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
class Coordinates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'coordinates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_map', 'category_we', 'portfolio_id', 'id'], 'integer'],
            [['country', 'city'], 'string', 'max' => 255],
            [['country', 'city'], 'required'],
            [['x', 'y'], 'double'],
            [['file'], 'image', 'extensions' => 'png, jpg, gif',
                'minWidth' => 1000, 'maxWidth' => 20000,
                'minHeight' => 400, 'maxHeight' =>8000,
                'maxFiles' => 5
             ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'x' => 'X координата',
            'y' => 'Y координата',
            'category_map' => 'Категория постройки',
            'category_we' => 'Кто построил',
            'country' => 'Страна',
            'city' => 'Город',
        ];
    }

    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['coordinate_id' => 'id']);
    }
    
//    public function getPortfolio()
//    {
//        return $this->hasOne(Pages::className(), ['coordinate_id' => 'id']);
//    }

    public function getPath()
    {
        return Yii::getAlias('@frontend/web/images/');
    }

    /**
     * @return string URL of the image
     */
    public function getUrl()
    {
        return Yii::getAlias('@frontendWebroot/images/social/');
    }
    
    public function getCoutry()
    {
        $lang = 0; // russian
            $headerOptions = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Accept-language: en\r\n".
                    "Cookie: remixlang=$lang\r\n"
                )
            );
        $methodUrl = 'http://api.vk.com/method/database.getCountries?v=5.5&need_all=1&count=500';
        $streamContext = stream_context_create($headerOptions);
        try{
        	$json = file_get_contents($methodUrl, false, $streamContext);
        } catch(yii\base\ErrorException  $e) {
        	$arrayName[0] = array('id' => 0,
        						'title' => 'test' );
        	return $arrayName;
        }
        $arr = json_decode($json, true);
        //echo 'Total countries count: ' . $arr['response']['count'] . ' loaded: ' . count($arr['response']['items']);
        $vk = $arr['response']['items'];
        
        return $vk;
    }
    
    public function getCity($id)
    {
        $countryId = $id; // Russia
            $lang = 0; // russian
            $headerOptions = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Accept-language: en\r\n".
                    "Cookie: remixlang=$lang\r\n"
                )
            );
            $methodUrl = 'http://api.vk.com/method/database.getCities?v=5.5&need_all=1&offset=0&count=800&country_id='.$countryId;
            $streamContext = stream_context_create($headerOptions);
            $json = file_get_contents($methodUrl, false, $streamContext);
            $arr = json_decode($json, true);
            //echo 'Total regions count: ' . $arr['response']['count'] . ' loaded: ' . count($arr['response']['items']);
        $city = $arr['response']['items']; 
        
        return $city;
    }

    public function getCountry_name($id)
    {
        $countryId = $id; // Russia
            $lang = 0; // russian
            $headerOptions = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Accept-language: en\r\n".
                    "Cookie: remixlang=$lang\r\n"
                )
            );

            $methodUrl = 'http://api.vk.com/method/database.getCountriesById?v=5.37&offset=0&count=1000&country_ids='.$countryId;
	        $streamContext = stream_context_create($headerOptions);

            try{
	            $json = file_get_contents($methodUrl, false, $streamContext);
            } catch (yii\base\ErrorException  $e) {
                   // CustomVarDamp::dump($e->getMessage());
                   echo 'На данный момент страна не обнаружена';
            }

            try {
		    $arr = json_decode($json, true);
                
            } catch(yii\base\ErrorException  $e) {
                echo 'На данный момент город';
            }
            try {
                $city_name = $arr['response'];
            } catch(yii\base\ErrorException  $e) {
                echo 'Kiev';
            }
	        
            try{
                
	        return $city_name[0]['title'];
            }catch (yii\base\ErrorException  $e) {
                 echo 'На данный момент город';
            }
    }

    public function getCityname($id)
    {
        $countryId = $id; // Russia
            $lang = 0; // russian
            $headerOptions = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Accept-language: en\r\n".
                    "Cookie: remixlang=$lang\r\n"
                )
            );
            $methodUrl = 'http://api.vk.com/method/database.getCitiesById?v=5.5&need_all=1&offset=0&count=800&city_ids='.$countryId;
            $streamContext = stream_context_create($headerOptions);
            $json = file_get_contents($methodUrl, false, $streamContext);
            $arr = json_decode($json, true);
            //echo 'Total regions count: ' . $arr['response']['count'] . ' loaded: ' . count($arr['response']['items']);
            $city = $arr['response']['items']; 
        
        return $city;
    }

    public function getCount_country($id)
    {
        return self::find()
            ->joinWith('portfolio')
            ->where(['country' => $id, 'portfolio.status' => 'publichen'])
            ->count();
    }
}
