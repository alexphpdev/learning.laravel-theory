<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title></title>
    <meta name="" content="">
    <meta charset="utf-8">
</head>
<body>

<form action="/comments" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    Имя:
    <input type="text" name="name"/><br />
    Комментарий:<br />
    <textarea name="text"></textarea>
    <!--<input type="hidden" name="_method" value="PUT">-->

    <br />
    <input type="submit" value="Добавить"/>

</form>

</body>
</html>

