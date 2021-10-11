<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Profile Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
         //Varidationを行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        //フォームから画像が送信されてきたら、保存して$profile->image_pathに画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }
        
        
        //フォームから送信されてきた_token削除
        unset($form['_token']);
        //フォームから送信されてきたimage削除
        unset($form['image']);
        
        
        //データベースに保存
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    public function edit()
    {
        return view('admin.profile.edit');
    }
    
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
