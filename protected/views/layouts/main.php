<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="language" content="ru" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
    
         <?php   echo $content; ?>
</body>
</html>