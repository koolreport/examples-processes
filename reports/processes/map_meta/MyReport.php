<?php
//Step 1: Load KoolReport
require_once "../../../common.php";
use \koolreport\processes\ColumnMeta;
use \koolreport\processes\Limit;
use \koolreport\processes\Sort;
use \koolreport\processes\RemoveColumn;
use \koolreport\processes\OnlyColumn;
use \koolreport\processes\Map;
use \koolreport\cube\processes\Cube;
use \koolreport\core\Utility as Util;

//Step 2: Creating Report class
class MyReport extends \koolreport\KoolReport
{
    function settings()
    {
        return array(
            "dataSources" => array(
                "dollarsales"=>array(
                    'filePath' => '../../../data/customer_product_dollarsales2.csv',
                    'fieldSeparator' => ';',
                    'class' => "\koolreport\datasources\CSVDataSource"      
                ), 
            )
        );
    }
  
    function setup()
    {
        $node = $this->src('dollarsales')
        ->pipe(new Limit(array(5, 0)));

        $node
        ->pipe($this->dataStore('origin'));
        
        $node
        ->pipe(new Map(array(
            '{meta}' => function($metaData) {
                $metaData['columns']['productName'] = array(
                    'label' => 'Products',
                    'type' => 'string',
                );
                $metaData['columns']['dollar_sales'] = array(
                    'label' => 'Sales',
                    'type' => 'number',
                    'prefix' => '$',
                    'decimals' => 1,
                );
                return $metaData;
            },
        )))
        ->pipe($this->dataStore('result'));

    }
}