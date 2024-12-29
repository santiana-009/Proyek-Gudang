@extends('main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-incoming-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Outgoing ~END</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/outgoing_end">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" 
                        value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit">search</button>
                    </div>
                </form>
            </div>
        </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Curent Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Site Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outgoing_ends as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->current_date}}</td>
                            <td>{{ $item->name_pic}}</td>
                            <td>{{ $item->site_name}}</td>
                            <td>
                                <a href="/pdfoutgoingend/{{ $item->id }}" class="badge bg-primary">~PDF</a>
                                <form action="/outgoing_end/delete/{{ $item->id }}" method="POST" class="d-inline">
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $outgoing_ends->links() }}
        </div>
    </div>
@endsection