<?php
include "db.php";

$bno = $_GET['idx'];
$read = $_GET['read'];

$sql = mq("delete from reply where idx='$bno';");

echo "<script>alert('댓글이 삭제되었습니다.'); location.href='read.php?idx=".$read."';</script>";
?>