@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit Room";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3" >
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto " >
                    <div class=" h5 font-weight-bold text-primary" >
                        Edit Room
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid" >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class=" page-content" >
                        <div class="row">
                            <div class="col">
                                <!--[form-start]-->
                                <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("room/edit/$rec_id"); ?>" method="post">
                                <!--[form-content-start]-->
                                @csrf
                                <div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="room_name">Room Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-room_name-holder" class=" ">
                                                    <input id="ctrl-room_name"  value="<?php  echo $data['room_name']; ?>" type="text" placeholder="Enter Room Name"  required="" name="room_name"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="room_type_id">Room Type Id <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-room_type_id-holder" class=" ">
                                                    <select required=""  id="ctrl-room_type_id" name="room_type_id"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php
                                                        $options = $comp_model->room_type_id_option_list() ?? [];
                                                        foreach($options as $option){
                                                        $value = $option->value;
                                                        $label = $option->label ?? $value;
                                                        $selected = ( $value == $data['room_type_id'] ? 'selected' : null );
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                    <?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="room_facilities_id">Room Facilities Id <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-room_facilities_id-holder" class=" checkbox-group-required">
                                                    <?php 
                                                        $options = $comp_model->room_facilities_id_option_list() ?? [];
                                                        $arr_recs = explode(',', $data['room_facilities_id']);
                                                        foreach($options as $option){
                                                        $value = $option->value;
                                                        $label = $option->label ?? $value;
                                                        $checked = (in_array($value , $arr_recs) ? 'checked' : null);
                                                    ?>
                                                    <label class="form-check option-btn">
                                                    <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value; ?>" type="checkbox"  name="room_facilities_id[]"  />
                                                    <span class="form-check-label"><?php echo $label; ?></span>
                                                    </label>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="price_basic">Price Basic <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-price_basic-holder" class=" ">
                                                    <input id="ctrl-price_basic"  value="<?php  echo $data['price_basic']; ?>" type="number" placeholder="Enter Price Basic" step="0.1"  required="" name="price_basic"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="price_sales">Price Sales <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-price_sales-holder" class=" ">
                                                    <input id="ctrl-price_sales"  value="<?php  echo $data['price_sales']; ?>" type="number" placeholder="Enter Price Sales" step="0.1"  required="" name="price_sales"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="status_room_id">Status Room Id <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-status_room_id-holder" class=" checkbox-group-required">
                                                    <?php 
                                                        $options = $comp_model->status_room_id_option_list() ?? [];
                                                        $arr_recs = explode(',', $data['status_room_id']);
                                                        foreach($options as $option){
                                                        $value = $option->value;
                                                        $label = $option->label ?? $value;
                                                        $checked = (in_array($value , $arr_recs) ? 'checked' : null);
                                                    ?>
                                                    <label class="form-check option-btn">
                                                    <input class="form-check-input" <?php echo $checked ?>  value="<?php echo $value; ?>" type="checkbox"  name="status_room_id[]"  />
                                                    <span class="form-check-label"><?php echo $label; ?></span>
                                                    </label>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="photo_room_id">Photo Room Id <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-photo_room_id-holder" class=" ">
                                                    <select required=""  id="ctrl-photo_room_id" name="photo_room_id"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php
                                                        $options = $comp_model->photo_room_id_option_list() ?? [];
                                                        foreach($options as $option){
                                                        $value = $option->value;
                                                        $label = $option->label ?? $value;
                                                        $selected = ( $value == $data['photo_room_id'] ? 'selected' : null );
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                    <?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="adult">Adult </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-adult-holder" class=" ">
                                                    <input id="ctrl-adult"  value="<?php  echo $data['adult']; ?>" type="number" placeholder="Enter Adult" step="0.1"  name="adult"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="child">Child </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-child-holder" class=" ">
                                                    <input id="ctrl-child"  value="<?php  echo $data['child']; ?>" type="number" placeholder="Enter Child" step="0.1"  name="child"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-ajax-status"></div>
                                <!--[form-content-end]-->
                                <!--[form-button-start]-->
                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">
                                    Ubah
                                    <i class="material-icons">send</i>
                                    </button>
                                </div>
                                <!--[form-button-end]-->
                            </form>
                            <!--[form-end]-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('pagecss')
<style>

</style>
@endsection
@section('pagejs')
<script>
	/*
	* Page Custom Javascript | Jquery codes
	*/

	//$(document).ready(function(){
	//	
	//});
</script>

@endsection
