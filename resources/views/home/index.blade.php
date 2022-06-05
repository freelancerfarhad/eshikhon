@extends('layouts.app')

@section('content')
	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Original - Lifestyle Blog Template</title>

  

</head>

<body>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">

               @foreach ($posts as $post)
                    <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                  <img src="{{$post->thumbnail_path()}}" alt="post thubmbail"width="100%">
                                  
                                    <div class="post-date">
                                        <a href="#">12 <span>march</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Blog Content -->
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">Lifestyle</a>
                                    <h4><a href="{{route('post.show',$post->id)}}" class="post-headline">{{$post->title}}</a></h4>
                                    <p>{!!$post->body!!}</p>
                                    <div class="post-meta">
                                        <p><i>{{$post->created_at->diffForHumans()}} </i> by james smith <b> likes ({{$post->likes->count()}})</b></p>
                                        <a href="#"> <p>Comments ({{$post->comments->count()}})</p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               @endforeach
                 
                </div>

                <!-- ##### Sidebar Area ##### -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="post-sidebar-area">

                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <form action="#" class="search-form">
                                <input type="search" name="search" id="searchForm" placeholder="Search">
                                <input type="submit" value="submit">
                            </form>
                        </div>

                        <!-- Widget Area -->
                        {{-- <div class="sidebar-widget-area">
                            <h5 class="title subscribe-title">Subscribe to my newsletter</h5>
                            <div class="widget-content">
                                <form action="#" class="newsletterForm">
                                    <input type="email" name="email" id="subscribesForm" placeholder="Your e-mail here">
                                    <button type="submit" class="btn original-btn">Subscribe</button>
                                </form>
                            </div>
                        </div> --}}

                         <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Category</h5>

                            <div class="widget-content">

                                <!-- Single Blog Post -->
                                
                                    <!-- Post Thumbnail -->
                                    @foreach ($catagory as $catagory)
                                    <div class="post-thumbnail">
                                        <p><a href="/posts/{{$catagory->id}}/category" class="post-headline text-red"style="">{{$catagory->name}}</a></p>
                                    </div>
                                    @endforeach
                                   
                                  
                                
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Advertisement</h5>
                            <a href="#"><img src="img/bg-img/add.gif" alt=""></a>
                        </div>

                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Latest Posts</h5>

                            <div class="widget-content">

                                <!-- Single Blog Post -->
                                <div class="single-blog-post d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/lp1.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-tag">Lifestyle</a>
                                        <h4><a href="#" class="post-headline">Party people in the house</a></h4>
                                        <div class="post-meta">
                                            <p><a href="#">12 March</a></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Blog Post -->
                                <div class="single-blog-post d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/lp2.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-tag">Lifestyle</a>
                                        <h4><a href="#" class="post-headline">A sunday in the park</a></h4>
                                        <div class="post-meta">
                                            <p><a href="#">12 March</a></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Blog Post -->
                                <div class="single-blog-post d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/lp3.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-tag">Lifestyle</a>
                                        <h4><a href="#" class="post-headline">Party people in the house</a></h4>
                                        <div class="post-meta">
                                            <p><a href="#">12 March</a></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Blog Post -->
                                <div class="single-blog-post d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/lp4.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-tag">Lifestyle</a>
                                        <h4><a href="#" class="post-headline">A sunday in the park</a></h4>
                                        <div class="post-meta">
                                            <p><a href="#">12 March</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                    </div>
                </div>
            </div>
            {!! $posts->links() !!}
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->

   

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area text-center">
 

   <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

    </footer>


@endsection