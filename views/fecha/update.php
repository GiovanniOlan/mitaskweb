<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fecha */

$this->title = 'Update Fecha: ' . $model->fec_id;
$this->params['breadcrumbs'][] = ['label' => 'Fechas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fec_id, 'url' => ['view', 'fec_id' => $model->fec_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fecha-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
