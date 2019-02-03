<style type="text/css">
.sidenav {
    height: 100%; /* Full-height: remove this if you want "auto" height */
    width: 160px; /* Set the width of the sidebar */
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    z-index: 1; /* Stay on top */
    top: 0; /* Stay at the top */
    left: 0;
    background-color: #255; /* Black */
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 20px;
}
    

</style>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if ($this->Session->read('Auth.User.image') != null) {
                    echo $this->Html->Image(str_replace('img/', "", $this->Session->read('Auth.User.image')), array('class' => 'img-circle', 'alt' => 'User Image'));
                } else {
                    echo $this->Html->Image('avatar.jpg', array('class' => 'img-circle', 'alt' => 'User Image'));
                } ?>
            </div>
            <div class="pull-left info">
                <p><?php
                    echo $this->Html->para(null, __('Olá, ') . $this->Session->read('Auth.User.name'));
                    ?></p>
            </div>
        </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"><?php echo __("MAIN NAVIGATION") ?></li>
                <li class="treeview">
                    <a href="<?php echo $this->Html->url(array(
                        'plugin' => false, 'admin' => false, 'controller' => 'pages',
                        'action' => 'display'
                    )); ?>">
                        <i class="fa fa-dashboard"></i> <span><?php echo __("Dashboard") ?></span>
                    </a>

                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i>
                        <span><?php echo __('Registration') ?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Funcionarios',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-users"></i> <span><?php echo __("Funcionários") ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Clientes',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-users"></i> <span><?php echo __("Clientes") ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Equipes',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-users"></i> <span><?php echo __("Equipes") ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Acaos',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-users"></i> <span><?php echo __("Ações") ?></span>
                            </a>
                        </li> 
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i>
                        <span><?php echo __('Trabalhos') ?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                            <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Trabalhos',
                                'action' => 'index'
                            )); ?>">
                                <i class="fa fa-users"></i> <span><?php echo __("Trabalhos") ?></span>
                            </a>
                        </li>
                </ul>


<li class="treeview">
     <a href="#">
         <i class="fa fa-edit"></i>
             <span><?php echo __('Relatorios') ?></span>
                 <i class="fa fa-angle-left pull-right"></i>
     </a>
         <ul class="treeview-menu">
             <li>
                 <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'tempo_real'
                            )); ?>">
                     <i class="fa fa-users"></i> <span><?php echo __("Relatorio em Tempo Real") ?></span>
                 </a>
             </li>
             <li>
                 <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'viewpdf'
                            )); ?>">
                     <i class="fa fa-users"></i> <span><?php echo __("Relatorio em PDF") ?></span>
                 </a>
             </li>
             <li>
                 <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'Relatorio_Clientes'
                            )); ?>">
                     <i class="fa fa-users"></i> <span><?php echo __("Relatorio de Clientes em PDF") ?></span>
                 </a>
             </li>
             <li>
                 <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'Relatorio_Funcionarios'
                            )); ?>">
                     <i class="fa fa-users"></i> <span><?php echo __("Relatorio de Funcionarios em PDF") ?></span>
                 </a>
             </li>           
 </li>        
</ul>
             
 <li class="treeview">
     <a href="#">
         <i class="fa fa-edit"></i>
             <span><?php echo __('PDV') ?></span>
             <i class="fa fa-angle-left pull-right"></i>
     </a>
         <ul class="treeview-menu">
            <a href="#">
                <i class="fa fa-edit"></i>
                    <span><?php echo __('Cadastros') ?></span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
                <ul class="treeview-menu">
                     <li>
                        <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'ClientesPDVs',
                                'action' => 'index'
                            )); ?>">
                            <i class="fa fa-users"></i> <span><?php echo __("Clientes") ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'EquipePDVs',
                                'action' => 'index'
                            )); ?>">
                            <i class="fa fa-users"></i> <span><?php echo __("Equipes") ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'FuncionariosPDVs',
                                'action' => 'index'
                            )); ?>">
                            <i class="fa fa-users"></i> <span><?php echo __("Funcionarios") ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'AcaoPDVs',
                                'action' => 'index'
                            )); ?>">
                        <i class="fa fa-users"></i> <span><?php echo __("Ações") ?></span>
                        </a>
                    </li>
                </ul>
            </ul>
    <ul class="treeview-menu">        
    <a href="#">
         <i class="fa fa-edit"></i>
             <span><?php echo __('Relatórios') ?></span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
         <ul class="treeview-menu">
             <li>
                <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'tempo_realpdv'
                            )); ?>">
                     <i class="fa fa-users"></i> <span><?php echo __("Relatorio em Tempo Real") ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'acoespdv'
                            )); ?>">
                     <i class="fa fa-users"></i> <span><?php echo __("Relatorio em PDF") ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'Relatorio_Clientespdv'
                            )); ?>">
                     <i class="fa fa-users"></i> <span><?php echo __("Relatorio de Clientes em PDF") ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array(
                                'plugin' => false, 'admin' => false, 'controller' => 'Relatorios',
                                'action' => 'Relatorio_Funcionariospdv'
                            )); ?>">
                     <i class="fa fa-users"></i> <span><?php echo __("Relatorio de Funcionarios em PDF") ?></span>
                </a>
            </li> 
        </ul> 
    </ul>
    </li>  
</ul>

    </section>
    <!-- /.sidebar -->
</aside>