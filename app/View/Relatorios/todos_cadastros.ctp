
<?php
  
//CLIENTES
    $Clientes = $this->requestAction('/Clientes/Todos');
  	$fpdf->AddPage();
    $fpdf->SetFont('Arial','B',12);
    $fpdf->SetFillColor(255,255,255);
    $fpdf->SetTextColor(0);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);
    $fpdf->SetFont('','B');
    $fpdf->Cell(0, 12, utf8_decode('Relatório de Clientes'),0,0,'C', true);
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
    $fpdf->Cell(20,10,'CNPJ',1,0,'C',true);
    $fpdf->Cell(27,10,utf8_decode('Nome'),1,0,'C',true);
    $fpdf->Cell(32,10,utf8_decode('Responsavel'),1,0,'C',true);
    $fpdf->Cell(43,10,utf8_decode('Endereço'),1,0,'C',true);
    $fpdf->Cell(25,10,'Telefone',1,0,'C',true);
    $fpdf->Cell(42,10,'Email',1,0,'C',true);
    $fpdf->SetTextColor(0);
    $fpdf->Ln();
    $fpdf->SetFont('Arial','',7);
    foreach ($Clientes as $cliente) {
        $fpdf->Cell(20, 10, utf8_decode($cliente['Cliente']['CNPJ']),1,0,'C');
        $fpdf->Cell(27, 10, utf8_decode($cliente['Cliente']['Nome']),1,0,'C');
        $fpdf->Cell(32, 10, utf8_decode($cliente['Cliente']['Responsavel']),1,0,'C');
        $fpdf->Cell(43, 10, utf8_decode($cliente['Cliente']['Endereco']),1,0,'C');
        $fpdf->Cell(25, 10, utf8_decode($cliente['Cliente']['Telefone']),1,0,'C');
        $fpdf->Cell(42, 10, utf8_decode($cliente['Cliente']['Email']),1,0,'C');
        $fpdf->Ln();
      # code...
    }



//FUNCIONÁRIOS
 $Funcionarios = $this->requestAction('/Funcionarios/todosFuncionarios');
 $fpdf->AddPage();
 $fpdf->SetFont('Arial','B',12);
 $fpdf->SetFillColor(255,255,255);
 $fpdf->SetTextColor(0);
 $fpdf->SetDrawColor(0,0,0);
 $fpdf->SetLineWidth(.3);
 $fpdf->SetFont('','B');
 $fpdf->Cell(0, 12, utf8_decode('Relatório de Funcionários'),0,0,'C', true);
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
 $fpdf->Cell(64,10,utf8_decode('Endereço'),1,0,'C',true);
 $fpdf->Cell(25,10,utf8_decode('Cargo'),1,0,'C',true);
 $fpdf->Cell(25,10,'Telefone',1,0,'C',true);
 $fpdf->Cell(45,10,'Email',1,0,'C',true);
 $fpdf->SetTextColor(0);
 $fpdf->Ln();
 $fpdf->SetFont('Arial','',7);
    foreach ($Funcionarios as $funcionarios) {
        $fpdf->Cell(31, 10, utf8_decode($funcionarios['Funcionario']['Nome']),1,0,'C');
        $fpdf->Cell(64, 10, utf8_decode($funcionarios['Funcionario']['Endereco']),1,0,'C');
        $fpdf->Cell(25, 10, utf8_decode($funcionarios['Funcionario']['Cargo']),1,0,'C');
        $fpdf->Cell(25, 10, utf8_decode($funcionarios['Funcionario']['Telefone']),1,0,'C');
        $fpdf->Cell(45, 10, utf8_decode($funcionarios['Funcionario']['Email']),1,0,'C');
        $fpdf->Ln();
      # code...
    }



//AÇÕES
$Acoes = $this->requestAction('/Acaos/todos');
foreach ($Acoes as $acao ) {
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',12);
    $fpdf->SetFillColor(255,255,255);
    $fpdf->SetTextColor(0);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);
    $fpdf->SetFont('','B');
    $fpdf->Cell(0, 12, utf8_decode('Relatorio de Ações'),00,0,'C', true);
    $fpdf->Ln();
    $fpdf->Ln();
    $fpdf->Cell(0,10,utf8_decode('Ação: '. $acao['Acao']['Nome']),0,0,'C',true);
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
    $fpdf->Cell(80,10,'Local',1,0,'C',true);
    $fpdf->Cell(30,10,utf8_decode('Cliente'),1,0,'C',true);
    $fpdf->Cell(25,10,utf8_decode('Supervisor'),1,0,'C',true);
    $fpdf->Cell(30,10,utf8_decode('Responsável'),1,0,'C',true);
    $fpdf->Cell(25,10,'Email',1,0,'C',true);
    $fpdf->Ln();
    $fpdf->SetFillColor(224,235,255);
    $fpdf->SetTextColor(0);
    $fpdf->SetFont('Arial', '', 8);
    $i = 0;
    $PaginaAtual = $fpdf->PageNo();
   if (!empty($acao['Acao']['Cliente'])){
    $Reponsavel = $this->requestAction('Clientes/retornaResponsavel/'.$acao['Acao']['Cliente']);
        $Email = $this->requestAction('Clientes/retornaEmail/'.$acao['Acao']['Cliente']);

   }else{
    $Reponsavel = "";
    $Email = "";

   }
    
    $fpdf->MultiCell(80, 10,utf8_decode($acao['Acao']['Local']),1,'C',false);
    $fpdf->SetXY(90, 54);
    $fpdf->MultiCell(30,10,$acao['Acao']['Cliente'],1,'C',false);
    $fpdf->SetXY(120, 54);
    $fpdf->MultiCell(25,10,utf8_decode($acao['Acao']['Supervisor']),1,'C',false);
    $fpdf->SetXY(145, 54);
    $fpdf->MultiCell(30,10,utf8_decode($Reponsavel),1,'C',false);
    $fpdf->SetXY(175,54);
    $fpdf->MultiCell(25,10,utf8_decode($Email),1,'C',false);
    $fpdf->Ln();
    # code...
  if ($user['empresa']=='Top'){
       $fpdf->SetFillColor(138,43,226);
    }else{
       $fpdf->SetFillColor(255,140,0);
    }
    $fpdf->SetTextColor(255);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);
    $fpdf->SetFont('','B', 12);
    $fpdf->Cell(0,10,'Fotos',1,0,'C',true);
    $dirFotos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['Acao']['Nome']);
    $fotosPasta ='./uploads/'.$acao['Acao']['Nome'];
    $fotos = $dirFotos->find('.*\.(png|jpg|jpeg)', true);    
    $contFotos = 0;
    $vertical = 86;
    $horizontal = 11;
       foreach ($fotos as $foto ){
         if ($horizontal>161){
            $horizontal = 11;
            $vertical = $vertical + 48;
          }
    $caminhoFotoPopUp = WWW_ROOT . '/img/uploads/'.$acao['Acao']['Nome'].'/'.$foto;
    $fpdf->Image($caminhoFotoPopUp,$horizontal,$vertical,46,47);
    $contFotos = $contFotos +1;
    $horizontal = $horizontal + 47;
    }       
     $NovaPagina = $fpdf->PageNo();
  }

    ob_get_clean();
    $fpdf->Output();


?>
