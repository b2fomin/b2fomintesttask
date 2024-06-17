@extends('layouts.main', ['active' => 'Import'])

@section('content')
@extends('layouts.main', ['active' => 'Import'])

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
            <table class="table table-bordered table-hover dataTable dtr-inline">
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th class="sorting">
                                {{ $column }}
                            </th>
                        @endforeach                        
                    </tr>
                </thead>
            </table>
        </div>
      </section>
      <!-- /.content -->
@endsection
@endsection