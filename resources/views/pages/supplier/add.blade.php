@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Supplier";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3" >
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto " >
                    <div class=" h5 font-weight-bold text-primary" >
                        Add New Supplier
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
                        <!--[form-start]-->
                        <form id="supplier-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('supplier.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="code_supplier">Code Supplier <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-code_supplier-holder" class=" ">
                                                <input id="ctrl-code_supplier"  value="<?php echo get_value('code_supplier') ?>" type="text" placeholder="Enter Code Supplier"  required="" name="code_supplier"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="name_supplier">Name Supplier <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-name_supplier-holder" class=" ">
                                                <input id="ctrl-name_supplier"  value="<?php echo get_value('name_supplier') ?>" type="text" placeholder="Enter Name Supplier"  required="" name="name_supplier"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="address">Address </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-address-holder" class=" ">
                                                <textarea placeholder="Enter Address" id="ctrl-address"  rows="5" name="address" class=" form-control"><?php echo get_value('address') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="email_supplier">Email Supplier </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-email_supplier-holder" class=" ">
                                                <input id="ctrl-email_supplier"  value="<?php echo get_value('email_supplier') ?>" type="email" placeholder="Enter Email Supplier"  name="email_supplier"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="phone_supplier">Phone Supplier </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-phone_supplier-holder" class=" ">
                                                <input id="ctrl-phone_supplier"  value="<?php echo get_value('phone_supplier') ?>" type="text" placeholder="Enter Phone Supplier"  name="phone_supplier"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                Tambah
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
