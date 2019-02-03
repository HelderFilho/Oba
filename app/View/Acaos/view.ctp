  <style type="text/css">
    .fonte{
      font-weight: bold;
    }
    .relatorio{
      margin-top: 15px;
color: white;
background-color: orange;
      margin-bottom: 15px;
      font-weight: bold;
  padding: 8px;
    }
  </style>

  <link href="https://vjs.zencdn.net/7.1.0/video-js.css" rel="stylesheet">
  <?php echo $this->Html->css('lightbox'); ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" type="text/javascript"></script>  
  <?php echo $this->Html->script('lightbox.min'); ?>
  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>



<section class="content-header">
    <h1>
        <?php echo __('Acaos'); ?>
        <small><?php echo __('View').' '.__('Acao'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acaos'),'/Acaos');
              $this->Html->addCrumb(__('View').' '.__('Acao'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="panel panel-default" style="margin: 20px">
    <div class="panel-heading" align="right">
        <section class="content-header">
        <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
        	<a title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $acao['Acao']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $acao['Acao']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $acao['Acao']['Id'])
                                            );?>
        </section>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a data-toggle="tab" href="#tab_1-1" aria-expanded="false"><?=__("Acao")?></a></li>
                    <li class="pull-left header"><i class="ion ion-clipboard"></i><?=__("Data")?></li>
        </ul>
        <div class="tab-content">
          <div id="tab_1-1" class="tab-pane active">
                <div style="margin: 20px">
			<?php if($acao['Acao']['Nome']){?>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($acao['Acao']['Nome']); ?></dd>
		<?php }?>
    <dt><?php echo __('Cliente'); ?></dt>
    <?php $ClientesArray = $this->requestAction('/AcaoClientes/retornaClientes/'.$acao['Acao']['Id']);
              $clientes = '';
              foreach ($ClientesArray as $cliente) {
                $ThisCliente = $this->requestAction('/Clientes/nomeCliente/'. $cliente['AcaoCliente']['IdCliente']);
                $clientes = $clientes . $ThisCliente['Cliente']['Nome'] . "\n";
                # code...
              }
            ?>    
    <dd><?php echo nl2br($clientes); ?> </dd>        

<dt><?php echo __('Setores'); ?></dt> 
    <?php $SetoresArray = $this->requestAction('/AcaoClientes/retornaSetores/'.$acao['Acao']['Id']);
                $setores='';
                foreach ($SetoresArray as $setor) {
                  # code...
                    $setores = $setores . $setor['AcaoCliente']['Setor'] . "\n";

                }?>  
          <dd> <?php echo nl2br($setores); ?> </dd>

		<dt><?php echo __('Local'); ?></dt>
          <?php $locaisArray = $this->requestAction('/AcaoSupervisorLocals/retornaLocais/'.$acao['Acao']['Id']);
                $locais='';
                foreach ($locaisArray as $local) {
                  # code...
                    $locais = $locais . $local['AcaoSupervisorLocal']['Local'] . "\n";

                }?>
    <td><?php echo nl2br($locais); ?></td>
    <dt><?php echo __('Supervisor'); ?></dt>
    <?php $SupervisoresArray = $this->requestAction('/AcaoSupervisorLocals/retornaSupervisores/'.$acao['Acao']['Id']);
              $supervisores = '';
              foreach ($SupervisoresArray as $supervisor) {
                $teste = $this->requestAction('/Funcionarios/nomeSupervisor/'. $supervisor['AcaoSupervisorLocal']['IdSupervisor']);
                 if (!empty($teste)){
                    $supervisores = $supervisores . $teste['Funcionario']['Nome'] . "\n";
                  
                  }


                # code...
              }
            ?>        
    <dd><?php echo nl2br($supervisores); ?> </dd>


		<?php if($acao['Acao']['Inicio']){?>
		<dt><?php echo __('Inicio'); ?></dt>
		<dd><?php echo h($acao['Acao']['Inicio']); ?></dd>
		<?php }?>
		<?php if($acao['Acao']['Termino']){?>
		<dt><?php echo __('Termino'); ?></dt>
		<dd><?php echo h($acao['Acao']['Termino']); ?></dd>
		<?php }?>
    
<?php if ($acao['Acao']['CRM']=='Sim'){ ?>
    <dt> <?php echo __('CRM'); ?></dt>
    <?php $cadastrosCRM = $this->requestAction('Crms/retornaTodosCrm/' . $acao['Acao']['Id']); ?>
    <?php foreach ($cadastrosCRM as $crm) { ?>
      <table>
        <tr>
          <td> <?php echo "<strong>Nome: </strong>" . $crm['Crm']['Nome']  . "<strong> Email: </strong>" . $crm['Crm']['Endereco'] . "<strong> Telefone: </strong>" . $crm['Crm']['Telefone'] . "<strong> Email: </strong>" . $crm['Crm']['Email'] . "<strong> Quantidade entregue: </strong>" . $crm['Crm']['Quantidade']  . "<strong> Número do cupom: </strong>" . $crm['Crm']['Cupom'] . "<strong> Valor gasto: </strong>" . $crm['Crm']['Valor'] . "<strong> Loja: </strong>" . $crm['Crm']['Loja'] .  "<strong> Nascimento: </strong>" . $crm['Crm']['Nascimento']; ?> </td>
          
        </tr>
      </table>


   <?php } ?>
  <?php } ?>
		 		<dt><?php echo __('Fotos'); ?></dt>

		     <?php $dirFotos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['Acao']['Id']); ?>
                             <?php $fotosPasta ='./uploads/'.$acao['Acao']['Id']; ?>
                             <?php $fotos = $dirFotos->find('.*\.(png|jpg|jpeg)', true); ?>           
                              
                                   <?php    foreach ($fotos as $foto ): ?>
                                   <?php   $caminhoFoto = $fotosPasta.'/'.$foto; ?>
                                   <?php   $caminhoFotoPopUp = '/img/uploads/'.$acao['Acao']['Id'].'/'.$foto; ?>
                                     
                                 <td>  <?php echo $this->Html->link($this->Html->Image($caminhoFoto,array('class'=>'class_img', 'height'=>'300', 'width'=>'420')),
                                    
                                  $caminhoFotoPopUp, 
                                    array('escapeTitle' => false, 'title' => $acao['Acao']['Id'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url',
                                    'showImageNumberLabel'  => 'false')); ?></td>
        <li> <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', 'Apagar Foto', array('class' => 'relatorio')), array('class' => 'relatorio','data-toggle'=>'tooltip','data-original-title'=>__('Apagar Foto'),'title'=>__('Aapagar Foto'),'escape' => false)), $this->Html->url(array('action' => 'ApagarFoto', $acao['Acao']['Id'], $foto)), array('escape' => false),__('Você tem certeza que quer apagar esta foto?')); ?> </li>
    
                              
    				               <?php endforeach; ?>

    
		<dt><?php echo __('Videos'); ?></dt>

	   <?php $dirVideos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['Acao']['Id']); ?>
                             <?php $VideosPasta ='./uploads/'.$acao['Acao']['Id']; ?>
                             <?php $videos = $dirVideos->find('.*\.mp4', true); ?>           
                                  <?php    foreach ($videos as $video ): ?>
                                 <td> 
                                 
                                  <video id="my-video" class="video-js" controls preload="auto" width="640" height="480" data-setup="{}">
                                  <?php   $mostrarVideo = '/img/'.$VideosPasta.'/'.$video; ?>
                                   <source src="<?=$mostrarVideo;?>" type='video/mp4'>
                                </video>
                                 <script src="https://vjs.zencdn.net/7.1.0/video.js"></script>
                                  <?php echo '<br>' ?>
                                </td>
            <li> <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', 'Apagar Video', array('class' => 'relatorio')), array('class' => 'relatorio','data-toggle'=>'tooltip','data-original-title'=>__('Apagar Foto'),'title'=>__('Aapagar Foto'),'escape' => false)), $this->Html->url(array('action' => 'ApagarFoto', $acao['Acao']['Id'], $video)), array('escape' => false),__('Você tem certeza que quer apagar este video?')); ?> </li>

                                   <?php endforeach; ?>
                                
                          
		


	            </div>
            </div>
                        </div>
        </div>
     </div>

<script>
    $.extend( $.fn.dataTable.defaults, {
        "searching": false
    } );
    
    $('#dataTables-example').DataTable();
</script>