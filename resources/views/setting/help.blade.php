@extends('layouts.app')

@section('title', 'help')

@section('content')

@include('components.header')

<div class="container mt-5 mb-5">
    <h1>お問い合わせについて</h1>
    <ul>
        <li>お客さまの個人情報、お寄せいただいた相談内容は厳重に取扱い、プライバシー保護に努めます。</li>
        <li>お問い合わせには、受付時間内に対応させていただきます。<br>受付時間：9:00～17:00（土・日・祝日・年末年始・夏季休暇を除く）</li>
        <li>弊社からお返事させていただくことが適当でない場合や、取引関連のお問い合わせには、お返事を差し上げられない場合もございます。<br>あらかじめご了承ください。 </li>
    </ul>
    <h1>お問い合わせ内容入力</h1>
    <p>お問い合わせ内容をご入力の上、「送信」ボタンをクリックしてください。</p>
    <form method="POST" action="check.php">
        <div class="input-group mb-3">
            <div class="input-group-prepend col-2 px-0">
                <span class="input-group-text col-12">メールアドレス</span>
            </div>
            <input type="email" class="form-control col-10" name="email" placeholder="例）guest@example.com" required>
        </div>
        <div class="input-group mb-4">
            <div class="input-group-prepend col-2 px-0">
                <span class="input-group-text col-12">お問い合わせ内容</span>
            </div>
            <textarea class="form-control col-10" rows="7" name="content"></textarea>
        </div>
        <div>
            <input type="checkbox" required>
            <label>入力内容に間違いはありません</label>
        </div>
        <br>
        <input type="submit" value="送信" class="btn btn-info text-light">
    </form>
</div>

@endsection