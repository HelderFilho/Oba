<section class="content-header">
    <h1>
        <?php echo __('Acao Supervisor Locals'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acao Supervisor Locals'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div class="acaoSupervisorLocals index" style="margin: 20px" >
    <div class="panel panel-default">
        <div class="panel-heading" align="right">
            <section class="content-header">
                <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', '', array('class' => 'fa fa-refresh fa-fw')), array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Refresh'),'title'=>__('Refresh'),'escape' => false)), $this->Html->url(), array('escape' => false)); ?>
                <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', '', array('class' => 'fa fa-plus fa-fw')), array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Add'),'title'=>__('Add'),'escape' => false)), $this->Html->url(array('action' => 'add')), array('escape' => false)); ?>
            </section>
        </div>
        <div class="table-responsive">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid" style="margin: 20px">                 
                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                	<thead>
                	   <tr>
                    	<th><?php echo $this->Paginator->sort('IdAcao',__('IdAcao'),array('data-toggle'=>'tooltip','data-original-title'=>__('IdAcao'),'title'=>__('IdAcao'))); ?></th>
                            <th><?php echo $this->Paginator->sort('IdSupervisor',__('IdSupervisor'),array('data-toggle'=>'tooltip','data-original-title'=>__('IdSupervisor'),'title'=>__('IdSupervisor'))); ?></th>
                            <th><?php echo $this->Paginator->sort('IdCliente',__('IdCliente'),array('data-toggle'=>'tooltip','data-original-title'=>__('IdCliente'),'title'=>__('IdCliente'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Local',__('Local'),array('data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'))); ?></th>
                            <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Acao Supervisor Locals', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                    	    					 <td><?php echo $this->Html->div('row',$this->Form->input('IdAcao',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('IdAcao'),'title'=>__('IdAcao'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('IdSupervisor',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('IdSupervisor'),'title'=>__('IdSupervisor'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('IdCliente',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('IdCliente'),'title'=>__('IdCliente'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Local',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
<td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Search'),'title'=>__('Search'))) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                		<?php foreach ($acaoSupervisorLocals as $acaoSupervisorLocal): ?>
						<tr>
						<td><?php echo h($acaoSupervisorLocal['AcaoSupervisorLocal']['IdAcao']); ?>&nbsp;</td>
						<td><?php echo h($acaoSupervisorLocal['AcaoSupervisorLocal']['IdSupervisor']); ?>&nbsp;</td>
						<td><?php echo h($acaoSupervisorLocal['AcaoSupervisorLocal']['IdCliente']); ?>&nbsp;</td>
						<td><?php echo h($acaoSupervisorLocal['AcaoSupervisorLocal']['Local']); ?>&nbsp;</td>
							<td class="actions"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
								<div class="pull-right">
									<div class="btn-group">
										<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
											<i class="fa fa-gear fa-fw"></i>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $acaoSupervisorLocal['AcaoSupervisorLocal']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $acaoSupervisorLocal['AcaoSupervisorLocal']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $acaoSupervisorLocal['AcaoSupervisorLocal']['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $acaoSupervisorLocal['AcaoSupervisorLocal']['id']),array('class' => 'btn btn-mini'));?> </li>
										</ul>
									</div>
								</div>
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