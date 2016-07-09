@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{ Auth::user()->name }}  logged in!
                    <div class="row">
                    <div class="col-md-3">
                    <div class="thumbnail">
                        <img class="thumbnail" src="img/new.jpg"/>
                    </div>
                    </div>
                    <div class="col-md-7 col-md-offset-2">
                    <div class="col-xs-12" style="height:60px;"></div>

                    <form action="{{URL::to('upload')}}" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="file" name="files[]" multiple><br/>
                    <input type="radio" name="autpre" value="0" checked> Private 
                    <input type="radio" name="autpre" value="1"> Public<br/><br/>
                    <input type="submit"/> 
                    </form>
                    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var form=document.getElementById('upload');
    var request= new XMLHttpRequest();
    form.addEventListener('submit',function(e){
        e.preventDefault();
        var formData=new FormData(form);
        request.open('POST','upload');
        //request.addEventListener("load",transferComplete);
        request.send(formData) ;
        document.location = "/uploads";
     });

    //function transferComplete(data){

   // }
</script>

@endsection
