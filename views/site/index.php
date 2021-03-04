<?php

/* @var $this yii\web\View */
/* @var $model ProxyList*/

use app\models\ProxyList;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h3>Proxy checker</h3>
    </div>

    <div class="body-content">
        <div class="proxy-list-form">

            <?php $form = ActiveForm::begin(['id' => 'proxy-list', 'method' => 'post']); ?>

            <?= $form->field($model, 'text_list')->textarea() ?>

            <?= $form->field($model, 'file_list')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
