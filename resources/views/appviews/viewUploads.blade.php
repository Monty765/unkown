@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                  @foreach ($images as $p)
                        <div class="col-md-3">
                        	<img src="{{$p->thumbpath}}"/>
                        </div>
                     @endforeach   
                </div>

            </div>
        </div>
</div>
<div class="row">

</div>
</div>	
@stop