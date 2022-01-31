<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php include './src/Include/header.php'; ?>
    <?php
    foreach ($articles as $key => $article) {
        $id = $article->getId();
        $title = $article->getTitle();
        $resume = $article->getResume();
        echo "<p><h2>" . $title . "</h2>" .' ' . $resume ."</p>
        <a href='http://localhost/TP/modify/$id'>Edit the article</a><br/>
        <a href='http://localhost/TP/delete/$id' onclick='return ConfirmDelete()'>Delete the article</a>
        <br/>";
    }
    ?>
</body>
<script src="./script/alert.js"></script>
</html>
