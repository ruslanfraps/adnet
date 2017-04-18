<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $image_file;

    public function rules()
    {
        return [
            [['image_file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'zip'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->image_file->saveAs('uploads/' . $this->image_file->baseName . '.' . $this->image_file->extension);
            return true;
        } else {
            return false;
        }
    }
}
