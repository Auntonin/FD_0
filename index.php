<?php require_once("Condb.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/dist/css/bootstrap.min.css">    
</head>
<body>
    <?php require_once("menu.php")?>
   <div class="container">
   <!-- <button onclick="return confirm('Are you sure?'); saveandsubmit(event);">adasa</button> -->
   <form onsubmit="return confirm('Do you really want to submit the form?');">

   <script>
function validate(form) {

    // validation code here ...


    if(!valid) {
        alert('Please correct the errors in the form!');
        return false;
    }
    else {
        return confirm('Do you really want to submit the form?');
    }
}
</script>
<form onsubmit="return validate(this);">
   </div>
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->
 <script src="Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
   <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- <script src="Bootstrap\js\src\dropdown.js"></script> -->
   
</body>
</html>