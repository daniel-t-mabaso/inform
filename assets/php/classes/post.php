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
            return $this->post_name;
        }

        function get_user_email(){
            return $this->user_email;
        }

        function get_post_date(){
            return $this->post_start_date;
        }
        function get_post_end(){
            return $this->post_end_date;
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

        function set_details($pid, $pname, $pdescrip, $pstart, $pend, $purl, $pcommunity, $pfilter, $pemail){
            $this->post_id = $pid;
            $this->post_name = $pname;
            $this->post_descrip = $pdescrip;
            $this->post_start_date = $pstart;
            $this->post_end_date = $pend;
            $this->post_image_url = $purl;
            $this->post_community_id = $pcommunity;
            $this->post_filter = $pfilter;
            $this->user_email = $pemail;

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

        function display(){
            date_default_timezone_set('Europe/Belgrade');
            $id = $this -> get_post_id();
            $title = substr($this -> get_post_name(), 0, 11);
            if(strlen($this-> get_post_name())>11){
                $title.="...";
            }
            $desciption = substr($this -> get_post_description(), 0, 50);
            if(strlen($this-> get_post_description())>50){
                $desciption.="...";
            }
            $start = explode('T', $this -> get_post_date());
            $end = explode('T',$this -> get_post_end()); 
            $date = '';
            if($end[0]<= date("Y-m-d") && ($end[1] <= date("H:i"))){
                $date = "danger-txt'>Finished";
            }
            if($date!="danger-txt'>Finished"){
                if($start[0] == date("Y-m-d") && ($start[1] <= date("H:i"))){
                    $start[0] = " caution-txt'> Now";
                    $start[1] = '';
                }
                else if($start[0] == date("Y-m-d")){
                    $start[0] = "success-txt'> Today,";
                }
                else{
                    $start[0] = "'>".$start[0];
                }
                if($end[0]==date("Y-m-d")){
                    $end[0] = '';
                }
                if($start[0]==$end[0]){
                    $date = $start[0]." ".$start[1]." until ".$end[1]."";
                }
                else{
                    $date = $start[0]." ".$start[1]." until ". $end[0]." ".$end[1]."";
                }
            }


            $url = $this -> get_post_image();

            $tmp = date("H:i");
            return "<div class='post-card card max-width padding-20 vertical-padding-30 center vertical-margin-10 exta-small-height shadow black-txt left-txt bold'>
                <div class='bold max-width'>$title</div>
                <div class='book max-width vertical-padding-5'>$desciption</div>
                <div class='footnote bold $date</div>
                <input type='hidden' class='post-id' value='$id'/>
            </div>";
        }
    }

    class Alert extends Post{

        var $alert_template;

        /* CONSTRUCTOR*/
        function __construct() {
            parent:: __construct();
            $this->alert_template = "";
        }

        /*SETTERS*/
        function set_alert_template($atemp){
            $this->alert_template =  $atemp;
        }

        /*GETTERS*/
        function get_alert_template(){
            return $this->alert_template;
        }

        /*METHODS*/
        function display(){
            date_default_timezone_set('Europe/Belgrade');
            $id = $this -> get_post_id();
            $title = substr($this -> get_post_name(), 0, 11);
            if(strlen($this-> get_post_name())>11){
                $title.="...";
            }
            $desciption = substr($this -> get_post_description(), 0, 50);
            if(strlen($this-> get_post_description())>50){
                $desciption.="...";
            }
            $start = explode('T', $this -> get_post_date());
            $url = $this -> get_post_image();

            $tmp = date("H:i");
            return "<div class='post-card card max-width padding-20 vertical-padding-30 center caution-bg vertical-margin-10 exta-small-height shadow black-txt left-txt bold'>
                <div class='bold max-width'>$title</div>
                <div class='book max-width vertical-padding-5'>$desciption</div>
                <input type='hidden' class='post-id' value='$id'/>
            </div>";
        }
    }
?>