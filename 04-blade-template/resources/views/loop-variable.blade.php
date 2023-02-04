<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loop Variable</title>
</head>
<body>
  <!-- Bisa foreach() | forelse() -->
  @foreach($hobbies as $hobby)
    <!-- loop object property -->
    <li>{{ $loop->iteration }}. {{ $hobby }}</li>
  @endforeach
</body>
</html>