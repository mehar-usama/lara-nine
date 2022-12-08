<?php
use App\Models\AdminMenu;
use App\Models\AdminGroup;
use App\Models\AdminGroupPermissions;
use App\Models\AdminGroupPermissionType;

if (!function_exists('getParentsArr')) {
  function getParentsArr(){
     $results = AdminMenu::select(['id','title'])->pluck('title', 'id')->toArray();
     return $results;
  }
}

if (!function_exists('getShowMenuArr')) {
  function getShowMenuArr(){
     return [
       '1' => 'Yes',
       '0'  => 'No',
     ];
  }
}

if (!function_exists('getListTypeArr')) {
  function getListTypeArr(){
     return [
       '0'  => 'No',
       '1' => 'Yes',
     ];
  }
}



if (!function_exists('getLabelArr')) {
  function getLabelArr(){
     return [
       '0'  => '<span class="badge grid-badge badge-danger">No</span>',
       '1' => '<span class="badge grid-badge badge-success">Yes</span>',
     ];
  }
}

if (!function_exists('getUsertypeArr')) {
  function getUsertypeArr(){
     return [
       '0'  => 'Contact',
       '10'  => 'Staff',
       '20' => 'Super Admin',
     ];
  }
}


if (!function_exists('getStatusArr')) {
  function getStatusArr(){
     return [
       '0'  => 'In-Active',
       '1'  => 'Active',
     ];
  }
}


if (!function_exists('getGroupArr')) {
  function getGroupArr(){
    $results = AdminGroup::select(['id','title'])->pluck('title', 'id')->toArray();
    return $results;
  }
}

if (!function_exists('getParentTitle')) {
  function getParentTitle($id=null){
    if ($id<>null AND $id!=0) {
      $result = AdminMenu::select(['title'])->where(['id'=>$id])->first();
      if($result<>null){
        return $result->title;
      }
    }else{
      $html = '<span class="badge grid-badge badge-primary">Parent</span>';
      return $html;
    }
  }
}


if (!function_exists('getAdminMenuList')) {
  function getAdminMenuList(){
    return AdminMenu::select('id','parent','title','controller','action','ask_list_type')->where('parent',0)->orderBy('sort_by','asc')->get()->toArray();
  }
}

if (!function_exists('isChecked')) {
  function isChecked($group_id,$menu_id)
  {
    if($menu_id!=null){
      $result=AdminGroupPermissions::where([['group_id','=',$group_id],['menu_id','=',$menu_id]])->first();
      if($result!=null){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }
}

if (!function_exists('getPermissionListingType')) {
	function getPermissionListingType()
	{
		return [
			'1'=>__('All Listing'),
			'2'=>__('Own Listing'),
		];
	}
}

if (!function_exists('getMenuPermissinListingType')) {
  function getMenuPermissinListingType($group_id,$menu_id)
  {
    $result = AdminGroupPermissionType::where(['group_id'=>$group_id,'menu_id'=>$menu_id])->first();
		if($result!=null){
			return $result['list_type'];
		}
  }
}

if (!function_exists('getSubOptions')) {
  function getSubOptions($parent_id)
  {
    return AdminMenu::select('id','title','ask_list_type','action')->where('parent',$parent_id)->orderBy('sort_by','asc')->get()->toArray();
  }
}
