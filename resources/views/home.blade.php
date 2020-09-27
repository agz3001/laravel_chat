@extends("layout")

@section("content")
<div class="container">
  <h1 style="text-align:center;">Chat room</h1>
    <div class="chat-area" >
        <div id="comment-data">
        @foreach ($comments as $item)
        <div class="row">
          <span>{!! nl2br(e($item->comment)) !!}</span>&nbsp;&nbsp;
          <p style="color:#8888;">{{$item->updated_at}}</p>
        </div>
        @endforeach
        </div>
    </div>
</div>
<form method="post" action="{{route('add')}}">
  @csrf
  <div class="container">
      <div class="form-group">
          <textarea id="comment" name="comment" placeholder="input message" class="form-control" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
          <button id="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>
</form>

@endsection
@section('js')
<script src="{{ asset('js/comment.js') }}"></script>
@endsection
