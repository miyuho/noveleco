<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;

class ConfigController extends Controller
{
    public function account_config()
    {
        $id = Auth::id();
        $user = User::find($id);
        
        return view('admin.account_config', [ 'user'=>$user ]);
    }
    
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}
