@extends('website')
@section('home')
<div class="sub-banner overview-bgi">
    <div class="breadcrumb-area">
        <div class="search-area">
            <div class="container">
                <div class="search-area-inner">
                    <div class="search-contents ">
                        <form class="form-search" method="POST">
                            @csrf
                            <input type="text" class="form-control" name="key_post" placeholder=" Kết Quả Tìm Kiếm  {{ $key_post }}">
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-section content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>Danh Sách Tin Tức</h1>
        </div>
        <div class="row">
            @foreach ($check_key as $post)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-grid-box">
                        <img class="blog-theme img-fluid" src="{{ $post->image }}" alt="property-10">
                        <div class="detail">
                            <div class="date-box">
                                <h5>03</h5>
                                <h5>May</h5>
                            </div>
                            <h3>
                                <a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <div class="post-meta">
                                <span><a href="#"><i class="fa fa-user"></i>John Antony</a></span>
                                <span><a href="#"><i class="fa fa-clock-o"></i></i>{{ change_time_to_text($post->created_at) }}</a></span>
                            </div>
                            <p class="desc-post-search">{{ $post->desc }}</p>
                            <a href="{{ route('post',$post->slug) }}" class="btn-read-more">Đọc Bài Viết</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12">
                <div class="pagination-box">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
