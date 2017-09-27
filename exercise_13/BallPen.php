<?php

final class BallPen
{
    private $rod = 100;
    public const COLOR = 'black';

    public function write(string $input)
    {
        $text = str_split($input);
        for ($i = 0; $i < count($text); $i++) {
            if ($this->rod == 0) {
                echo $text[$i] . '<br>';
                echo 'Rod is over!!!';
                break;
            } else {
                $this->rod--;
                echo $text[$i];
            }
        }
        echo '<br>';
    }

    /**
     * @return int
     */
    public function getRod(): int
    {
        return $this->rod;
    }

    /**
     * @param int $rod
     */
    public function setRod(int $rod)
    {
        if ($rod > 100){
            $this->rod = 100;
        } else {
            $this->rod = $rod;
        }
    }

    function __clone()
    {
        $this->rod = 100;
    }
}