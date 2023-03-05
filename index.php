<?php
    require("db.php");
    require("correction.php");

    $error_loc = 'Location: http://corrstr/pages/404.php';

    
    if (isset($_POST['correct_value']) and $_POST['correct_value'] !== '')
    {
        $str = trim($_POST['correct_value']);
        print(charSelection($str));
    }
    else if (isset($_POST['check_value']) and $_POST['check_value'] !== '')
    {   
        $str = trim($_POST['check_value']);
        $conn = mysqli_connect(...$config);

        $query = "INSERT INTO correction(`id`, `text`) VALUES(NULL, '$str')";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
    
        print(charSelection($str));

    }
    else
    {
        header('Location: http://corrstr/pages/main.php');
    }
?>