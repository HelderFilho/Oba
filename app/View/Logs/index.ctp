<section class="content-header">
    <h1>
        <?php echo __('Logs'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link($this->Html->tag('i', __(' Home'), array('class' => 'fa fa-dashboard')), '/', array('escape' => false)); ?></li>
        <li class="active"><?php echo __('Logs'); ?></li>
    </ol>
</section>
<div class="logs index" style="margin: 20px" >
    <div class="panel panel-default">
        <div class="panel-heading" align="right">
            <section class="content-header">
                <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', '', array('class' => 'fa fa-refresh fa-fw')), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(), array('escape' => false)); ?>
                
            </section>
        </div>
        <div class="table-responsive">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid" style="margin: 20px">                 
                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                	<thead>
                	   <tr>
                    	    <th class="col-xs-2"><?php echo $this->Paginator->sort(__('user_id')); ?></th>
                            <th><?php echo $this->Paginator->sort('model',__('model')); ?></th>
                            <th><?php echo $this->Paginator->sort('action',__('action')); ?></th>
                            <th><?php echo $this->Paginator->sort('old_data',__('old_data')); ?></th>
                            <th><?php echo $this->Paginator->sort('new_data',__('new_data')); ?></th>
                            <th><?php echo $this->Paginator->sort('created',__('created')); ?></th>
                            <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Logs', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                    	    <td><?php echo $this->Form->input('user_id', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All users'),'class'=>'form-control input-sm selectpicker','data-style'=>'btn-primary','data-live-search'=>'true'));?></td>
                            <td><?php echo $this->Form->input('model', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All model')));?></td>
                            <td><?php echo $this->Form->input('action', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All action')));?></td>
                            <td><?php echo $this->Form->input('old_data', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All old_data')));?></td>
                            <td><?php echo $this->Form->input('new_data', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All new_data')));?></td>
                            <td><?php echo $this->Form->input('created', array('label' => '','default' => '','style'=>'width:100%','empty' => __('All created')));?></td>
                            <td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary')) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                		<?php foreach ($logs as $log): ?>
						<tr>
							<td>
			<?php echo $this->Html->link($log['User']['name'], array('controller' => 'users', 'action' => 'view', $log['User']['id'])); ?>
		</td>
						<td><?php echo h($log['Log']['model']); ?>&nbsp;</td>
						<td><?php echo h($log['Log']['action']); ?>&nbsp;</td>
						<td><?php echo h($log['Log']['old_data']); ?>&nbsp;</td>
						<td><?php echo h($log['Log']['new_data']); ?>&nbsp;</td>
						<td><?php echo h($log['Log']['created']); ?>&nbsp;</td>
							<td class="actions">
								
							</td>
						</tr>
					<?php endforeach; ?>
                	</tbody>
    	       </table>
    	        <?php
                    echo $this->Paginator->counter(array(
                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                ?>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    <?php
						echo $this->Paginator->prev('<<', array('tag' => 'li','class' => 'prev',), $this->Paginator->link('<<', array()), array('tag' => 'li', 'escape' => false,'class' => 'prev disabled',));
						echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );
						echo $this->Paginator->next('>>', array('tag' => 'li','class' => 'next',), $this->Paginator->link('>>', array()), array('tag' => 'li', 'escape' => false,'class' => 'next disabled',));
					?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
