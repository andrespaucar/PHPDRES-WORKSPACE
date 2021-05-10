@extends('layouts.app')

@section('head')
    <title>USUARIOS - PAGE</title>
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            <h3 class="mb-0">Usuarios </h3>
          </div>
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Widgets</li>
            </ol>
          </div> --}}
        </div>
      </div>
    </section>
    <section class="content">
      <page-users-component></page-users-component>
        {{-- <div class="container-fluid"> --}}
            {{-- <div class="card">
              <div class="card-header"></div>
              <div class="card-body table-responsive p-0 ">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key=>$user)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->isActive}}</td>
                                <td>
                                    <saludo></saludo>
                                    <b-button variant="danger">Button</b-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
              </div>
            </div> --}}
        {{-- </div> --}}
    </section>
</div>
@endsection