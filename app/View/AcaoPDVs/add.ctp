<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
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
<?php echo $this->Form->create('AcaoPDV', array('type'=>'file')); ?>
    <fieldset>
        <div class="panel panel-default">
            <div class="panel-heading" align="right">
                <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
                <a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle="tooltip" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
            </div>
            <div class="row">
                <div class="div'=>'col-sm-12 col-md-7 col-xs-12">
                    <div style="margin: 20px">
                        <?php
                     echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false));
                     echo $this->Html->div('row',$this->Form->input('Local',array('id'=>'autocomplete','onfocus'=>'geolocate()','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));
           $user = AuthComponent::user();
           echo $this->Html->div('row',$this->Form->hidden('Empresa',array('value'=>$user['empresa'])),array('escape'=>false));                    
         
           echo $this->Html->div('row',$this->Form->hidden('Latitude',array('id'=>'latitude','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));
           echo $this->Html->div('row',$this->Form->hidden('Longitude',array('id'=>'longitude','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));
             echo $this->Html->div('row',$this->Form->input('Inicio',array('id'=>'Inicio','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Inicio'),'title'=>__('Inicio'),'class'=>'form-control input-sm')),array('escape'=>false));
                     echo $this->Html->div('row',$this->Form->input('Termino',array('id'=>'Termino','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Termino'),'title'=>__('Termino'),'class'=>'form-control input-sm')),array('escape'=>false));
            //       echo  $this->Form->create('Arquivo', array('type'=>'file')); 
//echo $this->Form->file('Fotos.', array('multiple'));
          echo $this->Html->div('row',$this->Form->input('Fotos1.',array('type'=>'file','multiple','label'=>'Fotos','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));
          echo $this->Html->div('row',$this->Form->hidden('Fotos',array('label'=>'Fotos','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));
          echo $this->Html->div('row',$this->Form->input('Videos1.',array('type'=>'file','multiple','label'=>'Videos','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'),'class'=>'form-control input-sm')),array('escape'=>false));
          echo $this->Html->div('row',$this->Form->hidden('Videos',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'),'class'=>'form-control input-sm')),array('escape'=>false));
              echo $this->Html->div('row',$this->Form->hidden('Removed',array('value'=>'N','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'),'class'=>'form-control input-sm')),array('escape'=>false));
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

document.getElementById("Latitude").value = place.coords.latitude;
document.getElementById("Longitude").value = place.coords.longitude;


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
   

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDm75ip6-qzWEdMl1vttg_RHjeL8S79u38&libraries=places&callback=initAutocomplete"
        async defer></script>

