<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Book;
?>
<h1>Books</h1>
<a href="/index.php?r=book/add"><?= Html::Button('新增', ['class' => 'btn btn-primary']) ?></a>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'label' => 'id',
            'attribute' => 'id'
        ],
        [
            'label' => '书名',
            'attribute' => 'name'
        ],
        [
            'label' => '作者',
            'attribute' => 'author'
        ],
        [
            'label' => '年代',
            'attribute' => 'time'
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            // 您可以在此处配置其他属性
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    // return Html::Button('编辑', ['class' => 'btn btn-primary']);
                    return '<a href="' . $url .'"><button class="btn btn-primary">编辑</button></a>';
                },
                'delete' => function ($url, $model, $key) {
                    // return Html::Button('删除', ['class' => 'btn btn-primary']);
                    return '<a href="' . $url .'"><button class="btn btn-primary">删除</button></a>';
                }
            ],
            // 'urlCreator' => [
            //     'update' => function ($action, $model, $key, $index) {
            //         return 'book/update&id=' . $model->id;
            //     }
            // ]
        ]
    ],
]); ?>
