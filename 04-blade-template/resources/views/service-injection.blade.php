<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Injection</title>
</head>
<body>
  
  @inject("service", "App\Services\SayHello")

  <h1>{{ $service->sayHello($name) }}</h1>

</body>
</html>