@extends('website')
@section('home')

<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{ $post->title }}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">{{ $post->title }}</li>
            </ul>
        </div>
    </div>
</div>
<div class="blog-section content-area-13">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- Blog grid box start -->
                <div class="blog-grid-box blog-detail">
                    <img class="blog-theme img-fluid" src="{{ $post->image }}" alt="blog-3">
                    <div class="detail">
                        <div class="date-box">
                            <h5>03</h5>
                            <h5>May</h5>
                        </div>
                        <h2>
                            <a href="blog-single-sidebar-right.html">Selling Your Home</a>
                        </h2>
                        <div class="post-meta">
                            <span><a href="#"><i class="fa fa-user"></i>John Antony</a></span>
                            <span><a><i class="fa fa-clock-o"></i>{{ change_time_to_text($post->created_at) }}</a></span>
                            <span><a href="#"><i class="fa fa-commenting-o"></i>24 Comment</a></span>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.But also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.But also the leap into electronic typesetting,</p>
                        <p>Fusce non ante sed lorem rutrum feugiat. Vestibulum pellentesque, purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa. Fusce non ante sed lorem rutrum feugiat.</p>
                        <br>
                        <blockquote class="blockquote">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <footer>
                                Someone famous in
                                <cite>
                                    Source Title
                                </cite>
                            </footer>
                        </blockquote>
                        <p>Fusce non ante sed lorem rutrum feugiat. Vestibulum pellentesque, purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa. Fusce non ante sed lorem rutrum feugiat.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.But also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.But also the leap into electronic typesetting,</p>
                        <br>
                        <div class="row clearfix tags-socal-box">
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <div class="tags">
                                    <h2>Tags</h2>
                                    <ul>
                                        <li><a href="#">Image</a></li>
                                        <li><a href="#">Features</a></li>
                                        <li><a href="#">Gallery</a></li>
                                        <li><a href="#">News</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="social-list">
                                    <h2>Share</h2>
                                    <ul>
                                        <li>
                                            <a href="#" class="facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="rss">
                                                <i class="fa fa-rss"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog grid box end -->

                <!-- Comments section start -->
                <div class="comments-section cmn-mrg-btm">
                    <h2 class="comments-title">Bình Luận</h2>
                    <div class="fb-comments" data-href="http://duongdinhmanh.com/" data-numposts="10" data-width="100%" data-colorscheme="light" style="border-bottom: 1px solid #fff; height: auto;">

                    </div>
                </div>
                <!-- Comments section end -->

                <!-- Contact-1 start -->
                <div class="contact-1 cmn-mrg-btm">
                    <h2>Leave a Comment</h2>
                    <div class="container">
                        <div class="row">
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group name">
                                            <input type="text" name="name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group email">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group subject">
                                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group number">
                                            <input type="text" name="phone" class="form-control" placeholder="Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group message">
                                            <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="send-btn mb-50">
                                            <button type="submit" class="btn btn-color btn-md btn-message">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Contact-1 end -->

            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar mbl mb-50">
                    <!-- Search box start -->
                    <div class="widget search-box">
                        <h5 class="sidebar-title">Tìm Kiếm</h5>
                        <form action="{{ route('search_post') }}" class="form-search" method="POST">
                            @csrf
                            <input type="text" class="form-control" name="key_post" placeholder="Tìm Kiếm">
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        </form>
                        <br>
                         {{--  like - facebook --}}
                        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    </div>

                    <!-- Categories start -->
                    <div class="widget categories">
                        <h5 class="sidebar-title">Categories</h5>
                        <ul>
                            <li><a href="#">Apartments<span>(12)</span></a></li>
                            <li><a href="#">Houses<span>(8)</span></a></li>
                            <li><a href="#">Family Houses<span>(23)</span></a></li>
                            <li><a href="#">Offices<span>(5)</span></a></li>
                            <li><a href="#">Villas<span>(63)</span></a></li>
                            <li><a href="#">Other<span>(7)</span></a></li>
                        </ul>
                    </div>

                    <!-- Recent posts start -->
                    <div class="widget recent-posts">
                        <h5 class="sidebar-title">Bài Viết Liên Quan</h5>
                        @foreach ($posts as $post)
                            <div class="media mb-4">
                                <a class="pr-4" href="properties-details.html">
                                    <img src="{{ $post->image }}" alt="sub-property">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a>
                                    </h5>
                                    <p>{{ change_time_to_text($post->created_at) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </div>

                    <!-- Tags start -->
                    <div class="widget tags clearfix">
                        <h5 class="sidebar-title">Tags</h5>
                        <ul class="tags">
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Real Estate</a></li>
                            <li><a href="#">Luxury</a></li>
                            <li><a href="#">Theme</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Outdoor</a></li>
                            <li><a href="#">UI-UX</a></li>
                            <li><a href="#">Buy Website</a></li>
                            <li><a href="#">Villa</a></li>
                            <li><a href="#">Sellers</a></li>
                        </ul>
                    </div>

                    <!-- Recent comments start -->
                    <div class="widget recent-posts">
                        <h5 class="sidebar-title">Sản Phẩm Liên Quan</h5>
                        @foreach ($newsAprtment as $news_item)
                            <div class="media mb-4">
                                <a class="pr-4" href="properties-details.html">
                                    <img src="{{ $news_item->image }}" alt="sub-property">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="properties-details.html">{{ $news_item->name }}</a>
                                    </h5>
                                    <p>{{ change_time_to_text($news_item->created_at) }}</p>
                                    <p> <strong>{{ number_format($news_item->price) }}/m2</strong></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Latest start -->
                    <div class="widget latest-tweet">
                        <h5 class="sidebar-title">Latest Tweet</h5>
                        <p><a href="#">Lorem Ipsum is simply</a> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text,</p>
                        <p>@Lorem ipsum dolor<a href="#">sit amet, consectetur</a> adipiscing elit. Aenean id dignissim justo. Maecenas urna lacus,</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
