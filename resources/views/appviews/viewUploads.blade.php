@extends('layouts.app')

@section('content')

<div id="componentWrapper">
                
              <div class="thumbContainer">
                      
                    <div class="thumbInnerContainer">
                    <br/>
                  @foreach ($images as $p)
                  <div class='thumbHolder' 
                             data-title="Optional title">  
                             <a href="{{ url('/albums?id='.$p->dumptime) }}">
                             <img class="thumb_hidden" src="{{$p->thumbpath}}" width="240" height="155" alt="Vimeo Video" /></a>  
                  </div>
                  @endforeach  
                     </div> 
                </div>
            </div>
      

@stop
