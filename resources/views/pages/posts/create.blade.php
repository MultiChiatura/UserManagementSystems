@extends('layout', [
    'pageTitle' => 'Users',
])

@section('main')
    <div class="row">
        <!-- left column -->
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Post Create</h3>
                </div>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('components.form.input', [
                            'title' => 'Title',
                            'name' => 'title'
                        ])

                        @include('components.form.textarea', [
                            'title' => 'Description',
                            'name' => 'description'
                        ])

                        @include('components.form.textarea', [
                            'title' => 'Text',
                            'name' => 'text'
                        ])
                        @include('components.form.multiple_file', [
                            'title' => 'Images',
                            'name' => 'imgs[]'
                        ])

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

