<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Secretaria */

$this->title = 'Update Secretaria: ' . $model->idUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Secretarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUsuario, 'url' => ['view', 'id' => $model->idUsuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="secretaria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
