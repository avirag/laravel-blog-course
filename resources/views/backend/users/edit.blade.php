@extends('layouts.backend.main')

@section('title', 'MyBlog | Edit user')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Users
                <small>Edit user</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="{{ route('backend.users.index') }}">Users</a></li>
                <li class="active">Edit user</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                {!! Form::model($user, [
                    'method' => 'PUT',
                    'route' => ['backend.users.update', $user->id],
                    'files' => true,
                    'id' => 'user-form'
                ]) !!}

                @include('backend.users.form')

                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection

@include('backend.users.script')

