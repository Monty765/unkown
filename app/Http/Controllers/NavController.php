<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Guzzle\Tests\Plugin\Redirect;
use Image;
use App\Img;
use Storage;
use File;
use Auth;
use Illuminate\Support\Facades\Input;

class NavController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function home(){
   
    	return view('home');
    }

    public function upload(Request $request){
        //print_r($request->all());
        $destination_path = 'uploads/';
        $thumb_path = 'thumbs/';
        $view_path = 'views/';
        $files = $request->file('files');
        $authpre=$request->input('autpre');

          foreach ($files as $file) :
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $orgpic = $destination_path.'/'.$filename;
                $thumb = Image::make($orgpic);
                // $twidth= Image::make($orgpic)->width();
                // $theight = Image::make($orgpic)->height();
                // if($twidth < $theight){
                // $thumb->flip('v');
                 $thumb->resize(210, null, function ($constraint) {
                        $constraint->aspectRatio();   
                    });

                // }
                // else {
                // $thumb->resize(210, null, function ($constraint) {
                //         $constraint->aspectRatio();
                // });
                // }
                $thumb->save($thumb_path.$file->getClientOriginalName());
                $view = Image::make($orgpic);
                $view->resize(700, 700);
                $view->save($view_path.$file->getClientOriginalName());
            //DB::table('images')->insert(
            //array('user_id' => 2, 'filepath' => $file->getClientOriginalName());
            //$paths=storage_path()."\imageFolder\\" . $file->getClientOriginalName();
            $img = new Img;
            $img->user_id =Auth::id();
            $img->filepath =  $orgpic;
            $img->remember_token=$request->get('_token');
            $img->authpre=$authpre;
            $img->thumbpath=$thumb_path.$file->getClientOriginalName();
            $img->viewpath=$view_path.$file->getClientOriginalName();
            $img->save();
          endforeach;
          $images=DB::table('images')->orderBy('id', 'DESC')->get();
        return view('appviews.viewUploads',compact('images'));
    }

}
