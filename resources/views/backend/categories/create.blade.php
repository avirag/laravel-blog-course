@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new category')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Categories
                <small>Add new category</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="{{ route('backend.categories.index') }}">Categories</a></li>
                <li class="active">Add new</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                {!! Form::model($category, [
                    'method' => 'POST',
                    'route' => 'backend.categories.store',
                    'files' => true,
                    'id' => 'category-form'
                ]) !!}

                @include('backend.categories.form')

                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection

@include('backend.categories.script')