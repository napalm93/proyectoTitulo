<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Solmovilizacion */

$this->title = 'Registrar solicitud de Movilización';
$this->params['breadcrumbs'][] = ['label' => 'Solicitud de movilización', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solmovilizacion-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
