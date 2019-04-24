<?php
function array_to_xml( $data, &$xml_data ) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $key = 'item'.$key;
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
        	if( is_numeric($key) ){
                $key = 'item'.$key;
            }
            $xml_data->addChild($key, htmlspecialchars($value));
        }
     }
}

$data = array(
	"nome" => "Asafe",
	"sobrenome" => "Brasil Yanez Marques",
	"idade" => 21,
	"Linguagens" => array(
		"PHP",
		"JAVA",
		"C#",
		"JavaScript"
	)
);

$xml_data = new SimpleXMLElement('<data/>');

array_to_xml($data, $xml_data);

$result = $xml_data->asXML();
echo $result;
?>