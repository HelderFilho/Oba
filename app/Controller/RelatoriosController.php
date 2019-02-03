<?php
require_once 'Classes/PHPExcel.php';
class RelatoriosController extends AppController{

public function viewpdf($idCliente) {
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    $this->layout = 'pdf'; //this will use the pdf.ctp layout

    $this->set('fpdf', new FPDF('P','mm','A4'));

    $Acoes = $this->requestAction('/Acaos/todos');

   $TotalAcoes = $this->requestAction('AcaoClientes/TotalAcoesCliente/' . $idCliente);
    if ($TotalAcoes==0){
      $this->Flash->error('Cliente não possui ações');
      return $this->redirect(array('action' => 'Relatorios'));

    }else{

   $this->set(compact($idCliente, 'idCliente'));
    $this->render('pdf');
}
}



public function ExportaExcel(){
      if ($this->request->is('post')) {
      $this->Relatorio->create();

    $idCliente = $this->request->data['Relatorios']['Cliente'];
    $idSupervisor = $this->request->data['Relatorios']['Supervisor'];
    $Inicio = new DateTime($this->request->data['Relatorios']['Inicio']);


       

    if (!empty($idCliente)){
         $this->AcoesExcel($idCliente);
     //$this->ExportaExcel();
     }else if (!empty($idSupervisor)){
          $this->AcoesSupervisorExcel($idSupervisor);
     }else if (!empty($Inicio)){
          $this->AcoesTempoExcel($Inicio);
     }

}
}


public function relatorios_customizados(){




  if ($this->request->is('post')){
    $this->Relatorio->create();
    if (empty($this->request->data['Relatorios']['Acao'])){
       $this->Flash->error('Nenhuma ação selecionada');
    }else{
      $QuantidadePDV = $this->requestAction('Pdvs/retornaQuantidadePdv/' . $this->request->data['Relatorios']['Acao']);
      if ($QuantidadePDV==0){
       $this->Flash->error('Ação não possui dados para gerar este relatório');
      return $this->redirect(array('action' => 'relatorios_customizados'));

      }else{


      $objPHPExcel = new PHPExcel();
      $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
             'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER, 
        ), 'font'=>array(
            'bold'=>true,
        )
    );
    $bordasGrossas = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK,
        ),
    ),
  );

    $CoresColunas = array(
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startcolor' => array(
            'argb' => 'FFA0A0A0',
        ),
        'endcolor' => array(
            'argb' => 'FFFFFFFF',
        ),
    ),
  );



    $TodasBordasGrossas = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK,
        ),
    ),
  );

$Cor = array(
 'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'argb' => '000000',
        ),
      ), 'font'=>array(
'bold'=>true,
'color'=>array('argb'=>'FFFFFF'),
      ),
);


$CoresCelulas = array(
 'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'argb' => 'DCDCDC',
        ),
      ), 
);

  $bordasfinas = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
  );

  $fonteNegrito = array(
  'font'=>array(
  'bold'=>true,
  ));

   $alfabeto = array('A','B','C', 'D', 'E', 'F', 'G','H','I','J','K','L','M','N','O','P',
      'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB','AC','AD','AE','AF', 'AG','AH', 'AI','AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
    
    $objPHPExcel->getActiveSheet()->mergeCells('A1:C1');
    $objPHPExcel->getActiveSheet()->mergeCells('D1:F1');
    

    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'EQUIPE')
      ->setCellValue('D1', 'PONTO DE VENDA');



     $objPHPExcel->getActiveSheet()->setCellValue('A2', 'DATA')
    ->setCellValue('B2', 'SUPERVISÃO')
    ->setCellValue('C2', 'PROMOTORA')
    ->setCellValue('D2', 'BAIRRO')
    ->setCellValue('E2', 'LOJA')
    ->setCellValue('F2', 'PONTO EXTRA');
   
