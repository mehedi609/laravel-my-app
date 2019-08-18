@extends('layouts.app')

@section('content')
  <br>
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <div class="card border-info mb-3">
        <div class="card-header">Todo</div>
        <div class="card-body">
          <h4 class="card-title">{{$todo->title}}</h4>
          <p class="card-text">{{$todo->body}}</p>
          <hr>
          <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-outline-warning float-left mr-2">Update</a>
          <a href="{{route('todos.index')}}" class="btn btn-outline-dark float-left">Back</a>
          <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="modal fade" id="delete-modal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Todo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <form method="POST" id="delete-form" action="{{route('todos.destroy',$todo->id)}}">
        @csrf
        @method('DELETE')
      </form>
    </div>
  </div>
@stop
