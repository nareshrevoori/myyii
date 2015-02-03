<?php
$this->pageTitle=' - Error';
?>

<div class=" hero-unit">
<h2>Error <?php echo $code; ?></h2>

<div class=" alert-danger">
<?php echo CHtml::encode($message); ?>
</div>
</div>