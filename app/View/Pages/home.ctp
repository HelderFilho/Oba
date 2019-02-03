<!DOCTYPE html>
<html>
  <head>
<script src="mascara.min.js"></script>
<link href="https://vjs.zencdn.net/7.1.0/video-js.css" rel="stylesheet">
<?php echo $this->Html->css('lightbox'); ?>
<?php echo $this->Html->script('lightbox.min'); ?>
<script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" rel="stylesheet">
<?php echo $this->Html->script('jQuery-2.1.3.min.js'); ?>
<?php echo $this->Html->script('moment.min.js'); ?>
<?php echo $this->Html->script('fullcalendar.min.js'); ?>
<?php echo $this->Html->css('fullcalendar.min.css'); ?> 
<?php echo $this->Html->css('fullcalendar.print.css', null,array('media'=>'print')); ?> 
<?php echo $this->Html->script('pt-br.js'); ?> 


   <style>
       /* Set the size of the div element that contains the map */
#map {
  height: 400px;  /* The height is 400 pixels */
  width: 65%;  /* The width is the width of the web page */
float: left;
}       

.mapaCalendar{
display: inline-block;
}


#PesquisaTable{
background-color: #C0C0C0 ;
position: absolute;
}


  #calendar {
    max-width: 35%;
    margin: 0 auto;
    background-color: white;
    float: right;
}

 .Encerrado{
  background-color: cadetblue;
color: white;
 }

<?php $user = AuthComponent::user();?>
<?php if ($user['empresa']=='Top'){?>

.pesquisas{
      background-color: #8A2BE2 ;
position: relative;
width: 14%;
color: white;
}
<?php }else{ ?>
.pesquisas{
      background-color: #FF8C00 ;
position: relative;
width: 14%;
color: white;
}
<?php } ?>

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
   
