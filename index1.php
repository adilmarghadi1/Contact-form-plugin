<?php

?>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style>

.tgl {
  position: relative;
  display: inline-block;
  height: 30px;
  cursor: pointer;
}
.tgl > input {
  position: absolute;
  opacity: 0;
  z-index: -1;
  /* Put the input behind the label so it doesn't overlay text */
  visibility: hidden;
}
.tgl .tgl_body {
  width: 60px;
  height: 30px;
  background: white;
  border: 1px solid #dadde1;
  display: inline-block;
  position: relative;
  border-radius: 50px;
}
.tgl .tgl_switch {
  width: 30px;
  height: 30px;
  display: inline-block;
  background-color: white;
  position: absolute;
  left: -1px;
  top: -1px;
  border-radius: 50%;
  border: 1px solid #ccd0d6;
  -moz-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.13);
  -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.13);
  box-shadow: 0 2px 2px rgba(0, 0, 0, 0.13);
  -moz-transition: left cubic-bezier(0.34, 1.61, 0.7, 1) 250ms, -moz-transform cubic-bezier(0.34, 1.61, 0.7, 1) 250ms;
  -o-transition: left cubic-bezier(0.34, 1.61, 0.7, 1) 250ms, -o-transform cubic-bezier(0.34, 1.61, 0.7, 1) 250ms;
  -webkit-transition: left cubic-bezier(0.34, 1.61, 0.7, 1), -webkit-transform cubic-bezier(0.34, 1.61, 0.7, 1);
  -webkit-transition-delay: 250ms, 250ms;
  transition: left cubic-bezier(0.34, 1.61, 0.7, 1) 250ms, transform cubic-bezier(0.34, 1.61, 0.7, 1) 250ms;
  z-index: 1;
}
.tgl .tgl_track {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
  border-radius: 50px;
  
}
.tgl .tgl_bgd {
  position: absolute;
  right: -10px;
  top: 0;
  bottom: 0;
  width: 55px;
  -moz-transition: left cubic-bezier(0.34, 1.61, 0.7, 1) 250ms, right cubic-bezier(0.34, 1.61, 0.7, 1) 250ms;
  -o-transition: left cubic-bezier(0.34, 1.61, 0.7, 1) 250ms, right cubic-bezier(0.34, 1.61, 0.7, 1) 250ms;
  -webkit-transition: left cubic-bezier(0.34, 1.61, 0.7, 1), right cubic-bezier(0.34, 1.61, 0.7, 1);
  -webkit-transition-delay: 250ms, 250ms;
  transition: left cubic-bezier(0.34, 1.61, 0.7, 1) 250ms, right cubic-bezier(0.34, 1.61, 0.7, 1) 250ms;
  background: #439fd8 url("http://petelada.com/images/toggle/tgl_check.png") center center no-repeat;
}
.tgl .tgl_bgd-negative {
  right: auto;
  left: -45px;
  background: white url("http://petelada.com/images/toggle/tgl_x.png") center center no-repeat;
}
.tgl:hover .tgl_switch {
  border-color: #b5bbc3;
  -moz-transform: scale(1.06);
  -ms-transform: scale(1.06);
  -webkit-transform: scale(1.06);
  transform: scale(1.06);
}
.tgl:active .tgl_switch {
  -moz-transform: scale(0.95);
  -ms-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  transform: scale(0.95);
}
.tgl > :not(:checked) ~ .tgl_body > .tgl_switch {
  left: 30px;
}
.tgl > :not(:checked) ~ .tgl_body .tgl_bgd {
  right: -45px;
}
.tgl > :not(:checked) ~ .tgl_body .tgl_bgd.tgl_bgd-negative {
  right: auto;
  left: -10px;
}

#popUpYes
{
  width: 60px;
  height: 30px;
  background-color: black;
    color: white;
}
#popUpYes:hover
{
  background-color: white;
    color: black;
}
    #toastShow{
        display:none
    }
</style>
</head>
<?php    


// ETAPE 1 : AJOUTER LA PAGE DE REGLAGES AU DASHBOARD ADMIN
function test_plugin_setup_menu(){
    add_menu_page( 'Message Plugin', 'Message Plugin', 'manage_options', 'test-plugin','wp_message' );
}
add_action('admin_menu', 'test_plugin_setup_menu');

