<?php
 
   function changeImage($h, $w, $src, $newsrc, $type) {
    $newimg = imagecreatetruecolor($h, $w);
    switch ($type) {
      case 'jpeg':
        $img = imagecreatefromjpeg($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagejpeg($newimg, $newsrc);
        break;
      case 'png':
        $img = imagecreatefrompng($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagepng($newimg, $newsrc);
        break;
      case 'gif':
        $img = imagecreatefromgif($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagegif($newimg, $newsrc);
        break;
    }
   }

  if (isset($_POST['send'])) {
    if ($_FILES['userfile']['error']) {
      $message = 'Ошибка загрузки файла!';
    } elseif ($_FILES['userfile']['size'] > 1000000) {
      $message = 'Файл слишком большой';
    } elseif (
        $_FILES['userfile']['type'] == 'image/jpeg'||
        $_FILES['userfile']['type'] == 'image/png' ||
        $_FILES['userfile']['type'] == 'image/gif'
      ) {
          if (copy($_FILES['userfile']['tmp_name'], PHOTO.$_FILES['userfile']['name'])) {
            $path = PHOTO_SMALL.$_FILES['userfile']['name'];
            $type = explode('/', $_FILES['userfile']['type'])[1];
            changeImage(150, 150, $_FILES['userfile']['tmp_name'], $path, $type);
          } else {$message = 'Ошибка загрузки файла!';}
      } else {
        $message = 'Не правильный тип файла!';
    }
  }
  $images = array_slice(scandir(PHOTO_SMALL), 2);
?>
