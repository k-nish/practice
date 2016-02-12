<?php
require('dbconnect.php');
$sql = sprintf('INSERT INTO `my_items`SET maker_id =%d,item_name="%s",price=%d,keyword="%s"',
 	        mysqli_real_escape_string($db,$_POST['maker_id']),
 	        mysqli_real_escape_string($db,$_POST['item_name']),
 	        mysqli_real_escape_string($db,$_POST['price']),
            mysqli_real_escape_string($db,$_POST['keyword'])
 	        );
$stmt = mysqli_query($db,$sql) or die(mysqli_error($db));


?>
<html>
 <head>
 	<title>pr1</title>
 </head>
 <body>
 <p>商品を登録しました。</p>
 <p><a href="index.php">一覧に戻る。</a></p>
 </body>
 </html>