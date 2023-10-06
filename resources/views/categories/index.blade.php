@extends('layouts/app')

@section('content')

<a href="/categories/create" class="btn btn-primary btn-sm">Tambah Data</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Seq</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->seq }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td> <span class="badge rounded-pill {{ $item->status == 'Active' ? 'bg-primary' : 'bg-danger' }}">{{ $item->status }}</span> </td>
                <td>
                <a href="{{ url('/categories/'. $item->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                <form onsubmit="return confirm('Sure Inactive Data?')" class="d-inline" action="{{ route('categories.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            <a href="{{ url('/categories/'.$item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection