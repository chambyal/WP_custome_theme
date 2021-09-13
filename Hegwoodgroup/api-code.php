<?php
/* Send Data to mailchimp */
add_action("wpcf7_before_send_mail", "send_mailchimp_apis");
function send_mailchimp_apis($contact_form) {
    $wpcf7 = WPCF7_ContactForm::get_current();
    $submission = WPCF7_Submission::get_instance();
    if($submission)
    {
	    $data = $submission->get_posted_data();
		$formid = $data['_wpcf7'];
		if (($formid == 43803) || ($formid == 43804)) 
        {
            $api_key = '899e56c14e054171f0745bcc4e4043b9-us17';
            $list_id = '5628baa14e';
            $status = 'subscribed';
            $email = $_POST["email-49"];
            $fname = $_POST["text-876"];
            $lname = $_POST["text-600"]; 
            $sub = array(
                'apikey' => $api_key,
                'email_address' => $email,
                'status' => 'subscribed',
             
    		   'merge_fields' => array(
                    'FNAME' => $fname,
                    'LNAME' => $lname,
                   // 'EMAIL' => $email,  
                ), 
            );
            $ch = curl_init('https://us17.api.mailchimp.com/3.0/lists/' . $list_id . '/members/');
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Authorization: apikey ' . $api_key,
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($sub)
            ));  
            $response = curl_exec($ch);
    		  
    	    $status = "undefined";
            $msg = "unknown error occurred";
            $myArray = json_decode($response, true);

            foreach ($myArray as $key => $value) {
                if ($key == "status") {
                    $status = $value;
                } else if ($key == "title") { 
                    $msg = $value;
                }
            }  
        } 
        else if ($formid == 53270){
            $api_key = '6e01af1b4b869c36bdd4a78dd5b7b000-us17';
            $list_id = 'd8ccf2ccff';
            $status = 'subscribed';
            $email = $_POST["email-49"];
            $fname = $_POST["text-876"];
            $lname = $_POST["lastName"]; 
            $phone = $_POST["PhoneNumber"]; 
            $newclient = $_POST["menu-420"];
            $sub = array(
                'apikey' => $api_key,
                'email_address' => $email,
                'status' => 'subscribed',
             
               'merge_fields' => array(
                    'FNAME' => $fname,
                    'LNAME' => $lname,
                    'PHONE' => $phone,
                    'NEWCLIENT' => $newclient
                   // 'EMAIL' => $email,  
                ), 
            );
            $ch = curl_init('https://us17.api.mailchimp.com/3.0/lists/' . $list_id . '/members/');
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Authorization: apikey ' . $api_key,
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($sub)
            ));  
            $response = curl_exec($ch);
              
            $status = "undefined";
            $msg = "unknown error occurred";
            $myArray = json_decode($response, true);

            foreach ($myArray as $key => $value) {
                if ($key == "status") {
                    $status = $value;
                } else if ($key == "title") { 
                    $msg = $value;
                }
            } 
        }  
	}
} 
 ?>



<?php
/* String & space replace  */
$jls = get_sub_field('joblocationstate');
$newjls = str_replace(' ', '', $jls);
?>





<?php
// Get Data
// Initiate curl session in a variable (resource)
$curl = curl_init();
curl_setopt_array($curl, array(
 CURLOPT_URL => "https://public-api.workstream.us/positions",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "GET",
 CURLOPT_HTTPHEADER => array(
   "authorization: Bearer EzvLsdZ-Qi1CR9WYAplpqAQ-Bg3ViYER7Jwh91LEvOw",
   "cache-control: no-cache",
   "client_id: 0Z8ioPO13Phpa-hbRC9SbgbCZDA-7W-Q8C_gQ8xR6v4",
   "client_secret: nf711ojDKrKFENwZ2VeE6hGuRmSizzsxoi56eDY1FFA",
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
 echo "cURL Error #:" . $err;
} 
$data = json_decode($response, TRUE);
// echo  '<pre>';
// print_r($data);
// echo '</pre>';
?>
<div class="container">  
<?php 
$w = 1;
foreach($data["positions"] as $listdata) {  
?> 
<li class="all">
   <div class="joblist">
<span class="jobtitle"> <?php echo $listdata['title']; ?> 
        <span><?php // echo $joblocation; ?></span>
    </span>
                                     
        <span class="jobtyp"> 
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/careers/suitcase.svg" alt="hapigig"/>  
        <span class="job_type"> Job Type.</span> <?php echo $listdata['job_type']; ?>
        </span>
  <span class="jobtyp   rateofpay"> <span class="job_type"> Rate of Pay </span>  
  <?php echo $listdata['pay_amount']; ?>  </span>  
    <a href="javascript:void(0)" class="viewjobbtn"> Apply For Job <img src="<?php echo get_stylesheet_directory_uri() ?>/images/careers/right-arrow.svg" alt="<?php echo $listdata['title']; ?>"/>  </a>
</div>
    <div class="jobdescription">
    <?php echo $listdata["overview"]; ?> 
     </div>
 
</li>   
<?php 
$w ++ ;
} 
?>
	

