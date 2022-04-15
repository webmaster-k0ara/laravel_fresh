@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">名前</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-bs-toggle="list" href="#list-profile" role="tab"
                                        aria-controls="list-profile">タイトル</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        data-bs-toggle="list" href="#list-messages" role="tab"
                                        aria-controls="list-messages">メールアドレス</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list"
                                        data-bs-toggle="list" href="#list-settings" role="tab"
                                        aria-controls="list-settings">サイトアドレス</a>
                                    <a class="list-group-item list-group-item-action" id="list-gender-list"
                                        data-bs-toggle="list" href="#list-gender" role="tab"
                                        aria-controls="list-gender">性別</a>
                                    <a class="list-group-item list-group-item-action" id="list-age-list"
                                        data-bs-toggle="list" href="#list-age" role="tab" aria-controls="list-age">年齢</a>
                                    <a class="list-group-item list-group-item-action" id="list-contact-list"
                                        data-bs-toggle="list" href="#list-contact" role="tab"
                                        aria-controls="list-contact">お問合せ内容</a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                        aria-labelledby="list-home-list">{{ $contact->your_name }}</div>
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel"
                                        aria-labelledby="list-profile-list">{{ $contact->title }}</div>
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                        aria-labelledby="list-messages-list">{{ $contact->email }}</div>
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                        aria-labelledby="list-settings-list">{{ $contact->url }}</div>
                                    <div class="tab-pane fade" id="list-gender" role="tabpanel"
                                        aria-labelledby="list-gender-list">{{ $gender }}</div>
                                    <div class="tab-pane fade" id="list-age" role="tabpanel"
                                        aria-labelledby="list-age-list">{{ $age }}</div>
                                    <div class="tab-pane fade" id="list-contact" role="tabpanel"
                                        aria-labelledby="list-contact-list">{{ $contact->contact }}</div>
                                </div>
                            </div>
                        </div>

                        <form method="get" action="{{ route('contact.edit',['id' => $contact->id]) }}">
                            @csrf
                            <div class="d-grid d-md-flex justify-content-md-end">
                                <input type="submit" class="btn btn-info" value="変更する">
                            </div>
                        </form>
                        <form method="post" action="{{ route('contact.destroy',['id' => $contact->id]) }}" id="delete_{{ $contact->id }}">
                            @csrf
                            <a href="#" class="btn btn-denger" data-id="{{ $contact->id }}" onclick="deletePost(this);">削除する</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if(confirm('本当に削除していいですか？')){
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
@endsection
