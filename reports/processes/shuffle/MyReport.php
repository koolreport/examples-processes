<?php
//Step 1: Load KoolReport
require_once "../../../common.php";

use koolreport\processes\Shuffle;

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
        ->pipe($this->dataStore("origin"));
        
        //Pipe through process to get result
        $this->src("data")
        ->pipe(new Shuffle())
        ->pipe($this->dataStore("result"));
    }
}