<?php
    class Community{
        var $zip_code;

        var $community_name;

        var $city;

        var $province;

        var $num_members;

        // Constructor
        function __construct(){
            $this->zip_code = 0;
            $this->community_name = "";
            $this->city = "";
        }

        /*SETTERS*/
        function set_details($com_name, $com_zip, $com_city, $com_province){
            $this->community_name = $com_name;
            $this->zip_code = $com_zip;
            $this->city = $com_city;
            $this->province = $com_province;
        }

        function set_number ($num){
            $this->num_members = $num;
        }

        function set_zip($zip){
            $this->zip_code= $zip;
        }

        function set_name($name){
            $this->community_name = $name;
        }

        function set_city($city){
            $this->city = $city;
        }

        function set_province($province){
            $this->province = $province;
        }
        
        /*GETTERS*/
        function get_zip(){
            return $this->zip_code;
        }

        function get_name(){
            return $this->community_name;
        }

        function get_city(){
            return $this->city;
        }

        function get_province(){
            return $this->province;
        }

        function get_all(){
            $str = $this->get_name().', '. $this->get_city().', '. $this->get_province().', '. $this->get_zip();
            return $str;
        }

        /* METHODS */
        function displayAll(){
            $code = $this->get_zip();
            $suburb = $this->get_name();
            $city = $this->get_city();
            $province = $this->get_province();
            $output = "<div class='card padding-20 max-width white-bg vertical-margin-10 shadow'><b>$suburb ($code)</b><br>$city<br>$province</div>";
            return $output;
        }
    }
?>