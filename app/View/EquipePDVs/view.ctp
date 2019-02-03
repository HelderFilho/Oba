<section class="content-header">
    <h1>
        <?php echo __('Equipe P D Vs'); ?>
        <small><?php echo __('View').' '.__('Equipe P D V'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Equipe P D Vs'),'/Equipe P D Vs');
              $this->Html->addCrumb(__('View').' '.__('Equipe P D V'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $equipePDV['EquipePDV']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $equipePDV['EquipePDV']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $equipePDV['EquipePDV']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Equipe P D V")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($equipePDV['EquipePDV']['Id']){?>
		<dt><?php echo __('Id'); ?></dt>
		<dd><?php echo h($equipePDV['EquipePDV']['Id']); ?></dd>
		<?php }?>
		<?php if($equipePDV['EquipePDV']['Nome']){?>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($equipePDV['EquipePDV']['Nome']); ?></dd>
		<?php }?>
		<?php if($equipePDV['EquipePDV']['Empresa']){?>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd><?php echo h($equipePDV['EquipePDV']['Empresa']); ?></dd>
		<?php }?>
		<?php if($equipePDV['EquipePDV']['Removed']){?>
		<dt><?php echo __('Removed'); ?></dt>
		<dd><?php echo h($equipePDV['EquipePDV']['Removed']); ?></dd>
		<?php }?>
		<?php if($equipePDV['EquipePDV']['Created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($equipePDV['EquipePDV']['Created']); ?></dd>
		<?php }?>
		<?php if($equipePDV['EquipePDV']['Modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($equipePDV['EquipePDV']['Modified']); ?></dd>
		<?php }?>
		<?php if($equipePDV['EquipePDV']['EquipesPDVcol']){?>
		<dt><?php echo __('EquipesPDVcol'); ?></dt>
		<dd><?php echo h($equipePDV['EquipePDV']['EquipesPDVcol']); ?></dd>
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