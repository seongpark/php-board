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
        <h1>글쓰기</h1>
        <form action="write_process.php" method="post">
            <div class="mb-3">
                <label class="form-label">제목</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label class="form-label">비밀번호</label>
                <input type="password" class="form-control" name="pw" required>
            </div>
            <div class="mb-3">
                <label class="form-label">작성자</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">내용</label>
                <textarea type="text" class="form-control" name="content" required></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="글쓰기" required></input>
        </form>
    </div>

</body>

</html>