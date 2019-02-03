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
        <?php echo __('Acaos'); ?>
        <small><?php echo __('Edit').' '.__('Acao'); ?></small>
    </h1>
     <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acaos'),'/Acaos');
              $this->Html->addCrumb(__('Edit').' '.__('Acao'));
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
                    <?php echo $this->Html->div('row',$this->Form->hidden('Id',array('id'=>'id', 'div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Id'),'title'=>__('Id'),'class'=>'form-control input-sm')),array('escape'=>false)); ?>

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
                  <td >    <button class="addCliente paddingButton">Novo Cliente</button> </td>
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
           echo $this->Html->div('row',$this->Form->input('Fotos1.',array('type'=>'file','multiple','label'=>'Fotos','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));
           echo $this->Html->div('row',$this->Form->hidden('Fotos',array('label'=>'Fotos','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));
           echo $this->Html->div('row',$this->Form->input('Videos1.',array('type'=>'file','multiple','label'=>'Videos','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'),'class'=>'form-control input-sm')),array('escape'=>false));
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

  <td> <?php echo $this->Html->div('row',$this->Form->input('Visivel',
                                                                         array('div'=>'col-xs-12',
                                                                         'class' =>'duplicar',
                                                                         'id'=>'visivel',
                                                                         'label'=>'As fotos serão visíveis para o cliente?',
                                                                         'value'=>'Sim',
                                                                         'hiddenField'=>'Nao',
                                                                         'type' => 'checkbox')));
           ?>
         </td>


       <?php
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



<script type="text/javascript">

  <?php $id =  $this->data['Acao']['Id']; ?>
  <?php     $Clientes = $this->requestAction('/AcaoClientes/retornaTodosClientes/'. $id ); ?>
  <?php $SupervisoresLocais = $this->requestAction('/AcaoSupervisorLocals/retornaTodosSupervisores/'.$id); ?>





    var divClientes = $(".divClientes"); 
    var addCliente = $(".addCliente");
    var contClientes = 1;
    var contClientesI =1;
    var qtdClientes = document.getElementById("qtdClientes");
    var Cliente = $("#cliente");
    Cliente.attr("name", "cliente"+contClientes);
    Cliente.attr("id", "cliente"+contClientes);
   
    var setorCliente = $("#setorCliente");
    setorCliente.attr("name", "setorCliente"+contClientes);
    setorCliente.attr("id", "setorCliente"+contClientes);


    var divSupervisores = $(".divSupervisores");
    var addSupervisor = $(".addSupervisor");
    var contSupervisores = 1;   
    var contSupervisoresI = 1;
    var qtdSupervisores = document.getElementById("qtdSupervisores");
    var Supervisor = $("#supervisor");
    Supervisor.attr("name", "supervisor"+contSupervisores);
    Supervisor.attr("id", "supervisor"+contSupervisores);

    var divLocais = $(".divLocais");
    var addLocal = $(".addLocal");
    var contLocais = 1;
    var contLocaisI = 1;
    var qtdLocais = document.getElementById("qtdLocais");
    var Local = $("#autocomplete");
    Local.attr("name", "local"+contLocais);
    Local.attr("id", "local"+contLocais);

$(document).ready(function(){
       var contClientesF = 1; 

   <?php foreach ($Clientes as $cliente) { ?>
        
        if (contClientes==contClientesF){
        document.getElementById('cliente' + contClientesF).value = "<?=$cliente['AcaoCliente']['IdCliente']?>";
        document.getElementById('setorCliente'+contClientesF).value = "<?=$cliente['AcaoCliente']['Setor']?>";
          }else{
        var NovoCliente =   $("#cliente1").clone();
        $(NovoCliente).attr("name", "cliente"+contClientesF);    
        $(NovoCliente).attr("id", "cliente"+contClientesF);    
        $(divClientes).append('<label>Cliente ' +contClientesF + '</label>');           
        $(divClientes).append(NovoCliente);  

        qtdClientes.value = contClientes;


        var NovoSetor = $("#setorCliente1").clone();
        $(NovoSetor).attr("name", "setorCliente"+contClientesF);
        $(NovoSetor).attr("id", "setorCliente"+contClientesF);
        $(divClientes).append('<label> Setor ' + contClientesF + '</label>');
        $(divClientes).append(NovoSetor);
      
        document.getElementById('cliente' + contClientesF).value = "<?=$cliente['AcaoCliente']['IdCliente']?>";
        document.getElementById('setorCliente'+contClientesF).value = "<?=$cliente['AcaoCliente']['Setor']?>";

        }
        contClientesF++;    
    <?php } ?>



var contSupervisoresF = 1;
<?php foreach ($SupervisoresLocais as $supervisor) { ?>
        if (contSupervisores == contSupervisoresF){
            document.getElementById('supervisor'+contSupervisoresF).value = "<?=$supervisor['AcaoSupervisorLocal']['IdSupervisor'] ?>";
            document.getElementById('local'+contSupervisoresF).value = "<?=$supervisor['AcaoSupervisorLocal']['Local'] ?>";
            
        }else{
        var NovoLocal = $('#local1').clone();
        var NovoSupervisor = $('#supervisor1').clone();
        $(NovoSupervisor).attr("name", "supervisor" + contSupervisoresF);
        $(NovoLocal).attr("name", "local" + contSupervisoresF);
$(NovoLocal).attr("id", "local"+contSupervisoresF);
$(NovoSupervisor).attr("id", "supervisor"+contSupervisoresF);
        $(divLocais).append('<label>Local ' + contSupervisoresF + '</label>');
        $(divLocais).append(NovoLocal);
        $(divLocais).append('<label>Qual o supervisor para este novo local?</label>');
        $(divLocais).append(NovoSupervisor);
        qtdLocais.value = contLocais;
        qtdSupervisores.value = contSupervisores;
         document.getElementById('supervisor'+contSupervisoresF).value = "<?=$supervisor['AcaoSupervisorLocal']['IdSupervisor'] ?>";
            document.getElementById('local'+contSupervisoresF).value = "<?=$supervisor['AcaoSupervisorLocal']['Local'] ?>";
            
  
 
        }
  contSupervisoresF++;

<?php }?>










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


