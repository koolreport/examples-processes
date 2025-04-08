<?php
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\LineChart;
?>
<div class="container report-content">
    <div class="text-center">
        <h1>StringTrim Process</h1>
        <p class="lead">Trim column values of characters in defined mask</p>
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
->pipe(new StringTrim(array(
    "name",
    "character_mask" => "\t\n\rN_"
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