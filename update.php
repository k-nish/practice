<?php 
require('dbconnect.php');

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];


$sql = sprintf('SELECT * FROM `my_items` WHERE `id`= %d',
          mysqli_real_escape_string($db,$id));
$recordSet = mysqli_query($db,$sql);
$data = mysqli_fetch_assoc($recordSet);
}
function h($value){
    return htmlspecialchars($value,ENT_QUOTES,'UTF-8');
}

 ?>
<html>
<head>
	<title>pr1</title>
</head>
<body>
<p>変更する商品の情報を記入してください。</p>
<form id="frmUpdate" name="frmUpdate" method="post" action="update_do.php">
<d1>
    <dt>
        <label for="maker_id">メーカーID</label>
    </dt>
    <dd>
        <input name="maker_id" type="text" id="maker_id" size="10" maxlength="10" value="<?php echo h($data['maker_id']); ?>" />
    </dd>
    <dt>
        <label for="item_name">商品名</label>
    </dt>
    <dd>
        <input name="item_name" type="text" id="item_name" size="35" maxlength="255" value="<?php echo h($data['item_name']); ?>" />
    </dd>
    <dt>
    	<label for="price">価格</label>
    </dt>
    <dd>
        <input name="price" type="text" id="price" size="10" maxlength="10" value="<?php echo h($data['price']); ?>" />
    </dd>
    <dt>
        <label　for="keyword">キーワード</label>
    </dt>
    <dd>
        <input name="keyword" type="text" id="keyword" size="50" maxlength="255" value="<?php echo h($data['keyword']); ?>" />
    </dd>
    <input type="submit" value="変更する" />
    <input type="hidden" name="id" value="<?php print htmlspecialchars($data['id'],ENT_QUOTES,'UTF-8'); ?>" />
</d1>
</form>
</body>
</html>