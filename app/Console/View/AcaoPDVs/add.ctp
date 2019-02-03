<section class="content-header">
    <h1>
        <?php echo __('Acao P D Vs'); ?>
        <small><?php echo __('Add').' '.__('Acao P D V'); ?></small>
    </h1>
     <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Acao P D Vs'),'/Acao P D Vs');
              $this->Html->addCrumb(__('Add').' '.__('Acao P D V'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="acaoPDVs form" style="margin: 20px" >
<?php echo $this->Form->create('AcaoPDV'); ?>
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
					 echo $this->Html->div('row',$this->Form->input('AcaoPDVcol',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('AcaoPDVcol'),'title'=>__('AcaoPDVcol'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Cliente',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Cliente'),'title'=>__('Cliente'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Equipe',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Equipe'),'title'=>__('Equipe'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Supervisor',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Supervisor'),'title'=>__('Supervisor'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Funcionarios',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Funcionarios'),'title'=>__('Funcionarios'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Local',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Local'),'title'=>__('Local'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Latitude',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Latitude'),'title'=>__('Latitude'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Longitude',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Longitude'),'title'=>__('Longitude'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Empresa',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Empresa'),'title'=>__('Empresa'),'class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('Inicio',array('id'=>'Inicio','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Inicio'),'title'=>__('Inicio'),'class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('Termino',array('id'=>'Termino','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Termino'),'title'=>__('Termino'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Fotos',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Fotos'),'title'=>__('Fotos'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Videos',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Videos'),'title'=>__('Videos'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Removed',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Removed'),'title'=>__('Removed'),'class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('Created',array('id'=>'Created','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Created'),'title'=>__('Created'),'class'=>'form-control input-sm')),array('escape'=>false));
					echo $this->Html->div('row',$this->Form->input('Modified',array('id'=>'Modified','div'=>'col-xs-12 datetimepicker','type'=>'text','data-toggle'=>'tooltip','data-original-title'=>__('Modified'),'title'=>__('Modified'),'class'=>'form-control input-sm')),array('escape'=>false));
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