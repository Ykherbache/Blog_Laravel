@extends('layouts.app')

@section('content')
    <div class="white_background_round_border postDiv">
        <div class="white_background_round_border titleOfDiv Unselectable_text">
            {{ $post->Title }}
        </div>
        <br>
        <p>{{ $post->content }}</p>
    </div>
    <div class="white_background_round_border lastComs" style="position:relative">
        <div class="white_background_round_border titleOfDiv Unselectable_text">
            Last Comments
        </div>
        <br>

        @if(empty($comments))
            <p style="font-weight: bold;">Nobody has commented yet, be the first to join the discussion !</p>
        @endif

        @foreach($comments as $comment)
            <div class="white_background_round_border postDiv">
                <br>
                <b>{{ $comment->name }} </b>wrote :
                <br>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>

    <div class="col"></div>
    <div class="col white_background_round_border formDiv" style="width: auto;margin : 0;padding:0;" >
        @auth
            <div class="white_background_round_border titleOfDiv Unselectable_text">
                New Comment
            </div>
            <form method="POST" action="{{ route('Ajouter un commentaire') }}" style="margin:0;">
                @csrf
                <input type="hidden" name="comentator_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                <input type="hidden" name="id_post" value="{{ $post->id }}">
                <textarea id="content" name="content" placeholder="Content of post ..." wrap="off" style="width: 60em;" class="@error('content') is-invalid @enderror">
                        </textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="white_background_round_border Btn-Create-Post" style="margin: 0 auto;display:block">Add</button>
            </form>
        @endauth
    </div>
    <div class="col"></div>

@endsection

