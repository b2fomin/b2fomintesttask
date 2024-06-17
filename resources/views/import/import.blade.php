@extends('layouts.main', ['active' => 'Import'])

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{$name}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Import</h3>
                </div>
                <form class='ml-2' action="/" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Date from:</label>      
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          <input type="text" name="date_from" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Date to:</label>      
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          <input type="text" name="date_to" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                        </div>
                      </div>  
                    <div class="form-group">
                      <label>Key:</label>
                      <input type="password" class="form-control" placeholder="Key">
                    </div>
                  </div>
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

            <table class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th class="sorting">
                                {{ $column }}
                            </th>
                        @endforeach                        
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach ($table as $row)
                    @php ++$i; @endphp
                        <tr class="{{ $i % 2 ? "odd" : "even" }}">
                        @foreach ($row as $cell)
                            <td class="text-break">{{ $cell }}</td>
                        @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </section>
      <!-- /.content -->
@endsection