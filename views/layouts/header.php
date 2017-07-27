<?php
use yii\helpers\Html;
use app\models\Rol;
use app\models\Departamento;


/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">


    <?= Html::a('<span class="logo-mini">UBB</span><span class="logo-lg"></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications -->
  
                <!-- Tasks: style can be found in dropdown.less -->


                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="https://openclipart.org/download/247319/abstract-user-flat-3.svg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
                        <?php echo Yii::$app->user->identity->nomUsuario?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="https://openclipart.org/download/247319/abstract-user-flat-3.svg" class="img-circle" alt="User Image"/>

                            <p> <!-- Mostrar Nombre de usuario -->
                                <?= Yii::$app->user->identity->nomUsuario ?><br>

                                <!-- Mostrar rol de Usuario -->
                                <!--
                                <?php  
                                    $rol = Rol::find()->where(['idRol' => yii::$app->user->identity->rol])->one();
                                    echo $rol->nombreRol, " - ";
                                ?>
                                -->

                                <!-- Mostrar Departamento de usuario -->
                                <?php
                                    $departamento = Departamento::find()->where(['idDepartamento' => yii::$app->user->identity->idDepartamento])->one();
                                    echo $departamento->siglaDepartamento;
                                    
                                ?>                               
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!--
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                         
                             <?= Html::a('Cerrar sesión', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>

                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                </li>
            </ul>
        </div>
    </nav>
</header>
