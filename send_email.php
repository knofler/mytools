<?php

include 'mail_file.php';

if (isset($_POST['name'],$_FILES['file'])){
    
    $body=<<<BODY
    
    From: {$_POST['name']}
    
    Details:
        Name: {$_FILES['file']['name']}
        Size: {$_FILES['file']['size']}
        Type: {$_FILES['file']['type']} 
        
BODY;
    
    mail_file('ahmed.rumman@gmail.com','rumman@toolznappz.com','A file upload', '' ,$_FILES['file']);
}
?>



<!DOCTYPE html>

<html>
<head>
    <title>Send Email with attachments</title>
</head>

<body>
<div id=Mailbox">
    
    <form action="" method="post" enctype="multipart/form-data">
    <p>
        <label for="name">Recipient Name</label>
        <input type="text" name="name" id="name" />
    </p>
    <p>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" />
    </p>
    <p>
        <label for="file">File</label>
        <input type="file" name="file" id="file" />
    </p>
    <p>
        <input type="submit" value="Email File" />
    </p>
    
    
</form>
    
    
</div>



</body>
</html>
