@extends('layouts.app')
@section('content')
<style type="text/css">
    .resize{
        width: 100%;
        height: 200px;
        margin: 0 auto;
    }
</style>
<div class="container" style="float-left">
    <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="https://s-media-cache-ak0.pinimg.com/236x/82/2e/22/822e223b9c788591274bf30b17506e33.jpg" alt="">
                <div class="carousel-caption">
                Welcome to my laravel DEMO !
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class='container' style="margin-top:10px">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Welcome</div>

            <div class="panel-body">
                Your Application's Landing Page.
            </div>
        </div>
    </div>
</div>

<div class='container'>
    <div class="row">
        <div class='col-md-4'>
            <a href="{{URL::route('resume')}}">
                <img class="resize" src="http://pics.ee/k15v">
            </a>
        </div>
        <div class='col-md-4'><img class="resize" src="http://pics.ee/k151"></div>
        <div class='col-md-4'>
            <a href="{{URL::route('pratice')}}">
                <img class="resize" src="http://pics.ee/no1a">
            </a>
        </div>
    </div>
</div>

@endsection

