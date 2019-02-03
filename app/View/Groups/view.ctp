<section class="content-header">
    <h1>
        <?php echo __('Groups'); ?>
        <small><?php echo __('View').' '.__('Group'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Groups'),'/Groups');
              $this->Html->addCrumb(__('View Group'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);
            
            
            ?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        	<a title='<?=__('Back')?>' data-original-title='<?=__('Back')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $group['Group']['id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $group['Group']['id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $group['Group']['id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false">Group</a></li>
                          <li class=""><a data-toggle="tab" href="#tab_2-2" aria-expanded="true">Users</a></li>
                          <li class="pull-left header"><i class="ion ion-clipboard"></i>Data</li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
                   
		<?php if($group['Group']['name']){?>
		<dt><?php echo __('Name'); ?></dt>
		<dd><?php echo h($group['Group']['name']); ?></dd>
		<?php }?>
		<?php if($group['Group']['alias']){?>
		<dt><?php echo __('Alias'); ?></dt>
		<dd><?php echo h($group['Group']['alias']); ?></dd>
		<?php }?>
		<?php if($group['Group']['created']){?>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($group['Group']['created']); ?></dd>
		<?php }?>
		<?php if($group['Group']['modified']){?>
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($group['Group']['modified']); ?></dd>
		<?php }?>
                </div>
            </div>
                        <div id="tab_2-2" class="tab-pane">
                <div class="related">
                    
                    
                    <?php if (!empty($group['User'])): ?>
                       <h3><?php echo __('Related Users'); ?></h3>
                       <div class="panel panel-default">
                            <div class="panel-heading" align="right">
                                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add')); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw"></i></button></a>                            </div>
                            <div style="margin: 20px">
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline table-responsive" role="grid">                 
                                    <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                           
                                                    <th><?php echo __('username'); ?></th>
                                                        <th><?php echo __('password'); ?></th>
                                                        <th><?php echo __('group_id'); ?></th>
                                                        <th><?php echo __('status'); ?></th>
                                                        <th><?php echo __('name'); ?></th>
                                                        <th><?php echo __('email'); ?></th>
                                                        <th><?php echo __('image'); ?></th>
                                                        <th class="actions col-xs-1"><?php echo __('active'); ?></th>
                                                        <th class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($group['User'] as $user): ?>
									<tr>
										<td><?php echo $user['username']; ?>&nbsp;</td>
										<td><?php echo $user['password']; ?>&nbsp;</td>
										<td><?php echo $user['group_id']; ?>&nbsp;</td>
										<td><?php echo $user['status']; ?>&nbsp;</td>
										<td><?php echo $user['name']; ?>&nbsp;</td>
										<td><?php echo $user['email']; ?>&nbsp;</td>
										<td><?php echo $user['image']; ?>&nbsp;</td>
										<td><?php if($user['active'] == 'S'){
                                                                  echo '<span  class="btn-sm bg-green pull-right">'.__('Active').'</span>';
                                                               }else{
                                                                  echo '<span  class="btn-sm bg-red pull-right">'.__('Inactive').'</span>';
                                                               } ?></td>
										<td class="actions">
											<div class="pull-right">
												<div class="btn-group">
													<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
														<i class="fa fa-gear fa-fw"></i>
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo $this->Html->url(array('controller' => 'users','action' => 'view', $user['id'])); ?>"><i class="fa fa-eye fa-fw"></i> View</a></li>
														<li><a href="<?php echo $this->Html->url(array('controller' => 'users','action' => 'edit', $user['id'])); ?>"><i class="fa fa-edit fa-fw"></i> Edit</a></li>
														<li><?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')). " Delete", array('controller' => 'users','action' => 'delete', $user['id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $user['id']),array('class' => 'btn btn-mini'));?> </li>
													</ul>
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
                                        </tbody>
                                    </table><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php endif; ?>


            </div>
        </div>
     </div>|

<script>
    $.extend( $.fn.dataTable.defaults, {
        "searching": false
    } );
    
    $('#dataTables-example').DataTable();
</script>