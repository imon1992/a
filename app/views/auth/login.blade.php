@extends('layout')

@section('content')
    <div class="col-md-offset-4">
    {{ $errors->first('wrong'); }}
    </div>
    <form class="form-horizontal" method="post" action="">

        <div class="form-group">
            <label for="FullName" class="col-sm-2 control-label">Email</label>
            <div class=" col-md-5">
                <input type="text" class="form-control" id="email" name="email" value="{{Session::get('email')}}">
            </div>
            <div>
                {{ $errors->first('email'); }}
            </div>
        </div>

        <div class="form-group">
            <label for="FullName" class="col-sm-2 control-label">Password</label>
            <div class=" col-md-5">
                <input type="text" class="form-control" id="password" name="password">
            </div>
            <div>
                {{ $errors->first('password'); }}
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2  col-md-5">
                <button type="submit" class="btn btn-default">Login</button>
            </div>
        </div>
    </form>

@stop
