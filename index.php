<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="KoolReport is an intuitive and flexible Open Source PHP Reporting Framework for faster and easier data report delivery.">
    <meta name="author" content="KoolPHP Inc">
    <meta name="keywords" content="php reporting framework">
    <title>KoolReport Examples &amp; Demonstration</title>

    <link href="./assets/fontawesome/font-awesome.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/main.css" rel="stylesheet">

    <script type="text/javascript" src="./assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .fa-plus-square-o,
    .fa-minus-square-o {
        cursor: pointer;
    }
</style>
<script>
    function toggleExpandCollapse(i) {
        i.classList.toggle('fa-plus-square-o');
        i.classList.toggle('fa-minus-square-o');
    }

    function toggleExpandCollapseAll(i) {
        let div = i.parentElement.parentElement;
        let expandCollapseButtons = div.querySelectorAll('.expand-collapse');
        expandCollapseButtons.forEach(function(btn) {
            if (i.classList.contains('fa-plus-square-o')) {
                if (btn.classList.contains('fa-plus-square-o')) {
                    btn.click();
                }
            } else if (i.classList.contains('fa-minus-square-o')) {
                if (btn.classList.contains('fa-minus-square-o')) {
                    btn.click();
                }
            }
        })
        i.classList.toggle('fa-plus-square-o');
        i.classList.toggle('fa-minus-square-o');
    }
</script>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a id="baseUrl" class="navbar-brand" href="https://www.koolreport.com/examples">KoolReport Examples</a>
        <a id="repoUrl" class="navbar-brand" href="https://github.com/koolreport/examples-processes">GitHub</a>
        <ul id="topMenu" class="navbar-nav mr-auto">

        </ul>
        <div class="my-2 my-lg-0">
            <a href="https://www.koolreport.com/get-koolreport-pro" class="btn-get-koolreort-pro btn btn-outline-success my-2 my-sm-0">Get KoolReport Pro</a>
        </div>
    </nav>
    <main class="container">
        <?php
        $root_url = ".";
        $reportJson = <<<EOD
            {
                "Core": {
                    "<i class='fa fa-gears'></i>Processes": {
                        "ColumnMeta": {
                            "String": "/reports/processes/columnmeta_string/",
                            "Number": "/reports/processes/columnmeta_number/",
                            "DateTime": "/reports/processes/columnmeta_datetime/"
                        },
                        "CalculatedColumn": {
                            "Basic_Function": "/reports/processes/calculatedcolumn_basic_function/",
                            "Meta": "/reports/processes/calculatedcolumn_meta/",
                            "RowNum": "/reports/processes/calculatedcolumn_rownum/"
                        },
                        "Filter": {
                            "Basic": "/reports/processes/filter_basic/",
                            "\"or\" operators": "/reports/processes/filter_or_operator/",
                            "Brackets": "/reports/processes/filter_brackets/",
                            "Function": "/reports/processes/filter_function/"
                        },
                        "Map": {
                            "Value": "/reports/processes/map_value/",
                            "Meta": "/reports/processes/map_meta/",
                            "Added rows": "/reports/processes/map_added_rows/",
                            "Stateful": "/reports/processes/map_stateful/"
                        },
                        "Transpose": {
                            "Basic": "/reports/processes/transpose/",
                            "Columns transpose": "/reports/processes/columns_transpose/"
                        },
                        "Columns related": {
                            "CopyColumn": "/reports/processes/copycolumn/",
                            "AccumulativeColumn": "/reports/processes/accumulativecolumn/",
                            "AggregatedColumn": "/reports/processes/aggregatedcolumn/",
                            "ColumnRename": "/reports/processes/column_rename/",
                            "ColumnsSort": "/reports/processes/columns_sort/",
                            "DifferenceColumn": "/reports/processes/difference_column/",
                            "OnlyColumn": "/reports/processes/only_column/",
                            "RemoveColumn": "/reports/processes/remove_column/",
                            "RowNumColumn": "/reports/processes/rownum_column/"
                        },
                        "Rows related": {
                            "Sort basic": "/reports/processes/sort_basic/",
                            "Sort function": "/reports/processes/sort_function/",
                            "AppendRow": "/reports/processes/append_row/",
                            "Limit": "/reports/processes/limit/",
                            "Shuffle": "/reports/processes/shuffle/"
                        },
                        "Bucket values": {
                            "TimeBucket": "/reports/processes/timebucket/",
                            "NumberBucket": "/reports/processes/numberbucket/",
                            "NumberRange": "/reports/processes/numberrange/"
                        },
                        "Values changes": {
                            "DateTimeFormat": "/reports/processes/datetimeformat/",
                            "JsonSpread": "/reports/processes/json_spread/",
                            "StringCase": "/reports/processes/string_case/",
                            "StringTrim": "/reports/processes/string_trim/",
                            "TypeAssure": "/reports/processes/type_assure/"
                        },
                        "Others": {
                            "Custom": "/reports/processes/custom/",
                            "Group": "/reports/processes/group/",
                            "Join": "/reports/processes/join/"
                        }
                    }
                }
            }        
        EOD;

        $menu = json_decode($reportJson, true);
        foreach ($menu as $section_name => $section) {
        ?>
            <h4 class="section-header"><?php echo $section_name; ?></h4>
            <div class="row">
                <?php
                foreach ($section as $group_name => $group) {
                ?>
                    <div class="col-md-3 example-group col-sm-6">
                        <h5>
                            <i class='fa fa-minus-square-o' data-toggle="collapse" onclick="toggleExpandCollapseAll(this);"></i>
                            <?php echo (strpos($group_name, "</i>") > 0) ? $group_name : "<i class='icon-layers'></i>$group_name"; ?></h5>
                        <ul class="list-unstyled">
                            <?php
                            foreach ($group as $sname => $surl) {
                                if (is_string($surl)) {
                            ?>
                                    <li>                                        
                                        <a href="<?php echo $root_url . $surl; ?>"><?php echo $sname; ?></a>
                                    </li>
                                <?php
                                } else {
                                    $idName = $sname;
                                    $idName = str_replace(" ", "", $idName);
                                    $idName = str_replace("/", "", $idName);
                                    $idName = str_replace("&", "", $idName);
                                ?>
                                    <li>
                                        <strong><i class='fa fa-minus-square-o expand-collapse' data-toggle="collapse" data-target="#<?php echo $idName; ?>" onclick="toggleExpandCollapse(this);"></i> <?php echo $sname; ?></strong>
                                        <ul class="list-unstyled collapse show" id="<?php echo $idName; ?>">
                                            <?php
                                            foreach ($surl as $tname => $turl) {
                                            ?>
                                                <li><a href="<?php echo $root_url . $turl; ?>"><?php echo $tname; ?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </main>
</body>

</html>