<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Secretaria */

$this->title = 'Create Secretaria';
$this->params['breadcrumbs'][] = ['label' => 'Secretarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secretaria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
