@extends('layouts.backend.main')

@section('title', 'MyBlog | Edit post')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Blog
                <small>Edit post</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
                <li class="active">Edit post</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                {!! Form::model($post, [
                    'method' => 'PUT',
                    'route' => ['backend.blog.update', $post->id],
                    'files' => true,
                    'id' => 'post-form'
                ]) !!}

                @include('backend.blog.form')

                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection

@include('backend.blog.script')