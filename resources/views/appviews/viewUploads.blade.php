@extends('layouts.app')

@section('content')
<div id="feature"></div>
<div class="container">

<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body" id="thumbnails">
                <div id="gallery">
                
                  @foreach ($images as $p)
                        <div class="col-md-3" style="padding-bottom:12px;">
                        <li><a href="#" rel="{{$p->viewpath}}" class="galImg" ><img src="{{$p->thumbpath}}"/></a></li>
                        	
                        </div>
                     @endforeach  
                     </div> 
                </div>

            </div>
        </div>
</div>
<div class="row">

</div>
</div>	
@stop