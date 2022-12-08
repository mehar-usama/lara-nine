<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Auth;
// use Storage;
use Image;
use File;
// use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
  public $viewFolder = 'company';

//   public \SplFileObject::__construct(
//     string $file_path,
//     string $mode = "r",
//     bool $useIncludePath = false,
//     ?resource $context = null
// );



  function uploadImage($request,$fileInput,$destinationPath)
  {
    $image = $request->file($fileInput) ;
    $fileName = $this->generateName() . '.' . $image->getClientOriginalExtension();
    $img = Image::make($image->getRealPath());
    $img->stream();
    Storage::disk('public')->put('/'.$fileName, $img, 'public');
    return $fileName;
  }

  public function generateName($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  public function index()
  {
    $model = new Company;

    if(request()->isMethod('post')){
      $validatedData = request()->validate([
        'uploaded_file' => 'required|mimes:csv',
      ]);

      $file = request('uploaded_file');

      $path = \Storage::disk('public')->put('/', $file, 'public');
      $file_path = asset('uploads/c2tFmdUWbRk53Slxnaj3hLEphmx3RNFS5VpsTdVh.csv');


      $this->UploadCsv($file_path);
    }

    return view($this->viewFolder.'.index',compact('model'));
  }





  public function UploadCsv($file_path, $s = 0)
  {


    $srcFile = new \SplFileObject($file_path);
    $destFile = new \SplFileObject($file_path, 'r');
    foreach ($srcFile as $line) {
      echo "<pre>"; print_r($line); echo "</pre>"; die(); 
    }

    die("die");



    $csvFile = new \SplFileObject($file_path, 'r');
    echo $file_path."<br>";

    $csvFile->seek($s);
    $n = 0;
    while (!$csvFile->eof()) {
      $line = $csvFile->fgetcsv();
      $company        = (isset($line[0]) ? trim($line[0]) : '');
      $country        = (isset($line[1]) ? trim($line[1]) : '');
      $address        = (isset($line[2]) ? trim($line[2]) : '');
      $firstname      = (isset($line[3]) ? trim($line[3]) : '');
      $lastname       = (isset($line[4]) ? trim($line[4]) : '');
      $mobile_number  = (isset($line[5]) ? trim($line[5]) : '');
      $phone_number   = (isset($line[6]) ? trim($line[6]) : '');
      $job_title      = (isset($line[7]) ? trim($line[7]) : '');
      $email          = (isset($line[8]) ? trim($line[8]) : '');
      $statusWord     = (isset($line[9]) ? trim($line[9]) : '');

      if ($s >= 1) {
        if ($line[0]<>null) {
          echo "<pre>"; print_r($line); echo "</pre>"; die();
        }
      }
    }

  }

}