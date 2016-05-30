<?php

namespace andru\dropzone;

use Yii;
use yii\base\Action;
use backend\models\Images;
use yii\helpers\StringHelper;


class RemoveAction extends Action
{
    public $uploadUrl;

    public function run()
    {
   $postData=Yii::$app->request->post('filename');

        $model = Images::find()->where('name=:name', [':name' => $postData])->one();
        if ($model) {
            $model->delete();
        }
        if (\Yii::$app->session['upload'] !== null) {
            $array = \Yii::$app->session['upload'];
            $key = array_search(StringHelper::basename(Yii::$app->request->post('filename')), \Yii::$app->session['upload']);
            array_splice($array, $key);
            unset(\Yii::$app->session['upload']);
            \Yii::$app->session['upload'] = $array;
        }
        return (int)unlink(Yii::getAlias($this->uploadUrl) . $postData);
    }
}
