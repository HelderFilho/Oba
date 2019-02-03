
<?php
  


 	 $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',12);
    $fpdf->SetFillColor(255,255, 255);
    $fpdf->SetTextColor(0);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);

    $fpdf->SetFont('','B');

    
    $fpdf->Cell(0, 12, utf8_decode('Relatórios de Clientes'),0,0,'C', true);
    $user = AuthComponent::user();
    $caminhoFoto = WWW_ROOT . 'img/'.$user['image'];
    $fpdf->Image($caminhoFoto, 10, 9,20,20);
    $fpdf->Ln();
    $fpdf->Ln();
    if ($user['empresa']=='Top'){
       $fpdf->SetFillColor(138,43,226);
    }else{
       $fpdf->SetFillColor(255,140,0);
    }

    $fpdf->SetTextColor(255);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);
    
    $fpdf->Cell(31,10,'CNPJ',1,0,'C',true);
    $fpdf->Cell(32,10,utf8_decode('Nome Fantasia'),1,0,'C',true);
    $fpdf->Cell(32,10,utf8_decode('Razão Social'),1,0,'C',true);
    $fpdf->Cell(32,10,utf8_decode('Endereço'),1,0,'C',true);
    $fpdf->Cell(31,10,'Telefone',1,0,'C',true);
    $fpdf->Cell(32,10,'Email',1,0,'C',true);
    $fpdf->SetTextColor(0);
  $fpdf->Ln();
  $fpdf->SetFont('Arial','',10);
    foreach ($Clientes as $cliente) {
        $fpdf->Cell(31, 10, $cliente['ClientesPDV']['CNPJ'],1);
        $fpdf->Cell(32, 10, $cliente['ClientesPDV']['Nome_Fantasia'],1);
        $fpdf->Cell(32, 10, $cliente['ClientesPDV']['Razao_Social'],1);
        $fpdf->Cell(32, 10, $cliente['ClientesPDV']['Endereco'],1);
        $fpdf->Cell(31, 10, $cliente['ClientesPDV']['Telefone'],1);
        $fpdf->Cell(32, 10, $cliente['ClientesPDV']['Email'],1);
        $fpdf->Ln();
      # code...
    }


    ob_get_clean();
    $fpdf->Output();


?>