$produtos = $this->requestAction('PDVs/retornaProdutos/' .  $this->request->data['Relatorios']['Acao']);
  $contProdutos = 4;
  $InicioProdutos = 6;
  foreach ($produtos as $produto) {
          $contProdutos = $contProdutos + 3;
          $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos-1] . 2, strtoupper($produto['Pdv']['Produto']));
          $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos] . 2, 'ESTOQUE INICIAL');
          $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos+1] . 2, 'ESTOQUE FINAL');
  }
  $ColunaProdutos = $contProdutos+3; 
    $objPHPExcel->getActiveSheet()->mergeCells('G1:'.$alfabeto[$ColunaProdutos-2].'1');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'PRODUTO NO PDV');


  foreach ($produtos as $produto) {
          $contProdutos = $contProdutos + 3;
          $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos-1] . 2, strtoupper($produto['Pdv']['Produto']));
          $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos] . 2, 'CONCORRENTE 1');
          $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos+1] . 2, 'CONCORRENTE 2');
  }
    $contQuantidade = $contProdutos + 2;

    $objPHPExcel->getActiveSheet()->mergeCells($alfabeto[$ColunaProdutos-1].'1:'.$alfabeto[$contQuantidade-1].'1');
    $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$ColunaProdutos-1] . '1', 'PREÇOS NOS PONTOS DE VENDAS');  
    

    $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contQuantidade] . 1, 'ABORDAGENS');
    $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contQuantidade] . 2, 'QUANTIDADE');
    $contProdutos = $contProdutos + 3;
    $contVendas = $contProdutos;
  
  foreach ($produtos as $produto) {
    $contProdutos = $contProdutos + 1;
    $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos-1] . 2, strtoupper($produto['Pdv']['Produto']));
  }
    $objPHPExcel->getActiveSheet()->mergeCells($alfabeto[$contVendas].'1:'.$alfabeto[$contProdutos-1].'1');
    $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contVendas].'1', 'VENDAS');

$objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos] . 1, 'TROCA DE BRINDES');
$objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos] . 2, 'BRINDES');
$promotores = $this->requestAction('PDVs/retornaPromotores/' . $this->request->data['Relatorios']['Acao']);
$Vertical = 3;
$TotalBrindes = 0;






  foreach ($promotores as $promotor) {
    $contP = 0;
    $brindes = 0;
    $abordagens = 0;
    $ColunaPreco = $ColunaProdutos;
    $ColunaVendas = $contVendas;
    $acoes = $this->requestAction('PDVs/retornaPdvPromotores/' .$this->request->data['Relatorios']['Acao'] . '/' . $promotor['Pdv']['Promotor']);
        foreach ($acoes as $acao) {
         $Produto = '';
      
         if (!empty($acao['Pdv']['Produto'])){
            $Produto = 'Sim';
         }else{
          $Produto = 'Não';
         }

          if ($contP==0){
              $objPHPExcel->getActiveSheet()->setCellValue('A'.$Vertical, '28/12/12');
              $objPHPExcel->getActiveSheet()->setCellValue('B'.$Vertical, $acao['Pdv']['Supervisor']);
              $objPHPExcel->getActiveSheet()->setCellValue('C'.$Vertical, $acao['Pdv']['Promotor']);
              $objPHPExcel->getActiveSheet()->setCellValue('D'.$Vertical, $acao['Pdv']['Bairro']);
              $objPHPExcel->getActiveSheet()->setCellValue('E'.$Vertical, $acao['Pdv']['Loja']);
              $objPHPExcel->getActiveSheet()->setCellValue('F'.$Vertical, $acao['Pdv']['PontoExtra']);
              $objPHPExcel->getActiveSheet()->setCellValue('G'.$Vertical, $Produto);
              $objPHPExcel->getActiveSheet()->setCellValue('H'.$Vertical, $acao['Pdv']['EstoqueInicial']);
              $objPHPExcel->getActiveSheet()->setCellValue('I'.$Vertical, $acao['Pdv']['EstoqueFinal']);
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$ColunaPreco-1] . $Vertical, $acao['Pdv']['Preco']);
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$ColunaPreco] . $Vertical, $acao['Pdv']['PrecoConcorrente1']);
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$ColunaPreco+1] . $Vertical, $acao['Pdv']['PrecoConcorrente2']);
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$ColunaVendas] . $Vertical, $acao['Pdv']['Vendas']);
              $ColunaVendas++;
              $ColunaPreco = $ColunaPreco + 3;
          }else{
              $Horizontal = 9 + 3 * ($contP-1);
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$Horizontal] . $Vertical, $Produto);
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$Horizontal+1] . $Vertical, $acao['Pdv']['EstoqueInicial']);
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$Horizontal+2] . $Vertical, $acao['Pdv']['EstoqueFinal']);
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$ColunaPreco-1] . $Vertical, strtoupper($acao['Pdv']['Preco']));
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$ColunaPreco] . $Vertical, strtoupper($acao['Pdv']['PrecoConcorrente1']));
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$ColunaPreco+1] . $Vertical, strtoupper($acao['Pdv']['PrecoConcorrente2']));
              $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$ColunaVendas] . $Vertical, $acao['Pdv']['Vendas']);
              $ColunaPreco = $ColunaPreco + 3;
              $ColunaVendas++;

          }
          $contP++;
          $brindes = $brindes + (int) $acao['Pdv']['TrocaBrindes'];
          $abordagens = $abordagens + (int)$acao['Pdv']['Abordagens'];
        }
          $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos] . $Vertical, $brindes);
          $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contQuantidade] . $Vertical, $abordagens);

    $Vertical++;

}
$objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contProdutos] . $Vertical, '=SUM('.$alfabeto[$contProdutos].'3:'.$alfabeto[$contProdutos].($Vertical-1).')');
     $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contVendas-1] . $Vertical, 'TOTAL=');
 
  foreach ($produtos as $produto) {
    $objPHPExcel->getActiveSheet()->setCellValue($alfabeto[$contVendas] . $Vertical, '=SUM('.$alfabeto[$contVendas].'3:'.$alfabeto[$contVendas].($Vertical-1).')');
    $contVendas++;
  }          
    $objPHPExcel->getDefaultStyle()->applyFromArray($style);
    
    $objPHPExcel->getActiveSheet()->getStyle('A1:'.$alfabeto[$contVendas].($Vertical-1))->applyFromArray($bordasfinas);
    $objPHPExcel->getActiveSheet()->getStyle('A1:'.$alfabeto[$contVendas].($Vertical-1))->applyFromArray($CoresCelulas);
    $objPHPExcel->getActiveSheet()->getStyle('A1:'.$alfabeto[$contVendas].'1')->applyFromArray($TodasBordasGrossas);
    $objPHPExcel->getActiveSheet()->getStyle('A2:'.$alfabeto[$contVendas].'2')->applyFromArray($Cor);
    $objPHPExcel->getActiveSheet()->getStyle('A1:'.$alfabeto[$contVendas].'1')->applyFromArray($CoresColunas);
    
    $objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
    $objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(20);
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
    $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);


  if ($this->request->data['Relatorios']['Supervisor']=='Nao'){
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setVisible(false);
  }

  if ($this->request->data['Relatorios']['Local']=='Nao'){
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setVisible(false);
  }

  if ($this->request->data['Relatorios']['Loja']=='Nao'){ 
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setVisible(false);
  }

  if ($this->request->data['Relatorios']['Promotor']=='Nao'){
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(false);
  }

  if ($this->request->data['Relatorios']['Produto']=='Nao'){
    for ($i=6; $i<$ColunaProdutos-1;$i++){
      $objPHPExcel->getActiveSheet()->getColumnDimension($alfabeto[$i])->setVisible(false);
    }
  }

  if ($this->request->data['Relatorios']['Preco']=='Nao'){
    for ($i=$ColunaProdutos-1; $i<$contQuantidade-1;$i = $i + 3){
      $objPHPExcel->getActiveSheet()->getColumnDimension($alfabeto[$i])->setVisible(false);
    }
  }

  if ($this->request->data['Relatorios']['Concorrente1']=='Nao'){
  for ($i=$ColunaProdutos; $i<$contQuantidade;$i = $i + 3){
      $objPHPExcel->getActiveSheet()->getColumnDimension($alfabeto[$i])->setVisible(false);
    }
  }

  if ($this->request->data['Relatorios']['Concorrente2']=='Nao'){
  for ($i=$ColunaProdutos+1; $i<$contQuantidade;$i = $i + 3){
      $objPHPExcel->getActiveSheet()->getColumnDimension($alfabeto[$i])->setVisible(false);
    }
  }


