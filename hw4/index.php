<?php
  include_once 'models/config.php';
  include_once 'models/photo.php';
?>
<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="scripts/jquery.js"></script> 
     <script type="text/javascript" src="scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script> 
     <script type="text/javascript" src="scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script> 
 <link rel="stylesheet" type="text/css" href="scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" /> 
<script type="text/javascript">
	$(document).ready(function(){
		$("a.photo").fancybox({
			transitionIn: 'elastic',
			transitionOut: 'elastic',
			speedIn: 500,
			speedOut: 500			
		});
 	});
</script>   
<head>
  <meta charset="UTF-8">
  <title>Работа с файлами</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>ФОТО ГАЛЕРЕЯ</h1>
  </header>
<?php
  $files1 = array_slice(scandir(PHOTO_SMALL), 2);
  $files2 = array_slice(scandir(PHOTO), 2);
?>

  <div class="images">
    <?php for ($i=0; $i < count($images); $i++) : ?>
      <a rel="gallery" class="photo" href="<?=PHOTO."/".$files2[$i]?>" target="_blank"><img src="<?=PHOTO_SMALL."/".$files1[$i]?>" alt="" /></a>
    <?php endfor; ?>
  </div>

  <div class="add_foto">
    <form action="" method="POST" enctype="multipart/form-data">
      <span> <b>Добавить файл: </b> </span>
      <input type="file" name="userfile"> 
      <button type="submit" name="send">ЗАГРУЗИТЬ</button> <br>
      <span><?=$message?></span>
    </form>
  </div>    
  
</body>
</html>
