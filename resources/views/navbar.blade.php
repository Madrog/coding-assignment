<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{config('app.name', 'Ensibuuko')}}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?php if ($first_part=="") {echo "active"; } else  {echo "noactive";} ?>"" ><a href="/">Home</a></li>
                <li class="<?php if ($first_part=="individuals") {echo "active"; } else  {echo "noactive";}?>"><a href="/individuals">Individuals</a></li>
                <li class="<?php if ($first_part=="saccos") {echo "active"; } else  {echo "noactive";}?>"><a href="/saccos">SACCOs</a></li>
                <li class="<?php if ($first_part=="transactions") {echo "active"; } else  {echo "noactive";}?>"><a href="/transactions">Transactions</a></li>
            </ul>
        </div><!--/ .nav-collapse -->
    </div>
</nav>