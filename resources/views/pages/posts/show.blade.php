@extends('layout', [
    'pageTitle' => 'Users',
])
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive p-5">
            <div>
                <b>Name:</b> {{ $user->name }}
            </div>
            <div>
                <b>Role:</b> {{ $user->role->name }}
            </div>
            <div>
                <b>Position:</b> {{ $user->position }}
            </div>
            <div>
                <b>Phone:</b> {{ $user->phone }}
            </div>
            <div>
                <b>Address:</b> {{ $user->address }}
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('style')
<style>
    .btn-parent{
        padding: 10px;
        display: flex;
        justify-content: flex-end
    }
</style>
@endsection
