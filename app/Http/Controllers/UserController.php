<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(int $id)
    {
        $user = User::findOrFail($id);

        return view('users.show', ['user' => $user]);
    }

    // ユーザー情報編集画面表示
    public function edit(int $id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', ['user' => $user]);
    }

    // 更新処理
    public function update(Request $request, User $user)
    {
        $request->name = $user->name;
        $request->email = $user->email;
        $user->save();

        return redirect()->route('users.show', ['user' => $user]);
    }

    // フォロー処理
    public function follow(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return redirect()->back();
    }

    // フォロー解除処理
    public function unfollow(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return redirect()->back();
    }
}
