@extends('layouts/app')

@section('content')
<form method="POST" action="{{ '/categories/'.$data->id }}">
    @csrf
    @method('PUT')
        <div class="mb-3">
        <h3>ID :{{ $data->id }}</h3>
        </div>
        <div class="mb-3">
                <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
              </div>
              <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
              <textarea class="form-control" name="description">{{ $data->description }}</textarea>
                  </div>
                  <div class="mb-3">
                        <label for="seq">Seq</label>
                  <input type="text" class="form-control" name="seq" id="seq" value="{{ $data->seq }}">
                  </div>
                  <div class="mb-3">
                              @if ($data->status === 'Inactive')
                                    <label for="status">Status</label>
                                    <select name="status" id="status">
                                           <option value="Active" {{ $data->status === 'Active' ? 'selected' : '' }}>Active</option>      
                                    </select>  
                                    @else
                              <label for="status" class="badge rounded-pill {{ $data->status === 'Active' ? 'bg-primary' : 'bg-danger' }}">Active</label>                                
                              @endif
                        </div>
                  <div class="mb-3">
                        <a href="/categories" class="btn btn-secondary btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                  </div>
      </form>    
@endsection