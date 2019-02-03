<section class="content-header">
    <h1>
        <?php echo __('Acao P D Vs'); ?>
        <small><?php echo __('View').' '.__('Acao P D V'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acao P D Vs'),'/Acao P D Vs');
              $this->Html->addCrumb(__('View').' '.__('Acao P D V'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $acaoPDV['AcaoPDV']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $acaoPDV['AcaoPDV']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $acaoPDV['AcaoPDV']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Acao P D V")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($acaoPDV['AcaoPDV']['Id']){?>
		<dt><?php echo __('Id'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Id']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Nome']){?>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Nome']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['AcaoPDVcol']){?>
		<dt><?php echo __('AcaoPDVcol'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['AcaoPDVcol']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Cliente']){?>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Cliente']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Equipe']){?>
		<dt><?php echo __('Equipe'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Equipe']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Supervisor']){?>
		<dt><?php echo __('Supervisor'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Supervisor']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Funcionarios']){?>
		<dt><?php echo __('Funcionarios'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Funcionarios']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Local']){?>
		<dt><?php echo __('Local'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Local']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Latitude']){?>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Latitude']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Longitude']){?>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Longitude']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Empresa']){?>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Empresa']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Inicio']){?>
		<dt><?php echo __('Inicio'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Inicio']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Termino']){?>
		<dt><?php echo __('Termino'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Termino']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Fotos']){?>
		<dt><?php echo __('Fotos'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Fotos']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Videos']){?>
		<dt><?php echo __('Videos'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Videos']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Removed']){?>
		<dt><?php echo __('Removed'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Removed']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Created']); ?></dd>
		<?php }?>
		<?php if($acaoPDV['AcaoPDV']['Modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($acaoPDV['AcaoPDV']['Modified']); ?></dd>
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