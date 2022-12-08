<?php

$menuLinks=getAdminMenuList();
// echo "<pre>"; print_r($menuLinks); echo "</pre>"; die;

?>

@push('jscripts')
<script>
  $(".cbl1").on("click",function(){
    thisid=$(this).attr("value");
    $(".cbl1_"+thisid).prop("checked",$(this).prop("checked"));
    $.uniform.update(".cbl1_"+thisid);
  });
  $(".cbl2").on("click",function(){
    thisid=$(this).attr("value");
    $(".cbl2_"+thisid).prop("checked",$(this).prop("checked"));
    $.uniform.update(".cbl2_"+thisid);
  });
  $(".cbl3").on("click",function(){
    thisid=$(this).attr("value");
    $(".cbl3_"+thisid).prop("checked",$(this).prop("checked"));
    $.uniform.update(".cbl3_"+thisid);
  });
</script>
@endpush


<section class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Admin Menu</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin menu</a></li>
          <li class="breadcrumb-item active">create</li>
        </ol>
      </div>
    </div>
  </div>
</section>



<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info card-outline">
          {!! Form::model($model, ['files' => true, 'id' => 'admin-menu']) !!}
          <div class="card-header">
            <h3 class="card-title">New</h3>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  {{ Form::label('title',__('Title')) }}<span class="text-danger"><b>*</b></span>
                  {{ Form::text('title',  $model->title, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  {{ Form::label('status',__('Status')) }}<span class="text-danger"><b>*</b></span>
                  {{ Form::select('status', [''=>__('select')] + getStatusArr(), $model->status, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
            </div>

<?php
if ($menuLinks) {?>
<div class="row">
  <?php
    foreach ($menuLinks as $key => $menuLink) {
      $boxSelected=false;
      if ($model<>null AND $model->id<>null) {
        $boxSelected=isChecked($model->id,$menuLink['id']);
      }
      $secondLevelOptions=getSubOptions($menuLink['id']);
        // echo "<pre>"; print_r($secondLevelOptions); echo "</pre>"; die();

  ?>

  <div class="col-md-6">
    <div class="card card-info  collapsed-card">
      <div class="card-header">
        <h3 class="card-title">

          <div class="form-check">
            <input type="checkbox" class="form-check-input cbl1" name="menu_opts[]" value="<?= $menuLink['id'] ?>" <?= ($boxSelected==true ? 'checked' : '') ?>>
            <label class="form-check-label"> <b><?= $menuLink['title'] ?></b> </label>
          </div>


        </h3>
        <div class="card-tools d-flex p-card-tool">
          <?php
            if ($menuLink['ask_list_type']==1 && $menuLink['action']=='index') {
              $model->list_type[$menuLink['id']] = getMenuPermissinListingType($model->id,$menuLink['id']);
              ?>
              <snap>
                {{ Form::select('list_type['.$menuLink['id'].']', [''=>__('Select')] + getPermissionListingType(), null, ['class'=>'form-control form-control-sm']) }}
              </snap>
          <?php
        }else{?>
            <style media="screen">
              .p-card-tool{margin-top: 10px;}
            </style>
        <?php
          }
          ?>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
        </div>
      </div>
      <div class="card-body" style="display: none;">
        <?php
          if ($secondLevelOptions != null) {
            foreach ($secondLevelOptions as $secondLevelOption) {
              $boxSelected=false;
                if($model!=null){
                  $boxSelected=isChecked($model->id,$secondLevelOption['id']);
                }
                $thirdLevelOptions=getSubOptions($secondLevelOption['id']);
                  // echo "<pre>"; print_r($thirdLevelOptions); echo "</pre>"; //die;

                if ($thirdLevelOptions != null) {
                    $model->list_type[$secondLevelOption['id']] = getMenuPermissinListingType($model->id,$secondLevelOption['id']);
                ?>

                <div class="card card-primary collapsed-card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input cbl2 cbl1_{{ $menuLink['id'] }}" name="menu_opts[]" value="<?= $secondLevelOption['id'] ?>" <?= ($boxSelected==true ? 'checked' : '') ?>>
                        <label class="form-check-label"> <b><?= $secondLevelOption['title'] ?></b> </label>
                      </div>
                    </h3>
                    <div class="card-tools d-flex">
                    <?php
                        if ($secondLevelOption['ask_list_type']==1 && $secondLevelOption['action']=='index') {
                          $model->list_type[$secondLevelOption['id']] = getMenuPermissinListingType($model->id,$secondLevelOption['id']);
                          ?>
                          <snap>
                            {{ Form::select('list_type['.$menuLink['id'].']', [''=>__('Select')] + getPermissionListingType(), null, ['class'=>'form-control form-control-sm']) }}
                          </snap>
                      <?php
                    }else{?>

                    <?php
                      }
                      ?>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <?php
                      foreach ($thirdLevelOptions as $thirdLevelOption) {
                          $boxSelected=false;
                          if($model!=null){
                            $boxSelected=isChecked($model->id,$thirdLevelOption['id']);
                          }
                          $fourthLevelOptions=getSubOptions($thirdLevelOption['id']);

                          if ($fourthLevelOptions<>null) {?>
                            <div class="card card-warning collapsed-card">
                              <div class="card-header">
                                <h3 class="card-title">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input cbl3 cbl1_{{ $menuLink['id'] }} cbl2_{{ $secondLevelOption['id'] }}" name="menu_opts[]" value="<?= $thirdLevelOption['id'] ?>" <?= ($boxSelected==true ? 'checked' : '') ?>>
                                    <label class="form-check-label"> <b><?= $thirdLevelOption['title'] ?></b> </label>
                                  </div>
                                </h3>
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                  </button>
                                </div>
                              </div>
                              <div class="card-body">
                                    <?php
                                    foreach ($fourthLevelOptions as $fourthLevelOption) {
                                        $boxSelected=false;
                                        if($model!=null){
                                          $boxSelected=isChecked($model->id,$fourthLevelOption['id']);
                                        }
                                  ?>
                                        <label>
                                            <input type="checkbox"<?= ($boxSelected == true ? ' checked="checked"' : '') ?>
                                                   class="cbl1_<?= $menuLink['id'] ?> cbl2_<?= $secondLevelOption['id'] ?> cbl3_<?= $thirdLevelOption['id'] ?>"
                                                   data-parent="" name="AdminGroup[actions][]"
                                                   value="<?= $fourthLevelOption['id'] ?>"/>
                                            <?= $fourthLevelOption['title'] ?>
                                        </label>
                                        <?php
                                    }
                                    ?>
                              </div>
                            </div>

                        <?php
                          } else {
                              ?>
                              <label>
                                  <input type="checkbox"<?= ($boxSelected == true ? ' checked="checked"' : '') ?>
                                         class="mx-1 cbl1_<?= $menuLink['id'] ?> cbl2_<?= $secondLevelOption['id'] ?>"
                                         data-parent="" name="AdminGroup[actions][]"
                                         value="<?= $thirdLevelOption['id'] ?>"/>
                                  <?= $thirdLevelOption['title'] ?>
                              </label>
                              <?php
                          }
                      }
                    ?>
                  </div>
                </div>

                <?php
              }else {
                  ?>
                  <label><input
                              type="checkbox"<?= ($boxSelected == true ? ' checked="checked"' : '') ?>
                              class="cbl2 cbl1_<?= $menuLink['id'] ?> mx-1" name="AdminGroup[actions][]"
                              value="<?= $secondLevelOption['id'] ?>"/> <?= $secondLevelOption['title'] ?>
                  </label>
                  <?php
              }
            }
          }else{

          }
        ?>
      </div>
    </div>
  </div>

<?php
    }
?>
</div>
<?php
}
?>























          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{url('/admin-group')}}" class="btn btn-danger">Close</a>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>

@push('css')
<style>
  label.error {
      color: red;
      font-size: 12px;
      display: block;
      margin-top: 5px;
  }

  input.error, textarea.error {
      border: 1px dashed red;
      font-weight: 200;
      color: red;
  }
</style>
@endpush

@push('jscripts')
<script>
  $(document).ready(function() {
    $("#admin-menu").validate({
    rules: {
      title: {
        required: true,
      },
    }
    });
  });
</script>
@endpush
