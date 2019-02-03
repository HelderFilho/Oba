<?php

   //	 header('Content-Disposition: attachment');
     header('Content-Disposition: attachment;'. 'filename= relatorio de clientes.pdf');
     header('Content-type: application/pdf charset=utf-8');
    echo $content_for_layout;
?>