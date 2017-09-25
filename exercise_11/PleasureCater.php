<?php

class PleasureCater extends CaterEngine implements Cater
{
    use CaterPeoples;

    function __construct($peoplesAmount)
    {
        $this->peoplesAmount = $peoplesAmount;
    }

    protected $anchorIsDown = true;
    protected $engineIsRunning = false;
    protected $peoplesAmount = 0;

    public function liftAnchor()
    {
        $this->anchorIsDown = false;
    }

    public function dropAnchor()
    {
        $this->anchorIsDown = true;
    }

    public function showAnchorIsDown()
    {
        return $this->anchorIsDown;
    }

    protected function startEngine()
    {
        $this->engineIsRunning = true;
    }

    protected function stopEngine()
    {
        $this->engineIsRunning = false;
    }

}