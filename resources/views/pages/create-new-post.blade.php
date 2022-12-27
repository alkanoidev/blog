@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <main class="bg-light m-3 rounded-3 p-3">
        <h2 class="ml-3">Create new post</h2>
        <div class="bg-white rounded-3" id="editorjs"></div>
        <button id="save" class="btn-primary mt-3 btn">Save</button>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>
@endsection