if ($this->request->data['Relatorios']['Brinde']=='Nao'){
$objPHPExcel->getActiveSheet()->getColumnDimension($alfabeto[$contProdutos])->setVisible(false);
}


if ($this->request->data['Relatorios']['Orientacao']=='H'){
  $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
}else{
  $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
}



PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Relatorio.xlsx"');
$objWriter->save('php://output');

























  }

}


}

}




public function AcoesSupervisorExcel($idSupervisor){
    $Acoes = $this->requestAction('/AcaoSupervisorLocals/retornaAcoesPorSupervisor/'.$idSupervisor);
    $objPHPExcel = new PHPExcel();
    $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
             'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER, 
        )
    );
    $bordasGrossas = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK,
        ),
    ),
  );

  $bordasfinas = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
  );

  $fonteNegrito = array(
  'font'=>array(
  'bold'=>true,
  ));

   

    $objPHPExcel->getDefaultStyle()->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle('B2:I3')->applyFromArray($bordasGrossas);
        $objPHPExcel->getActiveSheet()->getStyle('B2:I3')->applyFromArray($fonteNegrito);

    $objPHPExcel->getActiveSheet()->getStyle('B4:I4')->applyFromArray($bordasfinas);
    $objPHPExcel->getActiveSheet()->getStyle('B4:I4')->applyFromArray($fonteNegrito);

    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

    $objPHPExcel->getActiveSheet()->mergeCells('B2:I3');
    $objPHPExcel->getActiveSheet()->getStyle('B2')
    ->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);

    $objPHPExcel->getActiveSheet()->setCellValue('B2', 'Relatório de Ações Por Supervisor');
    $objPHPExcel->getActiveSheet()->setCellValue('B4', 'Nome')
    ->setCellValue('C4', 'Local')
    ->setCellValue('D4', 'Cliente')
    ->setCellValue('E4', 'Responsável')
    ->setCellValue('F4', 'Email')
    ->setCellValue('G4', 'Supervisor')
    ->setCellValue('H4', 'Inicio')
    ->setCellValue('I4', 'Termino');

    $cont = 4;
    

