@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Cashbon Employee";
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
                        Add New Cashbon Employee
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
                        <form id="cashbon_employee-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('cashbon_employee.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date">Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-date-holder" class="input-group ">
                                                <input id="ctrl-date" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('date') ?>" type="datetime" name="date" placeholder="Enter Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="employee_name">Employee Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-employee_name-holder" class=" ">
                                                <select required=""  id="ctrl-employee_name" data-load-select-options="salary_employee" name="employee_name"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->employee_name_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('employee_name', $value);
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
                                            <label class="control-label" for="salary_employee">Salary Employee <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-salary_employee-holder" class=" ">
                                                <select required=""  id="ctrl-salary_employee" data-load-path="<?php print_link('componentsdata/salary_employee_option_list') ?>" name="salary_employee"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cashbon_value">Cashbon Value <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cashbon_value-holder" class=" ">
                                                <input id="ctrl-cashbon_value"  value="<?php echo get_value('cashbon_value') ?>" type="number" placeholder="Enter Cashbon Value" step="0.1"  required="" name="cashbon_value"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="calc_month_payment">Calc Month Payment <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-calc_month_payment-holder" class=" ">
                                                <input id="ctrl-calc_month_payment"  value="<?php echo get_value('calc_month_payment') ?>" type="number" placeholder="Enter Calc Month Payment" step="0.1"  required="" name="calc_month_payment"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="payment_per_month">Payment Per Month <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-payment_per_month-holder" class=" ">
                                                <input id="ctrl-payment_per_month"  value="<?php echo get_value('payment_per_month') ?>" type="number" placeholder="Enter Payment Per Month" step="0.1"  required="" name="payment_per_month"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cashbon_description">Cashbon Description <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cashbon_description-holder" class=" ">
                                                <textarea placeholder="Enter Cashbon Description" id="ctrl-cashbon_description"  required="" rows="5" name="cashbon_description" class=" form-control"><?php echo get_value('cashbon_description') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
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
