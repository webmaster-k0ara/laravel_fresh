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
                        <form method="post" action="{{ route('contact.update', ['id' => $contact->id]) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="your_name" class="form-label">氏名</label>
                                <input type="text" class="form-control" name="your_name"
                                    value="{{ $contact->your_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">件名</label>
                                <input type="text" class="form-control" name="title" value="{{ $contact->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">メールアドレス</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="email" value="{{ $contact->email }}">
                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">ホームページ</label>
                                <input type="url" class="form-control" name="url" value="{{ $contact->url }}">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">性別</label><br>
                                <input type="radio" class="btn-check" name="gender" id="option0" autocomplete="off"
                                    value="0" @if ($contact->gender === 0) checked @endif>
                                <label class="btn btn-outline-primary" for="option0">男性</label>
                                <input type="radio" class="btn-check" name="gender" id="option1" autocomplete="off"
                                    value="1" @if ($contact->gender === 1) checked @endif>
                                <label class="btn btn-outline-danger" for="option1">女性</label>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">年齢</label>
                                <select name="age" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example">
                                    <option value="">選択してください</option>
                                    <option value="1" @if ($contact->age === 1) selected @endif>~19</option>
                                    <option value="2" @if ($contact->age === 2) selected @endif>20~29</option>
                                    <option value="3" @if ($contact->age === 3) selected @endif>30~39</option>
                                    <option value="4" @if ($contact->age === 4) selected @endif>40~49</option>
                                    <option value="5" @if ($contact->age === 5) selected @endif>50~59</option>
                                    <option value="6" @if ($contact->age === 6) selected @endif>60~</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">お問合せ内容</label>
                                <textarea name="contact" class="form-control">{{ $contact->contact }}</textarea>
                            </div>
                            <div class="d-grid d-md-flex justify-content-md-end">
                                <input type="submit" class="btn btn-primary" value="更新する">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