$nome = '';
    foreach ($Acoes as $acaoId) {
      $cont++;

         $acao = $this->requestAction('/Acaos/AcaoPorId/'.$acaoId['AcaoSupervisorLocal']['IdAcao']); 
         
           $locaisArray = $this->requestAction('/AcaoSupervisorLocals/retornaLocais/'.$acao['Acao']['Id']);
                $locais='';
                foreach ($locaisArray as $local) {
                    $locais = $locais . $local['AcaoSupervisorLocal']['Local'] . "\n";
              }  

          $ClientesArray = $this->requestAction('/AcaoClientes/retornaClientes/'.$acao['Acao']['Id']);
              $clientes = '';
              $responsaveis = '';
              $emails = '';
              foreach ($ClientesArray as $cliente) {
                $ThisCliente = $this->requestAction('/Clientes/nomeCliente/'. $cliente['AcaoCliente']['IdCliente']);
                $clientes = $clientes . $ThisCliente['Cliente']['Nome'] . "\n";
                $responsaveis = $responsaveis . $this->requestAction('Clientes/retornaResponsavel/'. $cliente['AcaoCliente']['IdCliente']); 
              $emails = $emails . $this->requestAction('Clientes/retornaEmail/'. $cliente['AcaoCliente']['IdCliente']);
         }
         
    //$Reponsavel = $this->requestAction('Clientes/retornaResponsavel/'.$acao['Acao']['Cliente']);
          
       //  $Email = $this->requestAction('Clientes/retornaEmail/'.$idCliente);
   
           $SupervisoresArray = $this->requestAction('/AcaoSupervisorLocals/retornaSupervisores/'.$acao['Acao']['Id']);
              $supervisores = '';
              foreach ($SupervisoresArray as $supervisor) {
                $teste = $this->requestAction('/Funcionarios/nomeSupervisor/'. $supervisor['AcaoSupervisorLocal']['IdSupervisor']);
                  if (!empty($teste)){
                    $supervisores = $supervisores . $teste['Funcionario']['Nome'] . "\n";
                  $nome = $teste['Funcionario']['Nome'];
                  }
                }

          $objPHPExcel->getActiveSheet()->setCellValue('B'.$cont, $acao['Acao']['Nome']);

          $objPHPExcel->getActiveSheet()->setCellValue('C'.$cont, $locais);
          
          $objPHPExcel->getActiveSheet()->setCellValue('D'.$cont, $clientes);
         
          $objPHPExcel->getActiveSheet()->setCellValue('E'.$cont, $responsaveis);
    
          $objPHPExcel->getActiveSheet()->setCellValue('F'.$cont, $emails);

          $objPHPExcel->getActiveSheet()->setCellValue('G'.$cont, $supervisores);
          $objPHPExcel->getActiveSheet()->setCellValue('H'.$cont, $acao['Acao']['Inicio']);
          $objPHPExcel->getActiveSheet()->setCellValue('I'.$cont, $acao['Acao']['Termino']);

    
    }


        $objPHPExcel->getActiveSheet()->getStyle('B5:I'.$cont)->applyFromArray($bordasfinas);
        $objPHPExcel->getActiveSheet()->getStyle('B4:I'.$cont)->applyFromArray($bordasGrossas);


   
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Relatório de ações do supervisor ' . $nome .'.xlsx"');
header('Cache-Control: max-age=0');



    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    return $this->redirect(array('controller'=>'equipes', 'action' => 'index'));




// Hide "Phone" and "fax" column
//echo date('H:i:s') , " Hide 'Phone' and 'fax' columns" , EOL;
//$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(false);
//$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setVisible(false);

//$objConditional2 = new PHPExcel_Style_Conditional();
//$objConditional2->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

//$objPHPExcel->getActiveSheet()->mergeCells('A1:C1');

//$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);



    













}

public function AcoesTempoExcel ($inicio){
$data = $inicio->format('Y-m-d');
     $Acoes = $this->requestAction('/Acaos/AcaoPorTempo/'. $data);
       $objPHPExcel = new PHPExcel();
    $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
             'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER, 
        )
    );
$bordasGrossas = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK,
        ),
    ),
);

$bordasfinas = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
);

