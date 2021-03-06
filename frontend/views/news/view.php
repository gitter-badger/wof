<?php

namespace frontend\widgets\CommentFormWidget;

use frontend\modules\admin\models\News;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;


use frontend\widgets\CommentFormWidget;
use frontend\widgets\CommentList;


/* @var $this View */
/* @var $model News */
/* @var $formModel \frontend\models\CommentForm */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'text:ntext',
        ],
    ]) ?>

    <? // вывод комментариев и формы ?>
    <?= CommentList::widget(['news'=>$model]); ?>

</div>
