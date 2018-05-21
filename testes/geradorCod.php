<?php  
	echo "GERADOR DE CÓDIGOS <br>";
	$nmrs="";
	$letras="";
	for ($i=0; $i <10 ; $i++) { 
			$nmr=random_int(0, $i);
		for ($j=0; $j < 10; $j++) { 
		  	$nmr1=random_int(0, $j);
		   for ($h=0; $h < 10 ; $h++) { 
		 	$nmr2=random_int(0, $h);
		   }
		}
	}
	$caracteres="A B C D E F G H I J K L M N O P Q R S T U V W X Y Z";
	$arrayDeL=explode(" ", $caracteres);
	for ($i=0; $i < 10; $i++) { 
		$l=random_int(0, 25);
		$le=$arrayDeL[$l];
		for ($j=0; $j < 10 ; $j++) { 
			$l2=random_int(0, 25);
			$let=$arrayDeL[$j];
			for ($k=0; $k < 10 ; $k++) { 
				$l3=random_int(0, 25);
				$letr=$arrayDeL[$l3];
			}
			}
	}

	 $nmrs=$nmr.$nmr1.$nmr2;
	 $letras=$le.$let.$letr;
	 $cod=$nmrs."-".$letras; 
	 echo "<br>$cod";
	// for ($k=1; $k < 10 ; $k++) { 
	// 	$l=random_int(0, 26);
	// 	switch ($l) {
	// 		case 1:
	// 			$l="A";
	// 			break;
	// 		case 2:
	// 			$l="B";
	// 			break;
	// 		case 3:
	// 			$l="C";
	// 			break;
	// 		case 4:
	// 			$l="D";
	// 			break;
	// 		case 5:
	// 			$l="E";
	// 			break;
	// 		case 6:
	// 			$l="F";
	// 			break;
	// 		case 7:
	// 			$l="G";
	// 			break;
	// 		case 8:
	// 			$l="H";
	// 			break;
	// 		case 9:
	// 			$l="I";
	// 			break;
	// 		case 10:
	// 			$l="J";
	// 			break;
	// 		case 11:
	// 			$l="K";
	// 			break;
	// 		case 12:
	// 			$l="L";
	// 			break;
	// 		case 13:
	// 			$l="M";
	// 			break;
	// 		case 14:
	// 			$l="N";
	// 			break;
	// 		case 15:
	// 			$l="O";
	// 			break;
	// 		case 16:
	// 			$l="P";
	// 			break;
	// 		case 17:
	// 			$l="Q";
	// 			break;
	// 		case 18:
	// 			$l="R";
	// 			break;
	// 		case 19:
	// 			$l="S";
	// 			break;
	// 		case 20:
	// 			$l="T";
	// 			break;
	// 		case 21:
	// 			$l="U";
	// 			break;
	// 		case 22:
	// 			$l="V";
	// 			break;
	// 		case 23:
	// 			$l="W";
	// 			break;
	// 		case 24:
	// 			$l="X";
	// 			break;
	// 		case 25:
	// 			$l="Y";
	// 			break;
	// 		case 26:
	// 			$l="Z";
	// 			break;
	// 		default:
	// 			# code...
	// 			break;
	// 	}
	// 	for ($m=0; $m < 10 ; $m++) { 
	// 		$e=random_int(0, 24);
	// 			switch ($e) {
	// 			case 1:
	// 				$e="A";
	// 				break;
	// 			case 2:
	// 				$e="B";
	// 				break;
	// 			case 3:
	// 				$e="C";
	// 				break;
	// 			case 4:
	// 				$e="D";
	// 				break;
	// 			case 5:
	// 				$e="E";
	// 				break;
	// 			case 6:
	// 				$e="F";
	// 				break;
	// 			case 7:
	// 				$e="G";
	// 				break;
	// 			case 8:
	// 				$e="H";
	// 				break;
	// 			case 9:
	// 				$e="I";
	// 				break;
	// 			case 10:
	// 				$e="J";
	// 				break;
	// 			case 11:
	// 				$e="K";
	// 				break;
	// 			case 12:
	// 				$e="L";
	// 				break;
	// 			case 13:
	// 				$e="M";
	// 				break;
	// 			case 14:
	// 				$e="N";
	// 				break;
	// 			case 15:
	// 				$e="O";
	// 				break;
	// 			case 16:
	// 				$e="P";
	// 				break;
	// 			case 17:
	// 				$e="Q";
	// 				break;
	// 			case 18:
	// 				$e="R";
	// 				break;
	// 			case 19:
	// 				$e="S";
	// 				break;
	// 			case 20:
	// 				$e="T";
	// 				break;
	// 			case 21:
	// 				$e="U";
	// 				break;
	// 			case 22:
	// 				$e="V";
	// 				break;
	// 			case 23:
	// 				$e="W";
	// 				break;
	// 			case 24:
	// 				$e="X";
	// 				break;
	// 			case 25:
	// 				$e="Y";
	// 				break;
	// 			case 26:
	// 				$e="Z";
	// 				break;
	// 			default:
	// 				# code...
	// 				break;
	// 		}
	// 	}
	// }
	// $cod=$nmrs=$nmr.$nmr1.$nmr2."-".$l.$e.$nmr; 
	// echo "$cod";
?>