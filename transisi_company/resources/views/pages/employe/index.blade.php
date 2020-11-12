@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Employe
                    <a href="{{ route('employe.create') }}" class="btn btn-outline-secondary">Add Employe</a>
                </div>

                <div class="card-body">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td style="width: 7px">Id</td>
                                <td>Nama</td>
                                <td>Company</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($employes as $employe)
                                <tr>
                                    <td>{{ $employe->id }}</td>
                                    <td>{{ $employe->nama }}</td>
                                    <td>{{ $employe->companies->nama }}</td>
                                    <td>{{ $employe->email }}</td>
                                    <td>
                                        <a href="{{ route('employe.edit', $employe->id) }}" class="btn btn-outline-primary">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('employe.destroy', $employe->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>    
                            @endforeach

                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center">
                        {{ $employes->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
