@extends('layouts.app')

@section('content')
<script type="text/javascript" src="js/js/jquery-1.10.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() { 

    var progressbox     = $('#progressbox');
    var progressbar     = $('#progressbar');
    var statustxt       = $('#statustxt');
    var completed       = '0%';
    
    var options = { 
            target:   '#output',   // target element(s) to be updated with server response 
            beforeSubmit:  beforeSubmit,  // pre-submit callback 
            uploadProgress: OnProgress,
            success:       afterSuccess,  // post-submit callback 
            resetForm: true        // reset the form after successful submit 
        }; 
        
     $('#MyUploadForm').submit(function() { 
            $(this).ajaxSubmit(options); 
            return false;          
            // return false to prevent standard browser submit and page navigation 
             
        });
    
//when upload progresses    
function OnProgress(event, position, total, percentComplete)
{
    //Progress bar
    progressbar.width(percentComplete + '%') //update progressbar percent complete
    statustxt.html(percentComplete + '%'); //update status text
    if(percentComplete>50)
        {
            statustxt.css('color','#fff'); //change status text to white after 50%
        }
        
}

//after succesful upload
function afterSuccess()
{
    $('#submit-btn').show(); //hide submit button
    $('#loading-img').hide(); //hide submit button
    alert("dfdsfsdf");

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
    {

        if( !$('#imageInput').val()) //check empty input filed
        {
            $("#output").html("Are you kidding me?");
            return false
        }
        
        var fsize = $('#imageInput')[0].files[0].size; //get file size
        var ftype = $('#imageInput')[0].files[0].type; // get file type
        
        //allow only valid image file types 
        switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
                return false
        }
        
        //Allowed file size is less than 1 MB (1048576)
        //if(fsize>1048576) 
        // {
        //  $("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
        //  return false
        // }
        
        //Progress bar
        progressbox.show(); //show progressbar
        progressbar.width(completed); //initial value 0% of progressbar
        statustxt.html(completed); //set status text
        statustxt.css('color','#000'); //initial color of status text

                
        $('#submit-btn').hide(); //hide submit button
        $('#loading-img').show(); //hide submit button
        $("#output").html("");  
    }
    else
    {
        //Output error to older unsupported browsers that doesn't support HTML5 File API
        $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
        return false;
    }
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}); 

</script>
<style type="text/css">
    #output{
    padding: 5px;
    font-size: 12px;
}
#output img {
    border: 1px solid #DDD;
    padding: 5px;
}

/* progress bar style */
#progressbox {
    border: 1px solid #92C8DA;
    padding: 1px; 
    position:relative;
    width:400px;
    border-radius: 3px;
    margin: 10px;
    display:none;
    text-align:left;
}
#progressbar {
    height:20px;
    border-radius: 3px;
    background-color: #77E0FA;
    width:1%;
}
#statustxt {
    top:3px;
    left:50%;
    position:absolute;
    display:inline-block;
    color: #000000;
}
</style>
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

                    <form action="{{URL::to('upload')}}"  method="post" enctype="multipart/form-data" id="MyUploadForm">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="file" name="image_file[]" id="imageInput"  multiple><br/>
                    <input type="radio" name="autpre" value="0" checked> Private 
                    <input type="radio" name="autpre" value="1"> Public<br/><br/> 
                    <input type="submit"  id="submit-btn" value="Upload" />
                    
                    </form>
                    <div id="progressbox" style="display:none;"><div id="progressbar"></div><div id="statustxt">0%</div></div>
<div id="output"></div>
                    
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
        alert("sent");
        document.location = "/upload";
    
        
     });


    //function transferComplete(data){

   // }
</script>


@endsection
