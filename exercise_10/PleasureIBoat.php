<?php
include_once 'Boat.php';
class PleasureBoat extends Boat
{
    public $peoplesAmount;

    static private $PleasureBoatName = 'Victoria';

    function __construct($mass, $volume, $sediment, $peoplesAmount)
    {
        parent::__construct($mass, $volume, $sediment);

        $this->peoplesAmount = $peoplesAmount;

        echo 'PleasureBoat' . get_class($this) . 'has been created!' . '<br>';
    }

    function __destruct()
    {
        parent::__destruct();

        echo 'PleasureBoat has been destroyed!' . '<br>';
    }

    static function showPleasureBoatName(){
        echo 'Boat name: ' . self::$PleasureBoatName . '<br>';
    }
}