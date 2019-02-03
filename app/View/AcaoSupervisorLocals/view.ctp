<section class="content-header">
    <h1>
        <?php echo __('Acao Supervisor Locals'); ?>
        <small><?php echo __('View').' '.__('Acao Supervisor Local'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acao Supervisor Locals'),'/Acao Supervisor Locals');
              $this->Html->addCrumb(__('View').' '.__('Acao Supervisor Local'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $acaoSupervisorLocal['AcaoSupervisorLocal']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $acaoSupervisorLocal['AcaoSupervisorLocal']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $acaoSupervisorLocal['AcaoSupervisorLocal']['id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Acao Supervisor Local")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($acaoSupervisorLocal['AcaoSupervisorLocal']['IdAcao']){?>
		<dt><?php echo __('IdAcao'); ?></dt>
		<dd><?php echo h($acaoSupervisorLocal['AcaoSupervisorLocal']['IdAcao']); ?></dd>
		<?php }?>
		<?php if($acaoSupervisorLocal['AcaoSupervisorLocal']['IdSupervisor']){?>
		<dt><?php echo __('IdSupervisor'); ?></dt>
		<dd><?php echo h($acaoSupervisorLocal['AcaoSupervisorLocal']['IdSupervisor']); ?></dd>
		<?php }?>
		<?php if($acaoSupervisorLocal['AcaoSupervisorLocal']['IdCliente']){?>
		<dt><?php echo __('IdCliente'); ?></dt>
		<dd><?php echo h($acaoSupervisorLocal['AcaoSupervisorLocal']['IdCliente']); ?></dd>
		<?php }?>
		<?php if($acaoSupervisorLocal['AcaoSupervisorLocal']['Local']){?>
		<dt><?php echo __('Local'); ?></dt>
		<dd><?php echo h($acaoSupervisorLocal['AcaoSupervisorLocal']['Local']); ?></dd>
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