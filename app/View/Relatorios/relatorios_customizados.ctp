
<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style type="text/css">
.orientacao{
 width: 50px;
  }
  .relatorio{
    background-color:orange;
    color :white;
    text-align: center;
    margin-top: 34px;
    width: 200px;
    padding-top: 5px;
    height: 40px;
    }
.check{
  width: 80px;
padding-left: 50px;
}
.checkbox label, .radio label {
    min-height: 20px;
    padding-left: 50px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}

.fonteLabelCentral{    
    font-size: x-large;
    text-align: center;
    width: 100%;
    padding-top: 15px;
}
.fonteLabel{
font-size: large;
    font-weight: 200;
    padding-top: 30px;
display: block;
border-top: 1px solid #e5e5e5;
width: 100%;
text-align: center;
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
					<?php
						 $Acoes = $this->requestAction('Acaos/nomesAcoes');
             echo $this->Html->div('row',$this->Form->input('Acao',
                      array('label'=>'Selecione a ação',
                            'id'=>'revisor',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Ações'),
                            'title'=>__('Ações'),
                            'options'=> $Acoes,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                      array('escape'=>false));

            echo $this->Form->label('Customização do relatório',null,  array('class'=>'fonteLabelCentral'));
            $options = array('V' => 'Vertical','H' => 'Horizontal');
            $atributos = array('legend'=>false, 'class'=>'orientacao', 'fonteLabelCentral', 'value'=>'V');   
            echo $this->Form->label('Orientação do relatório', null, array('class'=>'fonteLabel'));          

            echo $this->Form->radio('Orientacao', $options, $atributos);
            echo $this->Form->label('Dados a serem inseridos no relatório', null, array('class'=>'fonteLabel'));					
            echo $this->Form->input('Supervisor', array('class'=>'check','label'=>'Supervisores','value'=>'Sim','hiddenField'=>'Nao', 'type' => 'checkbox'));
            echo $this->Form->input('Local', array('class'=>'check','label'=>'Locais','value'=>'Sim','hiddenField'=>'Nao', 'type' => 'checkbox'));
            echo $this->Form->input('Loja', array('class'=>'check','label'=>'Lojas','value'=>'Sim','hiddenField'=>'Nao', 'type' => 'checkbox'));
            echo $this->Form->input('Produto', array('class'=>'check','label'=>'Produtos','value'=>'Sim','hiddenField'=>'Nao', 'type' => 'checkbox'));
            echo $this->Form->input('Promotor', array('class'=>'check','label'=>'Promotores','value'=>'Sim','hiddenField'=>'Nao', 'type' => 'checkbox'));
            echo $this->Form->input('Preco', array('class'=>'check','label'=>'Preços','value'=>'Sim','hiddenField'=>'Nao', 'type' => 'checkbox'));
            echo $this->Form->input('Concorrente1', array('class'=>'check','label'=>'Preço do concorrente 1','value'=>'Sim','hiddenField'=>'Nao', 'type' => 'checkbox'));
            echo $this->Form->input('Concorrente2', array('class'=>'check','label'=>'Preço do concorrente 2','value'=>'Sim','hiddenField'=>'Nao', 'type' => 'checkbox'));
            echo $this->Form->input('Brinde', array('class'=>'check','label'=>'Troca de brindes','value'=>'Sim','hiddenField'=>'Nao', 'type' => 'checkbox'));
           ?>

<table>
  <td><?php echo $this->Html->link($this->Html->tag('button', $this->Html->tag('i', 'Gerar Relatório em EXCEL'), array('class' => 'relatorio','data-toggle'=>'tooltip','data-original-title'=>__('Gerar Relatório em EXCEL'),'title'=>__('Gerar Relatório em EXCEL'),'escape' => false)), $this->Html->url(array('controller'=>'Relatorios', 'action' => 'relatorios_customizados')), array('escape' => false)); ?></td>


</table>
           




	
				   </div>
                </div>
            </div>
        </div>
   	</fieldset>
</div>





