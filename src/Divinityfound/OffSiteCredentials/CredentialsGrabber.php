<?php namespace Divinityfound\OffSiteCredentials;

	class CredentialsGrabber {
		public $response;
		private $site;
		private $creds;
		private $keys;

		public function __construct() {
			$this->site  = '';
			$this->creds = array();
			$this->keys  = array();
		}

		public function setSite($site) {
			$this->site = $site;
			return $this;
		}

		public function setCreds($array) {
			$this->creds = json_encode($array);
			return $this;
		}

		public function setKeys($array) {
			$this->keys = json_encode($array);
			return $this;
		}

		public function getKeys() {
			$data_string = json_encode(array('credentials' => $this->creds, 'keys' => $this->keys));
			$ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, $this->site); 
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			    'Content-Type: application/json',                                                                                
			    'Content-Length: ' . strlen($data_string))                                                                       
			);
            $response = curl_exec($ch);
            curl_close($ch); 
            $this->response = json_decode($response);
		}
	}