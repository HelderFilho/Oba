  <link href="https://vjs.zencdn.net/7.1.0/video-js.css" rel="stylesheet">
  <?php echo $this->Html->css('lightbox'); ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" type="text/javascript"></script>  
  <?php echo $this->Html->script('lightbox.min'); ?>
  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>


<section class="content-header">


    <h1>
        <?php echo __('Ações'); ?>
        <small><?php echo __('Todas as Ações'); ?></small>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acaos'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div class="acaos index" style="margin: 20px" >
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
                         <th style= text-align:center><?php echo $this->Paginator->sort('Nome',__('Nome'),array('align'=>'center','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Local',__('Local'),array('data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Inicio',__('Inicio'),array('data-toggle'=>'tooltip','data-original-title'=>__('Inicio'),'title'=>__('Inicio'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Termino',__('Termino'),array('data-toggle'=>'tooltip','data-original-title'=>__('Termino'),'title'=>__('Termino'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Fotos',__('Fotos'),array('data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'))); ?></th>
                            <th style= text-align:center><?php echo $this->Paginator->sort('Videos',__('Videos'),array('data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'))); ?></th>
                            <th style= text-align:center , class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                       </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $base_url = array('controller' => 'AcaoPDVs', 'action' => 'index');?>
                            <?php echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));?>
                     <td style= text-align:center ><?php echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Local',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Inicio',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Inicio'),'title'=>__('Inicio'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Termino',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Termino'),'title'=>__('Termino'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Fotos',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
                     <td><?php echo $this->Html->div('row',$this->Form->input('Videos',array('div'=>'col-xs-12','style'=>'width:100%','label'=>'','data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'),'class'=>'form-control input-sm')),array('escape'=>false));?></td>
<td style= text-align:center><?php echo $this->Form->submit(__('Search'),array('class' => 'btn btn-primary','data-toggle'=>'tooltip','data-original-title'=>__('Search'),'title'=>__('Search'))) ?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                        <?php foreach ($acaosPDV as $acao): ?>
                        <tr>
                        <td style= text-align:center><?php echo h($acao['AcaoPDV']['Nome']); ?>&nbsp;</td>
                        <td style= text-align:center><?php echo h($acao['AcaoPDV']['Local']); ?>&nbsp;</td>
                     <td style= text-align:center><?php echo h($acao['AcaoPDV']['Inicio']); ?>&nbsp;</td>
                        
            <td style= text-align:center><?php echo h($acao['AcaoPDV']['Termino']); ?>&nbsp;</td>
                            <?php $dirFotos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['AcaoPDV']['Nome']); ?>
                            <?php $fotosPasta ='./uploads/'.$acao['AcaoPDV']['Nome']; ?>
                            <?php $fotos = $dirFotos->find('.*\.(png|jpg)', true); ?>           
                                <td> 
                                    <?php $contFotos = 1?>
                                    <?php    foreach ($fotos as $foto ): ?>
                                    <?php if ($contFotos>2){
                                            break;
                                          }?>
                                   <?php   $caminhoFoto = $fotosPasta.'/'.$foto; ?>
                                   <?php   $caminhoFotoPopUp = '/img/uploads/'.$acao['AcaoPDV']['Nome'].'/'.$foto; ?>
                                   <?php echo $this->Html->link($this->Html->Image($caminhoFoto,array('class'=>'class_img', 'height'=>'200', 'width'=>'200')),
                                    $caminhoFotoPopUp, 
                                    array('escapeTitle' => false, 'title' => $acao['AcaoPDV']['Nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url',
                                    'showImageNumberLabel'  => false)
                              ); ?>

                                <?php $contFotos = $contFotos +1; ?> 
                                <?php endforeach; ?>
                                </td>
                        
                             <?php $dirVideos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['AcaoPDV']['Nome']); ?>
                             <?php $VideosPasta ='./uploads/'.$acao['AcaoPDV']['Nome']; ?>
                             <?php $videos = $dirVideos->find('.*\.mp4', true); ?>           
                                <td> 
                                    <?php $contVideos = 1?>
                                    <?php    foreach ($videos as $video ): ?>
                                    <?php if ($contVideos>1){
                                        break;
                                          }?>
                                  <video id="my-video" class="video-js" controls preload="auto" width="200" height="200" data-setup="{}">
                                  <?php   $mostrarVideo = 'img/'.$VideosPasta.'/'.$video; ?>
                                  <source src="<?=$mostrarVideo;?>" type='video/mp4'>
                                  </video>
                                
                                  <?php $contVideos = $contVideos +1; ?> 
                                  <?php endforeach; ?>
                                </td>

                           
                                       


                        <td class="actions"  title='Actions' data-original-title='Actions' data-toggle="tooltip">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                                            <i class="fa fa-gear fa-fw"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul  class="dropdown-menu pull-right" role="menu">
                                            <li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'view', $acao['AcaoPDV']['Id'])), array('escape' => false)); ?></li>
                                            <li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('action' => 'edit', $acao['AcaoPDV']['Id'])), array('escape' => false)); ?></li>
                                            <li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Delete'), array('class' => 'fa fa-trash-o fa-fw')), array('action' => 'delete', $acao['AcaoPDV']['Id']),array('escape'=>false),__('Are you sure you want to delete the %s?', $acao['AcaoPDV']['Id']),array('class' => 'btn btn-mini'));?> </li>
                      <li><?php echo $this->Form->postLink($this->Html->tag('i', __(' Encerrar'), array('class' => 'fa fa-check' )), array('action' => 'encerrar', $acao['AcaoPDV']['Id']),array('escape'=>false),__('Você tem certeza que quer encerrar a ação: %s?',$acao['AcaoPDV']['Nome']),array('class' => 'btn btn-mini'));?> </li>

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