<section class="content-header">
    <h1>
        <?php echo __('Funcionarios P D Vs'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Funcionarios P D Vs'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div class="funcionariosPDVs index" style="margin: 20px" >
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
                    	<th><?php echo $this->Paginator->sort('Id',__('Id'),array('data-toggle'=>'tooltip','data-original-title'=>__('Id'),'title'=>__('Id'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Nome',__('Nome'),array('data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Endereco',__('Endereco'),array('data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Equipe',__('Equipe'),array('data-toggle'=>'tooltip','data-original-title'=>__('Equipe'),'title'=>__('Equipe'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Tipo',__('Tipo'),array('data-toggle'=>'tooltip','data-original-title'=>__('Tipo'),'title'=>__('Tipo'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Telefone',__('Telefone'),array('data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Email',__('Email'),array('data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Empresa',__('Empresa'),array('data-toggle'=>'tooltip','data-original-title'=>__('Empresa'),'title'=>__('Empresa'))); ?></th>
                            <th><?php echo $this->Paginator->sort('CPF',__('CPF'),array('data-toggle'=>'tooltip','data-original-title'=>__('CPF'),'title'=>__('CPF'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Cargo',__('Cargo'),array('data-toggle'=>'tooltip','data-original-title'=>__('Cargo'),'title'=>__('Cargo'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Removed',__('Removed'),array('data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Created',__('Created'),array('data-toggle'=>'tooltip','data-original-title'=>__('Created'),'title'=>__('Created'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Modified',__('Modified'),array('data-toggle'=>'tooltip','data-original-title'=>__('Modified'),'title'=>__('Modified'))); ?></th>
                            <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Funcionarios P D Vs', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                    	    					 <td><?php echo $this->Html->div('row',$this->Form->input('Id',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Id'),'title'=>__('Id'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Endereco',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Equipe',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Equipe'),'title'=>__('Equipe'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Tipo',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Tipo'),'title'=>__('Tipo'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Telefone',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Email',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Empresa',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Empresa'),'title'=>__('Empresa'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('CPF',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('CPF'),'title'=>__('CPF'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Cargo',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Cargo'),'title'=>__('Cargo'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Removed',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Created',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Created'),'title'=>__('Created'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Modified',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Modified'),'title'=>__('Modified'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
<td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Search'),'title'=>__('Search'))) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                		<?php foreach ($funcionariosPDVs as $funcionariosPDV): ?>
						<tr>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Id']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Nome']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Endereco']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Equipe']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Tipo']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Telefone']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Email']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Empresa']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['CPF']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Cargo']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Removed']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Created']); ?>&nbsp;</td>
						<td><?php echo h($funcionariosPDV['FuncionariosPDV']['Modified']); ?>&nbsp;</td>
							<td class="actions"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
								<div class="pull-right">
									<div class="btn-group">
										<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
											<i class="fa fa-gear fa-fw"></i>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $funcionariosPDV['FuncionariosPDV']['Id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $funcionariosPDV['FuncionariosPDV']['Id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $funcionariosPDV['FuncionariosPDV']['Id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $funcionariosPDV['FuncionariosPDV']['Id']),array('class' => 'btn btn-mini'));?> </li>
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