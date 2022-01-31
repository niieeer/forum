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
        <h1>Add Article !</h1>
        <input type="text" name="title" placeholder="title" required>
        <input type="text" name="resume" placeholder="resume" required>
        <input type="text" name="author" placeholder="author" required>
        <input type="text" name="editor" placeholder="editor" required>
        <input type="submit">
    </form>
</body>

</html>