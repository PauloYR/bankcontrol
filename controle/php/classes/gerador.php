<?php  
	class Gerador{
		public function geradorDeCodigos(){
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
					$let=$arrayDeL[$l2];
					for ($k=0; $k < 10 ; $k++) { 
						$l3=random_int(0, 25);
						$letr=$arrayDeL[$l3];
					}
					}
			}
			 $nmrs=$nmr.$nmr1.$nmr2;
			 $letras=$le.$let.$letr;
			 $cod=$nmrs."-".$letras;
			 return $cod; 
		}
	}
?>