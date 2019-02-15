<?php

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


