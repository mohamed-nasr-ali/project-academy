@extends('user.header')
@section('nav')
    @include('user.nav')
@endsection
@section('content')
<div class="container">
    <!-- Single Comment -->
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Edit</h3>
        </div>
        <div class="panel-body">
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form autocomplete="off" action="{{route('comments.update',Crypt::encrypt($bcomment->id))}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group{{ $errors->has('editcomment') ? ' has-error' : '' }}">
                            <textarea autofocus id="comment" name="editcomment" class="form-control" maxlength="200" style="max-height: 100px;min-height: 100px">{{$bcomment->comment}}</textarea>
                            @if ($errors->has('comment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('editcomment') }}</strong>
                                </span>
                            @endif
                        </div>
                        <input type="hidden" value="{{Crypt::encrypt($bcomment->post_id)}}" name="pid">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
