<?php
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\LineChart;
?>
<div class="container report-content">
    <div class="text-center">
        <h1>ColumnsSort Process</h1>
        <p class="lead">Sort columns by name or label</p>
    </div>
    
    <?php
    Table::create(array(
        "dataSource"=>$this->dataStore("origin"),
        "cssClass"=>array(
            "table"=>"table-bordered table-striped table-hover"
        )
    ));
    ?>

<i class="fa fa-arrow-down" style="font-size:24px;"></i>
<pre style="font-weight:bold"><code>
->pipe(new ColumnsSort(array(
    "{name}" => "asc",
    // "{label}" => "desc",
    // "{name}" => function ($a, $b) { return $a < $b ? -1 : 1; },
    // "{label}" => function ($a, $b) { return $a < $b ? 1 : -1; },
)))
</code></pre>
<i class="fa fa-arrow-down" style="font-size:24px;"></i>

    <div style="margin-top:20px;">
    <?php
    Table::create(array(
        "dataSource"=>$this->dataStore("result"),
        "cssClass"=>array(
            "table"=>"table-bordered table-striped table-hover"
        )
    ));
    ?>
    </div>

</div>