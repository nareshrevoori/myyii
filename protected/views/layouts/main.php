<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php 
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/main.css"); 
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/bootstrap.min.css"); 
	?>
</head>

<body>
	
	<div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">  
					<?php if(Yii::app()->user->isGuest){ ?>
						<li><?php echo CHtml::link('Register',array('user/register')); ?></li>   
						<li><?php echo CHtml::link('Login',array('user/login')); ?></li> 
					<?php } else { ?>
						<li><?php echo CHtml::link('Logout',array('user/logout')); ?></li> 
					<?php } ?>
                </ul>  
            </div>
        </div>
    </div> 
	
	<div class="container">
        
		<?php if(Yii::app()->user->hasFlash('notice')) { ?>
            <p class="alert"><?php echo Yii::app()->user->getFlash('notice'); ?></p>
		<?php } ?>

		<?php echo $content; ?>
    </div>

</body>
</html>