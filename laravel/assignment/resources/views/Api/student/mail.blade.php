@extends('Api.layouts.app')
@section('content')

<div class="table-data">
  <div class="list-title d-block">
    <h2 class="text-center">Send Records</h2>
    @if($data)
    <div class="alert alert-info" role="alert">
      {{$data}}
    </div>
    @endif
    <form action="{{ route('mail')}}" method="POST" class="row g-3 search-form">
      @csrf
      <div class="col-auto">
        <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
      </div>
    </form>
  </div>
</div>
@endsection