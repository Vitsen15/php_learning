<?php
include_once 'Engine.php';

class Boat extends CaterEngine
{

    protected $mass;
    protected $volume;
    protected $sediment;

    private static $boatType = 'Boat';

    /**
     * Boat constructor.
     * @param int $mass
     * @param int $volume
     * @param int $sediment
     */
    function __construct(int $mass, int $volume, int $sediment)
    {
        $this->mass = $mass;
        $this->volume = $volume;
        $this->sediment = $sediment;
        echo 'boat has been created!' . '<br>';
    }

    function __destruct()
    {
        echo 'boat has been destroyed!' . '<br>';
    }

    public function liftAnchor()
    {
        echo 'Anchor is up!' . '<br>';
    }

    public function dropAnchor()
    {
        echo 'Anchor is down!' . '<br>';
    }

    public function showBoatType()
    {
        echo self::$boatType . '<br>';
    }
}