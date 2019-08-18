@extends('layouts.app')

@section('content')
  <h2 class="text-center">All Todos</h2>
  <ul class="list-group py-3 mb-3">
    @forelse ($todos as $todo)
        <li class="list-group-item my-2">
          <h4>{{$todo->title}}</h4>
          <h6 class="card-subtitle mb-2 text-muted">
            Created by: {{$todo->user->name}}
          </h6>
          <p>{{\Illuminate\Support\Str::limit($todo->body, 60, ' ...')}}</p>
          <small class="float-right">{{$todo->created_at->diffForHumans()}}</small>
          <a href="{{route('todos.show', $todo->id)}}" class="btn btn-primary">
            Read More
          </a>
        </li>
      @empty
        <h4 class="text-center">
          No Todos Found!
        </h4>
    @endforelse
  </ul>
  <div class="d-flex justify-content-center">
    {{$todos->links()}}
  </div>
@stop
