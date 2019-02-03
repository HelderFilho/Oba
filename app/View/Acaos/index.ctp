
  <link href="https://vjs.zencdn.net/7.1.0/video-js.css" rel="stylesheet">
  <?php echo $this->Html->css('lightbox'); ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" type="text/javascript"></script>  
  <?php echo $this->Html->script('lightbox.min'); ?>
  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>

<style type="text/css">

 .tamanho{
  width: 200px;
  align-items: flex-start;
 }
 .tamanhoBarra{
  width: 150px;
 }

 .Encerrado{
  background-color: cadetblue;
color: white;
text-align: center;
 }
.Andamento{
  text-align: center;
}

</style>



<section class="content-header">


    <h1>
        <?php echo __('Ações'); ?>
        <small><?php echo __('Todas as Ações'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acaos'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div style="margin: 20px " >
    <div class="panel panel-default ">
        <div class="panel-heading " align="right">
            <section class=" content-header">
                <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', '', array('class' => 'fa fa-refresh fa-fw')), array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Refresh'),'title'=>__('Refresh'),'escape' => false)), $this->Html->url(), array('escape' => false)); ?>
                <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', '', array('class' => 'fa fa-plus fa-fw')), array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Add'),'title'=>__('Add'),'escape' => false)), $this->Html->url(array('action' => 'add')), array('escape' => false)); ?>
            </section>
        </div>
        <div class="table-responsive ">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid" style="margin: 20px">                 
                <table  class="table table-striped table-bordered table-hover " id="dataTables-example">
                	<thead>
                	   <tr>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Nome',__('Nome'),array('align'=>'center','data-toggle'=>'tooltip', 'data-original-title'=>__('Nome'),'title'=>__('Nome'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Cliente',__('Cliente'),array('align'=>'center','data-toggle'=>'tooltip', 'data-original-title'=>__('Cliente'),'title'=>__('Cliente'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Setor',__('Setor'),array('align'=>'center','data-toggle'=>'tooltip', 'data-original-title'=>__('Setor'),'title'=>__('Setor'))); ?></th>
                           
                            <th style= text-align:center><?php echo $this->Paginator->sort('Local',__('Local'),array('data-toggle'=>'tooltip', 'data-original-title'=>__('Local'),'title'=>__('Local'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Supervisor',__('Supervisor'),array('data-toggle'=>'tooltip', 'data-original-title'=>__('Supervisor'),'title'=>__('Supervisor'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Inicio',__('Inicio'),array('data-toggle'=>'tooltip', 'data-original-title'=>__('Inicio'),'title'=>__('Inicio'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Termino',__('Termino'),array('data-toggle'=>'tooltip', 'data-original-title'=>__('Termino'),'title'=>__('Termino'))); ?></th>
                          <!-- 
                            <th style= text-align:center><?php echo $this->Paginator->sort('Fotos',__('Fotos'),array('data-toggle'=>'tooltip', 'data-original-title'=>__('Fotos'),'title'=>__('Fotos'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Videos',__('Videos'),array('data-toggle'=>'tooltip', 'data-original-title'=>__('Videos'),'title'=>__('Videos'))); ?></th>
                            -->
                            <th style= text-align:center><?php echo __('Actions'); ?></th>
                	   </tr>
                	</thead>
                	<tbody>
                	    <tr>
                    	    <?php $base_url = array('controller' => 'Acaos', 'action' => 'index');?>
                    	    <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
					 <td style= text-align:center><?php echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					<td ><?php echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Cliente'),'title'=>__('Cliente'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
          <td ><?php echo $this->Html->div('row',$this->Form->input('Setor',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Setor'),'title'=>__('Setor'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
          <td ><?php echo $this->Html->div('row',$this->Form->input('Local',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
          <td ><?php echo $this->Html->div('row',$this->Form->input('Supervisor',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Supervisor'),'title'=>__('Supervisor'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>

           <td ><?php echo $this->Html->div('row',$this->Form->input('Inicio',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Inicio'),'title'=>__('Inicio'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td ><?php echo $this->Html->div('row',$this->Form->input('Termino',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Termino'),'title'=>__('Termino'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <!--
           <td ><?php echo $this->Html->div('row',$this->Form->input('Fotos',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
					 <td ><?php echo $this->Html->div('row',$this->Form->input('Videos',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
           -->
           <td style= text-align:center><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Search'),'title'=>__('Search'))) ?></td>
                            <?php echo $this->Form->end();?>

                        </tr>












  <?php foreach ($acaos as $acao): ?>




       <tr>
			
      <?php if ($acao['Acao']['Encerrado']=='S'){?>
         <td class="Encerrado"><?php echo h($acao['Acao']['Nome']); ?>&nbsp;</td>
      <?php }else{ ?>
          <td class="Andamento"><?php echo h($acao['Acao']['Nome']); ?>&nbsp;</td>
      <?php } ?>



           <?php $ClientesArray = $this->requestAction('/AcaoClientes/retornaClientes/'.$acao['Acao']['Id']);
             $clientes = '';
             foreach ($ClientesArray as $cliente) {
               if (!empty($cliente['AcaoCliente']['IdCliente'])){
                 $ThisCliente = $this->requestAction('/Clientes/nomeCliente/'. $cliente['AcaoCliente']['IdCliente']);
                 $clientes = $clientes . $ThisCliente['Cliente']['Nome'] . "\n";
               }
             }
           ?>      
                
             <?php if ($acao['Acao']['Encerrado']=='S'){?>
              <td class="Encerrado"><?php echo nl2br($clientes); ?>&nbsp;</td>
             <?php }else{ ?>
               <td class="Andamento"><?php echo nl2br($clientes); ?>&nbsp;</td>
            <?php } ?>



           <?php $SetoresArray = $this->requestAction('/AcaoClientes/retornaSetores/'.$acao['Acao']['Id']);
             $setores='';
               foreach ($SetoresArray as $setor) {
                 $setores = $setores . $setor['AcaoCliente']['Setor'] . "\n";
               }
           ?>  
           
           <?php if ($acao['Acao']['Encerrado']=='S'){?>
              <td class="Encerrado"><?php echo nl2br($setores); ?>&nbsp;</td>
             <?php }else{ ?>
               <td class="Andamento"><?php echo nl2br($setores); ?>&nbsp;</td>
            <?php } ?>          



             <?php $locaisArray = $this->requestAction('/AcaoSupervisorLocals/retornaLocais/'.$acao['Acao']['Id']);
               $locais='';
                 foreach ($locaisArray as $local) {
                   $locais = $locais . $local['AcaoSupervisorLocal']['Local'] . "\n";
                }
             ?>  

          <?php if ($acao['Acao']['Encerrado']=='S'){?>
              <td class="Encerrado"><?php echo nl2br($locais); ?>&nbsp;</td>
             <?php }else{ ?>
               <td class="Andamento"><?php echo nl2br($locais); ?>&nbsp;</td>
            <?php } ?>
            
             <?php $SupervisoresArray = $this->requestAction('/AcaoSupervisorLocals/retornaSupervisores/'.$acao['Acao']['Id']);
               $supervisores = '';
                 foreach ($SupervisoresArray as $supervisor) {
                   $teste = $this->requestAction('/Funcionarios/nomeSupervisor/'. $supervisor['AcaoSupervisorLocal']['IdSupervisor']);
                   if (!empty($teste)){
                     $supervisores = $supervisores . $teste['Funcionario']['Nome'] . "\n";
                   }
                 }
             ?>      

            <?php if ($acao['Acao']['Encerrado']=='S'){?>
              <td class="Encerrado"><?php echo nl2br($supervisores); ?>&nbsp;</td>
             <?php }else{ ?>
               <td class="Andamento"><?php echo nl2br($supervisores); ?>&nbsp;</td>
            <?php } ?>


            <?php if ($acao['Acao']['Encerrado']=='S'){?>
              <td class="Encerrado"><?php  echo h($acao['Acao']['Inicio']);  ?>&nbsp;</td>
             <?php }else{ ?>
               <td class="Andamento"><?php  echo h($acao['Acao']['Inicio']);  ?>&nbsp;</td>
            <?php } ?>

            <?php if ($acao['Acao']['Encerrado']=='S'){?>
              <td class="Encerrado"><?php  echo h($acao['Acao']['Termino']);  ?>&nbsp;</td>
             <?php }else{ ?>
               <td class="Andamento"><?php  echo h($acao['Acao']['Termino']);  ?>&nbsp;</td>
            <?php } ?>




         <!--


           <?php $dirFotos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['Acao']['Id']); ?>
           <?php $fotosPasta ='./uploads/'.$acao['Acao']['Id']; ?>
           <?php $fotos = $dirFotos->find('.*\.(png|jpg|jpeg)', true); ?>           
             <td> 
               <?php $contFotos = 1; ?>
               <?php    foreach ($fotos as $foto ): ?>
               <?php if ($contFotos>1){
                break;
                }?>
                 <?php   $caminhoFoto = $fotosPasta.'/'.$foto; ?>
                 <?php   $caminhoFotoPopUp = '/img/uploads/'.$acao['Acao']['Id'].'/'.$foto; ?>
                 <?php echo $this->Html->link($this->Html->Image($caminhoFoto,array('class'=>'class_img', 'height'=>'150', 'width'=>'150')),
                 $caminhoFotoPopUp, 
                 array('escapeTitle' => false, 'title' => $acao['Acao']['Id'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url',
                'showImageNumberLabel'  => false)
                   ); ?>

                                <?php $contFotos = $contFotos +1; ?> 
                                <?php endforeach; ?>
                                </td>
                        
                             <?php $dirVideos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['Acao']['Id']); ?>
                             <?php $VideosPasta ='./uploads/'.$acao['Acao']['Id']; ?>
                             <?php $videos = $dirVideos->find('.*\.(mp4|avi)', true); ?>           
                                <td> 
                                    <?php $contVideos = 1?>
                                    <?php    foreach ($videos as $video ): ?>
                                    <?php if ($contVideos>1){
                                        break;
                                          }?>
                                  <video id="my-video" class="video-js" controls preload="auto" width="160" height="150" data-setup="{}">
                                  <?php   $mostrarVideo = 'img/'.$VideosPasta.'/'.$video; ?>
                                  <source src="<?=$mostrarVideo;?>" type='video/mp4'>
                                  </video>
                                
                                  <?php $contVideos = $contVideos +1; ?> 
                                  <?php endforeach; ?>
                                </td>
-->

            <?php if ($acao['Acao']['Encerrado']=='S'){?>
                  <td class="actions Encerrado"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
             <?php }else{ ?>
                  <td class="actions"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
            <?php } ?>



                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="true">
                                            <i class="fa fa-gear fa-fw"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">

											<li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $acao['Acao']['Id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $acao['Acao']['Id'])), array('escape' => false)); ?></li>
											<li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $acao['Acao']['Id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $acao['Acao']['Id']),array('class' => 'btn btn-mini'));?> </li>
                      <li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Encerrar'), array('class' => 'fa fa-check' )), array('action' => 'encerrar', $acao['Acao']['Id']),array('escape'=>false),__('Você tem certeza que quer encerrar a ação: %s?',$acao['Acao']['Nome']),array('class' => 'btn btn-mini'));?> </li>
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
                <div class="box-footer clearfix ">
                    <ul class="pagination pagination-sm no-margin pull-right ">
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



function mostrar(){
  document.getElementById("teste").text = "foi";
}


</script>