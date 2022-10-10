<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <img class="img-responsive" src="{{ asset('images/logo.png') }}" /> 
            {{ config('app.name') }}
        </a>
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        </button>
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
        </div>
    </div>
</div>
<nav id="sidebar" class="navbar-dark bg-primary">
{{ Html::render_menu(Menu::navbarsideleft()  , "nav navbar-nav w-100 flex-column align-self-start"  , "accordion") }}
</nav>
