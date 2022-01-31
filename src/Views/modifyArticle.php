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
    <form method="post">
        <input type="text" name="title" value="<?= $articles->getTitle()?>">
        <textarea name="resume" cols="30" rows="2" required><?= $articles->getResume()?></textarea>
        <input type="text" name="author" value="<?= $articles->getAuthor()?>" required>
        <input type="text" name="editor" value="<?= $articles->getEditor()?>" required>
        <input type="submit">
    </form>
</body>
</html>