@if (count($errors) > 0)
<!--エラーが発生した場合、エラー内容を表示-->
<div class="alert alert-danger">
<div><strong>入力した内容を修正してください。</strong></div>
<div> <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach </ul> </div> </div>
@endif