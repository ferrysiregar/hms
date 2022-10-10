@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Details Hk Stok In";
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
                        Add New Details Hk Stok In
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
                        <form id="details_hk_stok_in-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="{{ route('details_hk_stok_in.store') }}" method="post" >
                            @csrf
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="item">Item</label></th>
                                            <th class="bg-light"><label for="qty">Qty</label></th>
                                            <th class="bg-light"><label for="conditions">Conditions</label></th>
                                            <th class="bg-light"><label for="locations">Locations</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            for( $row = 1; $row <= 1; $row++ ){
                                        ?>
                                        <tr class="input-row">
                                            <td>
                                                <div id="ctrl-item-row<?php echo $row; ?>-holder" class=" ">
                                                <select required=""  id="ctrl-item-row<?php echo $row; ?>" name="row[<?php echo $row ?>][item]"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->item_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('item', $value);
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
                                            <div id="ctrl-qty-row<?php echo $row; ?>-holder" class=" ">
                                            <input id="ctrl-qty-row<?php echo $row; ?>"  value="<?php echo get_value('qty') ?>" type="number" placeholder="Enter Qty" step="0.1"  required="" name="row[<?php echo $row ?>][qty]"  class="form-control " />
                                        </div>
                                    </td>
                                    <td>
                                        <div id="ctrl-conditions-row<?php echo $row; ?>-holder" class=" ">
                                        <select required=""  id="ctrl-conditions-row<?php echo $row; ?>" name="row[<?php echo $row ?>][conditions]"  placeholder="Select a value ..."    class="custom-select" >
                                        <option value="">Select a value ...</option>
                                        <?php 
                                            $options = $comp_model->conditions_option_list() ?? [];
                                            foreach($options as $option){
                                            $value = $option->value;
                                            $label = $option->label ?? $value;
                                            $selected = Html::get_field_selected('conditions', $value);
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
                                    <div id="ctrl-locations-row<?php echo $row; ?>-holder" class=" ">
                                    <select required=""  id="ctrl-locations-row<?php echo $row; ?>" name="row[<?php echo $row ?>][locations]"  placeholder="Select a value ..."    class="custom-select" >
                                    <option value="">Select a value ...</option>
                                    <?php 
                                        $options = $comp_model->locations_option_list() ?? [];
                                        foreach($options as $option){
                                        $value = $option->value;
                                        $label = $option->label ?? $value;
                                        $selected = Html::get_field_selected('locations', $value);
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
                        <div id="ctrl-item-row<?php echo $row; ?>-holder" class=" ">
                        <select required=""  id="ctrl-item-row<?php echo $row; ?>" name="row[<?php echo $row ?>][item]"  placeholder="Select a value ..."    class="custom-select" >
                        <option value="">Select a value ...</option>
                        <?php 
                            $options = $comp_model->item_option_list() ?? [];
                            foreach($options as $option){
                            $value = $option->value;
                            $label = $option->label ?? $value;
                            $selected = Html::get_field_selected('item', $value);
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
                    <div id="ctrl-qty-row<?php echo $row; ?>-holder" class=" ">
                    <input id="ctrl-qty-row<?php echo $row; ?>"  value="<?php echo get_value('qty') ?>" type="number" placeholder="Enter Qty" step="0.1"  required="" name="row[<?php echo $row ?>][qty]"  class="form-control " />
                </div>
            </td>
            <td>
                <div id="ctrl-conditions-row<?php echo $row; ?>-holder" class=" ">
                <select required=""  id="ctrl-conditions-row<?php echo $row; ?>" name="row[<?php echo $row ?>][conditions]"  placeholder="Select a value ..."    class="custom-select" >
                <option value="">Select a value ...</option>
                <?php 
                    $options = $comp_model->conditions_option_list() ?? [];
                    foreach($options as $option){
                    $value = $option->value;
                    $label = $option->label ?? $value;
                    $selected = Html::get_field_selected('conditions', $value);
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
            <div id="ctrl-locations-row<?php echo $row; ?>-holder" class=" ">
            <select required=""  id="ctrl-locations-row<?php echo $row; ?>" name="row[<?php echo $row ?>][locations]"  placeholder="Select a value ..."    class="custom-select" >
            <option value="">Select a value ...</option>
            <?php 
                $options = $comp_model->locations_option_list() ?? [];
                foreach($options as $option){
                $value = $option->value;
                $label = $option->label ?? $value;
                $selected = Html::get_field_selected('locations', $value);
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
