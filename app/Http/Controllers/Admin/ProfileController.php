<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use Storage;

class ProfileController extends Controller
{
    public function add(Request $request)
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        $form = $request->all();
        
        if (isset($form['icon_image'])) {
            $path = $request->file('icon_image')->store('image', 'public');
            $user->icon_image_path = basename($path);
            // $path = Storage::disk('s3')->putFile('/',$form['icon_image'],'public');
            // $user->icon_image_path = Storage::disk('s3')->url($path);
        }else {
            $user->icon_image_path = null;
        }
        
        unset($form['_token']);
        unset($form['icon_image']);
        
        $user->fill($form);
        $user->save();
        
        return redirect('home');
    }
    
    public function edit(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        if (empty($user)) {
            abort(404);
        }
        
        return view('admin.profile.edit', [ 'user_form'=>$user ]);
    }
    
    public function update(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        $user_form = $request->all();
        
        if ($request->remove == 'true'){
            $user_form['icon_image_path'] = null;
        } elseif ($request->file('icon_image')){
            $path = $request->file('icon_image')->store('public/image');
            $user_form['icon_image_path'] = basename($path);
            // $path = Storage::disk('s3')->putFile('/',$user_form['icon_image'],'public');
            // $user_form['icon_image_path'] = Storage::disk('s3')->url($path);
        } else {
            $user_form['icon_image_path'] = $user->icon_image_path;
        }
        
        unset($user_form['_token']);
        unset($user_form['icon_image']);
        unset($user_form['remove']);
        
        $user->fill($user_form)->save();
        
        return redirect('admin/mypage');
        
    }
}