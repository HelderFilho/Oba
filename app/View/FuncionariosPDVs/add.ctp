
<section class="content-header">
    <h1>
        <?php echo __('Funcionarios'); ?>
        <small><?php echo __('Add').' '.__('Funcionario'); ?></small>
    </h1>
     <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Funcionarios'),'/Funcionarios');
              $this->Html->addCrumb(__('Add').' '.__('Funcionario'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="funcionarios form" style="margin: 20px" >
<?php echo $this->Form->create('FuncionariosPDV'); ?>
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
                    echo $this->Html->div('row',$this->Form->input('Endereco',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Endereco'),'title'=>__('Endereco'),'class'=>'form-control input-sm')),array('escape'=>false));                
                    $user = AuthComponent::user();
                     echo $this->Html->div('row',$this->Form->hidden('Empresa',array('value'=>$user['empresa'])),array('escape'=>false));                    
         

                    $Equipes = $this->requestAction('/EquipePDVs/nomes');
                    echo $this->Html->div('row',$this->Form->input('Equipe',
                    array('label'=>'Equipe',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Equipe'),
                            'title'=>__('Equipe'),
                            'options'=> $Equipes,
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                    array('escape'=>false));
                    echo $this->Html->div('row',$this->Form->input('Tipo',
                    array('label'=>'Tipo',
                            'div'=>'col-xs-12',
                            'data-toggle'=>'tooltip',
                            'data-original-title'=>__('Tipo'),
                            'title'=>__('Tipo'),
                            'options'=> array('Fixo'=>'Fixo','Freelancer'=>'Freelancer'),
                            'empty'=>'Escolha',
                            'class'=>'form-control')),
                    array('escape'=>false));

                     echo $this->Html->div('row',$this->Form->input('Email',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Email'),'title'=>__('Email'),'class'=>'form-control input-sm')),array('escape'=>false));
                     echo $this->Html->div('row',$this->Form->input('Telefone',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Telefone'),'title'=>__('Telefone'),'class'=>'form-control input-sm')),array('escape'=>false));
                     echo $this->Html->div('row',$this->Form->input('CPF',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('CPF'),'title'=>__('CPF'),'class'=>'form-control input-sm')),array('escape'=>false));
                     echo $this->Html->div('row',$this->Form->input('Cargo',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Cargo'),'title'=>__('Cargo'),'class'=>'form-control input-sm')),array('escape'=>false));
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