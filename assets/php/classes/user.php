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

            $this->type = $user_type;

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
        function displayAll(){
            $name = $this->get_full_name();
            $email = $this->get_email();
            $type = $this->get_type();
            $status = $this->get_status();
            $cid = $this->get_base_communities();
            $url = $this->get_dp_url();
            
            $output = "<div class='card max-width padding-20 shadow white-bg vertical-margin-10'><div class='extra-small-size circle margin-5 float-left hide-overflow'><img class='uninterupted-max-width' src='$url'/></div><b>$name</b><div class='footnote italic'>$email, $status<br>Community: $cid</br><b>$type</b></div>";
            if($type =="community member"){$output .= "<div onclick='changeType(\"$email\", this.innerHTML);' class='admin-button button alt-bg center'>Make Admin</div>";}
            else if($type =="local admin"){$output .= "<div onclick='changeType(\"$email\", this.innerHTML);' class='admin-button button alt-bg center'>Make Member</div>";}
            else if($type =="unverified organisation"){$output .= "<div onclick='changeType(\"$email\", this.innerHTML);' class='admin-button button alt-bg center'>Verify</div>";}
            else if($type =="organisation"){$output .= "<div onclick='changeType(\"$email\", this.innerHTML);' class='admin-button button alt-bg center'>Unverify</div>";}
            $output .= "</div>";
            return $output;
        }
    }


    
?>