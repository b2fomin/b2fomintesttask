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