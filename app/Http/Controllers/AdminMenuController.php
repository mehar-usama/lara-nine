<?php

namespace App\Http\Controllers;

use App\Models\AdminMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMenuController extends Controller
{
  public $viewFolder = 'admin-menu';
  
  public function index()
  {
    
    
    
    // $users = DB::table('users')
    // ->rightJoin('admin_group', 'users.permission_group_id', '=', 'admin_group.id')
    // ->select('users.*', 'admin_group.title')
    // ->first();
    
    // $users = DB::table('users')
    // ->join('admin_group', function ($join) {
    //   // dd($join);
    //   $join->on('users.permission_group_id', '=', 'admin_group.id')
    //   ->where('users.id', '=', 20);
    //   ;
    // })
    // ->get();
    
    
    // dd($users);
    
    // DB::table('admin_group')->select(['id','title'])->where('id', '>=', 1)->dd();

    // $models = DB::table('admin_group')
    //           ->sharedLock()
    //           ->get();

    //   echo "<pre>"; print_r($models); echo "</pre><br><br><br>"; //die;


    //   $models2 = DB::table('admin_group')
    //             ->lockForUpdate()
    //             ->get();

    //   echo "<pre>"; print_r($models2); echo "</pre>"; die;
    
    
    
    
    
    $models = AdminMenu::all();
    return view($this->viewFolder.".index",compact('models'));
  }
  
  public function create(Request $request)
  {
    $model = new AdminMenu;
    if($request->isMethod('post')){
      $validatedData = $request->validate([
        'parent' => 'nullable|integer',
        'title' => 'required|string',
        'show_in_menu' => 'required|integer',
        'ask_list_type' => 'nullable|integer',
      ]);
      $model               = new AdminMenu;
      $model->parent       = ($request->parent<>null) ? $request->parent : 0;
      $model->title        = $request->title;
      $model->route        = $request->route;
      $model->controller   = $request->controller;
      $model->action       = $request->action;
      $model->icon         = $request->icon;
      $model->show_in_menu = $request->show_in_menu;
      $model->ask_list_type= $request->ask_list_type;
      $model->sort_by      = $request->sort_by;
      if ($model->save()) {
        return redirect('/admin-menu');
      }
    }
    return view($this->viewFolder.'.create',compact('model'));
  }
  
  public function update(Request $request, AdminMenu $adminMenu, $id)
  {
    $model=AdminMenu::where('id',$id)->first();
    if($request->isMethod('post')){
      $validatedData = $request->validate([
        'parent' => 'nullable|integer',
        'title' => 'required|string',
        'show_in_menu' => 'required|integer',
        'ask_list_type' => 'nullable|integer',
      ]);
      $model=AdminMenu::where('id',$id)->first();
      $model->parent       = ($request->parent<>null) ? $request->parent : 0;
      $model->title        = $request->title;
      $model->route        = $request->route;
      $model->controller   = $request->controller;
      $model->action       = $request->action;
      $model->icon         = $request->icon;
      $model->show_in_menu = $request->show_in_menu;
      $model->ask_list_type= $request->ask_list_type;
      $model->sort_by      = $request->sort_by;
      if ($model->save()) {
        return redirect('/admin-menu');
      }
    }
    return view($this->viewFolder.'.create',compact('model'));
  }
  
  public function view(AdminMenu $adminMenu , $id)
  {
    dd($id);
  }
  
  public function delete(AdminMenu $adminMenu, $id)
  {
    $model=AdminMenu::where('id',$id)->first();
    if ($model->delete()) {
      return redirect('/admin-menu');
    }
  }
}
