<?php
    class easyContactForm extends Plugin {

        public function init(){
            $this->dbFields = array(
        'sendermsg'=> '',
        'emailmsg'=> '',
        'subjectmsg'=> '',
        'successmsg'=> '',
        'errormsg'=> '',
        
        'fromlabel'=> '',
        'emaillabel'=> '',
        'phonelabel'=> '',
        'contentlabel'=> '',

        'captcha'=>'',
        'domaincode'=>'',
        'secretcode'=>'',
            );
        }
        

    public function form(){

        $html = '
        <br>
        <h3 >E-mail settings</h3>
        <hr>

        <div class="bg-light border p-3">

        <p>Sender:</p>
        <input type="email" class="form-control" name="sendermsg" value="'.$this->getValue('sendermsg').'"placeholder="put your email" value=""/>
        <br>
        <p>Email address where messages will be sent (example@mail.com, example2@mail.com) </p>
        <input type="email" class="form-control" name="emailmsg" value="'.$this->getValue('emailmsg').'"/>
        <br>

        <p>Message Subject from website </p>
        <input type="text" placeholder="Subject" name="subjectmsg" value="'.$this->getValue('subjectmsg').'"/>
        <br>
        <p>Message sent successfully text</p>
        <input type="text" name="successmsg" value="'.$this->getValue('successmsg').'"/>
        <br>
        <p>Message not sent text</p>
        <input type="text" name="errormsg" value="'.$this->getValue('errormsg').'"/>
      

        </div>
        <br> <br>
        <h3>Labels inside email</h3>
     <hr>
       <div class="bg-light border p-3">

       <p>"From" Label</p>
       <input type="text" name="fromlabel" value="'.$this->getValue('fromlabel').'"/>
       <br>
       <p>"E-mail" Label</p>
       <input type="text"  name="emaillabel" value="'.$this->getValue('emaillabel').'"/>
       <br>
       <p>"Phone" Label</p>
       <input type="text"  name="phonelabel" value="'.$this->getValue('phonelabel').'"/>
       <br>
       <p>"Content" Label</p>
       <input type="text"  name="contentlabel" value="'.$this->getValue('contentlabel').'"/>


       </div>

       <br><br>
       <h3>Captcha info</h3>
       <hr>

       
       <div class="bg-light border p-3">

       <p>get the code from <a target="_blank" href="https://www.google.com/recaptcha/admin/create">Google Recaptcha</a> this plugin uses recaptcha v2 (i am not a robot)</p>
<br>
       <p>domain code from google</p>
       <input type="text" name="domaincode" value="'.$this->getValue('domaincode').'">
<br>
       <p>secret code from google</p>
       <input type="text" name="secretcode" value="'.$this->getValue('secretcode').'">
       <br>
       <p>Captcha type:</p>
       <select name="captcha">

       <option value="default"  '.($this->getValue('captcha')==="default"?"selected":"").'>Default Captcha</option>
       <option value="google" '.($this->getValue('captcha')==="google"?"selected":"").'>Google reCaptcha v2</option>

       </select>

       </div>

        <div class="bg-light col-md-12 my-3 py-3 d-block border">
      
		<p>If you want support my work, and you want saw new plugins:) </p>

		<a href="https://www.paypal.com/donate/?hosted_button_id=TW6PXVCTM5A72">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"  />
		</a>
		
		</div> ';


        return $html;
		
	}



    public function adminBodyEnd() {

        include($this->phpPath().'php/formtinymce.php');
 
    }






    public function beforeSiteLoad(){

        	
        header( "Content-Type: text/html; charset=utf-8" );
    
    	if (isset($_POST["submit"])) {

            
    $captchacontent = $this->getValue('captcha');

    		$name = $_POST["name"];
    		$tel = $_POST["tel"];
    		$email = $_POST["email"];
    		$message = $_POST["message"];
            if($captchacontent=='default'){
    		 $hiddencaptcha = $_POST['hiddencaptcha'];
			 $captcha = $_POST['captcha'];
            };
			$to = $this->getValue('emailmsg');
		$fromer = $this->getValue('sendermsg');
    
    $headers = "From: ".$fromer." \r\n";
    $headers .= "Reply-To: ". strip_tags($_POST["email"]) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    		$subject = $this->getValue('subjectmsg');
			$fromLabel = $this->getValue('fromlabel');
			$fromLabelmail = $this->getValue('emaillabel');
			$fromLabelphone = $this->getValue('phonelabel');
			$fromLabelcontent = $this->getValue('contentlabel');
 


			// Program to display URL of current page. 
  
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
$link = "https"; 
else
$link = "http"; 

// Here append the common URL characters. 
$link .= "://"; 

// Append the host(domain name, ip) to the URL. 
$link .= $_SERVER['HTTP_HOST']; 

// Append the requested resource location to the URL 
$link .= $_SERVER['REQUEST_URI']; 
  

 
			

    		$body ="
    
    <div style='max-width:960px;margin:0 auto;'>
			<div style='width:100%;padding:10px;border-radius:5px;background:#eae7d9;border:solid 1px #442727'>
    		<b>$fromLabel</b>$name
    		</div>
			<br />
						<div style='width:100%;padding:10px;border-radius:5px;background:#eae7d9;border:solid 1px #442727'>

    <b>$fromLabelmail </b> $email
    </div>
	<br />
<div style='width:100%;padding:10px;border-radius:5px;background:#eae7d9;border:solid 1px #442727'>
    <b>$fromLabelphone </b> $tel
    </div>
    <br />
    <div style='width:100%;padding:10px;border-radius:5px;background:#eae7d9;border:solid 1px #442727'>

   <b> $fromLabelcontent </b> $message
	</div>
	

	<br>

	<div style='width:100%;padding:10px;border-radius:5px;background:#eae7d9;border:solid 1px #442727'>

<b>URL</b> $link
	</div>
    
    </div>
    ";




    if($captchacontent=='google'){;

        if (isset($_POST['g-recaptcha-response']) &&! empty($_POST['g-recaptcha-response'])){
            $secfile = $this->getValue('secretcode');
            $secret = $secfile;
            $replaceResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
             $responseData =json_decode($replaceResponse);
              if($responseData-> success) {
                 
                if (mail($to, $subject, $body,$headers)){
echo'<div class="easyContactSend" style="position: fixed;
bottom: 20px;
left: 5%;
padding: 10px;
background: #506d2a;
width: 90%;
text-align: center;
color: #fff;
box-sizing: border-box;
border-radius: 5px;
z-index: 10000;">'.$this->getValue('successmsg').'</div>';
};
            
            }else{
                echo'<div class="easyContactSendNot" style="position: fixed;
                bottom: 20px;
                left: 5%;
                padding: 10px;
                background: red;
                width: 90%;
                text-align: center;
                color: #fff;
                box-sizing: border-box;
                border-radius: 5px;
                z-index: 10000;">'.$this->getValue('errormsg').'</div>';
             }
        };
    
        
    };



    if($captchacontent=='default'){

    if (sha1($captcha) !== $hiddencaptcha) {
        echo'<div class="easyContactSendNot" style="position: fixed;
        bottom: 20px;
        left: 5%;
        padding: 10px;
        background: red;
        width: 90%;
        text-align: center;
        color: #fff;
        box-sizing: border-box;
        border-radius: 5px;
        z-index: 10000;">'.$this->getValue('errormsg').'</div>';
    } else {
if (mail($to, $subject, $body,$headers)){
    echo'<div class="easyContactSend" style="position: fixed;
    bottom: 20px;
    left: 5%;
    padding: 10px;
    background: #506d2a;
    width: 90%;
    text-align: center;
    color: #fff;
    box-sizing: border-box;
    border-radius: 5px;
    z-index: 10000;">'.$this->getValue('successmsg').'</div>';
};
};

};		 

    };

    }


 public function siteBodyEnd(){
 
    $captcha = $this->getValue('captcha');
    
        if($captcha=='google'){
            include($this->phpPath().'php/googlecaptcha.php');
        };
    
        if($captcha=='default'){
            include($this->phpPath().'php/captcha.php');
        }

}

}

?>