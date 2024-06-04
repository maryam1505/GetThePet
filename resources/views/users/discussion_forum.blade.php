@extends('users.layouts.master')
@section('content')
    <!-- Offer Start -->
    <div class="container-fluid bg-offer py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-start">
                <div class="col-lg-7">
                    <div class="border-start border-5 border-dark ps-5 mb-5">
                        <h1 class="display-4 text-uppercase text-white mb-0">Discussion Forum</h1>
                    </div>
                    <p class="text-white mb-4">Your go-to place for engaging discussions and community support. Join us to share ideas, ask questions, and connect with others who share your interests. Whether you're looking for advice, information, or friendly conversation, our forum is the perfect place to be heard and get involved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <section class="container py-5">
        <div class="discussion-forum rounded d-flex">
            <div class="row col-12">
                <div class="col-12">
                    <div class="answer-action shadow p-4">
                        <div class="action-content d-flex align-items-center">
                            <div class="image-wrap mr-4">
                                <img src="{{asset('users/images/forum.png')}}" alt=" icon" style="width:5vw;">
                            </div>
                            <div class="content">
                                <h5 class="mb-2 m-0">Can't Find an Answer?</h5>
                                <p class="m-0"> Make use of a qualified tutor to get the answer</p>
                            </div>
                        </div>
                        <div class="action-button-container d-flex justify-content-end">
                            <a href="#" class="action_button btn-ans rounded text-white bg-primary" data-toggle="modal" data-target="#AskQuestion">Ask a Question</a>
                        </div>
                    </div>
                    <div class="shadow rounded p-4">
                        <div class="bg-light p-4 d-flex justify-content-between">
                           <p class="m-0">Questions</p> 
                            <div class="col-4">
                                <div class="d-flex justify-content-between">
                                    <p class="m-0">Likes</p>
                                    <p class="m-0">Comments</p>
                                    <p class="m-0">Views</p>
                                </div>
                            </div>
                        </div>
                        @foreach ($questions as $que)
                            @php
                                $isLiked = false;
                            @endphp
                            @foreach ($liked_questions as $liked)
                                @if ($liked->users_questions_id === $que->users_questions_id)
                                    @php
                                        $isLiked = true;
                                        break;
                                    @endphp
                                @endif
                            @endforeach
                            <hr class="my-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ empty($que['user_data']['image']) ? asset('admin/img/user-placeholder.png') : asset('storage/' . $que['user_data']['image']) }}" alt="user" class="rounded-circle mr-4" style="width:3vw;">
                                            <div class="d-flex flex-column w-100">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="m-0 mb-2">{{$que->question}}</h6>
                                                    <small class="tiny-text text-muted ml-auto">{{$que->time_ago}}</small>
                                                </div>
                                                <span class="text-muted m-0 small">
                                                    @if($que['user_data']['first_name'])
                                                        {{$que['user_data']['first_name']}} {{$que['user_data']['last_name']}}
                                                    @else 
                                                        {{$que['user_data']['username']}}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-column align-items-center cursor-pointer question_like" data-question_id="{{$que->users_questions_id}}">
                                                <i class="bi {{ $isLiked ? 'bi-heart-fill text-danger' : 'bi-heart text-muted' }}"></i>
                                                <span class="text-muted small">{{$que['likes']}}</span>
                                            </div>
                                            <div class="d-flex flex-column align-items-center pl-4 cursor-pointer chat-box" style="width: 5vw;">
                                                <i class="bi bi-chat text-muted"></i>
                                                <span class="text-muted small">{{$que['reply_count']}}</span>
                                            </div>
                                            <div class="d-flex flex-column align-items-center pr-3 cursor-pointer" style="width: 5vw;">
                                                <i class="bi bi-eye text-muted"></i>
                                                <span class="text-muted small">2</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="reply-box my-3 bg-light p-3 ml-auto d-none" style="width:80%;">
                                    <div class="container mb-3 overflow-auto" style="height: 15rem;">
                                        @if ($que->replies->isEmpty()) 
                                            <p class="m-0 text-center">No Comments Yet!</p>
                                        @endif

                                        @foreach ($que->replies as $reply)
                                            @php
                                                $isLiked = false;
                                            @endphp
                                            @foreach ($liked_reply as $liked)
                                                @if ($liked->question_replies_id === $reply->question_replies_id)
                                                    @php
                                                        $isLiked = true;
                                                        break;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            <div class="col-12 d-flex justify-content-between">
                                                <div class="d-flex align-items-center justify-content-start col-10">
                                                    <img src="{{ empty($reply['replier_data']['image']) ? asset('admin/img/user-placeholder.png') : asset('storage/' . $reply['replier_data']['image']) }}" alt="user" class="rounded-circle mr-4" style="width:3vw;">
                                                    <div class="d-flex flex-column justify-content-evenly">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="m-0 small">
                                                                @if($reply['replier_data']['first_name'])
                                                                    {{$reply['replier_data']['first_name']}} {{$reply['replier_data']['last_name']}}
                                                                @else 
                                                                    {{$reply['replier_data']['username']}}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <span class="m-0 small text-muted">{{$reply->reply}}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center flex-column justify-content-between">
                                                    <small class="tiny-text text-muted">{{$reply->time_ago}}</small>
                                                    <small class="d-flex align-items-center justify-content-evenly reply-like cursor-pointer" data-reply_id="{{$reply->question_replies_id}}" style="width: 2rem"><i class="bi {{ $isLiked ? 'bi-heart-fill text-danger' : 'bi-heart' }} m-0"></i> <span class="tiny-text">{{$reply->likes}}</span></small>
                                                </div>
                                            </div>
                                            <hr class="my-3">
                                        @endforeach
                                    </div>
                                    <div class="send-reply">
                                        <form action="{{route('send.reply')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="question_id" value="{{$que->users_questions_id}}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="reply" placeholder="Enter reply..." required>
                                                <div class="input-group-append send-msg cursor-pointer">
                                                    <span class="input-group-text"><i class="fas fa-paper-plane text-primary"></i></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <hr class="my-4">
                        <div class="row">
                            <div class="col-8">
                                <div class="d-flex align-items-center justify-content-start">
                                    <img src="{{asset('admin/img/user.jpg')}}" alt="user" class="rounded-circle mr-4" style="width:3vw;">
                                    <div class="d-flex flex-column">
                                        <h6 class="m-0 mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</h6>
                                        <span class="text-muted m-0 small">Ayesha Maryam</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="bi bi-heart text-muted"></i>
                                        <span class="text-muted small">2</span>
                                    </div>
                                    <div class="d-flex flex-column align-items-center" style="width: 5vw;">
                                        <i class="bi bi-chat text-muted"></i>
                                        <span class="text-muted small">2</span>
                                    </div>
                                    <div class="d-flex flex-column align-items-center pr-5" style="width: 5vw;">
                                        <i class="bi bi-eye text-muted"></i>
                                        <span class="text-muted small">2</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection