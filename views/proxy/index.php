<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProxySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proxies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proxy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Proxy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ip_v4',
            'ip_v6',
            'port',
            'updated_at',
            //'real_ip',
            //'latency',
            //'status',
            //'type',
            //'country_code',
            //'city_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
