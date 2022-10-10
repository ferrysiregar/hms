@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Details Transaction";
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
                        Add New Details Transaction
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
                <div class="col-sm-12 comp-grid" >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class=" page-content" >
                        <!--[form-start]-->
                        <form id="details_transaction-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="{{ route('details_transaction.store') }}" method="post" >
                            @csrf
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="room_id">Room Id</label></th>
                                            <th class="bg-light"><label for="price">Price</label></th>
                                            <th class="bg-light"><label for="checkin_date">Checkin Date</label></th>
                                            <th class="bg-light"><label for="checkin_time">Checkin Time</label></th>
                                            <th class="bg-light"><label for="checkout_date">Checkout Date</label></th>
                                            <th class="bg-light"><label for="checkout_time">Checkout Time</label></th>
                                            <th class="bg-light"><label for="totals">Totals</label></th>
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
                                                <select required=""  id="ctrl-room_id-row<?php echo $row; ?>" data-load-select-options="price" name="row[<?php echo $row ?>][room_id]"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->details_transaction_room_id_option_list() ?? [];
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
                                            <select required=""  id="ctrl-price-row<?php echo $row; ?>" data-load-path="<?php print_link('componentsdata/price_option_list') ?>" name="row[<?php echo $row ?>][price]"  placeholder="Select a value ..."    class="custom-select" >
                                            <option value="">Select a value ...</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="ctrl-checkin_date-row<?php echo $row; ?>-holder" class="input-group ">
                                        <input id="ctrl-checkin_date-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkin_date') ?>" type="datetime" name="row[<?php echo $row ?>][checkin_date]" placeholder="Enter Checkin Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div id="ctrl-checkin_time-row<?php echo $row; ?>-holder" class="input-group ">
                                    <input id="ctrl-checkin_time-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkin_time') ?>" type="time" name="row[<?php echo $row ?>][checkin_time]" placeholder="Enter Checkin Time" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="material-icons">access_time</i></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div id="ctrl-checkout_date-row<?php echo $row; ?>-holder" class="input-group ">
                                <input id="ctrl-checkout_date-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkout_date') ?>" type="datetime" name="row[<?php echo $row ?>][checkout_date]" placeholder="Enter Checkout Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div id="ctrl-checkout_time-row<?php echo $row; ?>-holder" class="input-group ">
                            <input id="ctrl-checkout_time-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkout_time') ?>" type="time" name="row[<?php echo $row ?>][checkout_time]" placeholder="Enter Checkout Time" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="material-icons">access_time</i></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div id="ctrl-totals-row<?php echo $row; ?>-holder" class=" ">
                        <input id="ctrl-totals-row<?php echo $row; ?>"  value="<?php echo get_value('totals') ?>" type="number" placeholder="Enter Totals" step="0.1"  required="" name="row[<?php echo $row ?>][totals]"  class="form-control " />
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
            <select required=""  id="ctrl-room_id-row<?php echo $row; ?>" data-load-select-options="price" name="row[<?php echo $row ?>][room_id]"  placeholder="Select a value ..."    class="custom-select" >
            <option value="">Select a value ...</option>
            <?php 
                $options = $comp_model->details_transaction_room_id_option_list() ?? [];
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
        <select required=""  id="ctrl-price-row<?php echo $row; ?>" data-load-path="<?php print_link('componentsdata/price_option_list') ?>" name="row[<?php echo $row ?>][price]"  placeholder="Select a value ..."    class="custom-select" >
        <option value="">Select a value ...</option>
        </select>
    </div>
</td>
<td>
    <div id="ctrl-checkin_date-row<?php echo $row; ?>-holder" class="input-group ">
    <input id="ctrl-checkin_date-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkin_date') ?>" type="datetime" name="row[<?php echo $row ?>][checkin_date]" placeholder="Enter Checkin Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
    <div class="input-group-append">
        <span class="input-group-text"><i class="material-icons">date_range</i></span>
    </div>
</div>
</td>
<td>
    <div id="ctrl-checkin_time-row<?php echo $row; ?>-holder" class="input-group ">
    <input id="ctrl-checkin_time-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkin_time') ?>" type="time" name="row[<?php echo $row ?>][checkin_time]" placeholder="Enter Checkin Time" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
    <div class="input-group-append">
        <span class="input-group-text"><i class="material-icons">access_time</i></span>
    </div>
</div>
</td>
<td>
    <div id="ctrl-checkout_date-row<?php echo $row; ?>-holder" class="input-group ">
    <input id="ctrl-checkout_date-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkout_date') ?>" type="datetime" name="row[<?php echo $row ?>][checkout_date]" placeholder="Enter Checkout Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
    <div class="input-group-append">
        <span class="input-group-text"><i class="material-icons">date_range</i></span>
    </div>
</div>
</td>
<td>
    <div id="ctrl-checkout_time-row<?php echo $row; ?>-holder" class="input-group ">
    <input id="ctrl-checkout_time-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('checkout_time') ?>" type="time" name="row[<?php echo $row ?>][checkout_time]" placeholder="Enter Checkout Time" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
    <div class="input-group-append">
        <span class="input-group-text"><i class="material-icons">access_time</i></span>
    </div>
</div>
</td>
<td>
    <div id="ctrl-totals-row<?php echo $row; ?>-holder" class=" ">
    <input id="ctrl-totals-row<?php echo $row; ?>"  value="<?php echo get_value('totals') ?>" type="number" placeholder="Enter Totals" step="0.1"  required="" name="row[<?php echo $row ?>][totals]"  class="form-control " />
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
