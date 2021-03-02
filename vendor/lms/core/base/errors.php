<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $errstr ?></title>
</head>
<body>
    <p>Error code: <b><?php echo $errnum ?></b></p>
    <p>Error body: <b><?php echo $errstr ?></b></p>
    <p>File: <b><?php echo $errfile ?></b></p>
    <p>String: <b><?php echo $errline ?></b></p>
</body>
</html>