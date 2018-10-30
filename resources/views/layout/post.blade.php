<div class="blog-2 content-area">
    <div class="container">
        <div class="main-title">
            <h1>Blog</h1>
        </div>
        <div class="row">
            @php
                $x = 0;
            @endphp
           @foreach ($posts as $post)
                <div class="col-lg-6 col-md-6 wow fadeInLeft delay-{{ $x +=04 }}s">
                    <div class="row blog-list">
                        <div class="col-lg-5 col-md-12 col-pad ">
                            <div class="photo">
                                <img src="{{ $post->image }}" alt="blog-4" class="img-fluid fit-cover h-100">
                                <div class="date-box">
                                    <h5>03</h5>
                                    <h5>May</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-pad align-self-center post">
                            <div class="detail">
                                <h3>
                                    <a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="fa fa-user"></i>John Antony</a></span>
                                    <span><a href="#"><i class="fa fa-clock-o"></i>7 Comment</a></span>
                                </div>
                                <p class="desc-post">{{ $post->desc }}</p>
                                <br>
                                <a href="{{ route('post',$post->slug) }}" class="search-button btn-md btn-color">Đọc Bài Viết</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
