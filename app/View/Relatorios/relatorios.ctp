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

.relatorio{
    background-color:orange;
    color :white;
    text-align: center;
    margin-top: 34px;
    width: 200px;
    padding-top: 8px;
    }


.distanciaEscolha{
padding-left: 20px; 
padding-top:10px; 
padding-bottom: 10px;
width: 250px;

}

.paddingButton {
margin-top: 45px;
  width:200px;
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
   </section>
<div class="relatorios relatorios" style="margin: 20px" >
<?php echo $this->Form->create('Relatorios'); ?>
    <fieldset>
        <div class="panel panel-default">
            <div class="row">
                <div class="div'=>'col-sm-12 col-md-7 col-xs-12">
                <div style="margin: 20px">
              

                <?php     $Clientes = $this->requestAction('/Clientes/nomesClientes'); ?>
          <table>
              <tr>
                 <td class="tamanhoDuplo"> <?php   echo $this->Html->div('row',$this->Form->input('Cliente',
                    array('label'=>'Por Cliente',
                            'id'=>'cliente',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Cliente'),
                            'title'=>__('Cliente'),
                            'options'=> $Clientes,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                      array('escape'=>false)); ?> </td>
				<td > <?php echo $this->Form->postLink($this->Html->tag('button', $this->Html->tag('i', 'Gerar Relatório em PDF', array('class' => 'relatorio')), array('class' => 'relatorio','data-toggle'=>'tooltip','data-original-title'=>__('Gerar Relatório'),'title'=>__('Gerar Relatório'),'escape' => false)), $this->Html->url(array('controller'=>'Relatorios','action' => 'relatorios')), array('escape' => false)); ?> </td>

             </tr>
          </table>
              <table>
        <tr>
          <td class="tamanhoDuplo"> <?php    $Supervisores = $this->requestAction('/Funcionarios/supervisores'); ?>
                   <?php echo $this->Html->div('row',$this->Form->input('Supervisor',
                    array(  'id'=>'supervisor',
                            'label'=>'Por Supervisor',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Supervisor'),
                            'title'=>__('Supervisor'),
                            'options'=> $Supervisores,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                     array('escape'=>false)); ?>  </td>
		<td > <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', 'Gerar Relatório', array('class' => 'relatorio')), array('class' => 'relatorio','data-toggle'=>'tooltip','data-original-title'=>__('Gerar Relatório'),'title'=>__('Gerar Relatório'),'escape' => false)), $this->Html->url(array('controller'=>'Relatorios','action' => 'relatorios')), array('escape' => false)); ?> </td>
        </tr>
      </table>
       <table>
       	<tr>
		<td class="tamanhoDuplo"> <?php echo $this->Html->div('row',$this->Form->input('Inicio',array('label'=>'Do Inicio','id'=>'Inicio','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Inicio'),'title'=>__('Inicio'),'class'=>'form-control input-sm')),array('escape'=>false)); ?></td>
   		<td > <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', 'Gerar Relatório', array('class' => 'relatorio')), array('class' => 'relatorio','data-toggle'=>'tooltip','data-original-title'=>__('Gerar Relatório'),'title'=>__('Gerar Relatório'),'escape' => false)), $this->Html->url(array('controller'=>'Relatorios','action' => 'relatorios')), array('escape' => false)); ?> </td>

       	</tr>
       </table>
   </div>
                </div>
            </div>
        </div>
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