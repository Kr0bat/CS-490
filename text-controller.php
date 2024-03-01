<?php

function richText($msg){

    $msg = bold($msg);
    $msg = italics($msg);
    $msg = underline($msg);

    return $msg;
}


function bold($msg){
    for ($i = 0; $i < strlen($msg) - 1; $i++){
		$first = $msg[$i];
		if ($first == '~'){
			for ($j = $i+1; $j < strlen($msg); $j++){
				$second = $msg[$j];
				if ($second == '~'){ //j is now 6 off
					$msg = substr_replace($msg, "<b>", $i, 1);
					$msg = substr_replace($msg, "</b>", $j+2, 1);
                    break;
                }
            }
        }
    }
    return $msg;
}

function italics($msg){
    for ($i = 0; $i < strlen($msg) - 1; $i++){
		$first = $msg[$i];
		if ($first == '*'){
			for ($j = $i+1; $j < strlen($msg); $j++){
				$second = $msg[$j];
				if ($second == '*'){ //j is now 6 off
					$msg = substr_replace($msg, "<i>", $i, 1);
					$msg = substr_replace($msg, "</i>", $j+2, 1);
                    break;
                }
            }
        }
    }
    return $msg;
}

function underline($msg){
    for ($i = 0; $i < strlen($msg) - 1; $i++){
		$first = $msg[$i];
		if ($first == '_'){
			for ($j = $i+1; $j < strlen($msg); $j++){
				$second = $msg[$j];
				if ($second == '_'){ //j is now 6 off
					$msg = substr_replace($msg, "<u>", $i, 1);
					$msg = substr_replace($msg, "</u>", $j+2, 1);
                    break;
                }
            }
        }
    }
    return $msg;
}

?>