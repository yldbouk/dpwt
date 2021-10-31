<?php 

if(isset($_POST['feedback-submit'])){
  if (empty($_POST['name']) || empty($_POST['type']) || empty($_POST['feedback'])) { header('Location: /contact.php'); exit(); }
  
  $webhookurl = "https://discordapp.com/api/webhooks/685706427922251807/wXuBIF6JBFWPmfn-laKtlFH54NWV-vTMTUPSPL1ePp_0iwrbNaxlQ44XRUY33fiNmxtv";
  
  if(isset($_POST['username']))
    $msg = '**New Feedback** 
Name: '.$_POST['name'].' 
Username: '.$_POST['username'].'
Type: '.$_POST['type'].' 
```'.$_POST['feedback'].'```';
  else
  $msg = '**New Feedback** 
Name: '.$_POST['name'].' 
Type: '.$_POST['type'].' 
```'.$_POST['feedback'].'```';

  
  $json_data = array ('content'=>"$msg");
  $make_json = json_encode($json_data);
  $ch = curl_init( $webhookurl );
  curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
  curl_setopt( $ch, CURLOPT_POST, 1);
  curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt( $ch, CURLOPT_HEADER, 0);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
  
  $response = curl_exec( $ch );
  header('Location: /contact.php?result=success'); 
  
} else { header('Location: /contact.php'); exit(); }
