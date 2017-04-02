<?php
	/**
	* Class apiConnection
	* By Menno van den Ende
	*/
	class apiConnection
	{
		function __construct() {
			
		}

		public function get($endpoint, $id = "", $parameters = []) {
			$options = array(
				'http' => array(
					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
					'method'  => 'GET',
					'content' => http_build_query($parameters)
				)
			);
			return $this->doRequest($endpoint, $id, $options);
		}

		public function post($endpoint, $id = "", $parameters = []) {
			$options = array(
				'http' => array(
					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
					'method'  => 'POST',
					'content' => http_build_query($parameters)
				)
			);
			return $this->doRequest($endpoint, $id, $options);
		}

		public function delete($endpoint, $id = "", $parameters = []) {
			$options = array(
				'http' => array(
					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
					'method'  => 'GET',
					'content' => http_build_query($parameters)
				)
			);
			return $this->doRequest($endpoint, $id, $options);
		}

		private function doRequest($endpoint, $id, $options) {
			$context  = stream_context_create($options);
			$resultjson = file_get_contents(BASE_API_URL.$endpoint."/".$id, false, $context);
			var_dump(BASE_API_URL.$endpoint."/".$id);
			$result = json_decode($resultjson);
			return $result;
		}
	}
?>