<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BannerController extends Controller
{
    public function index(){
        $banners = Banner::all();
        return view('compro.banner.index', compact('banners'));
    }

    public function show($id){
        $banner = Banner::find(Crypt::decrypt($id));
        return view('compro.banner.show', compact('banner'));
    }

    public function edit($id){
        $banner = Banner::find(Crypt::decrypt($id));
        return view('compro.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id){
        $banner = Banner::find(Crypt::decrypt($id));

        if($thumbnail = $request->file('thumbnail')){
            $destination_path = 'compro/banner/';
            $thumbnail2 = date('YmdHis').rand(999999999, 9999999999).$thumbnail->getClientOriginalName();
            $thumbnail->move($destination_path, $thumbnail2);
            $banner['thumbnail'] = $thumbnail2;
        }

        $banner->update();
        
        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.banner.index')->with('success', 'Data has been updated at '.$banner->updated_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.banner.index')->with('success', 'Data has been updated at '.$banner->updated_at);
        }
    }

    public function destroy($id){
        $banner = Banner::find(Crypt::decrypt($id));
        
        $banner->update([
            'thumbnail' => '',
        ]);

        if(auth()->user()->level == 'superadmin'){
            return redirect()->route('compro.superadmin.banner.index')->with('success', 'Data has been deleted at '.$banner->created_at);
        }elseif(auth()->user()->level == 'admin'){
            return redirect()->route('compro.admin.banner.index')->with('success', 'Data has been deleted at '.$banner->created_at);
        }
    }
}
