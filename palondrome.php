<?php
//http://localhost/journey/palondrome.php?number=1111
function check_palondrome($number){
    $reverce_number = "";
    for ($i=strlen($number)-1; $i >= 0; $i--) { 
        $reverce_number .= $number[$i];
    }
    if($number == $reverce_number){
        return "It's a palondrome number ";
    }else{
        return "No, It's not a palondrome number ";
    }    
}

if(isset($_GET['number'])){
    if(strlen($_GET['number']) > 0){
        $number = $_GET['number'];
        $is_palondrome = check_palondrome($number);
        $response = [
            "states" => "1",
            "message" => $is_palondrome
        ];
        echo  json_encode($response);

    }else{
        $response = [
            "states" => "0",
            "message" => "please enter a valid number"
        ];
        echo  json_encode($response);
    }
}














