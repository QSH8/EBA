<?php
    require("../db.php");
    require("../correction.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/style.css" type="text/css" rel="stylesheet" >
    <script src="../script/jquery-min.js"></script>
    <title>StringCorrection</title>
</head>
<body>
    <main class="wrapper">
        <form action="index.php" class="form" method="post">
            <p style="padding-bottom:10px" type="text" class="form__title">
                Корректировка ввода
            </p>
            <textarea
                name='textarea'
                id='textarea'
                class='form__textarea'
                placeholder='Введите свою строку..'
                ></textarea>
            <button type="submit" class="form__submit">Проверить</button>
        </form>
        <div class="form-response">
            <p class="form-response__query">___________</p>
            <?php
                $conn = mysqli_connect(...$config);

                $query = "SELECT text FROM correction";
    

                $result = mysqli_query($conn, $query);
                $id = 1;
                if ($result !== NULL) {
                    foreach ($result as $row) {
                        
                        echo "<p>".$id.".".charSelection( $row['text'] )."</p>";
                        $id++;
                    }
                }
                
            ?>
        </div>
    </main>
    <script src="../script/script.js" ></script>    
</body>
</html>