<?php
function mail_file($to,$from,$subject,$body,$file){
    
    $boundary=md5(rand());
    
    $headers=array(
    'MIME-Version: 1.0',
    "Content-Type: multipart/mixed; boundary: \"{$boundary}\"",
    "FROM: {$from}"
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
    
    mail($to,$from,implode("\r\n",$message),implode("\r\n",$headers));
}
?>

