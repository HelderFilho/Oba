  <?php echo $this->Html->css('lightbox'); ?>
  <?php echo $this->Html->script('lightbox.min'); ?>

<section class="content-header">
    <h1>
        <?php echo __('Clientes'); ?>
        <small><?php echo __('All Registered'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Clientes'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div class="clientes index" style="margin: 20px" >
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
                            <th style= text-align:center><?php echo $this->Paginator->sort('CNPJ',__('CNPJ'),array('data-toggle'=>'tooltip','data-original-title'=>__('CNPJ'),'title'=>__('CNPJ'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Nome',__('Nome'),array('data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Responsavel',__('Responsavel'),array('data-toggle'=>'tooltip','data-original-title'=>__('Responsavel'),'title'=>__('Responsavel'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Endereco',__('Endereco'),array('data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Email',__('Email'),array('data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Telefone',__('Telefone'),array('data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Bairro',__('Bairro'),array('data-toggle'=>'tooltip','data-original-title'=>__('Bairro'),'title'=>__('Bairro'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Cep',__('Cep'),array('data-toggle'=>'tooltip','data-original-title'=>__('Cep'),'title'=>__('Cep'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Cidade',__('Cidade'),array('data-toggle'=>'tooltip','data-original-title'=>__('Cidade'),'title'=>__('Cidade'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Item_Novo',__('Item Novo'),array('data-toggle'=>'tooltip','data-original-title'=>__('Item Novo'),'title'=>__('Item Novo'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Logomarca',__('Logomarca'),array('data-toggle'=>'tooltip','data-original-title'=>__('Item Novo'),'title'=>__('Item Novo'))); ?></th>

                                 <th style= text-align:center , class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                       </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $base_url = array('controller' => 'Clientes', 'action' => 'index');?>
                            <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                     <td><?php echo $this->Html->div('row',$this->Form->input('CNPJ',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('CNPJ'),'title'=>__('CNPJ'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Responsavel',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Responsavel'),'title'=>__('Responsavel'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Endereco',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Email',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Telefone',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Bairro',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Bairro'),'title'=>__('Bairro'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Cep',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Cep'),'title'=>__('Cep'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Cidade',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Cidade'),'title'=>__('Cidade'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Item Novo',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Item Novo'),'title'=>__('Item Novo'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Logomarca',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Logomarca'),'title'=>__('Item Novo'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                    
                    <td><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Search'),'title'=>__('Search'))) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                        <?php foreach ($clientes as $cliente): ?>
                        <tr>
                        <td><?php echo h($cliente['Cliente']['CNPJ']); ?>&nbsp;</td>
                        <td><?php echo h($cliente['Cliente']['Nome']); ?>&nbsp;</td>
                        <td><?php echo h($cliente['Cliente']['Responsavel']); ?>&nbsp;</td>
                        <td><?php echo h($cliente['Cliente']['Endereco']); ?>&nbsp;</td>
                    
                        <?php
                        $EmailsArray = $this->requestAction('/ClienteEmails/retornaClientes/'.$cliente['Cliente']['Id']);
                        $emails = '';
                            foreach ($EmailsArray as $email) {
                                $emails = $emails . $email['ClienteEmail']['Email']."\n";
                                # code...
                            }

                        ?>
                        <td><?php echo nl2br($emails) ?></td>


                        <td><?php echo h($cliente['Cliente']['Telefone']); ?>&nbsp;</td>
                        <td><?php echo h($cliente['Cliente']['Bairro']); ?>&nbsp;</td>
                        <td><?php echo h($cliente['Cliente']['Cep']); ?>&nbsp;</td>
                        <td><?php echo h($cliente['Cliente']['Cidade']); ?>&nbsp;</td>
                        <td><?php echo h($cliente['Cliente']['Item_Novo']); ?>&nbsp;</td>


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
                        





                            <td class="actions"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                                            <i class="fa fa-gear fa-fw"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            
                                            <li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $cliente['Cliente']['Id'])), array('escape' => false)); ?></li>
                                            <li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $cliente['Cliente']['Id'])), array('escape' => false)); ?></li>

                                           <li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $cliente['Cliente']['Id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $cliente['Cliente']['Id']),array('class' => 'btn btn-mini'));?> </li>
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




<script type="text/javascript">
        function PDF(){

        }



</script>