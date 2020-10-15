@extends('layouts.nav')

@section('title', 'プロフィール編集')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom pb-1 mb-4">
                        <h2 class="content-title">プロフィール編集</h2>
                    </div>
                    <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row form-group">
                            <!--<label cass="col-md-4 inline-block">-->
                            <!--    <div class="ml-md-3">-->
                            <!--        <img src="{{ asset('/image/no_image.png') }}" alt="プロフィール画像" class="select-img img-thumbnail"></img>-->
                            <!--        <input type="file" class="form-control-file d-none" name="icon_image"">-->
                            <!--    </div>-->
                            <!--</label>-->
                            <!-- できれば画像のプレビュー追加 -->
                            <div class="col-md-4">
                                <label class="ml-md-3" style="text-align:center;">
                                    @if ( $user_form->icon_image_path != null )
                                        <img src="{{ asset('/storage/image/'.$user_form->icon_image_path) }}" alt="プロフィール画像" class="select-img img-thumbnail ">
                                        <input type="file" class="form-control-file" name="icon_image">
                                    @else
                                        <img src="{{ asset('/image/no_image.png') }}" alt="画像がありません" class="select-img img-thumbnail">
                                        <input type="file" class="form-control-file" name="icon_image">
                                    @endif
                                </label>
                                <div class="form-check text-center">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-7 mb-3">
                                <div class="my-3">
                                    <h2 class="user-name">{{ $user_form->name }}</h2>
                                </div>
                                <div class="my-3">
                                    @if ( $user_form->introduction != null )
                                        <textarea class="form-control" rows="10" name="introduction">{{ $user_form->introduction }}</textarea>
                                    @else
                                        <textarea class="form-control" rows="10" name="introduction" 
                                        placeholder="自己紹介文：どんな本が好きなのか等記入して、プロフィールを公開してみましょう。" >{{ $user_form->introduction }}</textarea>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mr-2">
                            <input type="hidden" name="id" value="{{ $user_form->id }}">
                            <input type="submit" class="submit-btn btn" value="更新する">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection