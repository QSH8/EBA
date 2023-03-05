<?php
    function langDeterminate ( $str )
    {  // Понимаем, на какой язык будем менять 
        $chars_arr = mb_str_split($str);
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
        
    function charSelection( $str )
    { // "Спаним" необходимые символы
        $chars_arr = mb_str_split($str);
        [$lang, $index_arr, $match_arr] = langDeterminate($str);
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

        return implode($chars_arr);
    }
?>