.tamanho{
  width: 310px;
  align-items: flex-start;
 }
 .tamanhoBarra{
  width: 280px;
 }
    </style>





  </head>
  <body>
  <div class="oba">
    <?php $user = AuthComponent::user();?>
  </div>
    <!--The div element for the map -->
 <table class="table table-striped table-bordered table-hover">
   <tr> 
      <th  class = "pesquisas" style= text-align:center>
        <?php  echo $this->Html->div('row',$this->Form->input('Iniciadas',
             array('label'=>'Por Início',
                'id'=>'Iniciadas',
                      'onchange'=>'Filtro_Iniciadas()',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Equipe'),
                            'title'=>__('Equipe'),
                            'options'=> array('15'=>'Nos últimos 15 minutos','60'=>'Na última hora', '180'=>'Nas últimas 3 horas'),
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                    array('escape'=>false)); ?></th>
        <th style= text-align:center class="pesquisas" >
          <div class="input">
          <?php  echo $this->Html->div('row',$this->Form->input('Dia',array(
          'id'=>'Dia',
          'div'=>'col-xs-12',
          'type'=>'text',
          'onkeyup'=>"mascara('##/##/####',this,event,false)", 
          'placeholder'=>'Dia/Mês/Ano',
          'maxlength'=>'12',
          'data-toggle'=>'tooltip',
          'data-original-title'=>__('Dia'),
          'title'=>__('Dia'),
          'class'=>'form-control input-sm')),array('escape'=>false));
      ?>           
           </div>
            <button id= "buscar" class =" button" onclick="Filtro_Dia()" ><i class="fa fa-search"></i></button>
      </th>
         
         <th class = "pesquisas" style= text-align:center><?php  echo $this->Html->div('row',$this->Form->input('Turno',
                   array('label'=>'Turno',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Turno'),
                            'title'=>__('Turno'),
                            'options'=> array('Matutino'=>'Matutino','Vespertino'=>'Vespertino', 'Noturno'=>'Noturno'),
                            'onchange'=>'Filtro_Turno()',
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                    array('escape'=>false)); ?></th>

         <th  class = "pesquisas" style= text-align:center><?php  
                    $Clientes = $this->requestAction('/Clientes/nomesClientes');
                    echo $this->Html->div('row',$this->Form->input('Clientes',
                    array('label'=>'Clientes',
                            'id'=>'Clientes',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Equipe'),
                            'title'=>__('Equipe'),
                            'options'=> $Clientes,
                            'empty'=>'Escolha',
                            'onchange'=>'Filtro_Clientes()',
                            'class'=>'form-control')),
                    array('escape'=>false));     
        ?></th>

         <th class = "pesquisas" style= text-align:center><?php  echo $this->Html->div('row',$this->Form->input('Regiao',
                    array('label'=>'Região',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Equipe'),
                            'title'=>__('Equipe'),
                            'options'=> array('Sergipe'=>'Sergipe','Outros'=>'Outros'),
                            'empty'=>'Escolha',
                            'onchange'=>'Apagar()',
                            'class'=>'form-control')),
                    array('escape'=>false)); ?></th>
         
            <?php $funcionariosNomes = $this->requestAction('funcionarios/nomes') ?>
         <th class = "pesquisas" style= text-align:center><?php  echo $this->Html->div('row',$this->Form->input('Funcionarios',
                    array('label'=>'Funcionarios',
                            'id'=>'Funcionarios',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Funcionarios'),
                            'title'=>__('Equipe'),
                            'options'=> $funcionariosNomes,
                            'empty'=>'Escolha',
                            'onchange'=>'Filtro_Funcionarios()',
                            'class'=>'form-control')),
                    array('escape'=>false)); ?></th>
         
         <th class = "pesquisas" style= text-align:center><?php  
                    $Equipes = $this->requestAction('/Equipes/nomes');
                    echo $this->Html->div('row',$this->Form->input('Equipe',
                    array('label'=>'Equipe',
                            'id'=>'Equipes',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Equipe'),
                            'title'=>__('Equipe'),
                            'options'=> $Equipes,
                            'empty'=>'Escolha',
                            'onchange'=>'Filtro_Equipes()',
                            'class'=>'form-control')),
                    array('escape'=>false));     
        ?></th>
   </tr>
 </table>    








<div id = "mapaCalendar" class="row">
    <div>
      <div id="map"></div>
     </div>
     <div> 
    <div id='calendar'></div>
    </div>
  </div>






   <script type="text/javascript">
     <?php   $acoes = $this->requestAction('/Acaos/todos'); ?>
     <?php $funcionarios = $this->requestAction('funcionarios/todosFuncionarios') ?>
       var map;
       var markers = [];
      
       function initMap() {
       var fabtech = new google.maps.LatLng(-10.9287782,-37.0601776);
       map = new google.maps.Map(
       document.getElementById('map'), {
        zoom: 12, 
        center: fabtech
      });
       setMapOnAll(map);
}

function Filtro_Clientes(){
 setMapOnAll(null);
    var Cliente = document.getElementById('Clientes').value;
 



      <?php foreach ($acoes as $acao): ?>
         
        <?php $TodosClientes = $this->requestAction('AcaoClientes/retornaClientes/' . $acao['Acao']['Id']); ?>

        <?php          foreach($TodosClientes as $TodosCliente): ?>
         var ClienteAcao =  "<?= $TodosCliente['AcaoCliente']['IdCliente']?>";
        
         if (ClienteAcao==Cliente) {
        

            <?php $IdSupervisoresAcao = $this->requestAction('AcaoSupervisorLocals/retornaSupervisores/' . $acao['Acao']['Id']); ?>
                <?php foreach ($IdSupervisoresAcao as $IdSupervisor):?>
                <?php $supervisor = $this->requestAction('Funcionarios/retornaSupervisor/' . $IdSupervisor['AcaoSupervisorLocal']['IdSupervisor']); ?>
                    <?php if (!empty($supervisor['Funcionario']['Latitude'])&&!empty($supervisor['Funcionario']['Longitude'])){ ?>
                       var local = new google.maps.LatLng(<?= $supervisor['Funcionario']['Latitude']?>,<?= $supervisor['Funcionario']['Longitude']?>);
                       marker = new google.maps.Marker({
                       position : local,
                       title : "<?= $supervisor['Funcionario']['Nome']?>",
                       map: map
                       });
                       markers.push(marker);
                  <?php } ?>
               <?php endforeach ?> 
    
}

    <?php endforeach ?>

<?php endforeach ?>

  

}


function Filtro_Iniciadas(){
  setMapOnAll(null);
    var DataAtual = new Date().getTime();
    var Periodo =  Number(document.getElementById("Iniciadas").value)*60000;
      <?php foreach ($acoes as $acao): ?>
        var DataAcao = new Date("<?= $acao['Acao']['Inicio']?>").getTime();
       if ((DataAtual - DataAcao)<Periodo) {
    <?php $IdSupervisoresAcao = $this->requestAction('AcaoSupervisorLocals/retornaSupervisores/' . $acao['Acao']['Id']); ?>
                <?php foreach ($IdSupervisoresAcao as $IdSupervisor):?>
                <?php $supervisor = $this->requestAction('Funcionarios/retornaSupervisor/' . $IdSupervisor['AcaoSupervisorLocal']['IdSupervisor']); ?>
                    <?php if (!empty($supervisor['Funcionario']['Latitude'])&&!empty($supervisor['Funcionario']['Longitude'])){ ?>
                       var local = new google.maps.LatLng(<?= $supervisor['Funcionario']['Latitude']?>,<?= $supervisor['Funcionario']['Longitude']?>);
                       marker = new google.maps.Marker({
                       position : local,
                       title : "<?= $supervisor['Funcionario']['Nome']?>",
                       map: map
                       });
                       markers.push(marker);
                  <?php } ?>
               <?php endforeach ?> 
             }
          <?php endforeach ?>
}


function Filtro_Dia(){
    setMapOnAll(null);
    var DiaCompleto = document.getElementById('Dia').value;
    var DiaArray = DiaCompleto.split("/");
    var Dia_Pesquisa = new Date(DiaArray[2], DiaArray[1] - 1, DiaArray[0]);
      <?php foreach ($acoes as $acao): ?>
        var InicioaAcao =  "<?= $acao['Acao']['Inicio']?>";
        var InicioaAcao_Data = InicioaAcao.substring(0,10);
        var InicioaAcao_Array = InicioaAcao_Data.split("-");
        var InicioaAcao_Dia = new Date(InicioaAcao_Array[0], InicioaAcao_Array[1]-1, InicioaAcao_Array[2]);
       if (DiaArray[2]==InicioaAcao_Array[0] && DiaArray[1]==InicioaAcao_Array[1] && DiaArray[0]==InicioaAcao_Array[2]) {
           <?php $IdSupervisoresAcao = $this->requestAction('AcaoSupervisorLocals/retornaSupervisores/' . $acao['Acao']['Id']); ?>
                <?php foreach ($IdSupervisoresAcao as $IdSupervisor):?>
                <?php $supervisor = $this->requestAction('Funcionarios/retornaSupervisor/' . $IdSupervisor['AcaoSupervisorLocal']['IdSupervisor']); ?>
                    <?php if (!empty($supervisor['Funcionario']['Latitude'])&&!empty($supervisor['Funcionario']['Longitude'])){ ?>
                       var local = new google.maps.LatLng(<?= $supervisor['Funcionario']['Latitude']?>,<?= $supervisor['Funcionario']['Longitude']?>);
                       marker = new google.maps.Marker({
                       position : local,
                       title : "<?= $supervisor['Funcionario']['Nome']?>",
                       map: map
                       });
                       markers.push(marker);
                  <?php } ?>
               <?php endforeach ?> 
             }
      <?php endforeach ?>

}


function Filtro_Turno(){
    setMapOnAll(null);
    var TurnoAcao = document.getElementById('Turno').value;
      <?php foreach ($acoes as $acao): ?>
        var Inicio = "<?= $acao['Acao']['Inicio']?>";
        var Hora = Number(Inicio.substring(11,13));  
        var turno;  
            if (Hora>6 && Hora<12){
              turno = "Matutino";
            }else if (Hora>12 && Hora<18){
              turno = "Vespertino";
            }else{
              turno = "Noturno";
            }
         if (TurnoAcao==turno) {
               <?php $IdSupervisoresAcao = $this->requestAction('AcaoSupervisorLocals/retornaSupervisores/' . $acao['Acao']['Id']); ?>
                <?php foreach ($IdSupervisoresAcao as $IdSupervisor):?>
                <?php $supervisor = $this->requestAction('Funcionarios/retornaSupervisor/' . $IdSupervisor['AcaoSupervisorLocal']['IdSupervisor']); ?>
                    <?php if (!empty($supervisor['Funcionario']['Latitude'])&&!empty($supervisor['Funcionario']['Longitude'])){ ?>
                       var local = new google.maps.LatLng(<?= $supervisor['Funcionario']['Latitude']?>,<?= $supervisor['Funcionario']['Longitude']?>);
                       marker = new google.maps.Marker({
                       position : local,
                       title : "<?= $supervisor['Funcionario']['Nome']?>",
                       map: map
                       });
                       markers.push(marker);
                  <?php } ?>
               <?php endforeach ?> 
             }
      <?php endforeach ?>
}


function Filtro_Funcionarios(){
      setMapOnAll(null);

  <?php $funcionarios = $this->requestAction('Funcionarios/todosFuncionarios'); ?>
       var Func = document.getElementById('Funcionarios').value;




    <?php foreach ($funcionarios as $funcionario): ?>
    document.getElementById('Dia').value = 2;

      var FuncionarioAcao =  "<?= $funcionario['Funcionario']['Nome']?>";
        if (Func == FuncionarioAcao){
          <?php if (!empty($funcionario['Funcionario']['Latitude'])&&!empty($funcionario['Funcionario']['Longitude'])){ ?>
             var local = new google.maps.LatLng(<?= $funcionario['Funcionario']['Latitude']?>,<?= $funcionario['Funcionario']['Longitude']?>);
               marker = new google.maps.Marker({
               position : local,
               title : "<?= $funcionario['Funcionario']['Nome']?>",
               map: map
               });
               markers.push(marker);        
     <?php  } ?>
   }
    <?php endforeach ?>

}


function Filtro_Equipes(){
    setMapOnAll(null);
    var time = document.getElementById('Equipes').value;
      <?php foreach ($acoes as $acao): ?>        
        var timeAcao =  "<?= $acao['Acao']['Equipe']?>";
         if (timeAcao==time) {
            <?php $IdSupervisoresAcao = $this->requestAction('AcaoSupervisorLocals/retornaSupervisores/' . $acao['Acao']['Id']); ?>
                <?php foreach ($IdSupervisoresAcao as $IdSupervisor):?>
                <?php $supervisor = $this->requestAction('Funcionarios/retornaSupervisor/' . $IdSupervisor['AcaoSupervisorLocal']['IdSupervisor']); ?>
                    <?php if (!empty($supervisor['Funcionario']['Latitude'])&&!empty($supervisor['Funcionario']['Longitude'])){ ?>
                       var local = new google.maps.LatLng(<?= $supervisor['Funcionario']['Latitude']?>,<?= $supervisor['Funcionario']['Longitude']?>);
                       marker = new google.maps.Marker({
                       position : local,
                       title : "<?= $supervisor['Funcionario']['Nome']?>",
                       map: map
                       });
                       markers.push(marker);
                  <?php } ?>
               <?php endforeach ?> 
             }
       <?php endforeach ?>
}


window.onload = function Marcadores(){
    <?php foreach ($acoes as $acao): ?>
      <?php $IdSupervisoresAcao = $this->requestAction('AcaoSupervisorLocals/retornaSupervisores/' . $acao['Acao']['Id']); ?>
        <?php foreach ($IdSupervisoresAcao as $IdSupervisor):?>
        <?php $supervisor = $this->requestAction('Funcionarios/retornaSupervisor/' . $IdSupervisor['AcaoSupervisorLocal']['IdSupervisor']); ?>
          <?php if (!empty($supervisor['Funcionario']['Latitude'])&&!empty($supervisor['Funcionario']['Longitude'])){ ?>
        var local = new google.maps.LatLng(<?= $supervisor['Funcionario']['Latitude']?>,<?= $supervisor['Funcionario']['Longitude']?>);
          marker = new google.maps.Marker({
            position : local,
            title : "<?= $supervisor['Funcionario']['Nome']?>",
            map: map
          });
           markers.push(marker);
         <?php } ?>
     <?php endforeach ?> 
<?php endforeach ?>
      var a = markers.length;
  }

 function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }


function mostar(){
  setMapOnAll(map);
}

function Apagar(){
          setMapOnAll(null);
        }
</script>
   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu6pbyyDfMs06gGiz6mcP2dd_ZIA0DvfQ&callback=initMap">
    </script>


<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "e53e0d95-7979-4400-9a47-5dd613218d18",
      autoRegister: true,
      notifyButton: {
        enable: true,
      },
    });
  });
