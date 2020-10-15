@extends('layouts.no_nav')

@section('title', 'プロフィール作成')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom pb-1 mb-4">
                        <h2 class="content-title">プロフィール作成</h2>
                    </div>
                    <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row form-group">
                            <!--<label cass="col-md-4 inline-block">-->
                            <!--    <div class="ml-md-3">-->
                            <!--        <img src="{{ asset('/image/no_image.png') }}" alt="本の画像" class="select-img img-thumbnail"></img>-->
                            <!--        <input type="file" class="form-control-file d-none" name="book_image_path" vulue="{{ old('book_image_path') }}">-->
                            <!--    </div>-->
                            <!--</label>-->
                            <!-- できれば画像のプレビュー追加 -->
                            <label class="col-md-4">
                                <div class="ml-md-3">
                                    <img src="{{ asset('/image/no_image.png') }}" alt="プロフィール画像" class="select-img img-thumbnail">
                                    <input type="file" class="form-control-file" name="icon_image">
                                </div>
                            </label>
                            <div class="col-md-7 mb-3">
                                <div class="my-3">
                                    <h2 class="user-name">{{ Auth::user()->name }}</h2>
                                </div>
                                <div class="my-3">
                                    <textarea class="form-control" rows="10" name="introduction" value="{{ old('introduction') }}" 
                                        placeholder="自己紹介文：どんな本が好きなのか等記入して、プロフィールを公開してみましょう。" ></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mr-2">
                            <input type="submit" class="submit-btn btn" value="作成する">
                            <a class="pl-2" href="{{ action('HomeController@index') }}" style="color:#dbd6d3;"><i>後でにする</i></a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection