<?php

namespace andru\dropzone;

use Yii;
use yii\base\Action;
use yii\helpers\Json;
use yii\web\HttpException;
use yii\web\UploadedFile;

class UploadAction extends Action
{
    public $fileName = 'file';
    public $upload = '';
    public $uploadUrl;

    public $afterUploadHandler = null;
    public $afterUploadData = null;

    protected $uploadDir = '';
    protected $uploadSrc = '';

    public function init()
    {
        parent::init();

        $this->uploadDir = Yii::getAlias( $this->uploadUrl . $this->upload . '/');
        $this->uploadSrc = Yii::getAlias($this->uploadUrl . $this->upload . '/');
    }

    public function setUpload($upload)
    {
        $this->upload = $upload;
        $this->uploadDir = Yii::getAlias($this->uploadUrl . $this->upload . '/');
        $this->uploadSrc = Yii::getAlias($this->uploadUrl . $this->upload . '/');
    }

    public function run()
    {
        $file = UploadedFile::getInstanceByName($this->fileName);
        if ($file->hasError) {
            throw new HttpException(500, 'Upload error');
        }

        $fileName = $file->name;
        if (file_exists($this->uploadDir . $fileName)) {
            $fileName = $file->baseName . '-' . uniqid() . '.' . $file->extension;
        }
        $file->saveAs($this->uploadDir . $fileName);
        $upload = \Yii::$app->session['upload'];
        $upload[] = $fileName;
        \Yii::$app->session['upload'] = $upload;
        $response = [
            'filename' => $fileName,
        ];

        if (isset($this->afterUploadHandler)) {
            $data = [
                'data' => $this->afterUploadData,
                'file' => $file,
                'dirName' => $this->uploadDir,
                'src' => $this->uploadSrc,
                'filename' => $fileName,
                'params' => Yii::$app->request->post(),
            ];

            if ($result = call_user_func($this->afterUploadHandler, $data)) {
                $response['afterUpload'] = $result;
            }
        }

        return Json::encode($response);
    }
}
