<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="well bg-white">
		<center>
		<?php echo $this->Html->image('logo_fabtech.png',array('style' => 'width:300px','alt'=>'PAGTRAN','title'=>'PAGTRAN','id'=>'imgClient'))?>
		</center>
			<?php echo $this->Form->create('User', array('role' => 'form', 'class' => 'form-signin')); ?>
			  
			<?php
				echo $this->Form->input('username', array(
						'label' =>  __d('admin', 'username') . $this->Html->tag('span', ' *', array('class' => 'asterisk')),
						'div' => 'form-group',
						'class' => 'form-control',
						'placeholder' => __d('admin', 'Username')
					));
					echo $this->Form->input('password', array(
							'label' => __d('admin','password') . $this->Html->tag('span', ' *', array('class' => 'asterisk')),
							'div' => 'form-group',
							'class' => 'form-control',
							'placeholder' => __d('admin', 'Password'),
							'type' => 'password'
						));
			   ?>
			<?php echo $this->Form->end(array('label' => __d('admin', 'Login'), 'class' => 'btn btn-lg btn-primary btn-block')); 
				  echo $this->Html->tag('small', __('Enter your username and password to access the system.'));
				?>
			<?php echo $this->Html->image('copyright.png',array('alt'=>'Fabtech','title'=>'Fabtech','id'=>'imglogin'))?>
			<br>
			<br>
			</div>
	</div>
</div>
<script>
    /**
     noback v0.0.1
     library for prevent backbutton
     Author: Kiko Mesquita: http://twitter.com/kikomesquita
     Based on stackoverflow
     * Copyright (c) 2015 @ kikomesquita
     */

    (function(window) {
        'use strict';

        var noback = {

            //globals
            version: '0.0.1',
            history_api : typeof history.pushState !== 'undefined',

            init:function(){
                window.location.hash = '#no-back';
                noback.configure();
            },

            hasChanged:function(){
                if (window.location.hash == '#no-back' ){
                    window.location.hash = '#Login';
                    //mostra mensagem que não pode usar o btn volta do browser
                    if($( "#msgAviso" ).css('display') =='none'){
                        $( "#msgAviso" ).slideToggle("slow");
                    }
                }
            },

            checkCompat: function(){
                if(window.addEventListener) {
                    window.addEventListener("hashchange", noback.hasChanged, false);
                }else if (window.attachEvent) {
                    window.attachEvent("onhashchange", noback.hasChanged);
                }else{
                    window.onhashchange = noback.hasChanged;
                }
            },

            configure: function(){
                if ( window.location.hash == '#no-back' ) {
                    if ( this.history_api ){
                        history.pushState(null, '', '#BLOQUEIO');
                    }else{
                        window.location.hash = '#BLOQUEIO';
                        //mostra mensagem que não pode usar o btn volta do browser
                        if($( "#msgAviso" ).css('display') =='none'){
                            $( "#msgAviso" ).slideToggle("slow");
                        }
                    }
                }
                noback.checkCompat();
                noback.hasChanged();
            }

        };

        // AMD support
        if (typeof define === 'function' && define.amd) {
            define( function() { return noback; } );
        }
        // For CommonJS and CommonJS-like
        else if (typeof module === 'object' && module.exports) {
            module.exports = noback;
        }
        else {
            window.noback = noback;
        }
        noback.init();
    }(window));
</script>