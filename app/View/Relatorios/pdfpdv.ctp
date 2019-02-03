
<?php
  
$distancia = 45;
    


		foreach ($Acoes as $acao ) {
  	 $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',12);
    $fpdf->SetFillColor(255,255,255);
    $fpdf->SetTextColor(0);
    $fpdf->SetDrawColor(0,0,0);
    $fpdf->SetLineWidth(.3);
    $fpdf->SetFont('','B');

    $fpdf->Cell(0, 12, utf8_decode('Relatorios de Ações'),0,0,'C', true);
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

    $fpdf->Cell(38,10,'Nome',1,0,'C',true);
    $fpdf->Cell(38,10,utf8_decode('Início'),1,0,'C',true);
    $fpdf->Cell(38,10,utf8_decode('Funcionários'),1,0,'C',true);
    $fpdf->Cell(38,10,'Equipe',1,0,'C',true);
    $fpdf->Cell(38,10,'Fotos',1,0,'C',true);

    $fpdf->Ln();
    $fpdf->SetFillColor(224,235,255);
    $fpdf->SetTextColor(0);
    $fpdf->SetFont('Arial', 'B', 10);
    $i = 0;

    $PaginaAtual = $fpdf->PageNo();

    $dirFotos = new Folder(WWW_ROOT . 'img'.DS.'uploads'.DS.$acao['AcaoPDV']['Nome']);
    $fotosPasta ='./uploads/'.$acao['AcaoPDV']['Nome'];
    $fotos = $dirFotos->find('.*\.(png|jpg)', true);    
    $contFotos = 0;
        foreach ($fotos as $foto ){
          $caminhoFoto = $fotosPasta.'/'.$foto;
          $caminhoFotoPopUp = WWW_ROOT . '/img/uploads/'.$acao['AcaoPDV']['Nome'].'/'.$foto;
          $fpdf->Image($caminhoFotoPopUp,163,$distancia+$i,36,18);
          $contFotos = $contFotos +1;
               $i = $i + 20;
      }
        
  if ($contFotos==0){
    $contFotos=1;
  }

     $fpdf->Cell(38,$contFotos*20,utf8_decode($acao['AcaoPDV']['Nome']),1,0,'C',false);
		 $dia = substr($acao['AcaoPDV']['Inicio'], 0, 10);

     $fpdf->Cell(38,$contFotos*20,$acao['AcaoPDV']['Inicio'],1,0,'C',false);
		 $fpdf->Cell(38,$contFotos*20,utf8_decode($acao['AcaoPDV']['Funcionarios']),1,0,'C',false);
		 $fpdf->Cell(38,$contFotos*20,utf8_decode($acao['AcaoPDV']['Equipe']),1,0,'C',false);
     $fpdf->Cell(38,$contFotos*20,'',1,0,'C',false);
     $fpdf->Ln();
   	# code...
     $NovaPagina = $fpdf->PageNo();
  }

ob_get_clean();
    $fpdf->Output();


?>
