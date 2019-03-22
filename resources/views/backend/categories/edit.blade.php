@extends('layouts.backend.main')

@section('title', 'MyCategories | Edit category')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Categories
                <small>Edit category</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="{{ route('backend.categories.index') }}">Categories</a></li>
                <li class="active">Edit category</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                {!! Form::model($category, [
                    'method' => 'PUT',
                    'route' => ['backend.categories.update', $category->id],
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