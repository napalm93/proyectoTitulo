<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Solmantencion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solmantencion-form">
<?php $form = ActiveForm::begin(); ?>
<table border="1" cellspacing="0" cellpadding="4" width="100%" style="border-collapse:collapse;">
    <tbody>
        <tr>
            <td width="111" rowspan="2" align="center">
                <p align="left">
                    <p>
                    <img src="../Escudo_Universidad_del_Bío-Bío.png" width="90">
                    </p>
                </p>
            </td>
            <td width="331" rowspan="2" align="center">
                <p align="center">
                    UNIVERSIDAD DEL BÍO-BÍO
                    <p>
                    </p>
                </p>
                <p align="center"><font size="3">
                    VICERRECTORIA DE ASUNTOS ECONÓMICOS
                    </font><p>
                    </p>
                </p>
                <p align="center"><font size="3">
                    DIRECCIÓN DE ADMINISTRACIÓN Y PRESUPUESTO
                    </font><p>
                    </p>
                </p>
            </td>
            <td width="157" colspan="3">
                <p align="center">
                    <?= $form->field($model, 'numero')->textInput(['style'=>'width:200px'])?>
                    <p>
                    </p>
                </p>
            </td>
        </tr>
        <tr>
            <td width="157" colspan="3" align="center">
                <p align="center">
                    Fecha de Solicitud
                    <p>
                    </p>
                </p>
            </td>
        </tr>
        <tr>
            <td width="442" colspan="2" rowspan="2" align="center">
                <p align="left"><h3>
                    <strong>FORMULARIO SOLICITUD DE MANTENCIÓN</strong>
                    <strong>
                        </h3><p>
                        </p>
                    </strong>
                </p>
            </td>
            <td width="57" align="center">
                <p align="center">
                    Día
                    <p>
                    </p>
                </p>
            </td>
            <td width="57" align="center">
                <p align="center">
                    Mes
                    <p>
                    </p>
                </p>
            </td>
            <td width="57" align="center">
                <p align="center">
                    Año
                    <p>
                    </p>
                </p>
            </td>
        </tr>
        <tr>
            <td width="57" align="center">
                <p align="center">
                    <?php
                        $dia = date('d', strtotime($model->fechaSolicitud));
                        echo $dia;
                    ?>
                    <p>
                    </p>
                </p>
            </td>
            <td width="57" align="center">
                <p align="center">
                    <?php
                        $mes = date('m', strtotime($model->fechaSolicitud));
                        echo $mes;
                    ?>
                    <p>
                    </p>
                </p>
            </td>
            <td width="57" align="center">
                <p align="center">
                    <?php
                        $anio = date('Y', strtotime($model->fechaSolicitud));
                        echo $anio;
                    ?>
                    <u>
                        <p>
                        </p>
                    </u>
                </p>
            </td>
        </tr>
    </tbody>
</table><br>

<div align="center">
    <table border="1" cellspacing="0" cellpadding="4" width="100%" style="border-collapse:collapse;font-family:Arial,Helvetica;font-size:10pt;">
        <tbody>
            <tr>
                <td width="50%" colspan="5" valign="top">
                    <p>
                        <?= $form->field($model, 'reparticion')->textInput(['maxlength' => true, 'style'=>'width:80%']) ?>
                        <p>
                        </p>
                    </p>
                </td>
                <td width="49%" colspan="6" valign="top">
                    <p>
                        
                        <p>
                        </p>
                    </p>
                    <p>
                        <?= $form->field($model, 'centroCosto')->textInput(['maxlength' => true, 'style'=>'width:80%']) ?>
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr height="35">
                <td width="30%" colspan="2" height="35" valign="top">
                    <p>

                        <p>
                        </p>
                    </p>
                    <p>
                        <?= $form->field($model, 'nomSolicitante')->textInput(['maxlength' => true, 'style'=>'width:80%']) ?>
                        <p>
                        </p>
                    </p>
                </td>
                <td width="40%" colspan="6" height="35" valign="top">
                    <p>
                        <p>
                        </p>
                    </p>
                    <p>
                        <?= $form->field($model, 'ubicacionServicio')->textInput(['maxlength' => true, 'style'=>'width:80%'], ['value' => '']) ?>
                        <p>
                        </p>
                    </p>
                </td>
                <td width="30%" colspan="3" height="35" valign="top">
                    <p>
                        <p>
                        </p>
                    </p>
                    <p>
                        <?= $form->field($model, 'anexo')->textInput(['maxlength' => true, 'style'=>'width:80%'], ['value' => '']) ?>
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="11" valign="top" align="center">
                    <p align="center">
                        <strong>
                            Servicio(s) solicitado(s) (señale con x)
                            <p>
                            </p>
                        </strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="11" valign="top">
                    <p align="left">
                        
                            <p>
                            </p>

                    </p>
                    <p align="center">
                        <?= $form->field($model, 'tipoServicio')->radioList(['electrico'=>'Eléctrico', 'reparacion'=>'Reparación', 'equipo'=>'Equipo', 'cerradura'=>'Cerradura', 'alcantarillado'=>'Alcantarillado', 'pintura'=>'Pintura', 'red_de_agua'=>'Red de Agua', 'Muebles', 'urgencia'=>'Urgencia']) ?>
                        <p>
                        </p>
                    </p>
                    <p align="center">
                        <p>
                        </p>
                    </p>
                    <p align="center">
                        <p>
                        </p>
                    </p>
                    <p align="center">
                        <p>
                        </p>
                    </p>
                    <p align="center">
                        <p>
                        </p>
                    </p>
                    <p align="center">
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <br/>
                        <?= $form->field($model, 'descripcion')->textarea(['rows' => 4]) ?>
                        <p>
                        </p>
                    </p>
                    <p align="center">
                        <strong>
                            <p>
                            </p>
                        </strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="50%" colspan="5" valign="top">
                    <p align="left">
                        <p>
                        </p>
                    </p>
                    <p align="center">
                        <?= $form->field($model, 'prioridad')->radioList(['Alta' => 'Alta', 'Media' => 'Media', 'Baja' => 'Baja'], ['prompt'=>'Seleccionar Prioridad']) ?>
                        <p>
                        </p>
                    </p>
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td width="49%" colspan="6" valign="top">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                    <p align="center">
                        <?= $form->field($model, 'tipoMantencion')->radioList(['preventiva'=>'Preventiva', 'correctiva' => 'Correctiva']) ?>
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
    </tbody>
</table>

    

    

    <!--<?= $form->field($model, 'fechaSolicitud')->HiddenInput()->label(false) ?>-->

    

    

    

    

    

    

    

    



    <?= $form->field($model, 'idPeticion')->HiddenInput()->label(false) ?>

    <div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
