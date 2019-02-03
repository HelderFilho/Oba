<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Bonus Santa Anna | Pagina de Registro</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
<?php echo $this -> element('head'); ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <?php echo $this->Html->image('logoR.png',array('alt'=>'Santa Anna','title'=>'Santa Anna','id'=>'imgClient'))?>
      </div>

      <div class="register-box-body">
        <?php echo $this -> Session -> flash(); ?>
				<?php echo $this -> fetch('content'); ?>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
      <?php echo $this->Html->image('copyright.png',array('alt'=>'Fabtech','title'=>'Fabtech','id'=>'imglogin'))?>
<?php
        //scripts    
   
 echo $this->Html->script(array("jQuery-2.1.3.min.js",
                                "bootstrap.min.js",
                                "fastclick/fastclick.min",
                                "app.min",
                                "sparkline/jquery.sparkline.min",
                                "jvectormap/jquery-jvectormap-1.2.2.min.js",
                                "jvectormap/jquery-jvectormap-world-mill-en.js",
                                "daterangepicker/daterangepicker",
                                "datepicker/bootstrap-datepicker",
                                "iCheck/icheck.min",
                                "slimScroll/jquery.slimscroll.min",
                                "chartjs/Chart.min",
                              //"pages/dashboard2",
                                'bootstrap-select',
                               //"demo.js"
                                      ));   
    echo $this->fetch('script');
    
?>
<script>
    function consultacep(cep){
      cep = cep.replace(/\D/g,"")
      url="http://cep.correiocontrol.com.br/"+cep+".js"
      s=document.createElement('script')
      s.setAttribute('charset','utf-8')
      s.src=url
      document.querySelector('head').appendChild(s)
    }

    function correiocontrolcep(valor){
      if (valor.erro) {
        alert('Cep não encontrado');        
        return;
      };
      document.getElementById('logradouro').value=valor.logradouro
      document.getElementById('bairro').value=valor.bairro
      document.getElementById('localidade').value=valor.localidade
      document.getElementById('uf').value=valor.uf
    }
    </script>
  </body>
</html>