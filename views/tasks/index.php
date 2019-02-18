<?php

/* var_dump($_GET); exit; */

echo $this->render('_search', ['model' => $searchModel]); 

echo yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function($model) {
        return \app\widgets\TaskPreview::widget(['model' => $model]);
    },
    'summary' => false,
    'options' => [
        'class' => 'preview-container'
    ]
]);


