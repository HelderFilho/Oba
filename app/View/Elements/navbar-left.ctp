


<!DOCTYPE html>
<html>
<head>

<style type="text/css">
.mouse{
background: white;
}
.sidenav {
    height: 100%; /* Full-height: remove this if you want "auto" height */
    width: 230px; /* Set the width of the sidebar */
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    z-index: 1; /* Stay on top */
    top: 0; /* Stay at the top */
    left: 0;
    background-color: white; /* Black */
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 50px;
    color: #255;
}

.sidenav-sub {
   background-color: white ;
    color: black;
}

.empresa{
    background-color:white;
    color :black;
    margin-left: 20px;
    margin-right: 20px;
    text-align: center;
    margin-bottom: 10px;
    margin-top: 10px;
    }


.pdvPosition{
    margin-left: -20px;
}

.pdvTextPosition{
    margin-left: -15px;
}

.teste{
    padding: 5px;
}
.teste:hover{
  background-color: orange;
}
.fontColor{
    color:black;
}

.fontColorPDV{
    color: black;
}



.treeview:hover{
  background-color: orange;  
}
.skin-black .sidebar>.sidebar-menu>li>a:hover{
  background-color: orange;
}

.skin-black .sidebar>.sidebar-nav>li>a:hover{
  background-color: orange;
}

 .skin-black .sidebar>.sidebar-menu>li.active>a{
  background-color: white;
 }
.skin-black .sidebar>.sidebar-menu>li>.treeview-menu{
  background-color: white;
   padding: 5px;
  font-size: 15px;
}
.skin-black .main-sidebar, .skin-black .left-side, .skin-black .wrapper {
    background: white;
}

.iconPlus{
    margin-right: 20px;
    color: black;
}
   
 </style>
 </head>

<body>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel ">
           </div>



 <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', 'Trocar Agência', array('class' => 'empresa')), array('class' => 'empresa','data-toggle'=>'tooltip','data-original-title'=>__('Trocar Agência'),'title'=>__('Trocar Agência'),'escape' => false)), $this->Html->url(array('controller'=>'Equipes','action' => 'TrocarEmpresa')), array('escape' => false)); ?>


            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu sidenav-sub">
          
                <li>
                    <a href="<?php echo $this->Html->url(array(
                        'plugin' => false, 'admin' => false, 'controller' => 'pages',
                        'action' => 'display'
                    )); ?>">
                        <i class="fa fa-dashboard fontColor"></i> <span class="fontColor"><?php echo __("Dashboard") ?></span>
                    </a>
                </li>

                

                <li >
                    <a href="#">
                        <i class="fa fa-edit fontColor"></i>
                        <span class="fontColor" ><?php echo __('Registration') ?></span>
                        <i class=" pull-right fontColor"></i>
                    </a>
                    <ul>
                        <li class="sidenav-sub teste">
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Equipes',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-plus iconPlus pull-right"></i>
                                <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Equipes") ?></span>

                            </a>
                        </li>
                        
                        <li class="sidenav-sub teste">
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Funcionarios',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Supervisores") ?></span>
                                <i class="fa fa-plus iconPlus pull-right"></i>
                            </a>
                        </li>
                        <li class="sidenav-sub teste">
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Revisors',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-plus iconPlus pull-right"></i>
                                <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Revisores") ?></span>

                            </a>
                        </li>
                        
                        <li class="sidenav-sub teste">
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Clientes',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Clientes") ?></span>
                                <i class="fa fa-plus iconPlus pull-right"></i>

                            </a>
                        </li>
                        <li class="sidenav-sub teste">
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Acaos',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Ações") ?></span>
                                <i class="fa fa-plus iconPlus pull-right"></i>

                            </a>
                        </li> 
                    </ul>
                </li>


<li>
     <a href="#">
         <i class="fa fa-edit fontColor"></i>
             <span class="fontColor"><?php echo __('Relatorios') ?></span>
     </a>
         <ul class="sidenav-sub">
           
              <li class="sidenav-sub teste">
                 <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'relatorios'
                            )); ?>">
                     <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Relatorios de Ações em PDF") ?></span>
                                <i class="fa fa-plus iconPlus pull-right"></i>

                 </a>
             </li>
  <li class="sidenav-sub teste">
                 <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'ExportaExcel'
                            )); ?>">
                     <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Relatorios de Ações em Excel") ?></span>
                                <i class="fa fa-plus iconPlus pull-right"></i>

                 </a>
             </li>
  <li class="sidenav-sub teste">
                 <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'relatorios_customizados'
                            )); ?>">
                     <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Relatorios Customizados") ?></span>
                                <i class="fa fa-plus iconPlus pull-right"></i>

                 </a>
             </li>
  
     <li class="sidenav-sub teste">
                 <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'todosCadastros'
                            )); ?>" target = "_blank" >
                     <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Todos os Cadastros") ?></span>
                                <i class="fa fa-plus iconPlus pull-right"></i>

                 </a>
             </li>



    </li>        
</ul>
          
    <ul class="pdvPosition sidenav-sub ">        
           <li class="pdvTextPosition fontColor teste">
                <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'graficos',
                                'action' => 'graficos'
                            )); ?>">
                     <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Gráficos") ?></span>
                </a>
         
          <li class="pdvTextPosition fontColor teste">
                <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Mensagems',
                                'action' => 'mensagens'
                            )); ?>">
                     <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Mensagens") ?></span>
                </a>   
          </li>
          <li class="pdvTextPosition fontColor teste">
                <a href="<?php echo $this->Html->url(array(
                                'plugin' => true, 'admin' => true, 'controller' => 'users',
                                'action' => 'index'
                            )); ?>">
                     <i class="fa fa-users fontColor"></i> <span class="fontColor"><?php echo __("Usuários") ?></span>
                </a>   
          </li>
          
            </ul>
        
    </ul>
</li>
</ul>
</li>
</ul>
    </section>
    <!-- /.sidebar -->
</aside>




</body>
</html>
