<?php
/**
 * Created by PhpStorm.
 * User: Edson Junior
 * Date: 24/08/2015
 * Time: 15:54
 */
?>
<div class="alert alert-danger fade in">
    <button class="close" data-dismiss="alert">
        <span><i class="fa fa-times-circle"></i></span>
    </button>
    <h4 class="alert-title">Ops! Parece que houve um erro ao tentar emitir a nota!</h4>
    <p class="alert-message">
        Antes de relatar a Fabtech vamos realizar alguns procedimentos a fim de tentar corrigir o erro.
    <ol>
        <?php if (!empty($message['retConsReciNFe']['protNFe']['infProt']) && array_key_exists("xMotivo", $message['retConsReciNFe']['protNFe']['infProt'])) {
            echo "<li><h3>" . $message['retConsReciNFe']['protNFe']['infProt']['xMotivo'] . "</h3></li>";
        } ?>
        <li>Caso tenha adicionado algum cliente, veja se no cadastro dele está tudo OK como CPF/CNPJ, endereço,
            número
            de telefone e todos os outros campos.
        </li>
        <li>Verifique se todos os produtos estão corretamente cadastrados com NCM, código de barras ou até mesmo
            nome
            fiscal.
        </li>
        <li>Verifique se os impostos dos produtos estão configurados corretamente.</li>
        <li>Verifique se os dados de sua empresa estão corretos.</li>
    </ol>
    <strong>Caso o erro persista entre em contato com a FabTech (79)3022-6845/4141-3699</strong>
    </p>
    <div class="hidden">
        <?php debug($message); ?>
    </div>
</div>