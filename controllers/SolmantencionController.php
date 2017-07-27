<?php

namespace app\controllers;

use Yii;
use app\models\Solmantencion;
use app\models\SolmantencionSearch;
use app\models\Departamento;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

/**
 * SolmantencionController implements the CRUD actions for Solmantencion model.
 */
class SolmantencionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Solmantencion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SolmantencionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Solmantencion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionViewsolicitud($id)
    {
            $solicitud = Solmantencion::find()
                        ->where(['idPeticion' => $id])
                        ->one()->idSolicitudMan;

            return $this->render('view', [
            'model' => $this->findModel($solicitud),
        ]);

    }

    public function actionGenerapdf($id)
    {
        $model = $this->findModel($id);

        //obtener variables de la solicitud de mantencion
        $fecha = $model->fechaSolicitud;
        $numero = $model->numero;
        $departamento = Departamento::find()->where(['idDepartamento' => yii::$app->user->identity->idDepartamento])
            ->one()->siglaDepartamento;
        $CCosto = Departamento::find()->where(['idDepartamento' => yii::$app->user->identity->idDepartamento])
            ->one()->centroCosto; 
        $solicitado = $model->nomSolicitante;
        $prioridad = $model->prioridad;
        $tMantencion = $model->tipoMantencion;
        $tServicio = $model->tipoServicio;

        //Definir prioridad
        $esAlta = function($pr) 
        {
            if($pr == "Alta")
            {

                return ("<u>X</u>");
            }else{
                return ("__");
            }
        };
        $esBaja = function($pr) 
        {
            if($pr == "Baja")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esMedia = function($pr) 
        {
            if($pr == "Media")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };

        //para el tipo de mantencion
        $esCorrectiva = function($tp)
        {
            if($tp == "correctiva")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esPreventiva = function($tp)
        {
            if($tp == "preventiva")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };

        //definir tipo de servicio
        $esElectrico = function($ts)
        {
            if($ts == "electrico")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esCerradura = function($ts)
        {
            if($ts == "cerradura")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esReddeagua = function($ts)
        {
            if($ts == "red de agua")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esReparacion = function($ts)
        {
            if($ts == "reparacion")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esAlcantarillado = function($ts)
        {
            if($ts == "alcantarillado")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esMuebles = function($ts)
        {
            if($ts == "muebles")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esEquipo = function($ts)
        {
            if($ts == "equipo")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esPintura = function($ts)
        {
            if($ts == "pintura")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };
        $esUrgencia = function($ts)
        {
            if($ts == "urgencia")
            {
                return ('<u>X</u>');
            }else{
                return ('__');
            }
        };

        $dia = date('d', strtotime($fecha));
        $mes = date('m', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));

        $mpdf = new mPDF;
        $mpdf->WriteHTML('

<table border="1" cellspacing="0" cellpadding="4" width="100%" style="border-collapse:collapse;font-family:Arial,Helvetica;font-size:10pt;table-layout:fixed;">
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
            <td width="157" colspan="3" align="center">
                <p align="left">
                    <strong>N° '.$numero.'</strong>
                    <p>
                    </p>
                </p>
            </td>
        </tr>
        <tr>
            <td width="157" colspan="3" align="center">
                <p align="left">
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
                <p align="left">
                    Día
                    <p>
                    </p>
                </p>
            </td>
            <td width="57" align="center">
                <p align="left">
                    Mes
                    <p>
                    </p>
                </p>
            </td>
            <td width="57" align="center">
                <p align="left">
                    Año
                    <p>
                    </p>
                </p>
            </td>
        </tr>
        <tr>
            <td width="57" align="center">
                <p align="left">
                    '.$dia.'
                    <p>
                    </p>
                </p>
            </td>
            <td width="57" align="center">
                <p align="left">
                    '.$mes.'
                    <p>
                    </p>
                </p>
            </td>
            <td width="57" align="center">
                <p align="left">
                    '.$anio.'
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
                        Repartición: '.$departamento.'
                        <p>
                        </p>
                    </p>
                </td>
                <td width="49%" colspan="6" valign="top">
                    <p>
                        Centro de Costo:
                        <p>
                        </p>
                    </p>
                    <p>
                        '.$CCosto.'
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr height="35">
                <td width="%" colspan="2" height="35" valign="top">
                    <p>
                        Solicitado por:
                        <p>
                        </p>
                    </p>
                    <p>
                        '.$solicitado.'
                        <p>
                        </p>
                    </p>
                </td>
                <td width="%" colspan="6" height="35" valign="top">
                    <p>
                        Ubicación del Servicio:
                        <p>
                        </p>
                    </p>
                    <p>
                        '.$model->ubicacionServicio.'
                        <p>
                        </p>
                    </p>
                </td>
                <td width="%" colspan="3" height="35" valign="top">
                    <p>
                        Anexo:
                        <p>
                        </p>
                    </p>
                    <p>
                        '.$model->anexo.'
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
                    <p align="left">
                        Eléctrico: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$esElectrico($tServicio).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reparación: &nbsp;&nbsp;&nbsp;&nbsp;'.$esReparacion($tServicio).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Equipo: &nbsp;&nbsp;&nbsp;'.$esEquipo($tServicio).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        _________________________ __
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        Cerradura: &nbsp;&nbsp;&nbsp;&nbsp;'.$esCerradura($tServicio).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alcantarillado: '.$esAlcantarillado($tServicio).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pintura: &nbsp;&nbsp;&nbsp;'.$esPintura($tServicio).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        _________________________ __
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        Red de Agua: '.$esReddeagua($tServicio).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Muebles: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$esMuebles($tServicio).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Urgencia: &nbsp;'.$esUrgencia($tServicio).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ________________________ __
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <br/>
                        Describir Brevemente: '.$model->descripcion.'
                        <p>
                        </p>
                    </p>
                    <p align="left">
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
                    <p align="left">
                        Prioridad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alta '.$esAlta($prioridad).' Media '.$esMedia($prioridad).' Baja '.$esBaja($prioridad).'
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                </td>
                <td width="49%" colspan="6" valign="top">
                    <p align="left">
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        Mantención: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preventiva '.$esPreventiva($tMantencion).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correctiva '.$esCorrectiva($tMantencion).'
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="37%" colspan="3" valign="top">
                    <p align="left">
                        Ejecutado por:
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        UBB: __ Contratista: __
                        <p>
                        </p>
                    </p>
                </td>
                <td width="20%" colspan="3" valign="top">
                    <p align="left">
                        Nombre:
                        <p>
                        </p>
                    </p>
                </td>
                <td width="21%" colspan="4" valign="top">
                    <p align="left">
                        Ejecutado el día
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                </td>
                <td width="20%" valign="top">
                    <p align="left">
                        Hora:
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        De _______ A_______
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="11" valign="top" align="center">
                    <p align="center">
                        <strong>
                            Recepción Conforme Jefe Sección Mantención y
                            Servicios
                        </strong>
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="11" valign="top">
                    <p align="left">
                        <p><br/>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="11" valign="top">
                    <p align="left">
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        Nombre: _______________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma: _________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Fecha: _________________________
                        <p>
                        </p>
                    </p>
                    <p align="left">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="11" valign="top" align="center">
                    <p align="center">
                        <strong>
                            Informe de Calidad (Usuario Solicitante)
                            <p>
                            </p>
                        </strong>
                    </p>
                </td>
            </tr>
            <tr>
                
                <td id="fs">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="3">
                    <p align="center">
                        Exc
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs">
                    <p align="center">
                        Bueno
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        Regular
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        Malo
                        <p>
                        </p>
                    </p>
                </td>
                <td id="fs" colspan="2">
                    <p align="center">
                        Observaciones al trabajo o servicio
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td id="fs">
                    <p align="left">
                        Tiempo transcurrido entre la solicitud y la prestación
                        del mismo (Celeridad del trámite)
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="3">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="fs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td id="fs">
                    <p align="left">
                        La información y asesoría recibida con respecto al
                        servicio solicitado
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="3">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="fs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td id="fs">
                    <p align="left">
                        Oportunidad en la atención
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="3">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="fs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td id="fs">
                    <p align="left">
                        Amabilidad del personal
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="3">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="fs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td id="fs">
                    <p align="left">
                        El espacio y ambiente donde fue atendido
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="3">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="fs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td id="fs">
                    <p align="left">
                        En forma general el servicio recibido
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="3">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="rs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
                <td id="fs" colspan="2">
                    <p align="center">
                        <p>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="11">
                    <p align="center">
                        <p><br/>
                        </p>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="11">
                    <p align="left">
                        Nombre: _______________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma: _________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Fecha: _________________________
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
</div>


        ');
        $mpdf->SetTitle('solicitud-mantencion-'.$numero);
        $mpdf->Output('solicitud-mantencion-'.$numero.'.pdf', 'I');
        exit;
    }
    

    /**
     * Creates a new Solmantencion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Solmantencion();
        $model->idPeticion = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idSolicitudMan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Solmantencion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idSolicitudMan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Solmantencion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Solmantencion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Solmantencion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Solmantencion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
