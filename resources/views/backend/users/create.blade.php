@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new user')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Users
                <small>Add new user</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="{{ route('backend.users.index') }}">Users</a></li>
                <li class="active">Add new</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                {!! Form::model($user, [
                    'method' => 'POST',
                    'route' => 'backend.users.store',
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
