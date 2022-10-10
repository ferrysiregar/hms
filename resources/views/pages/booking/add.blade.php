@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Booking";
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
                        Add New Booking
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
                        <form id="booking-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('booking.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="customers_id">Customers Id <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-customers_id-holder" class=" ">
                                                <select required=""  id="ctrl-customers_id" name="customers_id"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->customers_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('customers_id', $value);
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
                                            <label class="control-label" for="agent_id">Agent Id <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-agent_id-holder" class=" ">
                                                <select required=""  id="ctrl-agent_id" name="agent_id"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->agent_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('agent_id', $value);
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
                                            <label class="control-label" for="checkin_date">Checkin Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-checkin_date-holder" class="input-group ">
                                                <input id="ctrl-checkin_date" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkin_date') ?>" type="datetime" name="checkin_date" placeholder="Enter Checkin Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
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
                                            <label class="control-label" for="checkin_time">Checkin Time <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-checkin_time-holder" class="input-group ">
                                                <input id="ctrl-checkin_time" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkin_time') ?>" type="time" name="checkin_time" placeholder="Enter Checkin Time" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">access_time</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="checkout_date">Checkout Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-checkout_date-holder" class="input-group ">
                                                <input id="ctrl-checkout_date" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkout_date') ?>" type="datetime" name="checkout_date" placeholder="Enter Checkout Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
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
                                            <label class="control-label" for="checkout_time">Checkout Time <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-checkout_time-holder" class="input-group ">
                                                <input id="ctrl-checkout_time" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkout_time') ?>" type="time" name="checkout_time" placeholder="Enter Checkout Time" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">access_time</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="payment_status_id">Payment Status Id <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-payment_status_id-holder" class=" ">
                                                <?php 
                                                    $options = $comp_model->payment_status_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $checked = Html::get_field_checked('payment_status_id', $value, "");
                                                ?>
                                                <label class="form-check">
                                                <input class="form-check-input" <?php echo $checked; ?> value="<?php echo $value; ?>" type="radio"  name="payment_status_id"   required="" />
                                                <span class="form-check-label"><?php echo $label; ?></span>
                                                </label>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <div class="bg-light p-2 subform">
                                <h4 class="record-title">Add New Details Booking</h4>
                                <hr />
                                @csrf
                                <div>
                                    <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                        <thead>
                                            <tr>
                                                <th class="bg-light"><label for="room_id">Room Id</label></th>
                                                <th class="bg-light"><label for="price">Price</label></th>
                                                <th class="bg-light"><label for="qty">Qty</label></th>
                                                <th class="bg-light"><label for="total">Total</label></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                for( $row = 1; $row <= 1; $row++ ){
                                            ?>
                                            <tr class="input-row">
                                                <td>
                                                    <div id="ctrl-room_id-row<?php echo $row; ?>-holder" class=" ">
                                                    <select required=""  id="ctrl-room_id-row<?php echo $row; ?>" data-load-select-options="price" name="details_booking[<?php echo $row ?>][room_id]"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php 
                                                        $options = $comp_model->room_id_option_list() ?? [];
                                                        foreach($options as $option){
                                                        $value = $option->value;
                                                        $label = $option->label ?? $value;
                                                        $selected = Html::get_field_selected('room_id', $value);
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                    <?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="ctrl-price-row<?php echo $row; ?>-holder" class=" ">
                                                <select required=""  id="ctrl-price-row<?php echo $row; ?>" data-load-path="<?php print_link('componentsdata/price_option_list') ?>" name="details_booking[<?php echo $row ?>][price]"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="ctrl-qty-row<?php echo $row; ?>-holder" class=" ">
                                            <input id="ctrl-qty-row<?php echo $row; ?>"  value="<?php echo get_value('qty') ?>" type="number" placeholder="Enter Qty" step="0.1"  required="" name="details_booking[<?php echo $row ?>][qty]"  class="form-control " />
                                        </div>
                                    </td>
                                    <td>
                                        <div id="ctrl-total-row<?php echo $row; ?>-holder" class=" ">
                                        <input id="ctrl-total-row<?php echo $row; ?>"  value="<?php echo get_value('total') ?>" type="number" placeholder="Enter Total" step="0.1"  required="" name="details_booking[<?php echo $row ?>][total]"  class="form-control " />
                                    </div>
                                </td>
                                <th class="text-center">
                                <button type="button" class="close btn-remove-table-row">&times;</button>
                                </th>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="100" class="text-right">
                            <?php $template_id = "table-row-" . random_str(); ?>
                            <button type="button" data-template="#<?php echo $template_id ?>" class="btn btn-sm btn-light btn-add-table-row"><i class="material-icons">add</i></button>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                    <!--[table row template]-->
                    <template id="<?php echo $template_id ?>">
                    <tr class="input-row">
                        <?php $row = "CURRENTROW"; ?>
                        <td>
                            <div id="ctrl-room_id-row<?php echo $row; ?>-holder" class=" ">
                            <select required=""  id="ctrl-room_id-row<?php echo $row; ?>" data-load-select-options="price" name="details_booking[<?php echo $row ?>][room_id]"  placeholder="Select a value ..."    class="custom-select" >
                            <option value="">Select a value ...</option>
                            <?php 
                                $options = $comp_model->room_id_option_list() ?? [];
                                foreach($options as $option){
                                $value = $option->value;
                                $label = $option->label ?? $value;
                                $selected = Html::get_field_selected('room_id', $value);
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                            <?php echo $label; ?>
                            </option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div id="ctrl-price-row<?php echo $row; ?>-holder" class=" ">
                        <select required=""  id="ctrl-price-row<?php echo $row; ?>" data-load-path="<?php print_link('componentsdata/price_option_list') ?>" name="details_booking[<?php echo $row ?>][price]"  placeholder="Select a value ..."    class="custom-select" >
                        <option value="">Select a value ...</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div id="ctrl-qty-row<?php echo $row; ?>-holder" class=" ">
                    <input id="ctrl-qty-row<?php echo $row; ?>"  value="<?php echo get_value('qty') ?>" type="number" placeholder="Enter Qty" step="0.1"  required="" name="details_booking[<?php echo $row ?>][qty]"  class="form-control " />
                </div>
            </td>
            <td>
                <div id="ctrl-total-row<?php echo $row; ?>-holder" class=" ">
                <input id="ctrl-total-row<?php echo $row; ?>"  value="<?php echo get_value('total') ?>" type="number" placeholder="Enter Total" step="0.1"  required="" name="details_booking[<?php echo $row ?>][total]"  class="form-control " />
            </div>
        </td>
        <th class="text-center">
        <button type="button" class="close btn-remove-table-row">&times;</button>
        </th>
    </tr>
</template>
<!--[/table row template]-->
</div>
<div class="form-ajax-status"></div>
</div>
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
