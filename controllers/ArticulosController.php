<?php

namespace app\controllers;
use Yii;
// use yii\filters\AccessController;
use yii\web\Controller;

class ArticulosController extends Controller {
    
    public function actionIndex(){
        $model = new \app\models\ArticulosForm();
        
        if ($model->load(Yii::$app->request->post())) {
            return Yii::$app->getResponse()->redirect('creador');
        }

        //return $this->render('index', $data);
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreador(){
        return $this->render('registrado');
    }
}
