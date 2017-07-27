<?php

namespace app\controllers;

use Yii;
use app\models\Peticionmantencion;
use app\models\PeticionmantencionSearch;
use app\models\Usuario;
use app\models\Solmantencion;
use app\models\Departamento;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;




/**
 * PeticionmantencionController implements the CRUD actions for Peticionmantencion model.
 */



class PeticionmantencionController extends Controller
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
     * Lists all Peticionmantencion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeticionmantencionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peticionmantencion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionAprobar($id)
    {
        $model = $this->findModel($id);
        $model->estado = 1;
        $model->fechaAprobada = date('Y-m-d H:i:s');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //Enviar email a Secretaria y Funcionario
            $correoSecretaria = Usuario::find()
                ->where(['idDepartamento' => yii::$app->user->identity->idDepartamento])
                ->andwhere(['rol' => 2])
                ->one()->email;

            $correoFuncionario = Usuario::find()
                ->where(['idUsuario' => $model->idUsuario])
                ->one()->email;

            $desde= "nipalave@alumnos.ubiobio.cl";
            //enviar contenido
            $asunto= "Solicitud de Mantención";
            $mensajeFuncionario = "Su solicitud de Mantención ha sido Aprobada.";
            $mensajeSecretaria = "Se ha Aprobado una Solicitud de Mantención y se encuentra pendiente para su registro";

            Yii::$app->mail->compose()
                ->setFrom($desde)
                ->setTo($correoFuncionario)
                ->setSubject($asunto)
                ->setTextBody($mensajeFuncionario)
                ->send();

            Yii::$app->mail->compose()
                ->setFrom($desde)
                ->setTo($correoSecretaria)
                ->setSubject($asunto)
                ->setTextBody($mensajeSecretaria)
                ->send();

            return $this->redirect(['index'/*, 'id' => $model->idPeticion*/]);
        } else {
            return $this->renderAjax('aprobar', [
                'model' => $model,
            ]);
        }
    }

    public function actionRechazar($id)
    {
        $model = $this->findModel($id);
        $model->estado = 2;
        $model->fechaAprobada = date('Y-m-d H:i:s');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //Enviar email a Funcionario
            $correoFuncionario = Usuario::find()
                ->where(['idUsuario' => $model->idUsuario])
                ->one()->email;

            $desde= "nipalave@alumnos.ubiobio.cl";
            //enviar contenido
            $asunto= "Solicitud de Mantención";
            $mensajeFuncionario = "Su solicitud de Mantención ha sido Rechazada.";

            Yii::$app->mail->compose()
                ->setFrom($desde)
                ->setTo($correoFuncionario)
                ->setSubject($asunto)
                ->setTextBody($mensajeFuncionario)
                ->send();

            return $this->redirect(['index'/*, 'id' => $model->idPeticion*/]);
        } else {
            return $this->renderAjax('rechazar', [
                'model' => $model,
            ]);
        }
    }

    public function actionEjecutada($id)
    {
        $model = $this->findModel($id);
        $model->estado = 4;
        $model->fechaEjecutada = date('Y-m-d H:i:s');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /*
            //Enviar email a Funcionario
            $correoFuncionario = Usuario::find()
                ->where(['idUsuario' => $model->idUsuario])
                ->one()->email;

            $desde= "nipalave@alumnos.ubiobio.cl";
            //enviar contenido
            $asunto= "Solicitud de Mantención";
            $mensajeFuncionario = "Su solicitud de Mantención ha sido Rechazada.";

            Yii::$app->mail->compose()
                ->setFrom($desde)
                ->setTo($correoFuncionario)
                ->setSubject($asunto)
                ->setTextBody($mensajeFuncionario)
                ->send();
            */
            return $this->redirect(['index'/*, 'id' => $model->idPeticion*/]);
        } else {
            return $this->renderAjax('ejecutada', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegistrar($id)
    {   
        //Definir models que se van a utilizar
        $peticion = $this->findModel($id);
        $model = new Solmantencion();

        //Definir datos de la petición de mantención
        $peticion->fechaGestionada = date('Y-m-d H:i:s');
        $peticion->estado = 3;

        //Definir atributos de la solicitud de mantención
        $model->idPeticion = $id;
        $model->fechaSolicitud = date('Y-m-d H:i:s');
        $model->reparticion = Departamento::find()
                            ->where(['idDepartamento' => Yii::$app->user->identity->idDepartamento])->one()->siglaDepartamento;
        $model->centroCosto = Departamento::find()
                            ->where(['idDepartamento' => Yii::$app->user->identity->idDepartamento])->one()->centroCosto;
        $model->nomSolicitante = Usuario::find()
                            ->where(['idDepartamento' => Yii::$app->user->identity->idDepartamento])
                            ->andwhere(['rol' => 4])
                            ->one()->nomUsuario;
        $numeroso = Solmantencion::find()->max('numero');
        $model->numero = $numeroso + 1;
        //$model->anexo = ;
        $model->tipoServicio = $peticion->tipoServicio;
        $model->tipoMantencion = $peticion->tipoMantencion;
        $model->descripcion = $peticion->descripcionD;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $peticion->save();
            return $this->redirect(['/solmantencion/view', 'id' => $model->idSolicitudMan]);  
        } else {
            return $this->renderAjax('/solmantencion/create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Creates a new Peticionmantencion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Peticionmantencion();
        $model->idUsuario = Yii::$app->user->identity->idUsuario;
        $model->fechaGenerada = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //Enviar email a Jefe de departamento
            $correoDirector = Usuario::find()
                ->where(['idDepartamento' => yii::$app->user->identity->idDepartamento])
                ->andwhere(['rol' => 4])
                ->one()->email;
            $desde= "nipalave@alumnos.ubiobio.cl";
            //enviar contenido
            $asunto= "Solicitud de Mantención";
            $mensaje= "Un usuario ha realizado una solicitud de mantención y se encuentra pendiente para su aprobación.";

            Yii::$app->mail->compose()
                ->setFrom($desde)
                ->setTo($correoDirector)
                ->setSubject($asunto)
                ->setTextBody($mensaje)
                ->send();
           
            return $this->redirect(['index'/*, 'id' => $model->idPeticion*/]);  
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }




    /**
     * Updates an existing Peticionmantencion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPeticion]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Peticionmantencion model.
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
     * Finds the Peticionmantencion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Peticionmantencion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peticionmantencion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
