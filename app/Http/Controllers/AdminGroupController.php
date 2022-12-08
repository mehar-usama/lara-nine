<?php

namespace App\Http\Controllers;

use App\Models\AdminGroup;
use Illuminate\Http\Request;
use Auth;

class AdminGroupController extends Controller
{
    public $viewFolder = 'admin-group';

    public function index()
    {
      $models = AdminGroup::all();
      return view($this->viewFolder.".index",compact('models'));
    }

    public function create(Request $request)
    {
      // dd($request->all());

      $model = new AdminGroup;
      if($request->isMethod('post')){
          $validatedData = $request->validate([
            'title' => 'required|string',
          ]);
          $model               = new AdminGroup;
          $model->title        = $request->title;
          $model->status       = $request->status;
          $model->created_by   = Auth::user()->id;
          if ($model->save()) {
            return redirect('/admin-group');
          }
      }
      return view($this->viewFolder.'.create-update',compact('model'));
    }

    public function view(AdminGroup $adminGroup)
    {
        //
    }

    public function update(Request $request, AdminGroup $adminGroup, $id)
    {
      // dd($request->all());

      $model = AdminGroup::where('id',$id)->first();
      if($request->isMethod('post')){
          $validatedData = $request->validate([
            'title' => 'required|string',
          ]);
          $model               = AdminGroup::where('id',$id)->first();
          $model->title        = $request->title;
          $model->status       = $request->status;
          if ($model->save()) {
            return redirect('/admin-group');
          }
      }
      return view($this->viewFolder.'.create-update',compact('model'));
    }

    public function delete(AdminGroup $adminGroup)
    {
        //
    }



    public function ExtractPdf()
    { 

      $model = new AdminGroup;
      if(request()->isMethod('post')){
          $validatedData = request()->validate([
              'uploaded_file' => 'required|mimes:pdf|max:10000',
          ]);

          $file = request('uploaded_file');

          $path = \Storage::disk('public')->put('/pdf', $file, 'public');            
          $file_path = asset('uploads/'.$path);

          $parser = new \Smalot\PdfParser\Parser(); 
          $file = $file_path; 
          $pdf = $parser->parseFile($file); 
          $textContent =  $pdf->getPages()[0]->getText();

          echo "<pre>"; print_r($textContent); echo "</pre>"; die;



































































            $needle = "Domain name";
            $lastPos = 0;
            $positions = array();

            while (($lastPos = strpos($textContent, $needle, $lastPos))!== false) {
                $positions[] = $lastPos;
                $lastPos = $lastPos + strlen($needle);
            }



            $needle2 = "Subscription";
            $lastPos2 = 0;
            $positions2 = array();

            while (($lastPos2 = strpos($textContent, $needle2, $lastPos2))!== false) {
                $positions2[] = $lastPos2;
                $lastPos2 = $lastPos2 + strlen($needle2);
            }

            foreach ($positions2 as $position) {
                $nextChar = substr($textContent, $position, 13);
                echo $nextChar. "<br>";
            }

            dd("end");






            dd($positions);

            foreach ($positions as $position) {
                $nextChar = substr($textContent, $position, 60);
                echo $nextChar. "<br>";
                // $line = explode(PHP_EOL, $nextChar);
                // echo"<pre>"; print_r($line); echo "</pre><br>";
                // if (strpos($nextChar, 'Yearly')!==false) {
                //     $AverageRent = preg_replace('/[^0-9-,-.]/', '', $nextChar);
                //     $listing_rent = str_replace(',', '', $AverageRent);
                // }
            }

            die;

           






        }
        return view($this->viewFolder.'._pdf_extract',compact('model'));
    }
}
