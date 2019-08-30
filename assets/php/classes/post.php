<?php 
    class Post{
        var $user_email;
        var $post_name;
        var $post_id;
        var $post_descrip;
        var $post_start_date;
        var $post_end_date;
        var $post_community;
        var $post_filter;
        var $post_image_url;

        /*CONSTRUCTOR*/
        public function __construct() {
            $this->user_email = "";
            $this->post_name = "";
            $this->post_id = 0;
            $this->post_community = 0;
            $this->post_descrip = "";
            $this->post_start_date = "";
            $this->post_end_date = "";
            $this->post_image_url = "";
            $this->post_filter = "";
            
        }

        /*GETTERS*/
        function get_post_id(){
            return $this->post_id;
        }

        function get_post_name(){
            return $this->posy_name;
        }

        function get_user_email(){
            return $this->user_email;
        }

        function get_post_date(){
            return $this->post_start_date;
        }

        function get_post_description(){
            return $this->post_descrip;
        }

        function get_post_community_id(){
            return $this->post_community;
        }

        function get_post_image(){
            return $this->post_image_url;
        }
        function get_post_filter(){
            return $this->post_filter;
        }

        /* SETTERS */

        function set_details($pid, $pname, $pdescrip, $pstart, $pend, $pfilter, $purl, $pemail){
            $this->post_id = $pid;
            $this->post_name = $pname;
            $this->post_descrip = $pdescrip;
            $this->post_start_date = $pstart;
            $this->post_end_date = $pend;
            $this->post_image_url = $purl;
            $this->post_filter = $pfilter;
            $this->user_email = $email;

        }

        function set_user_email($email){
            $this->user_email = $email;
        }

        function set_post_id($id){
            $this->post_id = $id;
        }

        function set_post_name($name){
            $this->post_name = $name;
        }

        function set_post_community_id($id){
            $this->post_community = $id;
        }

        function set_post_description($descip){
            $this->post_descrip = $descrip;
        }

        function set_post_start_date ($date){
            $this->post_start_date = $date;
        }
        
        function set_post_end_date($date){
            $this->post_end_date = $date;
        }

        function set_post_image($url){
            $this->post_image_url = $url;
        }
        function set_post_filter($pfilter){
            $this->post_filter = $pfilter;
        }
    }

    class Event extends Post{

        /* CONSTRUCTOR*/
        function __construct() {
            parent:: __construct();
            
        }

        /* METHOD */
        function send_reminders($reminder_time){
            // Write code to signal push notification
        }
    }

    class Alert extends Post{

        var $alert_type;

        /* CONSTRUCTOR*/
        function __construct() {
            parent:: __construct();
            $this->alert_type = "";
        }
    }
?>