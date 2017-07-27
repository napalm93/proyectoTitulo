<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div align="center" class="user-panel">
            <img src="../logosimbologia.png" width="45">
            
            <b><font face="arial" color="#F2F2F2" size="2,5">Universidad del Bío-Bío</font></b>
            <br>
            <br>
            <b><font face="arial" color="#F2F2F2" size="2,5">
            <?php 
            $rolUsuario = "";
            $rolUsuario = Yii::$app->user->identity->rol;

            if($rolUsuario==1){
                    echo "Menú Administrador";
                }elseif ($rolUsuario==2) {
                    echo "Menú Secretaria";
                }elseif ($rolUsuario==3) {
                    echo "Menú Funcionario";
                }elseif ($rolUsuario==4) {
                    echo "Menú Jefe Departamento";
                } 
            ?>
            </font></b>
           
        </div>

        <!-- Asignar variables con opciones del menú -->
        
        <?php
        
        $menuSecretaria = [
                    ['label' => 'Home', 'icon' => 'home', 'url' => 'index.php'],

                    [
                        'label' => 'Solicitud de Mantención',
                        'icon' => 'wrench',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Ver solicitudes', 'icon' => 'search', 'url' => ['/peticionmantencion/index'],],

                        ],
                    ],

                    [
                        'label' => 'Solicitud de Movilización',
                        'icon' => 'car',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Registrar solicitud', 'icon' => 'pencil', 'url' => ['/solmovilizacion/create'],],
                            ['label' => 'Buscar solicitud', 'icon' => 'search', 'url' => ['/solmovilizacion/index'],],

                        ],
                    ],

                    [
                        'label' => 'Comisión de servicio',
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Registrar comisión de servicio', 'icon' => 'pencil', 'url' => ['/comservicio/create'],],
                            ['label' => 'Buscar comisión de servicio', 'icon' => 'search', 'url' => ['/comservicio/index'],],

                        ],
                    ],

                    [
                        'label' => 'Solicitud de Compra',
                        'icon' => 'shopping-cart',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Registrar solicitud', 'icon' => 'pencil', 'url' => ['/solcompra/create'],],
                            ['label' => 'Buscar solicitud', 'icon' => 'search', 'url' => ['/solcompra/index'],],

                        ],
                    ],
                    [
                        'label' => 'Orden de Pago',
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Registrar Orden de Pago', 'icon' => 'pencil', 'url' => ['/ordenpago/create'],],
                            ['label' => 'Buscar Orden de Pago', 'icon' => 'search', 'url' => ['/ordenpago/index'],],

                        ],
                    ],
        ];

        $menuAdministrador = [                    

                    ['label' => 'Home', 'icon' => 'home', 'url' => 'index.php'],

                    [
                        'label' => 'Gestionar Usuarios',
                        'icon' => 'user',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Agregar Usuario', 'icon' => 'pencil', 'url' => ['/usuario/create'],],
                            ['label' => 'Ver Usuarios', 'icon' => 'search', 'url' => ['/usuario/index'],],

                        ],
                    ],
                    [
                        'label' => 'Gestionar Departamentos',
                        'icon' => '',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Agregar Departamento', 'icon' => 'pencil', 'url' => ['/departamento/create'],],
                            ['label' => 'Ver Departamentos', 'icon' => 'search', 'url' => ['/departamento/index'],],

                        ],
                    ],
                    [
                        'label' => 'Gestionar Roles',
                        'icon' => '',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Agregar Rol', 'icon' => 'pencil', 'url' => ['/rol/create'],],
                            ['label' => 'Ver Roles', 'icon' => 'search', 'url' => ['/rol/index'],],

                        ],
                    ],


                    ];

        $menuFuncionario = [
                    ['label' => 'Home', 'icon' => 'home', 'url' => 'index.php'],
                    [
                            'label' => 'Solicitar Mantención',
                            'icon' => 'wrench',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Enviar Solicitud', 'icon' => 'pencil', 'url' => ['/peticionmantencion/create'],],
                                ['label' => 'Ver Solicitudes anteriores', 'icon' => 'search', 'url' => ['/peticionmantencion/index'],],

                        ],
                    ],
        ];

        $menuJefedepartamento = [
                    ['label' => 'Home', 'icon' => 'home', 'url' => 'index.php'],
                    [
                            'label' => 'Solicitudes de Mantención',
                            'icon' => 'wrench',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Ver solicitudes', 'icon' => 'search', 'url' => ['/peticionmantencion/index'],],

                        ],
                    ],

        ];
        
        ?>
        


        <!-- Mostrar menú según perfil -->
        <?php 
        switch ($rolUsuario) {
            case '1':
                 echo dmstr\widgets\Menu::widget(
                ['options' => ['class' => 'sidebar-menu'],
                'items' => $menuAdministrador,
                ]);
                break;

            case '2':
                 echo dmstr\widgets\Menu::widget(
                ['options' => ['class' => 'sidebar-menu'],
                'items' => $menuSecretaria,
                ]);
            break;

            case '3':
                 echo dmstr\widgets\Menu::widget(
                ['options' => ['class' => 'sidebar-menu'],
                'items' => $menuFuncionario,
                ]);
                break;

            case '4':
                 echo dmstr\widgets\Menu::widget(
                ['options' => ['class' => 'sidebar-menu'],
                'items' => $menuJefedepartamento,
                ]);
                 break; 
            
            default:
                 # code...
                 break;
         }


        ?>

    </section>

</aside>
