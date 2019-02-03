<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style type="text/css">
  .distancia {
padding-left: 50px; 
padding-top:10px; 
padding-bottom: 10px;
text-align: center  
}

.distanciaEscolha{
padding-left: 20px; 
padding-top:10px; 
padding-bottom: 10px;
width: 250px;

}

.paddingButton {
margin-top: 35px;
  width:120px;
height: 35px;
text-align: center;
}


.tamanhoSupervisor{
width: 200px;
height: 20px;
}

.tamanhoNome{
  width: 400px;
}

.distanciaLabel{
  padding-left: 20px;
}
.tamanhoDuplo{
  width: 500px;
  padding-top: 10px;
}

</style>

<section class="content-header">
    <h1>
        <?php echo __('Ações'); ?>
        <small><?php echo __('Add').' '.__('Ação'); ?></small>
    </h1>
     <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acaos'),'/Acaos');
              $this->Html->addCrumb(__('Add').' '.__('Acao'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="acaos form" style="margin: 20px" >
<?php echo $this->Form->create('Acao', array('type'=>'file')); ?>
    <fieldset>
        <div class="panel panel-default">
            <div class="panel-heading" align="right">
                <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
                <a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle="tooltip" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
            </div>
            <div class="row">
                <div class="div'=>'col-sm-12 col-md-7 col-xs-12">
                <div style="margin: 20px">
                	 <?php echo $this->Html->div('row',$this->Form->input('Nome',array('id'=>'nome','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false)); ?>
                <?php $equipes = $this->requestAction('Equipes/nomes'); ?>    
                <td> <?php   echo $this->Html->div('row',$this->Form->input('Equipe',
                      array('label'=>'Equipes',
                            'id'=>'equipe',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Equipe'),
                            'title'=>__('Equipe'),
                            'options'=> $equipes,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                      array('escape'=>false)); ?> </td>
                <?php $revisores = $this->requestAction('Revisors/retornaRevisores'); ?>
                <td> <?php   echo $this->Html->div('row',$this->Form->input('Revisor',
                      array('label'=>'Revisor',
                            'id'=>'revisor',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Revisor'),
                            'title'=>__('Revisor'),
                            'options'=> $revisores,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                      array('escape'=>false)); ?> </td>
                <?php     $Clientes = $this->requestAction('/Clientes/nomesClientes'); ?>
          <table>
              <tr>
                 <td class="tamanhoDuplo"> <?php   echo $this->Html->div('row',$this->Form->input('Cliente',
                    array('label'=>'Cliente',
                            'id'=>'cliente',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Cliente'),
                            'title'=>__('Cliente'),
                            'options'=> $Clientes,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                      array('escape'=>false)); ?> </td>
                  <td >    <button class="addCliente paddingButton" id="addCliente">Novo Cliente</button> </td>
              <?php echo $this->Html->div('row',$this->Form->hidden('QuantidadeClientes',array('id'=>'qtdClientes', 'value'=>'1','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Tipo'),'title'=>__('Tipo'),'class'=>'form-control input-sm')),array('escape'=>false)); ?> 
             </tr>
          </table>
            
            <?php echo $this->Html->div('row',$this->Form->input('SetorCliente',array('label'=>'Setor','id'=>'setorCliente','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Setor'),'title'=>__('Setor'),'class'=>'form-control input-sm')),array('escape'=>false)); ?> 
            <div class="divClientes"></div>
    
      <table>
        <tr>
          <td class="tamanhoDuplo"> <?php    $Supervisores = $this->requestAction('/Funcionarios/supervisores'); ?>
                   <?php echo $this->Html->div('row',$this->Form->input('Supervisor',
                    array(  'id'=>'supervisor',
                            'label'=>'Supervisor',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Supervisor'),
                            'title'=>__('Supervisor'),
                            'options'=> $Supervisores,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                     array('escape'=>false)); ?>  </td>
           <td><button class="addSupervisor paddingButton">Novo Supervisor</button> </td>
        </tr>
      </table>
        
      <?php echo $this->Html->div('row',$this->Form->hidden('QuantidadeSupervisores',array('id'=>'qtdSupervisores', 'value'=>'1','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Tipo'),'title'=>__('Tipo'),'class'=>'form-control input-sm')),array('escape'=>false)); ?> 
      <div class="divSupervisores"></div>

      <table>
         <tr>
            <td class="tamanhoDuplo">   <?php echo $this->Html->div('row',$this->Form->input('Local',array('id'=>'autocomplete','onfocus'=>'geolocate()','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false)); ?> </td>
                <td >    <button class="addLocal paddingButton">Novo Local</button> </td>
         </tr>
      </table>
 
         <?php echo $this->Html->div('row',$this->Form->hidden('QuantidadeLocais',array('id'=>'qtdLocais', 'value'=>'1','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Tipo'),'title'=>__('Tipo'),'class'=>'form-control input-sm')),array('escape'=>false)); ?> 
           <div class = "divLocais"></div>

              <?php $user = AuthComponent::user(); ?>
              <?php echo $this->Html->div('row',$this->Form->input('Tipo',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Tipo'),'title'=>__('Tipo'),'class'=>'form-control input-sm')),array('escape'=>false)); ?> 
              <?php echo $this->Html->div('row',$this->Form->input('Material',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Material'),'title'=>__('Material'),'class'=>'form-control input-sm')),array('escape'=>false)); ?>
              <?php echo $this->Html->div('row',$this->Form->input('Controle_Material',array('label'=>'Quantidade de Material','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Quantidade de Material'),'title'=>__('Quantidade de Material'),'class'=>'form-control input-sm')),array('escape'=>false)); ?>
              <?php echo $this->Html->div('row',$this->Form->input('Mecanica_Briefing',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Mecânica ou Briefing?'),'title'=>__('Mecânica ou Briefing?'),'class'=>'form-control input-sm')),array('escape'=>false)); ?>
              <?php echo $this->Html->div('row',$this->Form->input('Item_Novo',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Item Novo'),'title'=>__('Item Novo'),'class'=>'form-control input-sm')),array('escape'=>false)); ?> 
              <?php echo $this->Html->div('row',$this->Form->input('Quantidade_Pessoas_Envolvidas',array('label'=>'Total de pessoas envolvidas', 'div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Total de pessoas envolvidas'),'title'=>__('quantidade de pessoas envolvidas'),'class'=>'form-control input-sm')),array('escape'=>false)); ?>
              <?php echo $this->Html->div('row',$this->Form->input('Informacoes_Complementares',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Informações complementares'),'title'=>__('Informações complementares'),'class'=>'form-control input-sm')),array('escape'=>false)); ?> 
          <?php             
           echo $this->Html->div('row',$this->Form->hidden('Empresa',array('value'=>$user['empresa'])),array('escape'=>false));                    
           echo $this->Html->div('row',$this->Form->hidden('Latitude',array('id'=>'latitude','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));
           echo $this->Html->div('row',$this->Form->hidden('Longitude',array('id'=>'longitude','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));
         ?>
         
           <?php echo $this->Html->div('row',$this->Form->input('Inicio',array('id'=>'Inicio','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Inicio'),'title'=>__('Inicio'),'class'=>'form-control input-sm')),array('escape'=>false)); ?>
					 <?php echo $this->Html->div('row',$this->Form->input('Termino',array('id'=>'Termino','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Termino'),'title'=>__('Termino'),'class'=>'form-control input-sm')),array('escape'=>false)); ?>
           <?php
           echo $this->Html->div('row',$this->Form->hidden('Fotos1.',array('type'=>'file','multiple','label'=>'Fotos','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));
           echo $this->Html->div('row',$this->Form->hidden('Fotos',array('label'=>'Fotos','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));
           echo $this->Html->div('row',$this->Form->hidden('Videos1.',array('type'=>'file','multiple','label'=>'Videos','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'),'class'=>'form-control input-sm')),array('escape'=>false));
           echo $this->Html->div('row',$this->Form->hidden('Videos',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'),'class'=>'form-control input-sm')),array('escape'=>false));
		  	 ?>
<table>
  <tr>
          <td> <?php echo $this->Html->div('row',$this->Form->input('CRM',
                                                                         array('div'=>'col-xs-12',
                                                                         'class' =>'duplicar',
                                                                         'id'=>'checkCRM',
                                                                         'label'=>'Dados',
                                                                         'value'=>'Sim',
                                                                         'hiddenField'=>'Nao',
                                                                         'type' => 'checkbox')));
           ?>
         </td>
         <td class="distanciaLabel"><?php
            echo $this->Html->div('row',$this->Form->input('PDV',
                                                                         array('div'=>'col-xs-12',
                                                                          'class' =>'duplicar',
                                                                          'label'=>'PDV',
                                                                         'id'=>'pdv',
                                                                         'value'=>'Sim',
                                                                         'hiddenField'=>'Nao',
                                                                         'type' => 'checkbox')));
      ?></td>





</tr>
</table>


       <?php
           echo $this->Html->div('row',$this->Form->hidden('Removed',array('value'=>'N','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'),'class'=>'form-control input-sm')),array('escape'=>false));
			   	            echo $this->Html->div('row',$this->Form->hidden('Visivel',array('value'=>'Nao','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'),'class'=>'form-control input-sm')),array('escape'=>false));
            echo $this->Html->div('row',$this->Form->hidden('Created',array('id'=>'Created','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Created'),'title'=>__('Created'),'class'=>'form-control input-sm')),array('escape'=>false));
				   echo $this->Html->div('row',$this->Form->hidden('Modified',array('id'=>'Modified','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Modified'),'title'=>__('Modified'),'class'=>'form-control input-sm')),array('escape'=>false));
				?>
      
                    </div>
                </div>
            </div>
        </div>

        <table>
            <tr>
                <td style="padding: 15px" ><button class="btn btn-primary" title='<?=__('Confirm')?>' data-original-title='<?=__('Confirm')?>' data-toggle="tooltip" type="submit"><i class="fa fa-check fa-fw"></i> <?=__('Confirm')?></button></td>
                <td><a href="<?=$this->Html->url(array('action' => 'index'));?>"><button title='<?=__('Cancel')?>' data-original-title='<?=__('Cancel')?>' data-toggle="tooltip" class="btn btn-primary" type="button"><i class="fa fa-close fa-fw"></i><?=__('Cancel')?></button></a></td>
            </tr>




        </table>
	</fieldset>
</div>

<script type="text/javascript">
  <?php     $Clientes = $this->requestAction('/Clientes/nomesClientes'); ?>

  $(document).ready(function(){
    var divClientes = $(".divClientes"); 
    var addCliente = $(".addCliente");
    var contClientes = 1;
    var contClientesI =1;
    var qtdClientes = document.getElementById("qtdClientes");
    var Cliente = $("#cliente");
    Cliente.attr("name", "cliente"+contClientes);

    var setorCliente = $("#setorCliente");
    setorCliente.attr("name", "setorCliente"+contClientes);

    var divSupervisores = $(".divSupervisores");
    var addSupervisor = $(".addSupervisor");
    var contSupervisores = 1;   
    var contSupervisoresI = 1;
    var qtdSupervisores = document.getElementById("qtdSupervisores");
    var Supervisor = $("#supervisor");
    Supervisor.attr("name", "supervisor"+contSupervisores);

    var divLocais = $(".divLocais");
    var addLocal = $(".addLocal");
    var contLocais = 1;
    var contLocaisI = 1;
    var qtdLocais = document.getElementById("qtdLocais");
    var Local = $("#autocomplete");
    Local.attr("name", "local"+contLocais);


      $(addCliente).click(function(e){
        contClientes++
        e.preventDefault();
        var NovoCliente =   $("#cliente").clone();
        $(NovoCliente).attr("name", "cliente"+contClientes);    
        $(divClientes).append('<label>Cliente ' +contClientes + '</label>');           
        $(divClientes).append(NovoCliente);
        qtdClientes.value = contClientes;
        var NovoSetor = $("#setorCliente").clone();
        $(NovoSetor).attr("name", "setorCliente"+contClientes);
        $(divClientes).append('<label> Setor ' + contClientes + '</label>');
        $(divClientes).append(NovoSetor);
      });

$(addCliente).on("click", "remove_field", function (e){
  e.preventDefault();
  $(this).parent('div').remove();
})


      $(addSupervisor).click(function (e){
        contSupervisores++;
        contLocais++;
        e.preventDefault();
        var NovoSupervisor = $('#supervisor').clone();
        var NovoLocal = $('#autocomplete').clone();
        $(NovoSupervisor).attr("name", "supervisor" + contSupervisores);
        $(NovoLocal).attr("name", "local" + contLocais);

        $(divLocais).append('<label>Supervisor ' + contSupervisores + '</label>');
        $(divLocais).append(NovoSupervisor);
        $(divLocais).append('<label> Qual o novo local para este supervisor? </label>');
        $(divLocais).append(NovoLocal);
        qtdSupervisores.value = contSupervisores;
        qtdLocais.value = contLocais;
      });
    
      $(addLocal).click(function (e){
        contLocais++;
        contSupervisores++;
        e.preventDefault();
        contLocaisI = contLocais +1;
        var NovoLocal = $('#autocomplete').clone();
        var NovoSupervisor = $('#supervisor').clone();
        $(NovoSupervisor).attr("name", "supervisor" + contSupervisores);
        $(NovoLocal).attr("name", "local" + contLocais);

        $(divLocais).append('<label>Local ' + contLocaisI + '</label>');
        $(divLocais).append(NovoLocal);
        $(divLocais).append('<label>Qual o supervisor para este novo local?</label>');
        $(divLocais).append(NovoSupervisor);
        qtdLocais.value = contLocais;
        qtdSupervisores.value = contSupervisores;
      });



});
</script>



<script>
  


    $(function () {
                    $('#CRM_Nascimento').datetimepicker({
                        locale: 'pt',
                        format: 'DD-MM-YYYY HH:mm',
                        viewMode: 'days',
                    });
                    
                });
</script>
<script>
    $(function () {
                    $('#Inicio').datetimepicker({
                        locale: 'pt',
                        format: 'DD-MM-YYYY HH:mm',
                        viewMode: 'days',
                    });
                    
                });
</script><script>
    $(function () {
                    $('#Termino').datetimepicker({
                        locale: 'pt',
                        format: 'DD-MM-YYYY HH:mm',
                        viewMode: 'days',
                    });
                    
                });
</script><script>
    $(function () {
                    $('#Created').datetimepicker({
                        locale: 'pt',
                        format: 'DD-MM-YYYY HH:mm',
                        viewMode: 'days',
                    });
                    
                });
</script><script>
    $(function () {
                    $('#Modified').datetimepicker({
                        locale: 'pt',
                        format: 'DD-MM-YYYY HH:mm',
                        viewMode: 'days',
                    });
                    
                });
</script>

<script type="text/javascript">
  function mostrarCRM(){
    if (document.getElementById('checkCRM').checked == true){
    document.getElementById('crm').style.display = 'block';
  }else{ 
    document.getElementById('crm').style.display = 'none';
    document.getElementById('crmLoja').value = '';
    document.getElementById('crmEmail').value = '';
    document.getElementById('crmTelefone').value = '';
    document.getElementById('crmEndereco').value = '';
    document.getElementById('crmNome').value = '';
    document.getElementById('crmValorCompra').value = '';
    document.getElementById('crmNumeroCupom').value = '';
    document.getElementById('crmEstado').value = '';
    document.getElementById('CRM_Nascimento').value = '';

}
  }

function MostrarSupervisor2(){
  document.getElementById('supervisor2').style.display = 'block';
}

function MostrarSupervisor3(){
  document.getElementById('supervisor3').style.display = 'block';
}
function MostrarSupervisor4(){
  document.getElementById('supervisor4').style.display = 'block';
}


</script>

 
   <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

var address = document.getElementById('autocomplete').value;
var geocoder = new google.maps.Geocoder();

geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
    document.getElementById('latitude').value = results[0].geometry.location.lat();
     document.getElementById('longitude').value = results[0].geometry.location.lng();
    } 
}); 
  
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu6pbyyDfMs06gGiz6mcP2dd_ZIA0DvfQ&libraries=places&callback=initAutocomplete"
        async defer></script>

