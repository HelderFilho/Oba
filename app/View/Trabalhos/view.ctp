<section class="content-header">
    <h1>
        <?php echo __('Trabalhos'); ?>
        <small><?php echo __('View').' '.__('Trabalho'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Trabalhos'),'/Trabalhos');
              $this->Html->addCrumb(__('View').' '.__('Trabalho'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $trabalho['Trabalho']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $trabalho['Trabalho']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $trabalho['Trabalho']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Trabalho")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($trabalho['Trabalho']['Id']){?>
		<dt><?php echo __('Id'); ?></dt>
		<dd><?php echo h($trabalho['Trabalho']['Id']); ?></dd>
		<?php }?>
		<?php if($trabalho['Trabalho']['Funcionarios']){?>
		<dt><?php echo __('Funcionarios'); ?></dt>
		<dd><?php echo h($trabalho['Trabalho']['Funcionarios']); ?></dd>
		<?php }?>
		<?php if($trabalho['Trabalho']['Local']){?>
		<dt><?php echo __('Local'); ?></dt>
		<dd><?php echo h($trabalho['Trabalho']['Local']); ?></dd>
		<?php }?>
		<?php if($trabalho['Trabalho']['Situacao']){?>
		<dt><?php echo __('Situacao'); ?></dt>
		<dd><?php echo h($trabalho['Trabalho']['Situacao']); ?></dd>
		<?php }?>
		<?php if($trabalho['Trabalho']['Removed']){?>
		<dt><?php echo __('Removed'); ?></dt>
		<dd><?php echo h($trabalho['Trabalho']['Removed']); ?></dd>
		<?php }?>
		<?php if($trabalho['Trabalho']['Created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($trabalho['Trabalho']['Created']); ?></dd>
		<?php }?>
		<?php if($trabalho['Trabalho']['Modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($trabalho['Trabalho']['Modified']); ?></dd>
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