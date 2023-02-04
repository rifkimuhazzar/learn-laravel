
@isset($title)
  <h1>{{ $title }}</h1>
@else
  <h1>This is default title</h1>
@endisset

@isset($description)
  <p>{{ $description }}</p>
@endisset