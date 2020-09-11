@extends('layouts.nav')

@section('title', 'noveleco')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3">
            <form action="{{ action('HomeController@index') }}" method="get">
                @csrf
                <div class="form-group input-group">
                        <input type="text" class="form-control" placeholder="キーワード" name="cond_word" value="{{ $cond_word }}">
                        <span class="input-group-btn">
                    		<button type="submit" class="btn btn-default">検索</button>
                    	</span>
                </div>
            </form>
        </div>
        
        <div class="col-md-10 mt-3">
            <div class="card no_gutters ">
                <div>
                    
                </div>
                <div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card col-md-10 mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection