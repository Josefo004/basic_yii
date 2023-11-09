<?php
//$nombre = 'JOSEFO';
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?//php print_r($model); ?></h1>
</body>
</html> -->
<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<?php $form = ActiveForm::begin(['id' => 'articulos-form']); ?>
    <?= $form->field($model, 'producto')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'cantidad') ?>
    <?= $form->field($model, 'precio') ?>
    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
<?php ActiveForm::end(); ?>

