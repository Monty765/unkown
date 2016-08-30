@extends('layouts.app')
@section('content')
<div class="container">
    @if (Auth::guest())
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                            <h3>Login</h3>
                             <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Create your account</h3>
                        <div class="col-xs-12" style="height:50px;"></div>
                        <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/register') }}"><button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Create your account
                                </button></a>
                        </div>
                        <div class="col-xs-12" style="height:50px;"></div>
                    </div>
                </div>
            </div>
        </div>
         @else
         @endif
         <div class="row">
        <div id="componentWrapper">
                
              <div class="thumbContainer">
                      
                    <div class="thumbInnerContainer">
                    <br/>
                  @foreach ($images as $p)
                  <div class='thumbHolder' 
                             data-title="Optional title">  
                             <a class="pp_content" href="{{$p->viewpath}}" data-rel="prettyPhoto[gallery1]" title="Optional description in Prettyphoto.">
                             <img class="thumb_hidden" src="{{$p->thumbpath}}" width="240" height="155" alt="Vimeo Video" /></a>  
                  </div>
                  @endforeach  
                     </div> 
                </div>
            </div>
</div>  

   
</div>

@stop