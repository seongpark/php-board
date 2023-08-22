<?php 
    include "db.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 게시판</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" i
        ntegrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
</head>

<body>

    <div class="container mt-5">
        <h1>PHP 게시판</h1>
        <a type="button" href="write.php" class="btn btn-primary mt-2 mb-2">글쓰기</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">제목</th>
                    <th scope="col">작성일</th>
                    <th scope="col">작성자</th>
                    <th scope="col">조회수</th>
                </tr>
            </thead>
            <tbody>
                <?php
          $sql = mq("select * from board order by idx desc limit 0,5"); 
            while($board = $sql->fetch_array())
            {
              $title=$board["title"]; 
              if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
              $sql2 = mq("select * from reply where con_num='".$board['idx']."'");
              $rep_count = mysqli_num_rows($sql2);
        ?>
                <tr>
                    <th scope="row"><?php echo $board['idx']; ?></th>
                    <td><a
                            href="read.php?idx=<?php echo $board['idx']; ?>"><?php echo htmlentities ("$board[title]"); ?><?php echo $rep_count; ?></a>
                        [<b><?php echo $rep_count; ?></b>]
                    </td>
                    <td><?php echo $board['date']; ?></td>
                    <td><?php echo $board['name']; ?></td>
                    <td><?php echo $board['hit']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>