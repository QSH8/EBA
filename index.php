<?php
    require("db.php");

    $error_loc = 'Location: http://corrstr/pages/404.php';
    function langDeterminate ( $chars_arr )
    {  // Понимаем, на какой язык будем менять 

        $en_match_arr =
        [
            'a','A','B','c','C','e','E','H',
            'k','K','M','o','O','p','P','T',
            'x','X','y'
        ];
        $ru_match_arr =
        [
            'а','А','В','е','Е','к','К','М',
            'Н','о','О','р','Р','с','С','Т',
            'у','х','Х'
        ];

        $en = 0;
        $ru = 0;

        $en_index_arr = []; // Мне кажется, с массивом индексов быстрее
        $ru_index_arr = []; // будет пробег по введённой строке потом при замене
                            // Заранее знаем, где светить будем.
        for ($i=0; $i < count($chars_arr); $i++)
        { 
            if (ord($chars_arr[$i]) < 208)
            {
                $en++;
                array_push($en_index_arr, $i);
            } else
            {
                $ru++;
                array_push($ru_index_arr, $i);

            }
        }

        if ($ru >= $en) return ['ru', $en_index_arr, $en_match_arr];
        
        else return ['en', $ru_index_arr, $ru_match_arr];
    } 
    
    function charSelection( $chars_arr )
    { // "Спаним" необходимые символы

        [$lang, $index_arr, $match_arr] = langDeterminate($chars_arr);
        // print_r($index_arr);
        // print_r($match_arr);
        for ($i=0; $i < count($chars_arr); $i++)
        {
            $elem = $chars_arr[$i];

            if (in_array($i, $index_arr))
            {
                if (in_array($elem, $match_arr))
                {
                    $chars_arr[$i] = str_replace(
                        $elem,
                        "<span>".$elem."</span>",
                        $elem
                    );
                }
            }
        }

        return $chars_arr;
    }


    $str = trim($_POST['value']);
    $exploded_str = mb_str_split($str);

    if (isset($str) and $str !== '')
    {
        $conn = mysqli_connect(...$config);
        if (!$conn) header($error_loc);
        
        $sql_req = "INSERT INTO correction(`id`, `text`) VALUES(NULL, '$str')";
        
        $result = mysqli_query($conn, $sql_req);

        mysqli_close($conn);


        // echo $str;
    
        print(implode(charSelection($exploded_str)));

    }
?>