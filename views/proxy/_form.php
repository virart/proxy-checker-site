<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proxy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proxy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip_v4')->textInput() ?>

    <?= $form->field($model, 'ip_v6')->textInput() ?>

    <?= $form->field($model, 'port')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'real_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latency')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
