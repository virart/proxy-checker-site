<?php

namespace app\controllers;

use app\models\ProxyList;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new ProxyList();

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->file_list = UploadedFile::getInstance($model, 'file_list');
                if ($model->file_list) {
                    $model->parseFile();
                }
                $model->parseList();
            }
        }

        return $this->render('index', compact('model'));
    }
}
