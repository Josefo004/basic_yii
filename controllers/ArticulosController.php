<?php

namespace app\controllers;
use Yii;
// use yii\filters\AccessController;
use yii\web\Controller;

class ArticulosController extends Controller {
    
    public function actionIndex(){
        // return 'Hi from Controller';
        // $nombre = 'JOSEFO00000000';
        // $pais = 'BOLIVIA';
        // $data = ['nombre'=>$nombre, 'pais'=>$pais];

        $model = new \app\models\ArticulosForm();

        //return $this->render('index', $data);
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreador(){
        return 'Hola desde mi creador';
    }
}
