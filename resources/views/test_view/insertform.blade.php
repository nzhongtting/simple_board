@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Create - test crud</h1>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('test_crud.store') }}">
          <div class="form-group">
              @csrf
              <label for="title">Title :</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="description">Description :</label>
              <textarea class="form-control" aria-label="With textarea" name="description" id="description"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">INSERT</button>
          <a href="{{ route('test_crud.index')}}" class="btn btn-dark">LIST</a>
      </form>
  </div>
</div>
<script type='text/javascript'>
  CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection