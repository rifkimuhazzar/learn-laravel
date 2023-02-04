<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stack</title>
</head>
<body>
  @push("script")
    <script src="first.js"></script>
  @endpush

  @push("script")
    <script src="second.js"></script>
  @endpush

  @prepend("script")
    <script src="third.js"></script>
  @endprepend

  @stack("script")
</body>
</html>