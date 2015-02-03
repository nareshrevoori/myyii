
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
	<h2 class="form-signup-heading">Please Register</h2>
	<?php 
	echo CHtml::errorSummary($model); 

	echo $form->textField($model,'firstname', array('class'=>'input-block-level', 'placeholder'=>'First Name'));
	echo $form->error($model,'firstname', array('class'=>'text-error'));

	echo $form->textField($model,'lastname', array('class'=>'input-block-level', 'placeholder'=>'Last Name'));
	echo $form->error($model,'lastname', array('class'=>'text-error'));

	echo $form->textField($model,'email', array('class'=>'input-block-level', 'placeholder'=>'Email'));
	echo $form->error($model,'email', array('class'=>'text-error'));

	echo $form->passwordField($model,'password', array('class'=>'input-block-level', 'placeholder'=>'Password'));
	echo $form->error($model,'password', array('class'=>'text-error'));

	echo $form->passwordField($model,'password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password'));
	echo $form->error($model,'password_confirmation', array('class'=>'text-error'));

	echo CHtml::submitButton('Login', array('class'=>'btn btn-large btn-primary btn-block'));

	$this->endWidget(); 
	?>
