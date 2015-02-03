
	<?php $form=$this->beginWidget('CActiveForm', array(
			'enableClientValidation'=>true,
			'enableAjaxValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=> array(
				'class' => 'form-signup',
			)
	)); 
	?>	
	<h2 class="form-signup-heading">Please Login</h2>
	<?php 
	echo CHtml::errorSummary($model); 

	echo $form->textField($model,'email', array('class'=>'input-block-level', 'placeholder'=>'Email'));
	echo $form->error($model,'email', array('class'=>'text-error'));

	echo $form->passwordField($model,'password', array('class'=>'input-block-level', 'placeholder'=>'Password'));
	echo $form->error($model,'password', array('class'=>'text-error'));

	echo CHtml::submitButton('Login', array('class'=>'btn btn-large btn-primary btn-block'));

	$this->endWidget(); 
	?>
