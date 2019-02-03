  <?php echo $this->Html->css('lightbox'); ?>
  <?php echo $this->Html->script('lightbox.min'); ?>

<section class="content-header">
    <h1>
        <?php echo __('Clientes'); ?>
        <small><?php echo __('View').' '.__('Cliente'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Clientes'),'/Clientes');
              $this->Html->addCrumb(__('View').' '.__('Cliente'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $cliente['Cliente']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $cliente['Cliente']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $cliente['Cliente']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Cliente")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
		<?php if($cliente['Cliente']['CNPJ']){?>
		<dt><?php echo __('CNPJ'); ?></dt>
		<dd><?php echo h($cliente['Cliente']['CNPJ']); ?></dd>
		<?php }?>
		<?php if($cliente['Cliente']['Nome']){?>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($cliente['Cliente']['Nome']); ?></dd>
		<?php }?>
		<?php if($cliente['Cliente']['Responsavel']){?>
		<dt><?php echo __('Responsavel'); ?></dt>
		<dd><?php echo h($cliente['Cliente']['Responsavel']); ?></dd>
		<?php }?>
		<?php if($cliente['Cliente']['Endereco']){?>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd><?php echo h($cliente['Cliente']['Endereco']); ?></dd>
		<?php }?>
	  <dt><?php echo ('Email'); ?></dt>
    <?php
       $EmailsArray = $this->requestAction('/ClienteEmails/retornaClientes/'.$cliente['Cliente']['Id']);
       $emails = '';
           foreach ($EmailsArray as $email) {
             $emails = $emails . $email['ClienteEmail']['Email']."\n";
           }
    ?>

<dd><?php echo nl2br($emails); ?></dd>
    <?php if($cliente['Cliente']['Telefone']){?>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd><?php echo h($cliente['Cliente']['Telefone']); ?></dd>
		<?php }?>
		<?php if($cliente['Cliente']['Bairro']){?>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd><?php echo h($cliente['Cliente']['Bairro']); ?></dd>
		<?php }?>
		<?php if($cliente['Cliente']['Cep']){?>
		<dt><?php echo __('Cep'); ?></dt>
		<dd><?php echo h($cliente['Cliente']['Cep']); ?></dd>
		<?php }?>
		<?php if($cliente['Cliente']['Cidade']){?>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd><?php echo h($cliente['Cliente']['Cidade']); ?></dd>
		<?php }?>
		<?php if($cliente['Cliente']['Item_Novo']){?>
		<dt><?php echo __('Item Novo'); ?></dt>
		<dd><?php echo h($cliente['Cliente']['Item_Novo']); ?></dd>
		<?php }?>
		
		<dt><?php echo "Logomarca" ?> </dt>
       <?php
                             $dirFotos = new Folder(WWW_ROOT . 'logomarcas'.DS.$cliente['Cliente']['Nome']);
                             $fotosPasta ='/logomarcas/'.$cliente['Cliente']['Nome'];
                             $fotos = $dirFotos->find('.*\.(png|jpg|jpeg)', true); ?>           
                                <td> 
                                    <?php    foreach ($fotos as $foto ): ?>
                                  
                                   <?php   $caminhoFoto = $fotosPasta.'/'.$foto; ?>
                                   <?php   $caminhoFotoPopUp =  '/logomarcas/'.$cliente['Cliente']['Nome'].'/'.$foto; ?>
                                    <?php echo $this->Html->link($this->Html->Image($caminhoFoto,array('class'=>'class_img', 'height'=>'150', 'width'=>'150')),
                                    $caminhoFotoPopUp, 
                                    array('escapeTitle' => false, 'title' => $cliente['Cliente']['Nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url',
                                    'showImageNumberLabel'  => false)); ?>

                                <?php endforeach; ?>
                                </td>


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