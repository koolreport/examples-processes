<?php
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\LineChart;
?>
<div class="container report-content">
    <div class="text-center">
        <h1>CalculatedColumn Process</h1>
        <p class="lead">Set calculated column together with its meta</p>
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
->pipe(new CalculatedColumn(array(
    "total_meta"=>array(
        "exp"=>"{hour_rate}*{working_hours}",
        "type"=>"number",
        "decimals" => 4,
        "prefix"=>'$'
    )
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