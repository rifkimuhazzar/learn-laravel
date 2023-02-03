<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>For Loop</title>
</head>
<body>
  
  <ul>
    @forelse ($hobbies as $hobby)
      <li>{{ $hobby }}</li>
      @empty
        <li>Don't have any hobbies</li>
    @endforelse
  </ul>

</body>
</html>