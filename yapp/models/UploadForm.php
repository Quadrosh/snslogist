<?php

namespace app\models;

use app\modules\admin\controllers\ImagefilesController;
use yii\base\Action;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use app\models\Imagefiles;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $toModelId;
    public $toModelProperty;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, svg'],
        ];
    }

    public function upload($add1=false,$add2=false)
    {
        $imagefile = new Imagefiles();
        $imagefile->addNew($this->imageFile->baseName .'.' . $this->imageFile->extension);

        if ($this->validate() && $imagefile->addNew($this->imageFile->baseName .'.' . $this->imageFile->extension)) {
            if ($this->imageFile->saveAs('img/' . $add1 . $this->imageFile->baseName . $add2 .'.' . $this->imageFile->extension)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function change($filename)
    {
        if ($this->validate()) {
            if ($this->imageFile->saveAs(Yii::$app->basePath . '/web/img/' . $filename)) {
                return true;
            } else {
                return false;
            }
        }
    }





}