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
                <form class='ml-2' action="" method="POST">
                  @csrf
                  
                <div class="form-group">
                  <label>Date from:</label>
                    <div class="input-group date" id="dateFrom" data-target-input="nearest">
                        <input type="text" name="dateFrom" class="form-control datetimepicker-input" data-target="#dateFrom"/>
                        <div class="input-group-append" data-target="#dateFrom" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @if($name != "stocks")
                  <div class="form-group">
                    <label>Date to:</label>
                      <div class="input-group date" id="dateTo" data-target-input="nearest">
                          <input type="text" name="dateTo" class="form-control datetimepicker-input" data-target="#dateTo"/>
                          <div class="input-group-append" data-target="#dateTo" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                @endif

                  <div class="form-group">
                    <label>Key:</label>
                    <input type="password" name="key_password" class="form-control" placeholder="Key">
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
                <tfoot>
                  {{$table->links('pagination::bootstrap-4')}}
                </tfoot>
            </table>
        </div>
      </section>
      <!-- /.content -->
@endsection