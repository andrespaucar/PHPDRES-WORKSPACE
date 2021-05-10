@extends('layouts.app')

@section('head')
    <title>DASHBOARD - PAGE</title>
@endsection
@section('content') 
<div class="content-wrapper"> 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Widgets </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Widgets</li>
            </ol>
          </div>
        </div>
      </div> 
    </section>
    <section class="content">
        <div class="container-fluid">
            <h5 class="mb-2">Info Box</h5>  
        </div>
    </section>
</div>
@endsection