<?php

interface Cater
{
    public function liftAnchor();

    public function dropAnchor();

    public function showAnchorIsDown();
}

abstract class CaterEngine
{
    protected abstract function startEngine();

    protected abstract function stopEngine();
}

trait CaterPeoples
{
    function setPeopleAmount($amount)
    {
        $this->peoplesAmount = $amount;
    }

    function unsetPeopleAmount()
    {
        $this->peoplesAmount = 0;
    }

    function showPeopleAmount()
    {
        return $this->peoplesAmount;
    }
}

