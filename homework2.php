<?php
    $errname=$errclass=$errmath=$errphysic=$errchemis=$errgender="";
    $name=$class=$math=$physic=$chemis=$gender=""; 

   if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] =="POST") {
        if (empty($_POST['name'])) {
            $errname= "name can not be empty!";
        }else{
            $name=$_POST['name'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
                $errname= "Name must be letters and space only!";
            }
        }
        if (empty($_POST['class'])) {
            $errclass= "class can not be empty!";
        }else{
            $class=$_POST['class'];
            if (!preg_match('/(.*[A-Z].*)[A-Za-z0-9]{5}/', $class)) {
                $errclass= "Class shouldn't include lower case and at least 5 digits!";
            }
        }

        if (empty($_POST['math'])) {
            $errmath= "math can not be empty!";            
        }else{
            $math=$_POST['math'];
            if (!preg_match('/^[0-9]+$/', $math)) {
                $errclass= "only number here!";
            }
        }
        if (empty($_POST['physic'])) {
            $errphysic= "physic can not be empty!";
        }else{
            $physic=$_POST['physic'];
            if (!preg_match('/^[0-9]+$/', $physic)) {
                $errclass= "only number here!";
            }
        }
         if (empty($_POST['chemis'])) {
            $errphysic= "chemis can not be empty!";
        }else{
            $chemis=$_POST['chemis'];
            if (!preg_match('/^[0-9]+$/', $chemis)) {
                $errclass= "only number here!";
            }
        }
        if (empty($_POST['gender'])) {
            $errgender= "select your gender!";
        }else{
            $gender=$_POST['gender'];
        }

   }
   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Form test</title>
    <style type="text/css">
        .error{
            color: indianred;
        }

    </style>
</head>
<body >
    <form action="/PHPtest/formtest.php" method="post">
    <div>
        <label>Name: </label>
        <input type="text" name="name">
        <span class="error"> <?php echo $errname ?></span>
    </div>

    <div>
        <label>Class: </label>
        <input type="text" name="class">
         <span class="error"> <?php echo $errclass ?></span>
    </div>
    <div>
         <label>Toan: </label>
        <input type="text" name="math">
         <span class="error"> <?php echo $errmath ?></span>
    </div>
    <div>
        <label>Ly: </label>
        <input type="text" name="physic">
         <span class="error"> <?php echo $errphysic ?></span>
    </div>
    <div>
        <label>Hoa: </label>
        <input type="text" name="chemis">
         <span class="error"> <?php echo $errchemis ?></span>
    </div>
    <div>   
        <label>Gender: </label>
        <input type="radio" name="Gender" value="Male"> <span> Male</span>
        <input type="radio" name="Gender" value="Female"> <span> Female</span>
        <input type="radio" name="Gender" value="Other"> <span> Other</span>
         <span class="error"> <?php echo $errgender ?></span>
    </div>
     
    <button onsubmit="">Submit</button>

</form>
</body>
</html>