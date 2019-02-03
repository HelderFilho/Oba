  <!DOCTYPE html>
<html>
  <head>
<script src="mascara.min.js"></script>


   <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 700px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
}       

#PesquisaTable{
      background-color: #C0C0C0 ;
position: absolute;
}

.pesquisas{
      background-color: #C0C0C0 ;
position: relative;
width: 14%;
}
.input{
  position: absolute;
  width: 80%;

}

.button {
    background-color: #000000 ;
    border: none;
    position: absolute;
    color: white;
    margin-top: 25px;
    margin-left: 40px;
    padding: 4px 12px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
}

.teste{
    background-color: #FFFFFF ;
  
}
.oba{
  width: 100%; 
  font-size: 20px;
  color: black;
  text-align: center;
}
   



    </style>
  </head>
  <body>
  <div class="oba">
  </div>
    <!--The div element for the map -->
    


 
    <div id="map"></div>



   <script type="text/javascript">
     <?php   $acoes = $this->requestAction('/Acaos/todos'); ?>
     <?php $funcionarios = $this->requestAction('funcionarios/todosFuncionarios') ?>
       var map;
       var markers = [];
       function initMap() {
       var fabtech = new google.maps.LatLng(-10.9287782,-37.0601776);
       map = new google.maps.Map(
       document.getElementById('map'), {
        zoom: 14, 
        center: fabtech
      });
}

window.onload = function Marcadores(){
    <?php foreach ($acoes as $acao): ?>
        var local = new google.maps.LatLng(<?= $acao['Acao']['Latitude']?>,<?= $acao['Acao']['Longitude']?>);
          marker = new google.maps.Marker({
            position : local,
            title : "<?= $acao['Acao']['Funcionarios']?>",

            map: map
          });
           markers.push(marker);
      
     <?php endforeach ?> 

}

 function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }


function Apagar(){
          setMapOnAll(null);
        }
   </script>

   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu6pbyyDfMs06gGiz6mcP2dd_ZIA0DvfQ&callback=initMap">
    </script>


  </body>
</html>





  <link href="https://vjs.zencdn.net/7.1.0/video-js.css" rel="stylesheet">
  <?php echo $this->Html->css('lightbox'); ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" type="text/javascript"></script>  
  <?php echo $this->Html->script('lightbox.min'); ?>
  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>


<section class="content-header">


    <h1>
        <?php echo __('Ações em Andamento'); ?>
    </h1>
    <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acaos'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
    
</section>
<div class="acaos index" style="margin: 20px" >
    <div class="panel panel-default">
        <div class="panel-heading" align="right">
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
                        <?php $acaos = $this->requestAction('/Acaos/todos'); ?>

                        <?php foreach ($acaos as $acao): ?>
                        <tr>
                        <td style= text-align:center><?php echo h($acao['Acao']['Nome']); ?>&nbsp;</td>
                        <td style= text-align:center><?php echo h($acao['Acao']['Local']); ?>&nbsp;</td>
                       <td style= text-align:center><?php echo h($acao['Acao']['Inicio']); ?>&nbsp;</td>
                        
            <td style= text-align:center><?php echo h($acao['Acao']['Termino']); ?>&nbsp;</td>
                            <?php $dirFotos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['Acao']['Nome']); ?>
                            <?php $fotosPasta ='./uploads/'.$acao['Acao']['Nome']; ?>
                            <?php $fotos = $dirFotos->find('.*\.(png|jpg)', true); ?>           
                                <td> 
                                    <?php $contFotos = 1?>
                                    <?php    foreach ($fotos as $foto ): ?>
                                    <?php if ($contFotos>2){
                                            break;
                                          }?>
                                   <?php   $caminhoFoto = $fotosPasta.'/'.$foto; ?>
                                   <?php   $caminhoFotoPopUp = '/img/uploads/'.$acao['Acao']['Nome'].'/'.$foto; ?>
                                   <?php echo $this->Html->link($this->Html->Image($caminhoFoto,array('class'=>'class_img', 'height'=>'200', 'width'=>'200')),
                                    $caminhoFotoPopUp, 
                                    array('escapeTitle' => false, 'title' => $acao['Acao']['Nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url',
                                    'showImageNumberLabel'  => false)
                              ); ?>

                                <?php $contFotos = $contFotos +1; ?> 
                                <?php endforeach; ?>
                                </td>
                        
                             <?php $dirVideos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['Acao']['Nome']); ?>
                             <?php $VideosPasta ='./uploads/'.$acao['Acao']['Nome']; ?>
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
                                            <li><?php echo $this->Html->link($this->Html->tag('i', __(' View'), array('class' => 'fa fa-eye fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('controller'=>'acaos', 'action' => 'view', $acao['Acao']['Id'])), array('escape' => false)); ?></li>
                                            <li><?php echo $this->Html->link($this->Html->tag('i', __(' Edit'), array('class' => 'fa fa-edit fa-fw'), array('class' => 'btn btn-primary','escape' => false)), $this->Html->url(array('controller'=>'acaos', 'action' => 'edit', $acao['Acao']['Id'])), array('escape' => false)); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                      



                        </tr>




                    <?php endforeach; ?>
                    </tbody>
               </table>
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