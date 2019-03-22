@extends('layouts.backend.main')

@section('title', 'MyBlog | Delete confirmation')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Users
                <small>Delete confirmation</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="{{ route('backend.users.index') }}">Users</a></li>
                <li class="active">Delete confirmation</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                {!! Form::model($user, [
                    'method' => 'DELETE',
                    'route' => ['backend.users.destroy', $user->id],
                    'id' => 'user-form'
                ]) !!}

                <div class="col-xs-9">
                    <div class="box">
                        <div class="box-body ">
                            <p>You have specified this user for deletion:</p>
                            <p>ID #{{ $user->id }}: {{ $user->name }}</p>
                            <p>What should be done with content own by this user?</p>
                            <p>
                                <input type="radio" name="delete_option" value="delete" checked/>Delete All Content
                            </p>
                            <p>
                                <input type="radio" name="delete_option" value="attribute" />Attribute Content to:
                                {!! Form::select('selected_user', $users) !!}
                            </p>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger">Confirm Deletion</button>
                            <a href="{{ route('backend.users.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection

@include('backend.users.script')
