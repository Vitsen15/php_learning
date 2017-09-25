<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$cater =  new PleasureCater(1000);

echo $cater->showPeopleAmount();

