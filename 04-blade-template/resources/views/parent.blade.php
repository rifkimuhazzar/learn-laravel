<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nama Aplikasi - @yield("title")</title>
</head>
<body>

  <!-- @yield("header") -->
  <!-- @yield("content") -->
  
  <!-- directive section dan show khusus untuk parent, jadi tidak menggunakan endsection -->
  @section("header")
    <h1>Default header</h1>
  @show

  @section("content")
    <p>Default content</p>
  @show
</body>
</html>