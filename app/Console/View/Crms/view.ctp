<section class="content-header">
    <h1>
        <?php echo __('Crms'); ?>
        <small><?php echo __('View').' '.__('Crm'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Crms'),'/Crms');
              $this->Html->addCrumb(__('View').' '.__('Crm'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $crm['Crm']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $crm['Crm']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $crm['Crm']['id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Crm")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($crm['Crm']['IdAcao']){?>
		<dt><?php echo __('IdAcao'); ?></dt>
		<dd><?php echo h($crm['Crm']['IdAcao']); ?></dd>
		<?php }?>
		<?php if($crm['Crm']['Nome']){?>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($crm['Crm']['Nome']); ?></dd>
		<?php }?>
		<?php if($crm['Crm']['Endereco']){?>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd><?php echo h($crm['Crm']['Endereco']); ?></dd>
		<?php }?>
		<?php if($crm['Crm']['Email']){?>
		<dt><?php echo __('Email'); ?></dt>
		<dd><?php echo h($crm['Crm']['Email']); ?></dd>
		<?php }?>
		<?php if($crm['Crm']['Telefone']){?>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd><?php echo h($crm['Crm']['Telefone']); ?></dd>
		<?php }?>
		<?php if($crm['Crm']['Quantidade']){?>
		<dt><?php echo __('Quantidade'); ?></dt>
		<dd><?php echo h($crm['Crm']['Quantidade']); ?></dd>
		<?php }?>
		<?php if($crm['Crm']['Cupom']){?>
		<dt><?php echo __('Cupom'); ?></dt>
		<dd><?php echo h($crm['Crm']['Cupom']); ?></dd>
		<?php }?>
		<?php if($crm['Crm']['Valor']){?>
		<dt><?php echo __('Valor'); ?></dt>
		<dd><?php echo h($crm['Crm']['Valor']); ?></dd>
		<?php }?>
		<?php if($crm['Crm']['Loja']){?>
		<dt><?php echo __('Loja'); ?></dt>
		<dd><?php echo h($crm['Crm']['Loja']); ?></dd>
		<?php }?>
		<?php if($crm['Crm']['Nascimento']){?>
		<dt><?php echo __('Nascimento'); ?></dt>
		<dd><?php echo h($crm['Crm']['Nascimento']); ?></dd>
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