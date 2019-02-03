<section class="content-header">
    <h1>
        <?php echo __('Acao P D Vs'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acao P D Vs'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div class="acaoPDVs index" style="margin: 20px" >
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
                            <th><?php echo $this->Paginator->sort('AcaoPDVcol',__('AcaoPDVcol'),array('data-toggle'=>'tooltip','data-original-title'=>__('AcaoPDVcol'),'title'=>__('AcaoPDVcol'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Cliente',__('Cliente'),array('data-toggle'=>'tooltip','data-original-title'=>__('Cliente'),'title'=>__('Cliente'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Equipe',__('Equipe'),array('data-toggle'=>'tooltip','data-original-title'=>__('Equipe'),'title'=>__('Equipe'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Supervisor',__('Supervisor'),array('data-toggle'=>'tooltip','data-original-title'=>__('Supervisor'),'title'=>__('Supervisor'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Funcionarios',__('Funcionarios'),array('data-toggle'=>'tooltip','data-original-title'=>__('Funcionarios'),'title'=>__('Funcionarios'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Local',__('Local'),array('data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Latitude',__('Latitude'),array('data-toggle'=>'tooltip','data-original-title'=>__('Latitude'),'title'=>__('Latitude'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Longitude',__('Longitude'),array('data-toggle'=>'tooltip','data-original-title'=>__('Longitude'),'title'=>__('Longitude'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Empresa',__('Empresa'),array('data-toggle'=>'tooltip','data-original-title'=>__('Empresa'),'title'=>__('Empresa'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Inicio',__('Inicio'),array('data-toggle'=>'tooltip','data-original-title'=>__('Inicio'),'title'=>__('Inicio'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Termino',__('Termino'),array('data-toggle'=>'tooltip','data-original-title'=>__('Termino'),'title'=>__('Termino'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Fotos',__('Fotos'),array('data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Videos',__('Videos'),array('data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Removed',__('Removed'),array('data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Created',__('Created'),array('data-toggle'=>'tooltip','data-original-title'=>__('Created'),'title'=>__('Created'))); ?></th>
                            <th><?php echo $this->Paginator->sort('Modified',__('Modified'),array('data-toggle'=>'tooltip','data-original-title'=>__('Modified'),'title'=>__('Modified'))); ?></th>
                            <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Acao P D Vs', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                    	    					 <td><?php echo $this->Html->div('row',$this->Form->input('Id',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Id'),'title'=>__('Id'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('AcaoPDVcol',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('AcaoPDVcol'),'title'=>__('AcaoPDVcol'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Cliente',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Cliente'),'title'=>__('Cliente'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Equipe',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Equipe'),'title'=>__('Equipe'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Supervisor',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Supervisor'),'title'=>__('Supervisor'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Funcionarios',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Funcionarios'),'title'=>__('Funcionarios'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Local',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Latitude',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Latitude'),'title'=>__('Latitude'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Longitude',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Longitude'),'title'=>__('Longitude'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Empresa',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Empresa'),'title'=>__('Empresa'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Inicio',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Inicio'),'title'=>__('Inicio'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Termino',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Termino'),'title'=>__('Termino'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Fotos',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Videos',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Removed',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Created',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Created'),'title'=>__('Created'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td><?php echo $this->Html->div('row',$this->Form->input('Modified',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Modified'),'title'=>__('Modified'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
<td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Search'),'title'=>__('Search'))) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                		<?php foreach ($acaoPDVs as $acaoPDV): ?>
						<tr>
						<td><?php echo h($acaoPDV['AcaoPDV']['Id']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Nome']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['AcaoPDVcol']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Cliente']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Equipe']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Supervisor']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Funcionarios']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Local']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Latitude']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Longitude']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Empresa']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Inicio']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Termino']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Fotos']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Videos']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Removed']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Created']); ?>&nbsp;</td>
						<td><?php echo h($acaoPDV['AcaoPDV']['Modified']); ?>&nbsp;</td>
							<td class="actions"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
								<div class="pull-right">
									<div class="btn-group">
										<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
											<i class="fa fa-gear fa-fw"></i>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $acaoPDV['AcaoPDV']['Id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $acaoPDV['AcaoPDV']['Id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $acaoPDV['AcaoPDV']['Id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $acaoPDV['AcaoPDV']['Id']),array('class' => 'btn btn-mini'));?> </li>
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