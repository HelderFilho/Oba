
<?php

 	 $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',12);
    $fpdf->SetFillColor(255,255,255);
    $fpdf->SetTextColor(0);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);
    $fpdf->SetFont('','B');

    $fpdf->Cell(0, 12, utf8_decode('Relatórios de Funcionários'),0,0,'C', true);
    $fpdf->Ln();
    $fpdf->Ln();

    $user = AuthComponent::user();
    $caminhoFoto = WWW_ROOT . 'img/'.$user['image'];
    $fpdf->Image($caminhoFoto, 10, 9,20,20);
    if ($user['empresa']=='Top'){
       $fpdf->SetFillColor(138,43,226);
    }else{
       $fpdf->SetFillColor(255,140,0);
    }
    $fpdf->SetTextColor(255);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);
    $fpdf->SetFont('','B');
 

    $fpdf->Cell(31,10,'Nome',1,0,'C',true);
    $fpdf->Cell(32,10,utf8_decode('Endereço'),1,0,'C',true);
    $fpdf->Cell(32,10,utf8_decode('Equipe'),1,0,'C',true);
    $fpdf->Cell(32,10,utf8_decode('Cargo'),1,0,'C',true);
    $fpdf->Cell(31,10,'Telefone',1,0,'C',true);
    $fpdf->Cell(32,10,'Email',1,0,'C',true);
    $fpdf->SetTextColor(0);
  $fpdf->Ln();
    $fpdf->SetFont('Arial','',7);
   

    foreach ($Funcionarios as $funcionarios) {
        $fpdf->Cell(31, 10, utf8_decode($funcionarios['FuncionariosPDV']['Nome']),1);
        $fpdf->Cell(32, 10, utf8_decode($funcionarios['FuncionariosPDV']['Endereco']),1);
        $fpdf->Cell(32, 10, utf8_decode($funcionarios['FuncionariosPDV']['Equipe']),1);
        $fpdf->Cell(32, 10, utf8_decode($funcionarios['FuncionariosPDV']['Cargo']),1);
        $fpdf->Cell(31, 10, utf8_decode($funcionarios['FuncionariosPDV']['Telefone']),1);
        $fpdf->Cell(32, 10, utf8_decode($funcionarios['FuncionariosPDV']['Email']),1);
        $fpdf->Ln();
        }

        ob_get_clean();
    $fpdf->Output();


?>
