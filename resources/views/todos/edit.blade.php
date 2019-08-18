@extends('layouts.app')

@section('content')
  <h3 class="text-center">Edit Todo</h3>
  <form action="{{route('todos.update', $todo->id)}}" method="post">
    @csrf
    @method ('PUT')

    <div class="form-group">
      <label for="title">Todo Title</label>
      <input
        type="text"
        name="title"
        id="title"
        class="form-control @error ('title') is-invalid @enderror"
        placeholder="Enter Title"
        value="{{old('title') ? : $todo->title}}"
      >
      @if ($errors->has('title'))
        <span class="invalid-feedback">
              {{$errors->first('title')}}
            </span>
      @endif
    </div>

    <div class="form-group">
      <label for="body">Todo Description</label>
      <textarea
        name="body"
        id="body"
        rows="4"
        class="form-control @error ('body') is-invalid @enderror"
        placeholder="Enter Todo Description"
      >{{old('body') ? : $todo->body}}</textarea>
      @if ($errors->has('body'))
        <span class="invalid-feedback">
              {{$errors->first('body')}}
            </span>
      @endif
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
    <a href="{{route('todos.index')}}" class="btn btn-secondary float-right">Back</a>
  </form>
@stop
