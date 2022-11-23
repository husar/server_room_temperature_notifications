<?php
	class RmsXMLReader
	{
		public function getRmsTemperature(){
            
            $xml=simplexml_load_file("http://rms.mkem.sk/values.xml") or die("Error: Cannot create object");
        
            return $xml->SenSet->Entry->Value;
                
            
        }
        
        public function getRms2Temperature(){
            
            
            $xml=simplexml_load_string($this->loginToRms2());
            

            return $xml->sns['val'];
 
        }
        
        private function loginToRms2(){
            $username = 'user';
            $password = '';

            $context = stream_context_create(array(
                    'http' => array(
                        'header'  => "Authorization: Basic " . base64_encode("$username:$password")
                    )
                )
            );
            $data = file_get_contents("http://rms2.mkem.sk/fresh.xml", false, $context);
            return $data;
        }
        
	}
?>
 