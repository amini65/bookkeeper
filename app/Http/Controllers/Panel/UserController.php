<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\UploadHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $listTitle='لیست کاربران';
    public $createTitle='ایجاد کاربران ';
    public $editTitle='ویرایش کاربران ';
    public $uploadPath = "/upload/users/";


    public function index(UserRepository $userRepository)
    {
        $lists=$userRepository->getUsers();

        return view('panel.user.list',compact('lists'))->with('title',$this->listTitle);
    }


    public function create()
    {
        return view('panel.user.create')->with('title', $this->createTitle);
    }


    public function store(UserStoreRequest $request,UserRepository $userRepository)
    {

        $image='';
        if ($request->file('image')) {
            $image = UploadHandler::uploadDocumentHandler($request->file('image'), $this->uploadPath, false);
        }
        $userRepository->store($request,$image);

        return redirect()->route("users.index")->with("flash_message", __('flash message create success'));
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('panel.user.edit',compact('user'))->with('title', $this->editTitle);
    }



    public function update(Request $request, User $user,UserRepository $userRepository)
    {


        $image='';
        if ($request->file('image')) {
            $image = UploadHandler::uploadDocumentHandler($request->file('image'), $this->uploadPath, false);
        }
        $userRepository->update($request,$user,$image);

        return redirect()->route("users.index")->with("flash_message", __('flash message edit success'));
    }


    public function destroy(User  $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with("flash_message", __('flash message delete success'));

        } catch (\Exception $e) {
            return redirect()->route('users.index')->with("flash_message", __('flash message error'));
        }

    }

}
