<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
           // 'responsible_id',
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'Responsible_id',
                'value' => function($data) {
                    $user = app\models\tables\Users::find()->select(['username'])->where(['id' => $data->responsible_id])->one()->username;
                    return $user; /* по какой-то причине не работает связь с таблицей users - не смог в TaskSearch добавит ->with('users)поэтому пришлось воспользоваться таким способом */
                }
            ],
            'date',
            //'status_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
