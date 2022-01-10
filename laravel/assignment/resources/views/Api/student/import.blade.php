@extends('Api.layouts.app')
@section('content')

<div class="table-data">
  <div class="list-title d-block">
    <h2 class="text-center">Upload Your Excel File</h2>
    <div class="row mb-1 mt-3">
      <div class="col-9 mx-auto">
        <div class="alert alert-info">
          <i class="fas fa-download mr-2"></i>
          Sample excel file. <a href="{{ asset('sample/sample_student.xlsx') }}">Download Now!</a>
        </div>
      </div>
    </div>
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="alert-info import">
      @csrf
      <div class="mb-3">
        <input class="form-control" type="file" name="file" accept=".xls,.xlsx" required>
      </div>
      <button type="submit" class="btn-import" name="import">Uplaod</button>
    </form>
  </div>
</div>
@endsection