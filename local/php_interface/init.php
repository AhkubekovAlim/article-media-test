<?php

// Функция трассировки
function dump($var, $varDump = false, $return = false){
    static $dumpCnt;

    if(is_null($dumpCnt)){
        $dumpCnt = 0;
    }
    ob_start();

    echo '<p>';
    $style = "
			border: 1px solid #696969;
			background: #eee;
			border-radius: 3px;
			font-size: 14px;
			font-family: calibri, arial, sans-serif;
			padding: 20px;
			";
    echo '<b>DUMP #'.$dumpCnt.':</b> ';
    echo '<pre style="'.$style.'">';
    if($varDump){
        var_dump($var);
    }else{
        print_r($var);
    }
    echo '</pre>';
    echo '</p>';

    $cnt = ob_get_contents();
    ob_end_clean();
    $dumpCnt++;
    if($return){
        return $cnt;
    }else{
        echo $cnt;
    }
    return true;
}

function cdump($var){
    echo "<script>";
    echo "console.log(".json_encode($var).");";
    echo "</script>";
}