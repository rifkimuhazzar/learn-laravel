@extends("parent")

@section("title", "First Page")

@section("header")
  @parent
  <h1>This is header</h1>
@endsection

@section("content")
  <h1>This is content</h1>
@endsection