</script>










<script>
     <?php   $acoes = $this->requestAction('/Acaos/todos');
        $date = date('Y-m-d'); ?>

        data = new Date;

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
    
      defaultDate: moment(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
         <?php 
           foreach ($acoes as $acao) { 
              ?>
                 {
                    title : '<?php echo $acao['Acao']['Nome']; ?>',
                    start: '<?php echo $acao['Acao']['Inicio']; ?>',
                    end: '<?php echo $acao['Acao']['Termino']; ?>',
                    url: '<?php echo $this->Html->url(array('controller'=>'acaos', 'action' => 'view', $acao['Acao']['Id']));?>',
                  },<?php
              } 
            
            ?>
         ]
    });

  });
</script>
  </body>
</html>









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
                            <th style= text-align:center><?php echo $this->Paginator->sort('Porcentagem',__('Porcentagem'),array('data-toggle'=>'tooltip','data-original-title'=>__('Porcentagem'),'title'=>__('Porcentagem'))); ?></th>
                            <th style= text-align:center , class="actions col-xs-1"><?php echo __('Actions'); ?></th>
                       </tr>
                    </thead>
                    <tbody>
                        <?php $acaos = $this->requestAction('/Acaos/todosAndamento'); ?>

                        <?php foreach ($acaos as $acao): ?>
                        <tr>
                        <td style= text-align:center><?php echo h($acao['Acao']['Nome']); ?>&nbsp;</td>
                        <td style= text-align:center><?php echo h($acao['Acao']['Local']); ?>&nbsp;</td>
                           <td>    
     <div class="container tamanho">
  <br>
  <div class="container tamanho">
    <div class="progress tamanhoBarra">
      <?php 
      $TempoTotalPrevisto = strtotime($acao['Acao']['Termino']) - strtotime($acao['Acao']['Inicio']);
      date_default_timezone_set('America/Sao_Paulo');
      $date = date('Y-m-d H:i');
      $TempoTotalExecutado = strtotime($date) - strtotime($acao['Acao']['Inicio']);
      $porcentagemPercorrida = ($TempoTotalExecutado / $TempoTotalPrevisto)*100;
      if ($porcentagemPercorrida>=100){
        $porcentagemPercorrida = 100;
      }else if ($porcentagemPercorrida>10){
        $porcentagemPercorrida = substr($porcentagemPercorrida, 0,4);
      }else{
       $porcentagemPercorrida = substr($porcentagemPercorrida, 0,3);
      }

      $diaInicio = substr($acao['Acao']['Inicio'], 8,2) . '/'.substr($acao['Acao']['Inicio'], 5,2) .'/'. substr($acao['Acao']['Inicio'], 0,4) ;
      $diaTermino = substr($acao['Acao']['Termino'], 8,2) . '/'.substr($acao['Acao']['Termino'], 5,2) .'/'. substr($acao['Acao']['Termino'], 0,4) ;

?>


            <?php if ($acao['Acao']['Encerrado']=='S'){?>
               <?php echo "<div class='progress-bar ' role='progressbar' aria-valuenow='70' aria-valuemin=0' aria-valuemax='100' style='width:$porcentagemPercorrida%; background-color:black'>"; ?>
             <?php }else{ ?>
               <?php echo "<div class='progress-bar' role='progressbar' aria-valuenow='70' aria-valuemin=0' aria-valuemax='100' style='width:$porcentagemPercorrida%'>"; ?>
            <?php } ?>

          <?php echo $porcentagemPercorrida. "% de " . $diaInicio .  " a " . $diaTermino;?>

      </div>
    </div>
  </div>
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

