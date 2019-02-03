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
.tamanhoSimples{
  width: 300px;
  padding-top: 10px;
}

</style>

<section class="content-header">
   </section>
<div class="mensagems mensagems" style="margin: 20px" >
<?php echo $this->Form->create('Mensagems'); ?>
    <fieldset>
        <div class="panel panel-default">
            <div class="row">
                <div class="div'=>'col-sm-12 col-md-7 col-xs-12">
                <div style="margin: 20px">
              

                <?php     $Clientes = $this->requestAction('/Clientes/nomesClientes'); ?>
          <table>
              <tr>
               <?php $MensagensMecanica = $this->requestAction('/Mensagems/AlertaMecanica'); ?>

                 <td class="tamanhoDuplo"> <?php   echo $this->Html->div('row',$this->Form->input('AlertaMecanica',
                    array('label'=>'Alerta Mecânica da ação:',
                            'id'=>'cliente',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Cliente'),
                             'options'=> $MensagensMecanica,
                            'empty'=>'Escolha',
                        	 'title'=>__('Cliente'),
                             'class'=>'form-control')),
                      array('escape'=>false)); ?> </td>
			<?php	$Supervisores = $this->requestAction(array('admin'=>true, 'controller'=>'Users', 'action'=>'nomesUsuarios')); ?>
                
				<td class="tamanhoSimples"> <?php echo $this->Html->div('row',$this->Form->input('IdUserMecanica',
                    array(  'id'=>'supervisor',
                            'label'=>'Para quem enviar?',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('User'),
                            'title'=>__('User'),
                            'options'=> $Supervisores,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                     array('escape'=>false)); ?>
    </td>

				<td > <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', 'Enviar Mensagem', array('class' => 'relatorio')), array('class' => 'relatorio','data-toggle'=>'tooltip','data-original-title'=>__('Enviar Mensagem'),'title'=>__('Enviar Mensagem'),'escape' => false)), $this->Html->url(array('controller'=>'Mensagems','action' => 'mensagens')), array('escape' => false)); ?> </td>

             </tr>
          </table>
              <table>
        <tr>
          <td class="tamanhoDuplo"> <?php    $MensagensFluxo = $this->requestAction('/Mensagems/AlertaFluxo'); ?>
                   <?php echo $this->Html->div('row',$this->Form->input('AlertaFluxo',
                    array(  'id'=>'supervisor',
                            'label'=>'Alerta de Fluxo',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('AlertaMecanica'),
                            'title'=>__('AlertaMecanica'),
                            'options'=> $MensagensFluxo,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                     array('escape'=>false)); ?>  </td>
					<td class="tamanhoSimples"> <?php echo $this->Html->div('row',$this->Form->input('IdUserFluxo',
                    array(  'id'=>'supervisor',
                            'label'=>'Para quem enviar?',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('User'),
                            'title'=>__('User'),
                            'options'=> $Supervisores,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                     array('escape'=>false)); ?>
    </td>


				<td > <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', 'Enviar Mensagem', array('class' => 'relatorio')), array('class' => 'relatorio','data-toggle'=>'tooltip','data-original-title'=>__('Enviar Mensagem'),'title'=>__('Enviar Mensagem'),'escape' => false)), $this->Html->url(array('controller'=>'Mensagems','action' => 'mensagens')), array('escape' => false)); ?> </td>
        </tr>
      </table>

       <table>
       	<tr>

                <td class="tamanhoDuplo"> <?php    $MensagensGenero = $this->requestAction('/Mensagems/AlertaGenero'); ?>
   		      <?php echo $this->Html->div('row',$this->Form->input('AlertaGenero',
                    array(  'id'=>'supervisor',
                            'label'=>'Alerta de Gênero',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Supervisor'),
                            'title'=>__('Supervisor'),
                            'options'=> $MensagensGenero,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                     array('escape'=>false)); ?>  </td>
			<td class="tamanhoSimples"> <?php echo $this->Html->div('row',$this->Form->input('IdUserGenero',
                    array(  'id'=>'supervisor',
                            'label'=>'Para quem enviar?',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('User'),
                            'title'=>__('User'),
                            'options'=> $Supervisores,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                     array('escape'=>false)); ?>
    </td>

				<td > <?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', 'Enviar Mensagem', array('class' => 'relatorio')), array('class' => 'relatorio','data-toggle'=>'tooltip','data-original-title'=>__('Enviar Mensagem'),'title'=>__('Enviar Mensagem'),'escape' => false)), $this->Html->url(array('controller'=>'Mensagems','action' => 'mensagens')), array('escape' => false)); ?> </td>

    	       </tr>
           </table>
         </div>
       </div>
     </div>
   </div>
 </fieldset>
</div>

