<?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyA5t8es6M2tcAHfkQl8D5oHp1FsN2byBOc&sensor=true&libraries=places', true); ?>
  


<section class="content-header">
    <h1>
        <?php echo __('Trabalhos'); ?>
        <small><?php echo __('Add').' '.__('Trabalho'); ?></small>
    </h1>
     <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Trabalhos'),'/Trabalhos');
              $this->Html->addCrumb(__('Add').' '.__('Trabalho'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="trabalhos form" style="margin: 20px" >
<?php echo $this->Form->create('Trabalho'); ?>
    <fieldset>
        <form action="../App/Controller/TrabalhosController.php" method="post">
        <div class="panel panel-default">
            <div class="panel-heading" align="right">
                <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
                <a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle="tooltip" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
            </div>
            <div class="row">
                <div class="div'=>'col-sm-12 col-md-7 col-xs-12">
                    <div style="margin: 20px">
                        <?php
					$funcionarios = $this->requestAction('/Funcionarios/nomes');

					   echo $this->Html->div('row',$this->Form->input('Funcionarios',
                      array('label'=>'Funcionário',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Funcionário'),
                            'title'=>__('Funcionário'),
                            'options'=> $funcionarios,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                    array('escape'=>false));
            



          echo $this->Html->div('row',$this->Form->input('Local',array('id'=>'autocomplete', 'div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'onfocus'=>'geolocate()', 'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->hidden('Situacao',array('id'=>'Situacao','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Situacao'),'title'=>__('Situacao'),'class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->hidden('Removed',array('value'=>'N','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'),'class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->hidden('Created',array('id'=>'Created','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Created'),'title'=>__('Created'),'class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->hidden('Modified',array('id'=>'Modified','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Modified'),'title'=>__('Modified'),'class'=>'form-control input-sm')),array('escape'=>false));
				?>
                    </div>
                </div>
            </div>
        </div>
</form>
        <table>
            <tr>
                <td style="padding: 15px" ><button class="btn btn-primary" onclick="SituacaoOn()" title='Entrar em Serviço' data-original-title='Entrar em Serviço' data-toggle="tooltip" type="submit"><i class="fa fa-check fa-fw"></i> Entrar em Serviço</button></td>
                <td style="padding: 15px" ><button class="btn btn-primary" onclick="SituacaoOff()" title='Sair do Serviço' data-original-title='Sair do Serviço' data-toggle="tooltip" type="submit"><i class="fa fa-check fa-fw"></i> Sair do Serviço</button></td>
                <td><a href="<?=$this->Html->url(array('action' => 'index'));?>"><button title='<?=__('Cancel')?>' data-original-title='<?=__('Cancel')?>' data-toggle="tooltip" class="btn btn-primary" type="button"><i class="fa fa-close fa-fw"></i><?=__('Cancel')?></button></a></td>
            </tr>
        </table>
	</fieldset>
</div>
<script>
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


<script>
    function SituacaoOn(){
        document.getElementById("Situacao").value="Ativo"

    }
    function SituacaoOff(){
        document.getElementById("Situacao").value="Nao Ativo"        
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
        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }
 
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5t8es6M2tcAHfkQl8D5oHp1FsN2byBOc&libraries=places&callback=initAutocomplete" async defer></script>
  