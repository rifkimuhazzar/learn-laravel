<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>While Statement</title>
</head>
<body>
  @while($i < 10)
    The current value is {{ $i }}
    @php
      $i++
    @endphp
  @endwhile
</body>
</html>