<section class="content-header">
    <h1>
        <?php echo __('Pdvs'); ?>
        <small><?php echo __('View').' '.__('Pdv'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Pdvs'),'/Pdvs');
              $this->Html->addCrumb(__('View').' '.__('Pdv'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $pdv['Pdv']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $pdv['Pdv']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $pdv['Pdv']['id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Pdv")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($pdv['Pdv']['IdAcao']){?>
		<dt><?php echo __('IdAcao'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['IdAcao']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['Supervisor']){?>
		<dt><?php echo __('Supervisor'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['Supervisor']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['Promotor']){?>
		<dt><?php echo __('Promotor'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['Promotor']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['Loja']){?>
		<dt><?php echo __('Loja'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['Loja']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['Produto']){?>
		<dt><?php echo __('Produto'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['Produto']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['Preco']){?>
		<dt><?php echo __('Preco'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['Preco']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['EstoqueInicial']){?>
		<dt><?php echo __('EstoqueInicial'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['EstoqueInicial']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['EstoqueFinal']){?>
		<dt><?php echo __('EstoqueFinal'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['EstoqueFinal']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['PrecoConcorrente1']){?>
		<dt><?php echo __('PrecoConcorrente1'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['PrecoConcorrente1']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['PrecoConcorrente2']){?>
		<dt><?php echo __('PrecoConcorrente2'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['PrecoConcorrente2']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['Vendas']){?>
		<dt><?php echo __('Vendas'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['Vendas']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['TrocaBrindes']){?>
		<dt><?php echo __('TrocaBrindes'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['TrocaBrindes']); ?></dd>
		<?php }?>
		<?php if($pdv['Pdv']['Abordagens']){?>
		<dt><?php echo __('Abordagens'); ?></dt>
		<dd><?php echo h($pdv['Pdv']['Abordagens']); ?></dd>
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