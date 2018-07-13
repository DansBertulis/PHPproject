<?php
    class Main_class
    {
        var $numberOne = 0;
        var $numberTwo = 0;

        static function showError()
        {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }

        static function getPhpVersion()
        {
            echo phpversion();

        }

        public function setNumberOne($numberOne)
        {
            $this->numberOne = $numberOne;
        }

        public function setNumberTwo($numberTwo)
        {
            $this->numberTwo = $numberTwo;
        }

        public function getResult(){
            $sum = $this->numberOne + $this->numberTwo;
            echo $sum;
        }
    }
?>

