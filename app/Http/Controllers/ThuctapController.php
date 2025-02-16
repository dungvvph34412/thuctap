<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessImage;
use App\Models\Thuctap;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ThuctapRequest;
use App\Jobs\SendWelcomeEmail;
use App\Models\User;

class ThuctapController extends Controller
{
    public function listThuctap(){
        $listThuctap = Thuctap::all();
        return view('list-thuctap')->with([
            'listThuctap' => $listThuctap
        ]);
    } 
    public function addThuctap(){
        return view('add-thuctap');
    }
    public function addPostThuctap(ThuctapRequest $req){
        $path = null;
        if($req->hasFile('avatar')){
           $image = $req->file('avatar');
           $newName = time() . '.' . $image->getClientOriginalExtension();
          $path = $image->storeAs('images', $newName, 'public');
        }
        $data = [
            'name' => $req->name,
            'avatar' => $path,
            'birthday' => $req->birthday,
            'biography' => $req->biography,
        ];
        Thuctap::create($data);
        return redirect()->route('listThuctap');
    }
    public function updateThuctap($id){
        $thuctap = Thuctap::find($id);
        return view('update-thuctap')->with([
            'thuctap' => $thuctap
        ]);
    }
    public function updatePutThuctap($id, ThuctapRequest $req){
        // $req->validate([
        //     'name' => 'required',
        //     'birthday' => 'required',
        //     'biography' => 'required',
        // ]);
        $thuctap = Thuctap::find($id);
        $path = $thuctap->avatar;

        if($req->hasFile('avatar')){
            Storage::disk('public')->delete($thuctap->avatar);
           $image = $req->file('avatar');
           $newName = time() . '.' . $image->getClientOriginalExtension();
          $path = $image->storeAs('images', $newName, 'public');
        }
        $data = [
            'name' => $req->name,
            'avatar' => $path,
            'birthday' => $req->birthday,
            'biography' => $req->biography,
        ];
        $thuctap->update($data);
        return redirect()->route('listThuctap');
    }
    public function deleteThuctap($id){
        $thuctap = Thuctap::find($id);
        $thuctap->delete();
        return redirect()->route('listThuctap');
    }
    public function register(Request $request)
{
    // Validate và tạo user mới
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Dispatch job gửi email
    SendWelcomeEmail::dispatch($user);

    return response()->json(['message' => 'User registered and email is queued']);
}
public function upload(Request $request)
{
    $request->validate([
        'image' => 'required|image',
    ]);

    // Lưu ảnh tạm thời
    $path = $request->file('image')->store('uploads');

    // Dispatch job xử lý ảnh
    ProcessImage::dispatch($path);

    return response()->json(['message' => 'Image uploaded and processing queued']);
}
}
