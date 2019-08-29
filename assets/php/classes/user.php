<?php
    class User{

        var $full_name;

        var $email;

        var $status;

        var $type;

        var $dp_url;

        var $preferences;

        var $base_communities;

        var $interest_communities;

        /*CONSTRUCTOR*/

        function __construct(){

            $this->full_name = "";

            $this->email = "";

            $this->status = '';

            $this->type = '';

            $this->dp_url = '';

            $this->preferences = '';

            $this->base_communities = array();

            $this->interest_communities = array();

        }

        /*SETTERS*/

        function set_details($user_full_name, $user_email, $user_type, $user_status, $dp_url, $preferences, $base_com, $interest_comm){

            $this->full_name = $user_full_name;

            $this->email = $user_email;

            $this->status = $user_status;

            $this->dp_url = $dp_url;

            $this->user_type = $user_type;

            $this->preferences = $preferences;

            $this->base_communities = $base_com; // Organiszations can have more than one base, holds Community objects

            $this->interest_communities = $interest_comm;  // for the sake of toggling, holds Community objects

        }

        function set_full_name($name){

            $this -> full_name = $name;

        }


        function set_email($email){

            $this -> email = $email;

        }

        function set_dp_url($url){

            $this -> dp_url = $url;

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

        function set_base_communities($base_comm){
            $this->base_communities = $base_comm;
        }

        function set_interest_communities($interest_comm){
            $this->interest_communities = $interest_comm;
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

        function get_base_communities(){
            return $this -> base_communities;
        }

        function get_interest_communites(){
            return $this -> interest_communites;
        }
        // Methods

    }


    
?>