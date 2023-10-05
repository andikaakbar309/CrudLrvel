@extends('layout/app')

@section('content')
<form method="POST" action="/categories">
    @csrf
        <div class="mb-3">
                <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama">
              </div>
              <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
              <textarea class="form-control" name="description" placeholder="Deskripsi"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="seq" class="form-label">SEQ</label>
                  <input type="text" class="form-control" name="seq" id="seq" placeholder="Sequence">
                  </div>
                  <div class="mb-3">
                        <a href="/categories" class="btn btn-secondary btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                  </div>
      </form>
@endsection