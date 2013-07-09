<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/script/jquery-1.10.2.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<table width="928px">
		<tr>
			<td width="14px" height="31px" 
			style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/top_left.png) no-repeat;"></td>
			<td width="900px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/top_mid.png) repeat-x;"></td>
			<td width="14px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/top_right.png) no-repeat;"></td>
		</tr>
	</table>

	<?php echo $content; ?>

	<table width="928px">
		<tr>
			<td width="16px" height="28px" 
			style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/bottom_left.png) no-repeat;"></td>
			<td width="895px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/bottom_mid.png) repeat-x;"></td>
			<td width="17px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/bottom_right.png) no-repeat;"></td>
		</tr>
	</table>

</div><!-- page -->

</body>
</html>
