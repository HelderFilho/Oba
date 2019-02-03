<?php
$empresa = array();
$quantidadeEmpresa = array();
$supervisores= array();
$quantidadeSupervisor = array();
$contC = 0;
$contS = 0;
  $acoesC = $this->requestAction('AcaoClientes/retornaTodasAcoes');
      foreach ($acoesC as $acao) {
         if (!empty($acao['AcaoCliente']['IdCliente'])){
          $Cliente = $this->requestAction('/Clientes/nomeCliente/'. $acao['AcaoCliente']['IdCliente']);
          $quantidades = $this->requestAction('AcaoClientes/retornaQuantidadeClientes/'.$acao['AcaoCliente']['IdCliente']);
          $empresa[$contC] = $Cliente['Cliente']['Nome']; 
          $quantidadeEmpresa[$contC] = $quantidades;
          $contC++;
        # code...
      }
}
      $acoesS = $this->requestAction('AcaoSupervisorLocals/retornaTodosIdsSupervisores');
        foreach ($acoesS as $acao) {
          if (!empty($acao)){
          $supervisor = $this->requestAction('/Funcionarios/nomeSupervisor/'.$acao['AcaoSupervisorLocal']['IdSupervisor']);
         if (!empty($supervisor)){
          $quantidades = $this->requestAction('/AcaoSupervisorLocals/retornaQuantidadeSupervisores/'. $acao['AcaoSupervisorLocal']['IdSupervisor']);
          $supervisores[$contS] = $supervisor['Funcionario']['Nome'];
          $quantidadeSupervisor[$contS] = $quantidades;
          $contS++;
          # code...
          }
        }
      }


?>



<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']},);
      google.charts.load('current', {'packages':['geochart'], 'mapsApiKey' : 'AIzaSyDu6pbyyDfMs06gGiz6mcP2dd_ZIA0DvfQ'},);

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var dataClientes = new google.visualization.DataTable();
        dataClientes.addColumn ('string', 'Cliente');
        dataClientes.addColumn ('number', 'quantidade');
        dataClientes.addRows(<?php echo $contC ?>);
        <?php
          $k = $contC;
            for ($i = 0; $i < $k; $i++) {
         ?>
         dataClientes.setValue (<?php echo $i ?>, 0, '<?php echo $empresa[$i] ?>');
         dataClientes.setValue (<?php echo $i ?>, 1, <?php echo $quantidadeEmpresa[$i] ?>);


         <?php             
            }
        ?>

         var dataSupervisor = new google.visualization.DataTable();
        dataSupervisor.addColumn ('string', 'Supervisor');
        dataSupervisor.addColumn ('number', 'quantidade');
        dataSupervisor.addRows(<?php echo $contS ?>);
        <?php
          $j = $contS;

            for ($l = 0; $l < $j; $l++) {
         ?>
         dataSupervisor.setValue (<?php echo $l ?>, 0, '<?php echo $supervisores[$l] ?>');
         dataSupervisor.setValue (<?php echo $l ?>, 1, <?php echo $quantidadeSupervisor[$l] ?>);


         <?php             
            }
        ?>



	
        var optionsClientes = {
          title: 'Ações realizadas por cliente'
        };

        var optionsSupervisores = {
          title: 'Ações realizadas por supervisor'
        };

        var chartPie = new google.visualization.PieChart(document.getElementById('piechart'));
        chartPie.draw(dataClientes, optionsClientes);
		     
        var chartBar = new google.visualization.PieChart(document.getElementById('barchart'));
        chartBar.draw(dataSupervisor, optionsSupervisores);
      
       
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 100%; height: 500px;"></div>
    <div id = "barchart" style="width: 100%; height: 500px;"></div>
    <div id = "mapChart" style="width: 100%; height: 500px;"></div>

  </body>
</html>

