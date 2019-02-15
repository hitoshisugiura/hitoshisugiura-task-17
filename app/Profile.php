<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $guarded = array('id');

  // 以下を追記
  public static $rules = array(
      'name' => 'required',
      'gender' => 'required',
      'hobby' => 'required',
      'introduction' => 'required',
  );

  public function profile_history()
  {
    return $this->hasMany('App\Profile_history');
  }

  public function user()
  {
     return $this->belongsTo('App\User');
  }
}
