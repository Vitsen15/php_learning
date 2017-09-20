<?php
class Laptop
{
    /**
     *$isOpened field is private because it boolean type field
     * and it suitable only for private interface
     */
    private $isOpened = false;

    /**
     * $power field is private because user shouldn't manage power directly
     */
    private $power = false;

    /**
     * OS constant is public because OS version may be useful for user
     */
    public const OS = 'Windows 10';

    /**
     * OS_LOADER_PATH constant is private because it's used only by
     * private interface and it useful for user
     */
    private const OS_LOADER_PATH = 'C:\="Microsoft Windows"';

    public function getIsOpened()
    {
        return $this->isOpened;
    }

    /**
     * returns is open state in string format
     */
    public function getIsOpenedString()
    {
        $result = '';
        if ($this->isOpened) {
            $result = 'laptop is opened' . '<br>';
        } else {
            $result = 'laptop is closed' . '<br>';
        }

        return $result;
    }

    /**
     *this method is public because any user should be able to open the laptop
     */
    public function openLaptop()
    {
        if ($this->isOpened) {
            echo "laptop is already opened!";
        } else {
            $this->isOpened = true;
            echo "laptop opened!";
        }

    }

    /**
     *this method is public because any user should be able to close the laptop
     */
    public function closeLaptop()
    {
        if ($this->isOpened) {
            $this->isOpened = false;
            echo "laptop closed!";
        } else {
            echo "laptop is already closed!";
        }

    }

    /**
     *this method is public because it
     * responds for power management
     */
    public function pressPowerButton()
    {
        if ($this->power && $this->isOpened) {
            $this->turnOffLaptop();
        } else if (!$this->power && $this->isOpened) {
            $this->turnOnLaptop();
        } else {
            echo 'At first you need open the laptop' . '<br>';
        }

    }

    /**
     * this method is private because user shouldn't interact with private interface
     * witch manages with power
     */
    private function turnOffLaptop()
    {
        $this->power = false;
        echo 'laptop has been turned off!';
    }

    /**
     * this method is private because user shouldn't interact with private interface
     * witch manages with power
     */
    private function turnOnLaptop()
    {
        $this->power = true;
        $this->bootLoader();
        echo 'laptop has been turned on!' . '<br>';
    }

    /**
     * this method is private because user shouldn't manage os booting
     */
    private function bootLoader()
    {
        echo self::OS . " is loaded from " . self::OS_LOADER_PATH . '<br>';
    }


    /**
     * @param string $text user input
     *
     * this method is public because user should interact with the keyboard
     */
    public function typeOnKeyboard(string $text)
    {
        if (!$this->isOpened) {
            echo 'Open the laptop at first!!!' . '<br>';
            return;
        } else if (!$this->power) {
            echo 'Torn on the laptop at first!!!' . '<br>';
            return;
        } else {
            echo $text;
        }

    }
}
?>