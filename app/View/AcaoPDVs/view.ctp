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
        	<a title='<?=__('Edit')?>' data-original-title='<?=__('Edit')?>' data-toggle='tooltip' href="<?php echo $this->Html->url(array('action' => 'edit', $acao['AcaoPDV']['Id'])); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-edit fa-fw"></i></button></a>
        	<?php echo $this->Form->postLink('<button title='.__('Delete').' data-original-title='.__('Delete').' data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-trash-o fa-fw"></i></button>',
                                                array('action' => 'delete',  $acao['AcaoPDV']['Id']),
                                                array('escape'=>false),
                                                __('Are you sure you want to delete # %s?',  $acao['AcaoPDV']['Id'])
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
			<?php if($acao['AcaoPDV']['Nome']){?>
		<dt><?php echo __('Nome'); ?></dt>
		<dd><?php echo h($acao['AcaoPDV']['Nome']); ?></dd>
		<?php }?>
		<?php if($acao['AcaoPDV']['Local']){?>
		<dt><?php echo __('Local'); ?></dt>
		<dd><?php echo h($acao['AcaoPDV']['Local']); ?></dd>
		<?php }?>
		<?php if($acao['AcaoPDV']['Inicio']){?>
		<dt><?php echo __('Inicio'); ?></dt>
		<dd><?php echo h($acao['AcaoPDV']['Inicio']); ?></dd>
		<?php }?>
		<?php if($acao['AcaoPDV']['Termino']){?>
		<dt><?php echo __('Termino'); ?></dt>
		<dd><?php echo h($acao['AcaoPDV']['Termino']); ?></dd>
		<?php }?>
		 		<dt><?php echo __('Fotos'); ?></dt>

		     <?php $dirFotos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['AcaoPDV']['Nome']); ?>
                             <?php $fotosPasta ='./uploads/'.$acao['AcaoPDV']['Nome']; ?>
                             <?php $fotos = $dirFotos->find('.*\.(png|jpg)', true); ?>           
                                <td> 
                                   <?php    foreach ($fotos as $foto ): ?>
                                   <?php   $caminhoFoto = $fotosPasta.'/'.$foto; ?>
                                   <?php   $caminhoFotoPopUp = '/img/uploads/'.$acao['AcaoPDV']['Nome'].'/'.$foto; ?>
                                   	<?php echo $this->Html->link($this->Html->Image($caminhoFoto,array('class'=>'class_img', 'height'=>'300', 'width'=>'250')),
                                 	$caminhoFotoPopUp, 
                                  	array('escapeTitle' => false, 'title' => $acao['AcaoPDV']['Nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url',
                                    'showImageNumberLabel'  => false)

	                              ); ?> 
    				               <?php endforeach; ?>
                                </td>
                  



		<dt><?php echo __('Videos'); ?></dt>

	   <?php $dirVideos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['AcaoPDV']['Nome']); ?>
                             <?php $VideosPasta ='./uploads/'.$acao['AcaoPDV']['Nome']; ?>
                             <?php $videos = $dirVideos->find('.*\.mp4', true); ?>           
                                 <td> 
                                  <?php    foreach ($videos as $video ): ?>
                                  <video id="my-video" class="video-js" controls preload="auto" width="640" height="480" data-setup="{}">
                                  <?php   $mostrarVideo = '/img/'.$VideosPasta.'/'.$video; ?>
                                   <source src="<?=$mostrarVideo;?>" type='video/mp4'>
                                </video>
                                 <script src="https://vjs.zencdn.net/7.1.0/video.js"></script>
                                  <?php echo '<br>' ?>
                                   <?php endforeach; ?>
                                </td>

                          
		


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