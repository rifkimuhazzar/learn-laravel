<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSRF</title>
</head>
<body>
  <form action="" method="post">
    @csrf
    <input type="text" name="name" id="name">
    <button type="submit" name="send">Send</button>
  </form>
</body>
</html>