<section class="content-header">
    <h1>
        <?php echo __('Funcionarios P D Vs'); ?>
        <small><?php echo __('View').' '.__('Funcionarios P D V'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Funcionarios P D Vs'),'/Funcionarios P D Vs');
              $this->Html->addCrumb(__('View').' '.__('Funcionarios P D V'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $funcionariosPDV['FuncionariosPDV']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $funcionariosPDV['FuncionariosPDV']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $funcionariosPDV['FuncionariosPDV']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Funcionarios P D V")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($funcionariosPDV['FuncionariosPDV']['Id']){?>
		<dt><?php echo __('Id'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Id']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Nome']){?>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Nome']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Endereco']){?>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Endereco']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Equipe']){?>
		<dt><?php echo __('Equipe'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Equipe']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Tipo']){?>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Tipo']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Telefone']){?>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Telefone']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Email']){?>
		<dt><?php echo __('Email'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Email']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Empresa']){?>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Empresa']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['CPF']){?>
		<dt><?php echo __('CPF'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['CPF']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Cargo']){?>
		<dt><?php echo __('Cargo'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Cargo']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Removed']){?>
		<dt><?php echo __('Removed'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Removed']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Created']); ?></dd>
		<?php }?>
		<?php if($funcionariosPDV['FuncionariosPDV']['Modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($funcionariosPDV['FuncionariosPDV']['Modified']); ?></dd>
		<?php }?>
                </div>
            </div>
                        </div>
        </div>
     </div>|

<script>
    $.extend( $.fn.dataTable.defaults, {
        "searching": false
    } );
    
    $('#dataTables-example').DataTable();
</script>