<section class="content-header">
    <h1>
        <?php echo __('Equipes'); ?>
        <small><?php echo __('View').' '.__('Equipe'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Equipes'),'/Equipes');
              $this->Html->addCrumb(__('View').' '.__('Equipe'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $equipe['Equipe']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $equipe['Equipe']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $equipe['Equipe']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Equipe")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
	
    	<?php if($equipe['Equipe']['Nome']){?>
		<dt><?php echo __('Nome da Equipe'); ?></dt>
		<dd><?php echo h($equipe['Equipe']['Nome']); ?></dd>    
		<?php }?>
    
    <?php if($equipe['Equipe']['Tipo_Equipe']){?>
        <dt><?php echo __('Tipo da Equipe'); ?></dt>
        <dd><?php echo h($equipe['Equipe']['Tipo_Equipe']); ?></dd>    
        <?php }?>
    
    <?php if($equipe['Equipe']['Item_Novo']){?>
        <dt><?php echo __('Item novo'); ?></dt>
        <dd><?php echo h($equipe['Equipe']['Item_Novo']); ?></dd>    
        <?php }?>
    


        <?php $Equipes = $this->requestAction('/Funcionarios/todosFuncionarios'); ?>
        <dt><?php echo __('Integrantes'); ?></dt>           

        <?php foreach ($Equipes as $Equipe): ?>
        <?php if ($Equipe['Funcionario']['Equipe']==$equipe['Equipe']['Nome']){ ?>

              <dd><?php echo h($Equipe['Funcionario']['Nome']); ?></dd>  

             <?php }?>
           <?php endforeach; ?>



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