<section class="content-header">
    <h1>
        <?php echo __('Pdvs'); ?>
        <small><?php echo __('Add').' '.__('Pdv'); ?></small>
    </h1>
     <?php  $this->Html->addCrumb(__(' Home'), '/',['i','class'=>'fa fa-dashboard']);
            $this->Html->addCrumb(__('Pdvs'),'/Pdvs');
              $this->Html->addCrumb(__('Add').' '.__('Pdv'));
            echo $this->Html->getCrumbList(['class'=>'breadcrumb','lastClass'=>'active']);?>
</section>
<div class="pdvs form" style="margin: 20px" >
<?php echo $this->Form->create('Pdv'); ?>
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
					 echo $this->Html->div('row',$this->Form->input('IdAcao',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('IdAcao'),'title'=>__('IdAcao'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Supervisor',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Supervisor'),'title'=>__('Supervisor'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Promotor',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Promotor'),'title'=>__('Promotor'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Loja',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Loja'),'title'=>__('Loja'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Produto',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Produto'),'title'=>__('Produto'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Preco',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Preco'),'title'=>__('Preco'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('EstoqueInicial',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('EstoqueInicial'),'title'=>__('EstoqueInicial'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('EstoqueFinal',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('EstoqueFinal'),'title'=>__('EstoqueFinal'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('PrecoConcorrente1',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('PrecoConcorrente1'),'title'=>__('PrecoConcorrente1'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('PrecoConcorrente2',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('PrecoConcorrente2'),'title'=>__('PrecoConcorrente2'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Vendas',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Vendas'),'title'=>__('Vendas'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('TrocaBrindes',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('TrocaBrindes'),'title'=>__('TrocaBrindes'),'class'=>'form-control input-sm')),array('escape'=>false));
					 echo $this->Html->div('row',$this->Form->input('Abordagens',array('div'=>'col-xs-12','data-toggle'=>'tooltip','data-original-title'=>__('Abordagens'),'title'=>__('Abordagens'),'class'=>'form-control input-sm')),array('escape'=>false));
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