// ETAPE 2 : AJOUTER UN EDITEUR DE TEXTE A LA PAGE DE REGLAGES
function wp_message(){
   // $content = get_option( 'wp_message_value' );
    
    echo '<form action="" method="POST">';
    
?>

  <br> <input type="text" placeholder="name"> <label class="tgl">
    <input type="checkbox" name="name" value="1" <?php checkbox("wp_contact_name");?>/>
    <span class="tgl_body">
    <span class="tgl_switch"></span>
    <span class="tgl_track">
      <span class="tgl_bgd"></span>
      <span class="tgl_bgd tgl_bgd-negative"></span>
    </span>
  </span>
  </label> <br> <br>
  <input type="text" placeholder="email"> <label class="tgl">
    <input type="checkbox" name="email" value="1" <?php checkbox("wp_contact_email");?> />
    <span class="tgl_body">
    <span class="tgl_switch"></span>
    <span class="tgl_track">
      <span class="tgl_bgd"></span>
      <span class="tgl_bgd tgl_bgd-negative"></span>
    </span>
  </span>
  </label><br> <br>
  <input type="text" placeholder="Phone Number"> <label class="tgl">
  <input type="checkbox" name="number" value="1" <?php checkbox("wp_contact_number");?> />
  <span class="tgl_body">
    <span class="tgl_switch"></span>
    <span class="tgl_track">
      <span class="tgl_bgd"></span>
      <span class="tgl_bgd tgl_bgd-negative"></span>
    </span>
  </span>
</label> <br> <br>
<textarea id="txtid" placeholder="Message" name="txtname" style="height: 29px;width: 181PX;"></textarea> <label class="tgl">
<input type="checkbox" name="message" value="1" <?php checkbox("wp_contact_Message");?> />
<span class="tgl_body">
  <span class="tgl_switch"></span>
  <span class="tgl_track">
    <span class="tgl_bgd"></span>
    <span class="tgl_bgd tgl_bgd-negative"></span>
  </span>
</span>
</label> <br> <br>
  <input type="submit" id="popUpYes" name="submit" value="Submit">
  </form>

  <div id="toastShow" class="toast show" >
    <div class="toast-header">

      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body" aria-hidden="true">
        Thank you for your message. It has been sent.
    </div>
  </div>
  <script>
        var toast = document.getElementById("toastShow");
        var popUpYes = document.getElementById("popUpYes");

        popUpYes.addEventListener("click",function(){
            toast.style.display="block";
        })
       
       
  </script>

  <?php
}

     $name_option = "wp_contact_name";
     $email_option = "wp_contact_email";
     $Number_option = "wp_contact_Number";
     $Message_option = "wp_contact_Message";
     $name_value =  0;
     $email_value = 0;
     $Number_value =  0;
     $Message_value =  0;
     if (isset($_POST["submit"]))
          {
          
            if (isset($_POST['name'])) {
                $name_value =  $_POST['name'];
            }

        
          if (isset($_POST['email'])) {
                
                $email_value =  $_POST['email'];
            }  
            if (isset($_POST['number'])) {
              $Number_value =  $_POST['number'];
            }  
        if (isset($_POST['message'])) {
                $Message_value =  $_POST['message'];
            }  
            
              update_option( $name_option, $name_value );
              update_option( $email_option, $email_value );
              update_option( $Number_option, $Number_value );
              update_option( $Message_option, $Message_value );

        }  

function return_value(){
   echo get_option( 'wp_message_value' );
}
        add_shortcode('form', 'return_value');  

        
        function checkbox($test){
if (get_option( $test ) == 1) {

    echo "checked";
}

        }

function myForm()


{
      $c = '';
      $c.='<h1 class="text-center">Contact Us</h1>';
      $c.='<form method="post">';
      if(get_option("wp_contact_name") == "1"){
        $c.='<label for="name">Name</label>';
        $c.= '<input type="text" name="name" placeholder="name" class="form-control"/>';
      }

      if(get_option("wp_contact_email") == "1")
    {
      $c.='<label for="email">Email</label>';
        $c.= '<input type="text" name ="email" placeholder="email" class="form-control"/>';
    }
    if(get_option("wp_contact_Number") == "1")
    {
      $c.='<label for="Phone">Phone Number</label>';
      $c.= '<input type="text" name="Phone" class="form-control" placeholder="Phone Number"/>';
    }
    if(get_option("wp_contact_Message") == "1")
    {
      $c.='<label for="message">Message</label>';
      $c.='<input type="text" name="message" class="form-control" placeholder="Enter your message"/>';
    }
    $c.= '</br><input type="submit" name="form-submit" value="Send Information" class="btn btn-primary">';
    $c.='</form>';
    return $c;
}
add_shortcode("form","myForm");