$fonteNegrito = array(
'font'=>array(
'bold'=>true,
));



    $objPHPExcel->getDefaultStyle()->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle('B2:I3')->applyFromArray($bordasGrossas);
        $objPHPExcel->getActiveSheet()->getStyle('B2:I3')->applyFromArray($fonteNegrito);

    $objPHPExcel->getActiveSheet()->getStyle('B4:I4')->applyFromArray($bordasfinas);
    $objPHPExcel->getActiveSheet()->getStyle('B4:I4')->applyFromArray($fonteNegrito);

    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

    $objPHPExcel->getActiveSheet()->mergeCells('B2:I3');
    $objPHPExcel->getActiveSheet()->getStyle('B2')
    ->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);

    $objPHPExcel->getActiveSheet()->setCellValue('B2', 'Relatório de Ações Por Cliente');
    $objPHPExcel->getActiveSheet()->setCellValue('B4', 'Nome')
    ->setCellValue('C4', 'Local')
    ->setCellValue('D4', 'Cliente')
    ->setCellValue('E4', 'Responsável')
    ->setCellValue('F4', 'Email')
    ->setCellValue('G4', 'Supervisor')
    ->setCellValue('H4', 'Início')
    ->setCellValue('I4', 'Término');
    $cont = 4;
     $nome = '';
         foreach ($Acoes as $acao ) {
             if (!empty($acao)){
            $cont++;
         
            $locaisArray = $this->requestAction('/AcaoSupervisorLocals/retornaLocais/'.$acao['Acao']['Id']);
                $locais='';
                foreach ($locaisArray as $local) {
                    $locais = $locais . $local['AcaoSupervisorLocal']['Local'] . "\n";
              }  

          $ClientesArray = $this->requestAction('/AcaoClientes/retornaClientes/'.$acao['Acao']['Id']);
              $clientes = '';
              $responsaveis = '';
              $emails = '';
              foreach ($ClientesArray as $cliente) {
                $ThisCliente = $this->requestAction('/Clientes/nomeCliente/'. $cliente['AcaoCliente']['IdCliente']);
                $clientes = $clientes . $ThisCliente['Cliente']['Nome'] . "\n";
                $responsaveis = $responsaveis . $this->requestAction('Clientes/retornaResponsavel/'. $cliente['AcaoCliente']['IdCliente']); 
              $emails = $emails . $this->requestAction('Clientes/retornaEmail/'. $cliente['AcaoCliente']['IdCliente']);
         }
         
    //$Reponsavel = $this->requestAction('Clientes/retornaResponsavel/'.$acao['Acao']['Cliente']);
          
       //  $Email = $this->requestAction('Clientes/retornaEmail/'.$idCliente);
   
           $SupervisoresArray = $this->requestAction('/AcaoSupervisorLocals/retornaSupervisores/'.$acao['Acao']['Id']);
              $supervisores = '';
              foreach ($SupervisoresArray as $supervisor) {
                $teste = $this->requestAction('/Funcionarios/nomeSupervisor/'. $supervisor['AcaoSupervisorLocal']['IdSupervisor']);
                  if (!empty($teste)){
                    $supervisores = $supervisores . $teste['Funcionario']['Nome'] . "\n";
                    $nome = $teste['Funcionario']['Nome'];
                  }
                }

          $objPHPExcel->getActiveSheet()->setCellValue('B'.$cont, $acao['Acao']['Nome']);

          $objPHPExcel->getActiveSheet()->setCellValue('C'.$cont, $locais);
          
          $objPHPExcel->getActiveSheet()->setCellValue('D'.$cont, $clientes);
         
          $objPHPExcel->getActiveSheet()->setCellValue('E'.$cont, $responsaveis);
    
          $objPHPExcel->getActiveSheet()->setCellValue('F'.$cont, $emails);

          $objPHPExcel->getActiveSheet()->setCellValue('G'.$cont, $supervisores);

          $objPHPExcel->getActiveSheet()->setCellValue('H'.$cont, $acao['Acao']['Inicio']);
          
          $objPHPExcel->getActiveSheet()->setCellValue('I'.$cont, $acao['Acao']['Termino']);


}
}


     $objPHPExcel->getActiveSheet()->getStyle('B5:I'.$cont)->applyFromArray($bordasfinas);
        $objPHPExcel->getActiveSheet()->getStyle('B4:I'.$cont)->applyFromArray($bordasGrossas);


   
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Relatorio de Ações a partir de  ' . $data .'.xlsx"');
header('Cache-Control: max-age=0');



    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    return $this->redirect(array('controller'=>'equipes', 'action' => 'index'));



}



