<?php
//Step 1: Load KoolReport
require_once "../../../common.php";

use \koolreport\processes\ColumnMeta;
use \koolreport\processes\Limit;

//Step 2: Creating Report class
class MyReport extends \koolreport\KoolReport
{
    protected function settings()
    {
        return array(
            "dataSources"=>array(
                "data"=>array(
                    "class"=>'\koolreport\datasources\ArrayDataSource',
                    "dataFormat"=>"table",
                    "data"=>array(
                        array("name","income"),
                        array("John",50000),
                        array("Marry",60000),
                        array("Peter",100000),
                        array("Donald",80000),
                    )
                )
            )
        );
    }
    protected function setup()
    {
        //Prepare data
        $this->src("data")
        ->pipe(new ColumnMeta(array(
            "income"=>array(
                "type"=>"number",
                "prefix"=>"$"
            )
        )))
        ->saveTo($source);

        //Save orginal data
        $source->pipe($this->dataStore("origin"));
        
        //Pipe through process to get result
        $source->pipe(new Limit(
            array(2,0)
        ))
        ->pipe($this->dataStore("result"));
    }
}