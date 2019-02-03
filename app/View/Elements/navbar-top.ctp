<style>
.navbar-nav>.user-menu>.dropdown-menu>li.user-header>p {
color: black;
}
.skin-black .main-header li.user-header{
  background-color: white;
}
</style>
<header class="main-header">
        <!-- Logo -->
     
      <?php  $user = AuthComponent::user(); ?>
      <?php if ($user['empresa']=='Oba'){ ?>

       <a href="/" class="logo"><?php echo $this->HTML->Image('ObaLogo_p.jpeg', array('class'=>'brand-icon','style'=>'width: 200px;height:40px;')); ?></a>
        <?php }else if ($user['empresa']=='Top'){ ?>
       
       <a href="/" class="logo"><?php echo $this->HTML->Image('TopLogo.png', array('class'=>'brand-icon','style'=>'width: 200px;height:40px;')); ?></a>
       
       <?php } ?>   

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                	<?php 
  if($this->Session->read('Auth.User.image')!=null){
                                    echo $this->Html->Image(str_replace('img/', "",$this->Session->read('Auth.User.image')),array('class'=>'user-image','alt'=>'User Image'));
                                }else{
                                    echo $this->Html->Image('avatar.png',array('class'=>'user-image','alt'=>'User Image'));
                                }      ?> 
                  <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
                  <span class="hidden-xs"><?php echo $this->Session->read('Auth.User.name');?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
 <li class="user-header">
                                <?php if($this->Session->read('Auth.User.image')!=null){
						                        echo $this->Html->Image(str_replace('img/', "",$this->Session->read('Auth.User.image')),array('class'=>'img-circle','alt'=>'User Image'));
						                    }else{
						                        echo $this->Html->Image('avatar.png',array('class'=>'img-circle','alt'=>'User Image'));
						                    }?> <p>
                                  <?php echo $this->Session->read('Auth.User.name');?>
										 
								         <?php echo $this->Session->read('Auth.User.Group.name');?>
                                    <small><?php echo __('Member since').$this->Time->nice($this->Session->read('Auth.User.created'),null,' %B, %Y')?></small>
                                </p>
                            </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                                <div class="pull-left">
            		
                                    <a href="<?php echo $this->Html->url(array(
                                        'plugin' => false,'admin' => false,
    											"controller" => "users",
   											 	"action" => "edit",
												$this->Session->read('Auth.User.id'))) ?>" class="btn btn-default btn-flat"><?php echo __('Profile');?></a>
                                </div>
                                <div class="pull-right">
                                	<a href="<?php echo $this->Html->url(array(
                                        'plugin' => false,'admin' => false,
														"controller"=> "users",
														"action"=>"logout"
														)) ?>" class="btn btn-default btn-flat"><?php echo __('Sign out');?></a>
                                </div>
                            </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>