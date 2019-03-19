@extends('layouts.backend.main')

@section('title', 'MyBlog | Blog index')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Blog
      <small>Display All blog posts</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td width="80">Action</td>
                  <td>Title</td>
                  <td>Author</td>
                  <td>Category</td>
                  <td>Date</td>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                  <tr>
                      <td>
                        <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('backend.blog.destroy', $post->id) }}" class="btn btn-xs btn-danger">
                          <i class="fa fa-times"></i>
                        </a>
                      </td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->author->name }}</td>
                      <td>{{ $post->category->title }}</td>
                      <td>{{ $post->created_at }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="box-footer clearfix">
            <div class="pull-left">
              <ul class="pagination no-margin">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>

            <div class="pull-right">
              <small>4 items</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection