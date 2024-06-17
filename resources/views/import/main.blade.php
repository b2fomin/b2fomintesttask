@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Import</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            @foreach ($tables as $table)                
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h4>
                        {{ $table[0] }}
                    </h4>
                  </div>
                  <h3 class="ml-2">
                    Rows: {{ $table[1] }} <br>
                    Columns: {{ $table[2] }}
                  </h3>
                  <div class="icon">
                    <i class="fa fa-solid fa-database"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            @endforeach
        </div>
      </section>
      <!-- /.content -->
@endsection