<?php
    require("db.php");
    require("correction.php");

    $error_loc = 'Location: http://corrstr/pages/404.php';

    
    

    if (isset($_POST['value']) and $_POST['value'] !== '')
    {   
        $str = trim($_POST['value']);
        $conn = mysqli_connect(...$config);


        $sql_req = "INSERT INTO correction(`id`, `text`) VALUES(NULL, '$str')";
        
        $result = mysqli_query($conn, $sql_req);

        mysqli_close($conn);


        // echo $str;
    
        print(charSelection($str));

    } else {
        header('Location: http://corrstr/pages/main.php');
    }
?>