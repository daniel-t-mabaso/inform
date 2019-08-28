<?php
    class User{

        var $full_name;

        var $email;

        var $status;

        var $type;

        var $dp_url;

        var $preferences;

        /*CONSTRUCTOR*/

        function __construct(){

            $this->full_name = "";

            $this->email = "";

            $this->status = '';

            $this->type = '';

            $this->dp_url = '';

            $this->preferences = '';

        }

        /*SETTERS*/

        function set_details($user_full_name, $user_email, $user_type, $user_status, $dp_url, $preferences){

            $this->full_name = $user_full_name;

            $this->email = $user_email;

            $this->status = $user_status;

            $this->dp_url = $dp_url;

            $this->user_type = $user_type;

            $this->preferences = $preferences;

        }

        function set_full_name($name){

            $this -> full_name = $name;

        }


        function set_email($email){

            $this -> email = $email;

        }

        function set_dp_url($url){

            $this -> dp_url = $dp_url;

        }

        function set_type($type){

            $this -> type = $type;

        }

        function set_status($status){

            $this -> status = $status;

        }

        function set_preferences($preferences){
            $this -> preferences = $preferences;

        }


        /*GETTERS*/        

        function get_name(){

            return $this -> name;

        }


        function get_full_name(){

            return $this->full_name;

        }

        function get_email(){

            return $this -> email;

        }

        function get_dp_url(){

            return $this -> dp_url;

        }

        function get_type(){

            return $this -> type;

        }

        function get_status(){

            return $this -> status;

        }
        function get_preferences(){

            return $this -> preferences;

        }
        // Methods

    }


    
?>