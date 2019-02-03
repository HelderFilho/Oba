<style>
  .importar{
      margin-top:35px;
      margin-left: 10px;
      margin-bottom: 20px;

  }

.file {
  margin-bottom: 20px;
  margin-top: 10px;
}

.bootstrap-switch {
    margin-top: 25px;
    margin-bottom: 20px;


}

.texto{
  margin-left: 10px;
  
}

.paddingButton {
margin-top: 30px;
  width:120px;
height: 35px;
text-align: center;
}


</style>

<section class="content-header">
    <h1>
        <?php echo __('Clientes'); ?>
        <small><?php echo __('Add').' '.__('Cliente'); ?></small>
    </h1>
     <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Clientes'),'/Clientes');
              $this->Html->addCrumb(__('Add').' '.__('Cliente'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="clientes form" style="margin: 20px" >
<?php echo $this->Form->create('Cliente', array('type'=>'file')); ?>
    <fieldset>
        <div class="panel panel-default">
            <div class="panel-heading" align="right">
                <a href="#"><button class="btn btn-primary" title='<?=__('Back')?>' onclick='window.history.back()' data-original-title='<?=__('Back')?>' data-toggle="tooltip" type="button"><i class="fa fa-reply fa-fw"></i></button></a>
                <a href="<?php echo $this->Html->url(); ?>" ><button class="btn btn-primary" title='<?=__('Refresh')?>' data-original-title='<?=__('Refresh')?>' data-toggle="tooltip" type="button"><i class="fa fa-refresh fa-fw"></i></button></a>
            </div>
            <div class="row">
                <div class="div'=>'col-sm-12 col-md-7 col-xs-12">
                    <div style="margin: 20px">
                 <table>
                 <tr>
                  
                    <td> <?php echo $this->Html->div('row',$this->Form->input('Excel',array('type'=>'file', 'id'=>'excel','label'=>'Importar clientes de arquivo Excel','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Excel'),'title'=>__('Excel'),'class'=>'form-control input-sm file')),array('escape'=>false));?> </td>
                    <td><a href="<?=$this->Html->url(array('action' => 'importarExcel'));?>"><button class="importar" type="submit"><i class="fa fa-check fa-fw"></i><?=__('Importar')?></button></a></td>
                  

                   </tr>
                   </table>
                    <?php
                
                
                     echo $this->Html->div('row',$this->Form->input('CNPJ',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('CNPJ'),'title'=>__('CNPJ'),'class'=>'form-control input-sm')),array('escape'=>false));
				     echo $this->Html->div('row',$this->Form->input('Nome',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Nome'),'title'=>__('Nome'),'class'=>'form-control input-sm')),array('escape'=>false));
                    $Usuarios = $this->requestAction(array('admin'=>true, 'controller'=>'Users', 'action'=>'nomesClientes'));
                   echo $this->Html->div('row',$this->Form->input('IdUser',
                    array(  'id'=>'cliente',
                            'label'=>'Qual o usuário correspondente a este cliente?',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Cliente'),
                            'title'=>__('Cliente'),
                            'options'=> $Usuarios,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                     array('escape'=>false));
     
                     echo $this->Html->div('row',$this->Form->input('Responsavel',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Responsavel'),'title'=>__('Responsavel'),'class'=>'form-control input-sm')),array('escape'=>false));
                     echo $this->Html->div('row',$this->Form->input('Logomarca',array('type'=>'file', 'id'=>'logo_marca','label'=>'Logomarca','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Excel'),'title'=>__('Excel'),'class'=>'form-control input-sm file')),array('escape'=>false));

      				           echo $this->Html->div('row',$this->Form->input('Endereco',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'),'class'=>'form-control input-sm')),array('escape'=>false));
				          	?>
                <table>
                    <tr>
                         <td> <?php echo $this->Html->div('row',$this->Form->input('Email',array('id'=>'email','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'),'class'=>'form-control input-sm')),array('escape'=>false));?> </td>
                         <td> <button class="addEmail paddingButton">Novo Email</button> </td>
                     </tr>
                 </table>
                    <div class="divEmails"></div>
              
              		        
                              <?php
                               echo $this->Html->div('row',$this->Form->hidden('QuantidadeEmails',array('id'=>'qtdEmail', 'value'=>'1','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Tipo'),'title'=>__('Tipo'),'class'=>'form-control input-sm')),array('escape'=>false));
                               echo $this->Html->div('row',$this->Form->input('Telefone',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'),'class'=>'form-control input-sm')),array('escape'=>false));
					           echo $this->Html->div('row',$this->Form->input('Bairro',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Bairro'),'title'=>__('Bairro'),'class'=>'form-control input-sm')),array('escape'=>false));
					           echo $this->Html->div('row',$this->Form->input('Cep',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Cep'),'title'=>__('Cep'),'class'=>'form-control input-sm')),array('escape'=>false));
					           echo $this->Html->div('row',$this->Form->input('Cidade',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Cidade'),'title'=>__('Cidade'),'class'=>'form-control input-sm')),array('escape'=>false));
					           echo $this->Html->div('row',$this->Form->input('Item_Novo',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Item_Novo'),'title'=>__('Item_Novo'),'class'=>'form-control input-sm')),array('escape'=>false));
                       
                               echo $this->Html->div('row',$this->Form->hidden('Removed',array('value'=>'N','div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'),'class'=>'form-control input-sm')),array('escape'=>false));
					           echo $this->Html->div('row',$this->Form->hidden('Created',array('id'=>'Created','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Created'),'title'=>__('Created'),'class'=>'form-control input-sm')),array('escape'=>false));
					           echo $this->Html->div('row',$this->Form->hidden('Modified',array('id'=>'Modified','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Modified'),'title'=>__('Modified'),'class'=>'form-control input-sm')),array('escape'=>false));
			                  echo $this->Html->div('row',$this->Form->input('Duplicar',
                                                                         array('div'=>'col-xs-12',
                                                                         'label'=>array('text' => 'Deseja duplicar este cliente?',
                                                                                        'class'=> 'texto'),
                                                                         'class' =>'duplicar',
                                                                         'id'=>'Conforme_Check',
                                                                         'value'=>'Sim',
                                                                         'hiddenField'=>'Não',
                                                                         'type' => 'checkbox')));
             
     
                    echo $this->Html->div('row',$this->Form->input('Empresa',
                     array('label'=>'A qual empresa deseja filiar este cliente?',
                     'div'=>'col-xs-12',
                     'data-toggle'=>'tooltip',
                     'options' => array(
                     'Oba'=>'Oba', 
                     'Top'=>'Top',
                     'Ambas'=>'Ambas'),
                     'empty'=>'Escolha',
                     'onchange'=>'ShowSelect()',
                     'data-original-title'=>__('Tipo'),
                     'title'=>__('Tipo'),
                     'id'=>'Tipo',
                     'type'=>'select',
                     'class'=>'form-control')));


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
    $(document).ready(function(){
        var divEmails = $(".divEmails");
        var qtdEmail = document.getElementById("qtdEmail");
        var addEmail = $(".addEmail");
        var contEmail = 1;
        var Email = $("#email");
        Email.attr("name", "email"+contEmail);
       
        $(addEmail).click(function(e){
            contEmail++;
            e.preventDefault();
            var NovoEmail = $("#email").clone();
            $(NovoEmail).attr("name", "email"+contEmail);
            $(divEmails).append('<label>Email ' + contEmail + '</label>');
            $(divEmails).append(NovoEmail);
            qtdEmail.value = contEmail;
        });
    });
</script>
