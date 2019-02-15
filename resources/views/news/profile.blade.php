@extends('layouts.admin')
@section('title', 'プロフィール情報')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                              　
                                <th width="10%">名前</th>
                                <th width="20%">性別</th>
                                <th width="50%">趣味</th>
                                <th width="50%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody>

                           @foreach($profiles as $profile)
                               <tr>

                                   <th>{{ $profile->name }}</th>
                                   <td>{{ str_limit($profile->name) }}</td>
                                   <td>{{ str_limit($profile->gender) }}</td>
                                   <td>{{ str_limit($profile->hobby) }}</td>
                                   <td>{{ str_limit($profile->introduction) }}</td>
                               </tr>
                           @endforeach
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
