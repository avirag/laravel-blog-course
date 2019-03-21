@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new post')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Blog
                <small>Add new post</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
                <li class="active">Add new</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-body ">
                            {!! Form::model($post, [
                                'method' => 'POST',
                                'route' => 'backend.blog.store',
                                'files' => true
                            ]) !!}

                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                {!! Form::label('title') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}

                                @if($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                {!! Form::label('slug') !!}
                                {!! Form::text('slug', null, ['class' => 'form-control']) !!}

                                @if($errors->has('slug'))
                                    <span class="help-block">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>

                            <div class="form-group excerpt {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                                {!! Form::label('excerpt') !!}
                                {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}

                                @if($errors->has('excerpt'))
                                    <span class="help-block">{{ $errors->first('excerpt') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                {!! Form::label('body') !!}
                                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                                @if($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('body') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                                {!! Form::label('published_at', 'Published Date') !!}
                                <div class='input-group date' id='datetimepicker1'>
                                    {!! Form::text('published_at', null, ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                </div>

                                @if($errors->has('published_at'))
                                    <span class="help-block">{{ $errors->first('published_at') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                {!! Form::label('category_id', 'Category') !!}
                                {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Choose category'
                                ]) !!}

                                @if($errors->has('category_id'))
                                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                {!! Form::label('image', 'Feature Image') !!}
                                <br />
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://placehold.it/200x150&text=No+Image"  alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('image') !!}</span>
                                        <a href="#" class="btn btn-default btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>

                                @if($errors->has('image'))
                                    <span class="help-block">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <hr>

                            {!! Form::submit('Create new post', ['class' => 'btn btn-primary']) !!}

                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('#title').on('blur', function () {
            var theTitle = this.value.toLowerCase().trim();
            var slugInput = $('#slug');
            var theSlug = theTitle
                .replace(/&/g, '-and-')
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });

        var simplemde1 = new SimpleMDE({element: $("#excerpt")[0]});
        var simplemde2 = new SimpleMDE({element: $("#body")[0]});

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true
        });
    </script>
@endsection