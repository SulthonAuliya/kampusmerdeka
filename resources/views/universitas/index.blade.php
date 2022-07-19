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
                      <h3 class="card-title">Universitas List</h3> <br>
                      <a href="/universitas/create" class="btn btn-primary mb-3">Add universitas</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Universitas Name</th>
                            <th>Alamat</th>
                            <th>Program</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($universitas as $uni)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $uni->nama_universitas }}</td>
                                    <td>{{ $uni->alamat }}</td>
                                    <td>{{ $uni->programs->nama_program }}</td>
                                    <td>
                                        <a href="/universitas/{{ $uni->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                        <form action="/universitas/{{ $uni->id }}" method="POST" class="d-inline">
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