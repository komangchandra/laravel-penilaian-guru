@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Data Guru')

@push('css')
  <link href="{{ asset('/') }}vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Data Teacher</h1>
  <a class="btn btn-primary mb-3" href="{{ route('teachers.create') }}">Add data</a>

  @if (session('success'))
    <div class="alert alert-success col-lg-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Teachers Data Table</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Teacher Name</th>
              <th>Potition</th>
              <th>Do</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Teacher Name</th>
              <th>Potition</th>
              <th>Do</th>
            </tr>
          </tfoot>
          <tbody>
            @forelse ($teachers as $teacher)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $teacher->teacher_name }}</td>
                <td>{{ $teacher->potition }}</td>
                <td>
                  <form onsubmit="return confirm('Are you sure you want to delete??');"
                    action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                    <a href="" class="btn btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            @empty
              <div class="alert alert-danger">
                Data empty.
              </div>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection


@push('js')
  <!-- Page level plugins -->
  <script src="{{ asset('/') }}vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('/') }}vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('/') }}js/demo/datatables-demo.js"></script>
@endpush
