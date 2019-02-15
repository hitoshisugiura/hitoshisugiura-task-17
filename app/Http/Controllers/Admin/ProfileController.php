<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
// 以下を追記
use App\Profile_history;
use Carbon\Carbon;

class ProfileController extends Controller
{
  public function add()
  {
    return view('admin.profile.create');
  }

//ユーザーが入力したデータ・$requestが引数として渡ってくる
  public function create(Request $request)
  {
    //＄reｑｕｅｓｔ変数の生合成のチェック
    $this->validate($request, Profile::$rules);
    //プロフィールクラスのインスタンスを作成し$profileへ代入する
    $profile = new Profile;
    $form = $request->all();
    unset($form['_token']);
    //$requestのパラメーターを$profileへ設定する。
    $profile->fill($form);
    //$profileの内容をDBへ保存する。
    $profile->save();

    return redirect('admin/profile/create');
  }

  //profile編集画面の表示
  public function edit(Request $request)
  {
    $user = User::find($request->id);
    return view('admin.profile.edit', ['profile_form' => $user->profile]);
  }

  //profileの更新
  public function update(Request $request)
  {
     return redirect('admin/profile/edit');
     // 以下を追記
       $profile_history = new Profile_history;
       $profile_history->profile_id = $profile->id;
       $profile_history->edited_at = Carbon::now();
       $profile_history->save();

       return redirect('admin/profile/');


  }
}

?>
