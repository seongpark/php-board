<?php 
    include "db.php";
?>
<?php
		$bno = $_GET['idx']; 
		$hit = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update board set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from board where idx='".$bno."'");
		$board = $sql->fetch_array();
	?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $board['title']; ?> - PHP 게시판</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" i
        ntegrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h3><?php echo $board['title']; ?></h3>
        <span>작성일 : <?php echo $board['date']; ?> · 작성자 : <?php echo $board['name']; ?> · 조회수 :
            <?php echo $board['hit']; ?></span>
        <hr>
        <p><?php echo htmlentities("$board[content]"); ?></p>
        <a href="edit.php?idx=<?php echo $board['idx']; ?>">수정</a> · <a
            href="delete.php?idx=<?php echo $board['idx']; ?>">삭제</a>
        <hr>

        <h5>댓글</h5>
        <form action="reply_process.php?idx=<?php echo $board['idx']; ?>" method="post">
            <div class=" row mt-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="이름" name="dat_user" required>
                </div>
                <div class="col">
                    <input type="password" class="form-control" placeholder="비밀번호" name="dat_pw" required>
                </div>
            </div>
            <div class="form-floating mt-3">
                <textarea class="form-control" placeholder="이용 약관에 위배되는 댓글은 삭제될 수 있습니다." name="content"
                    required></textarea>
                <label for="floatingTextarea2">댓글</label>
            </div>
            <div class="d-grid gap-2 mt-3">
                <input class="btn btn-dark" type="submit" value="작성"></input>
            </div>
        </form>

        <hr>

        <?php
			$sql3 = mq("select * from reply where con_num='".$bno."' order by idx desc");
			while($reply = $sql3->fetch_array()){ 
		?>

        <span><?php echo $reply["name"]; ?> · <?php echo $reply["date"]; ?></span>
        <h5><?php echo htmlentities("$reply[content]"); ?></h5>
        <a data-bs-toggle="modal" data-bs-target="#edit<?php echo $reply['idx'];?>">수정</a>
        · <a data-bs-toggle="modal" data-bs-target="#delete<?php echo $reply['idx'];?>">삭제</a>
        <hr>

        <div class="modal fade" id="edit<?php echo $reply['idx'];?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">댓글 수정</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form
                            action="reply_edit_process.php?idx=<?php echo $reply['idx'];?>&read=<?php echo $board['idx']; ?>"
                            method="post">
                            <div>
                                <textarea type="text" name="content"
                                    class="form-control"><?php echo $reply['content']; ?></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                        <input type="submit" class="btn btn-primary" value="확인"></input>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete<?php echo $reply['idx'];?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">댓글 삭제</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        "<?php echo $reply['content']; ?>" 댓글을 정말로 삭제하시겠습니까?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                        <a type="button" class="btn btn-danger"
                            href="reply_delete.php?idx=<?php echo $reply['idx'];?>&read=<?php echo $board['idx']; ?>">확인</a>
                    </div>
                </div>
            </div>
        </div>


        <?php } ?>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>

</body>

</html>