public function AcoesExcel($idCliente){

    $Acoes = $this->requestAction('/AcaoClientes/retornaAcoes/'.$idCliente);
    $objPHPExcel = new PHPExcel();
    $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
             'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER, 
        )
    );
$bordasGrossas = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK,
        ),
    ),
);

$bordasfinas = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
);

$fonteNegrito = array(
'font'=>array(
'bold'=>true,
));



    $objPHPExcel->getDefaultStyle()->applyFromArray($style);
    $objPHPExcel->getActiveSheet()->getStyle('B2:I3')->applyFromArray($bordasGrossas);
        $objPHPExcel->getActiveSheet()->getStyle('B2:I3')->applyFromArray($fonteNegrito);

    $objPHPExcel->getActiveSheet()->getStyle('B4:I4')->applyFromArray($bordasfinas);
    $objPHPExcel->getActiveSheet()->getStyle('B4:I4')->applyFromArray($fonteNegrito);

    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

    $objPHPExcel->getActiveSheet()->mergeCells('B2:I3');
    $objPHPExcel->getActiveSheet()->getStyle('B2')
    ->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);

    $objPHPExcel->getActiveSheet()->setCellValue('B2', 'Relatório de Ações Por Cliente');
    $objPHPExcel->getActiveSheet()->setCellValue('B4', 'Nome')
    ->setCellValue('C4', 'Local')
    ->setCellValue('D4', 'Cliente')
    ->setCellValue('E4', 'Responsável')
    ->setCellValue('F4', 'Email')
    ->setCellValue('G4', 'Supervisor')
    ->setCellValue('H4', 'Início')
    ->setCellValue('I4', 'Término');
  
    $cont = 4;
    $nome = '';
    foreach ($Acoes as $acaoId) {
               $cont++;

           $acao = $this->requestAction('/Acaos/AcaoPorId/'.$acaoId['AcaoCliente']['IdAcao']); 
         
           $locaisArray = $this->requestAction('/AcaoSupervisorLocals/retornaLocais/'.$acao['Acao']['Id']);
                $locais='';
                foreach ($locaisArray as $local) {
                    $locais = $locais . $local['AcaoSupervisorLocal']['Local'] . "\n";
              }  

          $ClientesArray = $this->requestAction('/AcaoClientes/retornaClientes/'.$acao['Acao']['Id']);
              $clientes = '';
              foreach ($ClientesArray as $cliente) {
                $ThisCliente = $this->requestAction('/Clientes/nomeCliente/'. $cliente['AcaoCliente']['IdCliente']);
                $clientes = $clientes . $ThisCliente['Cliente']['Nome'] . "\n";
                 $nome = $ThisCliente['Cliente']['Nome'];
         }
         
         $Responsavel = $this->requestAction('Clientes/retornaResponsavel/'.$idCliente);
          
         $Email = $this->requestAction('Clientes/retornaEmail/'.$idCliente);
   
        $SupervisoresArray = $this->requestAction('/AcaoSupervisorLocals/retornaSupervisores/'.$acao['Acao']['Id']);
              $supervisores = '';
              foreach ($SupervisoresArray as $supervisor) {
                $teste = $this->requestAction('/Funcionarios/nomeSupervisor/'. $supervisor['AcaoSupervisorLocal']['IdSupervisor']);
                  if (!empty($teste)){
                    $supervisores = $supervisores . $teste['Funcionario']['Nome'] . "\n";
                  
                  }
                }

          
          $objPHPExcel->getActiveSheet()->setCellValue('B'.$cont, $acao['Acao']['Nome']);

          $objPHPExcel->getActiveSheet()->setCellValue('C'.$cont, $locais);
          
          $objPHPExcel->getActiveSheet()->setCellValue('D'.$cont, $clientes);
         
          $objPHPExcel->getActiveSheet()->setCellValue('E'.$cont, $Responsavel);
    
          $objPHPExcel->getActiveSheet()->setCellValue('F'.$cont, $Email);

          $objPHPExcel->getActiveSheet()->setCellValue('G'.$cont, $supervisores);

          $objPHPExcel->getActiveSheet()->setCellValue('H'.$cont, $acao['Acao']['Inicio']);

          $objPHPExcel->getActiveSheet()->setCellValue('I'.$cont, $acao['Acao']['Termino']);

    }


        $objPHPExcel->getActiveSheet()->getStyle('B5:I'.$cont)->applyFromArray($bordasfinas);
        $objPHPExcel->getActiveSheet()->getStyle('B4:I'.$cont)->applyFromArray($bordasGrossas);


   
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Relatório de ações da empresa ' . $nome.'.xlsx"');
header('Cache-Control: max-age=0');



    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    return $this->redirect(array('controller'=>'equipes', 'action' => 'index'));




