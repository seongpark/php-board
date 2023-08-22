<?php
include "db.php";

$bno = $_GET['idx'];
$read = $_GET['read'];
$content = $_POST['content'];
$sql = mq("update reply set content='".$content."' where idx='".$bno."'");

echo "<script>alert('댓글이 수정되었습니다.'); location.href='read.php?idx=".$read."';</script>";
?>