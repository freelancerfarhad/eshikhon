@extends('layouts.app')
@section('content')
    <!-- ##### Single Blog Area Start ##### -->
    <div class="single-blog-wrapper section-padding-0-100">

      <!-- Single Blog Area  -->
    
      <div class="single-blog-area blog-style-2 mb-50">
          <div class="single-blog-thumbnail">
              <img src="{{$post->thumbnail_path()}}" alt="post thubmbail"height="490px">
          
          </div>
      </div>

      <div class="container">
          <div class="row">
              <!-- ##### Post Content Area ##### -->
              <div class="col-12 col-lg-9">
                  <!-- Single Blog Area  -->
                  <div class="single-blog-area blog-style-2 mb-50">
                      <!-- Blog Content -->
                      <div class="single-blog-content">
                          <div class="line"></div>
                          <a href="#" class="post-tag">Lifestyle</a>
                          <h4><a href="#" class="post-headline mb-0">{{$post->title}}</a></h4>
                          <div class="post-meta mb-50">
                              <p>By <a href="#">james smith</a></p>
                              <p>3 comments</p>
                          </div>
                          <p>{!!$post->body!!}</p>

                      </div>
                  </div>

               <div class="card">
                @include('message.success_message')
                {{-- @include('message.danger_message') --}}
                   <div class="card-header">
                       {{-- @auth --}}
                       {{-- <a href="{{route('post.store',$post->id)}}"class="btn btn-sm @if($post->likeanddislikes())btn-danger @else btn-success @endif">like</a>if and else// --}}
                       <a href="{{route('post.store',$post->id)}}"class="btn btn-sm {{$post->likeanddislikes() ? "btn-primary" : "btn-secondary"}}"><i class="fa-solid fa-thumbs-up"></i></a>
                       {{-- @endauth --}}
                       <i> likes( {{$post->likes->count()}})</i>
                      
                   </div>
                 
               </div>

                  <!-- Comment Area Start -->
                  <div class="comment_area clearfix mt-70">
                      <h5 class="title">Comments</h5>

                      <ol>
                          <!-- Single Comment Area -->
                          {{-- <li class="single_comment_area">
                              <!-- Comment Content -->
                              <div class="comment-content d-flex">
                                  <!-- Comment Author -->
                                  <div class="comment-author">
                                      <img src="img/bg-img/b7.jpg" alt="author">
                                  </div>
                                  <!-- Comment Meta -->
                                  <div class="comment-meta">
                                      <a href="#" class="post-date">March 12</a>
                                      <p><a href="#" class="post-author">William James</a></p>
                                      <p>Efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>
                                      <a href="#" class="comment-reply">Reply</a>
                                  </div>
                              </div>
                              <ol class="children">
                                  <li class="single_comment_area">
                                      <!-- Comment Content -->
                                      <div class="comment-content d-flex">
                                          <!-- Comment Author -->
                                          <div class="comment-author">
                                              <img src="img/bg-img/b7.jpg" alt="author">
                                          </div>
                                          <!-- Comment Meta -->
                                          <div class="comment-meta">
                                              <a href="#" class="post-date">March 12</a>
                                              <p><a href="#" class="post-author">William James</a></p>
                                              <p>Efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>
                                              <a href="#" class="comment-reply">Reply</a>
                                          </div>
                                      </div>
                                  </li>
                              </ol>
                          </li> --}}

                          <!-- Single Comment Area -->
                          @foreach ($post->comments as $comment)
                              
                     
                          <li class="single_comment_area">
                              <!-- Comment Content -->
                              <div class="comment-content d-flex">
                                  <!-- Comment Author -->
                                  <div class="comment-author">
                                      <img src=""alt="author">
                                  </div>
                                  <!-- Comment Meta -->
                                  <div class="comment-meta">
                                      <p>{{$comment->created_at->diffForHumans()}} <a href="">{{$comment->owners->name}}</a></p>
                                      <p>{{$comment->body}}</p>
                                      <a href="#" class="comment-reply">Reply</a> 
                                      <a href="#" class="comment-reply">all comment(20)</a>
                                     
                                      <a href="{{route('commentlike.store',$comment->id)}}"class="btn btn-sm {{$comment->likeanddislikes() ? "btn-primary" : "btn-secondary btn-sm"}}">
                                        
                                        <i class="fa-solid fa-thumbs-up"></i></a>
                                   
                                        <i> likes( {{$comment->likes->count()}})</i>
                                      
                                  </div>
                              </div>
                          </li>
                          @endforeach
                      </ol>
                  </div>

                  <div class="post-a-comment-area mt-70">
                      <h5>Leave a reply</h5>
                      {{-- @include('message.success_message') --}}
                      <!-- Reply Form -->
                      <form action="{{route('posts.store',$post->id)}}" method="post">
                        @csrf
                          <div class="row">
                              <div class="col-12">
                                  <div class="group">
                                      <textarea name="body" id="message" placeholder="wrire your comment..."class=" @error('body') is-invalid @enderror"></textarea>
                                      @error('body')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                      <span class="highlight"></span>
                                      <span class="bar"></span>
                                      <label>Comment</label>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <button type="submit" class="btn btn-info btn-sm">Reply</button>
                              </div>
                          </div>
                      </form>

                  </div>
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
                      <div class="sidebar-widget-area">
                          <h5 class="title subscribe-title">Subscribe to my newsletter</h5>
                          <div class="widget-content">
                              <form action="#" class="newsletterForm">
                                  <input type="email" name="email" id="subscribesForm" placeholder="Your e-mail here">
                                  <button type="submit" class="btn original-btn">Subscribe</button>
                              </form>
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

                      <!-- Widget Area -->
                      <div class="sidebar-widget-area">
                          <h5 class="title">Tags</h5>
                          <div class="widget-content">
                              <ul class="tags">
                                    @foreach ($post->tags as $tag)
                                  <li><a href="#">{{$tag->name}}</a></li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- ##### Single Blog Area End ##### -->
  @endsection