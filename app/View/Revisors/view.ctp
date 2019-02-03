<section class="content-header">
    <h1>
        <?php echo __('Revisores'); ?>
        <small><?php echo __('View').' '.__('Revisor'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Revisores'),'/Revisors');
              $this->Html->addCrumb(__('View').' '.__('Revisor'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $revisor['Revisor']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $revisor['Revisor']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $revisor['Revisor']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Revisor")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
			<?php if($revisor['Revisor']['Nome']){?>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Nome']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Caracteristicas']){?>
		<dt><?php echo __('Caracteristicas'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Caracteristicas']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Endereco']){?>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Endereco']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Equipe']){?>
		<dt><?php echo __('Equipe'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Equipe']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Tipo']){?>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Tipo']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Email']){?>
		<dt><?php echo __('Email'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Email']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Telefone']){?>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Telefone']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Empresa']){?>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Empresa']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['CPF']){?>
		<dt><?php echo __('CPF'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['CPF']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Cargo']){?>
		<dt><?php echo __('Cargo'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Cargo']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Item_Novo']){?>
		<dt><?php echo __('Item Novo'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Item_Novo']); ?></dd>
		<?php }?>
		<?php if($revisor['Revisor']['Data_Nascimento']){?>
		<dt><?php echo __('Data Nascimento'); ?></dt>
		<dd><?php echo h($revisor['Revisor']['Data_Nascimento']); ?></dd>
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