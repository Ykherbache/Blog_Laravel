@extends('layouts.app')

@section('content')
    <div class="white_background_round_border">
        <div class="white_background_round_border titleOfDiv Unselectable_text">
            Last posts
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2"></div>

            <div class="col-sm-10">
                @foreach ($posts as $post)
                    <div class="white_background_round_border postDiv">
                        <div class="white_background_round_border titleOfDiv Unselectable_text">
                            {{ $post->Title }}
                        </div>
                        <br>
                        <p>{{ $post->content }}</p>
                        @auth
                            <form action="{{ route('Ajouter un commentaire') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_post" value="{{ $post->id }}">
                                <input type="submit" value="Ajouter un commentaire">
                            </form>
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="white_background_round_border formDiv">

                <span class="Unselectable_text"><em><b>
                            @guest
                                Log in so you can create a new post.
                            @endguest
                        </b></em></span>
                @auth
                    <div class="white_background_round_border titleOfDiv Unselectable_text">
                        New post
                    </div>
                    <form method="POST" action={{ route('Inserer Post') }}>
                        @csrf

                        <label for="title"><b>Title :</b></label>

                        <input id="title" name="title" type="text" class="@error('title') is-invalid @enderror">

                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <br>

                        <textarea id="content" name="content" placeholder="Content of post ..." wrap="off" cols="30"
                                  rows="5" class="@error('content') is-invalid @enderror">
                        </textarea>
                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button class="white_background_round_border Btn-Create-Post">Create</button>
                    </form>
                @endauth
            </div>
        </div>
        <div class="col"></div>
    </div>
@endsection
