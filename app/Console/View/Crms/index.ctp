<section class="content-header">
    <h1>
        <?php echo __('Crms'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Crms'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div class="crms index" style="margin: 20px" >
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
                            <th><?php echo $this->Paginator->sort('Nome',__('Nome'),array('data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Endereco',__('Endereco'),array('data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Email',__('Email'),array('data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Telefone',__('Telefone'),array('data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Quantidade',__('Quantidade'),array('data-toggle'=>'tooltip','data-original-title'=>__('Quantidade'),'title'=>__('Quantidade'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Cupom',__('Cupom'),array('data-toggle'=>'tooltip','data-original-title'=>__('Cupom'),'title'=>__('Cupom'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Valor',__('Valor'),array('data-toggle'=>'tooltip','data-original-title'=>__('Valor'),'title'=>__('Valor'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Loja',__('Loja'),array('data-toggle'=>'tooltip','data-original-title'=>__('Loja'),'title'=>__('Loja'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Nascimento',__('Nascimento'),array('data-toggle'=>'tooltip','data-original-title'=>__('Nascimento'),'title'=>__('Nascimento'))); ?></th>
                            <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Crms', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                    	    					 <td><?php echo $this->Html->div('row',$this->Form->input('IdAcao',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('IdAcao'),'title'=>__('IdAcao'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Endereco',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Email',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Telefone',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Quantidade',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Quantidade'),'title'=>__('Quantidade'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Cupom',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Cupom'),'title'=>__('Cupom'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Valor',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Valor'),'title'=>__('Valor'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Loja',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Loja'),'title'=>__('Loja'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Nascimento',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Nascimento'),'title'=>__('Nascimento'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
<td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Search'),'title'=>__('Search'))) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                		<?php foreach ($crms as $crm): ?>
						<tr>
						<td><?php echo h($crm['Crm']['IdAcao']); ?>&nbsp;</td>
						<td><?php echo h($crm['Crm']['Nome']); ?>&nbsp;</td>
						<td><?php echo h($crm['Crm']['Endereco']); ?>&nbsp;</td>
						<td><?php echo h($crm['Crm']['Email']); ?>&nbsp;</td>
						<td><?php echo h($crm['Crm']['Telefone']); ?>&nbsp;</td>
						<td><?php echo h($crm['Crm']['Quantidade']); ?>&nbsp;</td>
						<td><?php echo h($crm['Crm']['Cupom']); ?>&nbsp;</td>
						<td><?php echo h($crm['Crm']['Valor']); ?>&nbsp;</td>
						<td><?php echo h($crm['Crm']['Loja']); ?>&nbsp;</td>
						<td><?php echo h($crm['Crm']['Nascimento']); ?>&nbsp;</td>
							<td class="actions"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
								<div class="pull-right">
									<div class="btn-group">
										<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
											<i class="fa fa-gear fa-fw"></i>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $crm['Crm']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $crm['Crm']['id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $crm['Crm']['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $crm['Crm']['id']),array('class' => 'btn btn-mini'));?> </li>
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