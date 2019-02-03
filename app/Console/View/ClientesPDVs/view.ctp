<section class="content-header">
    <h1>
        <?php echo __('Clientes P D Vs'); ?>
        <small><?php echo __('View').' '.__('Clientes P D V'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Clientes P D Vs'),'/Clientes P D Vs');
              $this->Html->addCrumb(__('View').' '.__('Clientes P D V'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $clientesPDV['ClientesPDV']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $clientesPDV['ClientesPDV']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $clientesPDV['ClientesPDV']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Clientes P D V")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($clientesPDV['ClientesPDV']['Id']){?>
		<dt><?php echo __('Id'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Id']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['CNPJ']){?>
		<dt><?php echo __('CNPJ'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['CNPJ']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Razao_Social']){?>
		<dt><?php echo __('Razao Social'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Razao_Social']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Nome_Fantasia']){?>
		<dt><?php echo __('Nome Fantasia'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Nome_Fantasia']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Endereco']){?>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Endereco']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Email']){?>
		<dt><?php echo __('Email'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Email']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Telefone']){?>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Telefone']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Empresa']){?>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Empresa']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Bairro']){?>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Bairro']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Cep']){?>
		<dt><?php echo __('Cep'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Cep']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Cidade']){?>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Cidade']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Removed']){?>
		<dt><?php echo __('Removed'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Removed']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Created']); ?></dd>
		<?php }?>
		<?php if($clientesPDV['ClientesPDV']['Modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($clientesPDV['ClientesPDV']['Modified']); ?></dd>
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