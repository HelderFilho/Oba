<?php 

class mensagemsController extends AppController{
	public function mensagens (){
		 if ($this->request->is('post')) {
     		 $this->mensagem->create();
 			 $tokenMecanica=$this->requestAction(array('admin'=>true, 'controller'=>'Users', 'action'=>'retornaToken/' . $this->request->data['Mensagems']['IdUserMecanica']));
  			 $tokenFluxo=$this->requestAction(array('admin'=>true, 'controller'=>'Users', 'action'=>'retornaToken/' . $this->request->data['Mensagems']['IdUserFluxo']));
 			 $tokenGenero=$this->requestAction(array('admin'=>true, 'controller'=>'Users', 'action'=>'retornaToken/' . $this->request->data['Mensagems']['IdUserGenero']));
                     
         

         
         if (!empty($this->request->data['Mensagems']['AlertaMecanica'])){
         //   $this->MensagensAutomaticas(10000000, 3, $this->request->data['Mensagems']['AlertaMecanica'], $tokenMecanica['User']['token']);

         	$this->sendMessage($this->request->data['Mensagems']['AlertaMecanica'], $tokenMecanica['User']['token']);
         }     
		if (!empty($this->request->data['Mensagems']['AlertaFluxo'])){
        //    $this->MensagensAutomaticas(10000000, 3, $this->request->data['Mensagems']['AlertaFluxo'], $tokenMecanica['User']['token']);

         	$this->sendMessage($this->request->data['Mensagems']['AlertaFluxo'], $tokenFluxo['User']['token']);

         }     
         if (!empty($this->request->data['Mensagems']['AlertaGenero'])){
           //         $this->MensagensAutomaticas(10000000, 3, $this->request->data['Mensagems']['AlertaGenero'], $tokenMecanica['User']['token']);

         	$this->sendMessage($this->request->data['Mensagems']['AlertaGenero'], $tokenGenero['User']['token']);
         }     




    return $this->redirect(array('action'=>'mensagens'));

}
}


public function MensagensAutomaticas($tempo, $vezes, $mensagem, $token){
    $cont = 0;
    $active = true;
        while ($active){
            $cont++;
                $this->sendMessage($mensagem, $token);
                if ($cont>=$vezes){
                    $active = false;
                }
        sleep(5);
        }

}



  public function sendMessage($Mensagem, $token) {
      # code...
    
    $content      = array(
      "en"=>"{$Mensagem}",
        "pt" => "{$Mensagem}"
    );
     $fields = array(
        'app_id' => "e53e0d95-7979-4400-9a47-5dd613218d18",
          'include_player_ids' => array($token),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content,
       );
    
    $fields = json_encode($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic N2M4YTgwOWYtYTA2NS00ODQ3LTgyNDktMGMzNjlkZDk3MmFj'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
}




	public function AlertaMecanica(){
		$alertas = array (
			"Olá Supervisor, verifique a mecânica da ação!"=>"Olá Supervisor, verifique a mecânica da ação!",
			"Super, dá uma olhada na mecânica da sua ação!"=>"Super, dá uma olhada na mecânica da sua ação!",
			"Super, sua ação tem mecânica! Arrebenta!"=>"Super, sua ação tem mecânica! Arrebenta!"

		);
		return $alertas;
	}

	public function AlertaFluxo(){
		$fluxo = array(
			"Fala meu Super, como está o fluxo clientes na sua região? "=>"Fala meu Super, como está o fluxo clientes na sua região?", 
   			"Super, como está o fluxo de pessoas ai hoje? "=>"Super, como está o fluxo de pessoas ai hoje?",
   			"Como está o fluxo de clientes nessa área?"=>"Como está o fluxo de clientes nessa área?"
		);
		return $fluxo;
	}

	public function AlertaGenero(){
		$genero = array(
			"Supervisor, qual é o tipo de clientes desse local?"=>"Supervisor, qual é o tipo de clientes desse local?",
"Super, qual o tipo de pessoas temos ai hoje? "=>"Super, qual o tipo de pessoas temos ai hoje?",
"Super, qual o tipo de clientes predomina neste local?"=>"Super, qual o tipo de clientes predomina neste local?"


		);
		return $genero;
	}

}

?>