<?php

$from="Rumman Ahmed";
$email="rumman.ahmed@mq.edu.au";
$from_field="$from < $email>";
$body=<<<BODY
This is the Body of the Email.
So write whatever you like.

Builing a new email service.

try <p>Tag see it can see that or not </p>

BODY;

$boundary=md5(rand());
    
    $headers=array(
    'MIME-Version: 1.0',
    'Content-Type: multipart/mixed; boundary: \"{$boundary}\"',
    "FROM:{$from_field}"
    );
    
    $message=array(
    "--{$boundary}",
    'Content-Type: text/plain',
    'Content-Transfer-Encoding: 7bit',
    '',
    chunk_split($body),
    "--{$boundary}",
    "Content-Type: {$file['type']}; name=\"{$file['name']}\"",
    "Content-Disposition: attachment; filename=\'{$file['name']}\"",
    "Content-Transfer-Encoding:base64",
    '',
    chunk_split(base64_encode(file_get_contents($file['tmp_name']))),
    "--{$boundary}"
    );

    //mail($to,$from,implode("\r\n",$message),implode("\r\n",$headers));
    

if(mail('ahmed.rumman@gmail.com','Hello Complicated Mail Subject',implode("\r\n",$message),implode("\r\n",$headers))){
    echo "Message successfully sent";
}else{
    echo "Message didn't through.." ;
};


?>