// Hide "Phone" and "fax" column
//echo date('H:i:s') , " Hide 'Phone' and 'fax' columns" , EOL;
//$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(false);
//$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setVisible(false);

//$objConditional2 = new PHPExcel_Style_Conditional();
//$objConditional2->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

//$objPHPExcel->getActiveSheet()->mergeCells('A1:C1');

//$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);


}






















public function acoespdv() {
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    $this->layout = 'pdf'; //this will use the pdf.ctp layout

    $this->set('fpdf', new FPDF('P','mm','A4'));

    $Acoes = $this->requestAction('/Acaopdvs/todos');

   $this->set(compact($Acoes, 'Acoes'));
    $this->render('pdfpdv');
}

public function Tempo_Real(){
	
}
public function Tempo_RealPDV(){

}

public function Relatorios(){
    if ($this->request->is('post')) {
      $this->Relatorio->create();

    $idCliente = $this->request->data['Relatorios']['Cliente'];
    $idSupervisor = $this->request->data['Relatorios']['Supervisor'];
    $Inicio = new DateTime($this->request->data['Relatorios']['Inicio']);


       

    if (!empty($idCliente)){
         $this->viewpdf($idCliente);
     //$this->ExportaExcel();
     }else if (!empty($idSupervisor)){
          $this->Relatorio_Funcionarios($idSupervisor);
     }else if (!empty($Inicio)){
          $this->Relatorio_Tempo($Inicio);
     }

}
}

public function Relatorio_Tempo($inicio){
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    $this->layout = 'pdf_tempo'; //this will use the pdf.ctp layout
    $this->set('fpdf', new FPDF('P','mm','A4'));
    $this->set(compact($inicio, 'inicio'));
    $this->render('relatorios_tempo');

}



public function TodosCadastros(){
      App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    $this->layout = 'TodosCadastros'; //this will use the pdf.ctp layout

    $this->set('fpdf', new FPDF('P','mm','A4'));

    $Clientes = $this->requestAction('/Clientes/todos');

   $this->set(compact($Clientes, 'Clientes'));
    $this->render('TodosCadastros');
   
}


public function Relatorio_Clientes(){
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    $this->layout = 'pdf_clientes'; //this will use the pdf.ctp layout

    $this->set('fpdf', new FPDF('P','mm','A4'));

    $Clientes = $this->requestAction('/Clientes/todos');

   $this->set(compact($Clientes, 'Clientes'));
    $this->render('relatorios_clientes');
   
}




public function Relatorio_Funcionarios($idSupervisor){
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    $this->layout = 'pdf_funcionarios'; //this will use the pdf.ctp layout
    $this->set('fpdf', new FPDF('P','mm','A4'));
  $QuantidadeSupervisores = $this->requestAction('AcaoSupervisorLocals/retornaQuantidadeSupervisores/' . $idSupervisor);
  if ($QuantidadeSupervisores==0){
     $this->Flash->error('Supervisor não possui ações');
      return $this->redirect(array('action' => 'Relatorios'));

   
  }else{

    $this->set(compact($idSupervisor, 'idSupervisor'));
    $this->render('relatorios_funcionarios');
}
}





}?>
