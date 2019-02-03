<section class="content-header">
    <h1>
        <?php echo __('Funcionarios'); ?>
        <small><?php echo __('View').' '.__('Funcionario'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Funcionarios'),'/Funcionarios');
              $this->Html->addCrumb(__('View').' '.__('Funcionario'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $funcionario['FuncionariosPDV']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $funcionario['FuncionariosPDV']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $funcionario['FuncionariosPDV']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Funcionario")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($funcionario['FuncionariosPDV']['Nome']){?>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($funcionario['FuncionariosPDV']['Nome']); ?></dd>
		<?php }?>
		<?php if($funcionario['FuncionariosPDV']['Endereco']){?>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd><?php echo h($funcionario['FuncionariosPDV']['Endereco']); ?></dd>
		<?php }?>
        <?php if($funcionario['FuncionariosPDV']['Equipe']){?>
        <dt><?php echo __('Equipe'); ?></dt>
        <dd><?php echo h($funcionario['FuncionariosPDV']['Equipe']); ?></dd>
        <?php }?>
        <?php if($funcionario['FuncionariosPDV']['Tipo']){?>
        <dt><?php echo __('Tipo'); ?></dt>
        <dd><?php echo h($funcionario['FuncionariosPDV']['Tipo']); ?></dd>
        <?php }?>
		<?php if($funcionario['FuncionariosPDV']['Email']){?>
		<dt><?php echo __('Email'); ?></dt>
		<dd><?php echo h($funcionario['FuncionariosPDV']['Email']); ?></dd>
		<?php }?>
		<?php if($funcionario['FuncionariosPDV']['Telefone']){?>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd><?php echo h($funcionario['FuncionariosPDV']['Telefone']); ?></dd>
		<?php }?>
		<?php if($funcionario['FuncionariosPDV']['CPF']){?>
		<dt><?php echo __('CPF'); ?></dt>
		<dd><?php echo h($funcionario['FuncionariosPDV']['CPF']); ?></dd>
		<?php }?>
		<?php if($funcionario['FuncionariosPDV']['Cargo']){?>
		<dt><?php echo __('Cargo'); ?></dt>
		<dd><?php echo h($funcionario['FuncionariosPDV']['Cargo']); ?></dd>
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