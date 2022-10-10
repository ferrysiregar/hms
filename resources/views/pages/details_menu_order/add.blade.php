@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Details Menu Order";
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
                        Add New Details Menu Order
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
                        <form id="details_menu_order-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="{{ route('details_menu_order.store') }}" method="post" >
                            @csrf
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="product_name">Product Name</label></th>
                                            <th class="bg-light"><label for="price">Price</label></th>
                                            <th class="bg-light"><label for="qty">Qty</label></th>
                                            <th class="bg-light"><label for="total">Total</label></th>
                                            <th class="bg-light"><label for="notes">Notes</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            for( $row = 1; $row <= 1; $row++ ){
                                        ?>
                                        <tr class="input-row">
                                            <td>
                                                <div id="ctrl-product_name-row<?php echo $row; ?>-holder" class=" ">
                                                <select required=""  id="ctrl-product_name-row<?php echo $row; ?>" data-load-select-options="price" name="row[<?php echo $row ?>][product_name]"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->product_name_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('product_name', $value);
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
                                        <div id="ctrl-qty-row<?php echo $row; ?>-holder" class=" ">
                                        <input id="ctrl-qty-row<?php echo $row; ?>"  value="<?php echo get_value('qty') ?>" type="number" placeholder="Enter Qty" step="0.1"  required="" name="row[<?php echo $row ?>][qty]"  class="form-control " />
                                    </div>
                                </td>
                                <td>
                                    <div id="ctrl-total-row<?php echo $row; ?>-holder" class=" ">
                                    <input id="ctrl-total-row<?php echo $row; ?>"  value="<?php echo get_value('total') ?>" type="number" placeholder="Enter Total" step="0.1"  required="" name="row[<?php echo $row ?>][total]"  class="form-control " />
                                </div>
                            </td>
                            <td>
                                <div id="ctrl-notes-row<?php echo $row; ?>-holder" class=" ">
                                <textarea placeholder="Enter Notes" id="ctrl-notes-row<?php echo $row; ?>"  rows="5" name="row[<?php echo $row ?>][notes]" class=" form-control"><?php echo get_value('notes') ?></textarea>
                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
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
                    <div id="ctrl-product_name-row<?php echo $row; ?>-holder" class=" ">
                    <select required=""  id="ctrl-product_name-row<?php echo $row; ?>" data-load-select-options="price" name="row[<?php echo $row ?>][product_name]"  placeholder="Select a value ..."    class="custom-select" >
                    <option value="">Select a value ...</option>
                    <?php 
                        $options = $comp_model->product_name_option_list() ?? [];
                        foreach($options as $option){
                        $value = $option->value;
                        $label = $option->label ?? $value;
                        $selected = Html::get_field_selected('product_name', $value);
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
            <div id="ctrl-qty-row<?php echo $row; ?>-holder" class=" ">
            <input id="ctrl-qty-row<?php echo $row; ?>"  value="<?php echo get_value('qty') ?>" type="number" placeholder="Enter Qty" step="0.1"  required="" name="row[<?php echo $row ?>][qty]"  class="form-control " />
        </div>
    </td>
    <td>
        <div id="ctrl-total-row<?php echo $row; ?>-holder" class=" ">
        <input id="ctrl-total-row<?php echo $row; ?>"  value="<?php echo get_value('total') ?>" type="number" placeholder="Enter Total" step="0.1"  required="" name="row[<?php echo $row ?>][total]"  class="form-control " />
    </div>
</td>
<td>
    <div id="ctrl-notes-row<?php echo $row; ?>-holder" class=" ">
    <textarea placeholder="Enter Notes" id="ctrl-notes-row<?php echo $row; ?>"  rows="5" name="row[<?php echo $row ?>][notes]" class=" form-control"><?php echo get_value('notes') ?></textarea>
    <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
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
