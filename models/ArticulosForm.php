<?php

namespace app\models;

use yii;
use yii\base\Model;

class ArticulosForm extends Model {
    public $producto;
    public $cantidad;
    public $precio;

    public function rules() {
        return [
            [['producto', 'precio', 'cantidad'], 'required'],
            [['cantidad', 'precio'], 'number']
        ];
    }

    public function attributeLabels() {
        return [
            'producto' => 'Nombre del Producto',
            'cantidad' => 'Cantidad del Producto',
            'precio' => 'Precio del Producto',
        ];
    }
}
