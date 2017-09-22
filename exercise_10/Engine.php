<?php

class Engine
{
    private static $engineType = 'Internal combustion engine';

    private $isRunning = false;

    public function startEngine()
    {
        if ($this->isRunning) {
            echo 'engine is already running!' . '<br>';
        } else {
            $this->isRunning = true;
            echo "engine is running now!" . '<br>';
        }

    }

    public function stopEngine()
    {
        if (!$this->isRunning) {
            echo 'engine is already stopped!' . '<br>';
        } else {
            $this->isRunning = false;
            echo 'engine has been stopped!' . '<br>';
        }
    }

    static function showEngineType()
    {
        echo 'Engine type: ' . self::$engineType . '<br>';
    }

}