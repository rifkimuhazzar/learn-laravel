<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Say Hello</title>
</head>
<body>
  <form action="/form" method="post">
    <label for="name">
      <input type="text" name="name" id="name">
    </label>
    <button type="submit">Say Hello</button>

    <!-- csrf token menggunakan input form -->
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <!-- jika menggunakan ajax crsf tokennya bisa di header X-CSRF-TOKEN -->
  </form>
</body>
</html>