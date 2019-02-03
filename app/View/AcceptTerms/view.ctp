<section class="content-header">
    <h1>
        <?php echo __('Accept Terms'); ?>
        <small><?php echo __('View').' '.__('Accept Term'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Accept Terms'),'/Accept Terms');
              $this->Html->addCrumb(__('View').' '.__('Accept Term'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $acceptTerm['AcceptTerm']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $acceptTerm['AcceptTerm']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $acceptTerm['AcceptTerm']['id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Accept Term")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($acceptTerm['AcceptTerm']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($acceptTerm['AcceptTerm']['created']); ?></dd>
		<?php }?>
		<?php if($acceptTerm['AcceptTerm']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($acceptTerm['AcceptTerm']['modified']); ?></dd>
		<?php }?>
		<?php if($acceptTerm['AcceptTerm']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($acceptTerm['AcceptTerm']['name']); ?></dd>
		<?php }?>
		<?php if($acceptTerm['AcceptTerm']['description']){?>
		<dt><?php echo __('Description'); ?></dt>
		<dd><?php echo h($acceptTerm['AcceptTerm']['description']); ?></dd>
		<?php }?>
		<?php if($acceptTerm['AcceptTerm']['prefecture_id']){?>
		<dt><?php echo __('Prefecture'); ?></dt>
		<dd><?php echo $this->Html->link($acceptTerm['Prefecture']['name'], array('controller' => 'prefectures', 'action' => 'view', $acceptTerm['Prefecture']['id'])); ?></dd>
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