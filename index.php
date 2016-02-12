<?php
require('dbconnect.php');

$page='';
if(isset($_REQUEST['page'])){
    $page = $_REQUEST['page'];
}
if ($page=='') {
	$page = 1;
}
$page = max($page,1);

$sql = 'SELECT COUNT(*) AS cnt FROM `my_items` WHERE 1';
$stmt = mysqli_query($db,$sql) or die(mysqli_error($db));
$table = mysqli_fetch_assoc($stmt);
$maxpage = ceil($table['cnt'] / 5);
$page = min($page,$maxpage);


$start = ($page - 1)*5;

$sql = sprintf('SELECT m.`name`,i.* FROM `makers` m,`my_items` i WHERE m.`id`=i.`maker_id` ORDER BY i.`id` DESC LIMIT %d,5',$start);
$stmt = mysqli_query($db,$sql) or die(mysqli_error($db));

function h($value){
	return htmlspecialchars($value,ENT_QUOTES,'UTF-8');
}
?>

<html>
<head>
	<title>pr1</title>
</head>
<body>
<p><a href="input.php">新しい商品を登録する</a></p>
<table width="100%">
    <tr>
        <th scope="co1">ID</th>
        <th scope="co1">メーカー</th>
        <th scope="co1">商品名</th>
        <th scope="co1">価格</th>
        <th scope="co1">編集・削除</th>
    </tr>
    <?php
    while($table=mysqli_fetch_assoc($stmt)){ ?>
    <tr>
    	<td><?php echo h($table['id']); ?></td>
    	<td><?php echo h($table['name']); ?></td>
    	<td><?php echo h($table['item_name']); ?></td>
    	<td><?php echo h($table['price']) ?></td>
    	<td><a href="update.php?id=<?php echo h($table['id']); ?>">編集</a>
            <a href="delete.php?id=<?php echo(h($table['id'])); ?>" onclick="return confirm('削除してよろしいですか?');">削除</a></td>
    </tr>
    <?php } ?>
</table>
    <ul class="paging">
    <?php if ($page>1) { ?>
    <li><a href="index.php?page=<?php echo ($page-1); ?>">前のページへ</a></li>
    <?php }else{ ?>
    <li>前のページへ</li>
    <?php } ?>
    <?php if ($page<$maxpage) { ?>
    <li><a href="index.php?page=<?php echo ($page+1); ?>">次のページへ</a></li>
    <?php }else{ ?>
    <li>前のページへ</li>
    <?php } ?>
    </ul>
</body>
</html>