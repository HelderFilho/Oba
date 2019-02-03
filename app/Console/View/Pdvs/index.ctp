<section class="content-header">
    <h1>
        <?php echo __('Pdvs'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Pdvs'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div class="pdvs index" style="margin: 20px" >
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
                            <th><?php echo $this->Paginator->sort('Supervisor',__('Supervisor'),array('data-toggle'=>'tooltip','data-original-title'=>__('Supervisor'),'title'=>__('Supervisor'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Promotor',__('Promotor'),array('data-toggle'=>'tooltip','data-original-title'=>__('Promotor'),'title'=>__('Promotor'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Loja',__('Loja'),array('data-toggle'=>'tooltip','data-original-title'=>__('Loja'),'title'=>__('Loja'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Produto',__('Produto'),array('data-toggle'=>'tooltip','data-original-title'=>__('Produto'),'title'=>__('Produto'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Preco',__('Preco'),array('data-toggle'=>'tooltip','data-original-title'=>__('Preco'),'title'=>__('Preco'))); ?></th>
                            <th><?php echo $this->Paginator->sort('EstoqueInicial',__('EstoqueInicial'),array('data-toggle'=>'tooltip','data-original-title'=>__('EstoqueInicial'),'title'=>__('EstoqueInicial'))); ?></th>
                            <th><?php echo $this->Paginator->sort('EstoqueFinal',__('EstoqueFinal'),array('data-toggle'=>'tooltip','data-original-title'=>__('EstoqueFinal'),'title'=>__('EstoqueFinal'))); ?></th>
                            <th><?php echo $this->Paginator->sort('PrecoConcorrente1',__('PrecoConcorrente1'),array('data-toggle'=>'tooltip','data-original-title'=>__('PrecoConcorrente1'),'title'=>__('PrecoConcorrente1'))); ?></th>
                            <th><?php echo $this->Paginator->sort('PrecoConcorrente2',__('PrecoConcorrente2'),array('data-toggle'=>'tooltip','data-original-title'=>__('PrecoConcorrente2'),'title'=>__('PrecoConcorrente2'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Vendas',__('Vendas'),array('data-toggle'=>'tooltip','data-original-title'=>__('Vendas'),'title'=>__('Vendas'))); ?></th>
                            <th><?php echo $this->Paginator->sort('TrocaBrindes',__('TrocaBrindes'),array('data-toggle'=>'tooltip','data-original-title'=>__('TrocaBrindes'),'title'=>__('TrocaBrindes'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Abordagens',__('Abordagens'),array('data-toggle'=>'tooltip','data-original-title'=>__('Abordagens'),'title'=>__('Abordagens'))); ?></th>
                            <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Pdvs', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                    	    					 <td><?php echo $this->Html->div('row',$this->Form->input('IdAcao',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('IdAcao'),'title'=>__('IdAcao'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Supervisor',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Supervisor'),'title'=>__('Supervisor'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Promotor',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Promotor'),'title'=>__('Promotor'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Loja',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Loja'),'title'=>__('Loja'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Produto',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Produto'),'title'=>__('Produto'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Preco',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Preco'),'title'=>__('Preco'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('EstoqueInicial',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('EstoqueInicial'),'title'=>__('EstoqueInicial'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('EstoqueFinal',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('EstoqueFinal'),'title'=>__('EstoqueFinal'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('PrecoConcorrente1',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('PrecoConcorrente1'),'title'=>__('PrecoConcorrente1'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('PrecoConcorrente2',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('PrecoConcorrente2'),'title'=>__('PrecoConcorrente2'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Vendas',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Vendas'),'title'=>__('Vendas'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('TrocaBrindes',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('TrocaBrindes'),'title'=>__('TrocaBrindes'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Abordagens',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Abordagens'),'title'=>__('Abordagens'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
<td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Search'),'title'=>__('Search'))) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                		<?php foreach ($pdvs as $pdv): ?>
						<tr>
						<td><?php echo h($pdv['Pdv']['IdAcao']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['Supervisor']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['Promotor']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['Loja']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['Produto']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['Preco']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['EstoqueInicial']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['EstoqueFinal']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['PrecoConcorrente1']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['PrecoConcorrente2']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['Vendas']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['TrocaBrindes']); ?>&nbsp;</td>
						<td><?php echo h($pdv['Pdv']['Abordagens']); ?>&nbsp;</td>
							<td class="actions"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
								<div class="pull-right">
									<div class="btn-group">
										<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
											<i class="fa fa-gear fa-fw"></i>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $pdv['Pdv']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $pdv['Pdv']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $pdv['Pdv']['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $pdv['Pdv']['id']),array('class' => 'btn btn-mini'));?> </li>
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