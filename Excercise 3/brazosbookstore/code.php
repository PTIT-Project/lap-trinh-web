<?php 
    function createRandomPassword() { 

        $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 
    
        while ($i <= 7) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 
    
        return $pass; 
    }

    $hero = createRandomPassword();
    echo $hero.'                    '.md5($hero);
    $md5 = md5($hero);
    if($md5 === md5($hero)) {
        echo 'Giống nhau';
    }
?>