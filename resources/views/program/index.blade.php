@extends('layout.main')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"> 
                      <h3 class="card-title">program List</h3> <br>
                      <a href="/program/create" class="btn btn-primary mb-3">Add program</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>program Name</th>
                            <th>Description</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($program as $prog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $prog->nama_program }}</td>
                                    <td>{{ $prog->description }}</td>
                                    <td>
                                        <a href="/program/{{ $prog->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                        <form action="/program/{{ $prog->id }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
              </div><!-- /.col --><!-- /.col -->
            </div><!-- /.row -->
          </div><<!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- /.content -->
  </div>
@endsection