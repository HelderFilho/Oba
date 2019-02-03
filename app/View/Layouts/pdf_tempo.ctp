<?php

   //	 header('Content-Disposition: attachment');
     header('Content-Disposition: inline;'. 'filename= relatorio de Açoes.pdf');
     header('Content-type: application/pdf charset=utf-8');
    echo $content_for_layout;
?>