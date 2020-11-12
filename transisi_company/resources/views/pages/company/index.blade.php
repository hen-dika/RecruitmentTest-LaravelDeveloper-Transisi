@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Company
                    <a href="{{ route('company.create') }}" class="btn btn-outline-secondary">Add Company</a>
                </div>

                <div class="card-body">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td style="width: 7px">Id</td>
                                <td>Logo</td>
                                <td>Nama</td>
                                <td>Email</td>
                                <td>Website</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>
                                        <img src="{{ Storage::url($company->logo) }}" alt="" style="width: 100px" class="img-thumbnail">
                                    </td>
                                    <td>{{ $company->nama }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                        <a href="{{ route('company.edit', $company->id) }}" class="btn btn-outline-primary">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('company.destroy', $company->id) }}" method="post" class="d-inline">
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
                    <div class="d-flex justify-content-center">
                        {{ $companies->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
