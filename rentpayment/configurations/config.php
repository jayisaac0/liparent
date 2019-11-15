<?php
    class Configurations
    {
        public $production_base_url = "http://localhost/rentpayment/";
        public $mode = "publish";
        public $websitename = "My site name";
        public function __construct() {
        }
        public function baseurl() {
            $mode = $this->mode;
            $production_base_url = $this->production_base_url;
            $development_mode = $mode;
            switch ($development_mode) {
                case "publish":
                    echo $production_base_url;
                    break;  
                default:
                    echo "configuration error";
            }
        }
        public function sitename() {
            $sitename = $this->websitename;
            echo $sitename;
        }
    }
    $config = NEW Configurations();
?>