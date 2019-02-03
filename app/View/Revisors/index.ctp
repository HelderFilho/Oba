<section class="content-header">
    <h1>
        <?php echo __('Revisores'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Revisores'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div class="revisors index" style="margin: 20px" >
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
                              <th style= text-align:center><?php echo $this->Paginator->sort('Nome',__('Nome'),array('data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Caracteristicas',__('Características'),array('data-toggle'=>'tooltip','data-original-title'=>__('Caracteristicas'),'title'=>__('Caracteristicas'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Endereco',__('Endereco'),array('data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Equipe',__('Equipe'),array('data-toggle'=>'tooltip','data-original-title'=>__('Equipe'),'title'=>__('Equipe'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Email',__('Email'),array('data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Telefone',__('Telefone'),array('data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('CPF',__('CPF'),array('data-toggle'=>'tooltip','data-original-title'=>__('CPF'),'title'=>__('CPF'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Cargo',__('Cargo'),array('data-toggle'=>'tooltip','data-original-title'=>__('Cargo'),'title'=>__('Cargo'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Item_Novo',__('Item_Novo'),array('data-toggle'=>'tooltip','data-original-title'=>__('Item_Novo'),'title'=>__('Item_Novo'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Data_Nascimento',__('Data_Nascimento'),array('data-toggle'=>'tooltip','data-original-title'=>__('Data_Nascimento'),'title'=>__('Data_Nascimento'))); ?></th>
                            <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Revisors', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                    <td><?php echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Caracteristicas',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Caracteristicas'),'title'=>__('Caracteristicas'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Endereco',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Equipe',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Equipe'),'title'=>__('Equipe'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Email',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Telefone',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('CPF',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('CPF'),'title'=>__('CPF'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Cargo',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Cargo'),'title'=>__('Cargo'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Item_Novo',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Item_Novo'),'title'=>__('Item_Novo'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Data_Nascimento',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Data_Nascimento'),'title'=>__('Data_Nascimento'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>

                  <td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Search'),'title'=>__('Search'))) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                		<?php foreach ($revisors as $revisor): ?>
						<tr>
						<td><?php echo h($revisor['Revisor']['Nome']); ?>&nbsp;</td>
						<td><?php echo h($revisor['Revisor']['Caracteristicas']); ?>&nbsp;</td>
						<td><?php echo h($revisor['Revisor']['Endereco']); ?>&nbsp;</td>
						<td><?php echo h($revisor['Revisor']['Equipe']); ?>&nbsp;</td>
						<td><?php echo h($revisor['Revisor']['Email']); ?>&nbsp;</td>
						<td><?php echo h($revisor['Revisor']['Telefone']); ?>&nbsp;</td>
						<td><?php echo h($revisor['Revisor']['CPF']); ?>&nbsp;</td>
						<td><?php echo h($revisor['Revisor']['Cargo']); ?>&nbsp;</td>
						<td><?php echo h($revisor['Revisor']['Item_Novo']); ?>&nbsp;</td>
						<td><?php echo h($revisor['Revisor']['Data_Nascimento']); ?>&nbsp;</td>
							<td class="actions"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
								<div class="pull-right">
									<div class="btn-group">
										<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
											<i class="fa fa-gear fa-fw"></i>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $revisor['Revisor']['Id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $revisor['Revisor']['Id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $revisor['Revisor']['Id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $revisor['Revisor']['Id']),array('class' => 'btn btn-mini'));?> </li>
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