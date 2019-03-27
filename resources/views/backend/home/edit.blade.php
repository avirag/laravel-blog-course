@extends('layouts.backend.main')

@section('title', 'MyBlog | Edit account')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Account
                <small>Edit account</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="{{ route('backend.users.index') }}">Account</a></li>
                <li class="active">Edit account</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                @include('backend.partials.message')

                {!! Form::model($user, [
                    'method' => 'PUT',
                    'url' => '/edit-account',
                    'id' => 'account-form'
                ]) !!}

                @include('backend.users.form', ['hideRoleDropdown' => true])

                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection

@include('backend.users.script')

