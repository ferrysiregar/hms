@inject('comp_model', 'App\Models\ComponentsData')
<?php 
    $pageTitle = "Home";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<div>
    <div  class="card-4 bg-light mb-3" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid" >
                    <div class=" h5 font-weight-bold" >
                        Home
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </div>
    <div  class="mb-3" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid" >
                </div>
                <div class="col-md-3 col-sm-4 comp-grid" >
                </div>
            </div>
        </div>
    </div>
</div>
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
