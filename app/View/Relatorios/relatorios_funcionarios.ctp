<?php
    $Acoes = $this->requestAction('/AcaoSupervisorLocals/retornaAcoesPorSupervisor/'.$idSupervisor);

        foreach ($Acoes as $acaoId ) {
    $acao = $this->requestAction('/Acaos/AcaoPorId/'.$acaoId['AcaoSupervisorLocal']['IdAcao']); 
    if (!empty($acao)){
    
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',12);
    $fpdf->SetFillColor(255,255,255);
    $fpdf->SetTextColor(0);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);
    $fpdf->SetFont('','B');

    $fpdf->Cell(0, 12, utf8_decode('Relatório de Ações'),00,0,'C', true);
    $fpdf->Ln();
    $fpdf->Ln();
    
        $fpdf->Cell(0,10,utf8_decode('Ação: '. $acao['Acao']['Nome']),0,0,'C',true);
        $fpdf->Ln();

    $user = AuthComponent::user();
    $caminhoFoto = WWW_ROOT . 'img/'.$user['image'];
    $fpdf->Image($caminhoFoto, 11, 9,20,20);
    if ($user['empresa']=='Top'){
       $fpdf->SetFillColor(138,43,226);
    }else{
       $fpdf->SetFillColor(255,140,0);
    }

    $fpdf->SetTextColor(255);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);

        $fpdf->SetFont('','B',10);

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
    $cont = 0;
    $contC = 0;
    $contS = 0;
    $contL = 0;
    $altura = 10;
    $Reponsavel = $this->requestAction('Clientes/retornaResponsavel/'.$acao['Acao']['Cliente']);
    $Email = $this->requestAction('Clientes/retornaEmail/'.$acao['Acao']['Cliente']);
    $SupervisoresArray = $this->requestAction('/AcaoSupervisorLocals/retornaSupervisores/'.$acao['Acao']['Id']);
              $supervisores = '';
              foreach ($SupervisoresArray as $supervisor) {
              $contS++;
                $teste = $this->requestAction('/Funcionarios/nomeSupervisor/'. $supervisor['AcaoSupervisorLocal']['IdSupervisor']);
                  if (!empty($teste)){
                    $supervisores = $supervisores . $teste['Funcionario']['Nome'] . "\n";
                  
                  }
                }
       $ClientesArray = $this->requestAction('/AcaoClientes/retornaClientes/'.$acao['Acao']['Id']);
              $clientes = '';
              foreach ($ClientesArray as $cliente) {
              $contC++;
                $ThisCliente = $this->requestAction('/Clientes/nomeCliente/'. $cliente['AcaoCliente']['IdCliente']);
                $clientes = $clientes . $ThisCliente['Cliente']['Nome'] . "\n";
         }
        $locaisArray = $this->requestAction('/AcaoSupervisorLocals/retornaLocais/'.$acao['Acao']['Id']);
                $locais='';
                foreach ($locaisArray as $local) {
                $contL++;
                  # code...
                    $locais = $locais . $local['AcaoSupervisorLocal']['Local'] . "\n";

                }  
  
             $cont = max($contC, $contS, $contL); 

  $alturaClientes =   $altura*$cont/$contC;
  $alturaSupervisores = $altura*$cont/$contS;
  $alturaLocais = $altura*$cont/$contL;         
  $fpdf->MultiCell(80, $alturaLocais,utf8_decode($locais),1,'L',false);
  $fpdf->SetXY(90, 54);
  $fpdf->MultiCell(30,$alturaClientes,utf8_decode($clientes),1,'C',false);
  $fpdf->SetXY(120, 54);
  $fpdf->MultiCell(25,$alturaSupervisores,utf8_decode($supervisores),1,'C',false);
    
  $fpdf->SetXY(145, 54);
  $fpdf->MultiCell(30,$altura * $cont,utf8_decode($Reponsavel),1,'C',false);
  $fpdf->SetXY(175,54);
  $fpdf->MultiCell(25,$altura * $cont,utf8_decode($Email),1,'C',false);
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
        
  if ($contFotos==0){
    $contFotos=1;
  }
     $NovaPagina = $fpdf->PageNo();
  }

   }

    ob_get_clean();
    $fpdf->Output();




?>
