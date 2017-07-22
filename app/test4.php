<?php
 
    $key = 'MIHNMA0GCSqGSIb3DQEBAQUAA4G7ADCBtwKBrwC2+Tt2hLusSCUi6RVnFMitEai3rdwL2e42LTLrLpIS5ENdRfDd3XFlITZezfUygPxGp1txeOQUznuBDVw0LjKshQLXohJhcGUw4JMdxqKdKWyC6urPZDVkWCCdMk2VqIaOHJA8UgV7kGWMxG1PoFCVN3WwUcouNmYbTDEtKT+LXwtzlf4yg5GvPaDz8P4ycsN54q5ZvQjx4cNlZj0MDFGt6kKru/23l7dwqShFXkkCAwEAAQ==';
	$id = ('c705243a6d6c4bd7ae56b19e45e375f6');
	$json = array();
    include_once '../app/utils.php';
    $db = new Security();
    $res = $db->encrypt($key,$id);
	//$input = 'S+W2Arz0Ns+hoflWV++WexgcXl+3RCw3851Md0bfmGNoJJ+Vrbcz8svq0grkVejDBalYy+GOqnQKXNlJi/aVWVhlllumeMJZQSId9DrfCpX7HAUv6oK81ZBYN1rJJdJDs84IbTWwzOM5s+fLyAbyu4BJPa/lcak/y8sEKdY8xxfaEdKkgzPpgPqNWKukwG/MuPA1ZF/Svgv0PxFeQL8QZ04gciIThzOYb5MKoqwKV95Rez/tnxNy/mGSK5bi1zGsE844+YYlypAjZdrW+xc+7Weg';
	//$res = $db->decrypt($res,$id);
	
	echo $res;
?>