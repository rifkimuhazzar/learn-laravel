<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Include Condition</title>
</head>
<body>
  <!-- untuk nilai true -->
  @includeWhen($user["admin"], "header-admin")

  <!-- untuk nilai false -->
  <!-- Unless(kondisi, template, data) -->

  <p>Selamat datang {{ $user["name"] }}</p>
</body>
</html>