@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Tambah Guru')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add teacher's data</h1>

    <div class="row">
      <div class="col-lg-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Teacher Form Add</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('teachers.store') }}" method="POST">
              @csrf
              <div class="mb-3 row">
                <label for="teacher_name" class="col-sm-4 col-form-label">Teacher Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control @error('teacher_name') is-invalid @enderror" id="teacher_name"
                    name="teacher_name" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="potition" class="col-sm-4 col-form-label">Potition</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control @error('potition') is-invalid @enderror" id="potition"
                    name="potition" required>
                </div>
              </div>
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
