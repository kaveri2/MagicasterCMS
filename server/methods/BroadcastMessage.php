<?php

	function public_BroadcastMessage_send($xml) {

		$channel = DB::mysqli_real_escape_string($xml->channel);
		$data = "";
		foreach ($xml->data->children() as $child) {
			$data = $data . $child->asXML();
		}
		$data = DB::mysqli_real_escape_string($data);
		
		$sql = "INSERT INTO " . DB::$table_prefix . "broadcastMessage (channel, data) VALUES('$channel', '$data')";
		$result = DB::mysqli_query($sql);
	}
	
	function public_BroadcastMessage_receive($xml) {
	
		$fromId = 0 + $xml->fromId;
		$channel = DB::mysqli_real_escape_string($xml->channel);
		
		$s = "";
		
		if ($fromId) {
			$s = "";
			$sql = "SELECT id, data FROM " . DB::$table_prefix . "broadcastMessage WHERE id>=$fromId AND channel='$channel' ORDER BY id ASC";
			$result = DB::mysqli_query($sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$s = $s . "<message><id>" . $row['id'] . "</id><data>" . $row['data'] . "</data></message>";
			}
		}
		
		$sql = "SELECT MAX(id) as maxId FROM " . DB::$table_prefix . "broadcastMessage";
		$result = DB::mysqli_query($sql);
		$row = mysqli_fetch_assoc($result);
		if ($row) {
			$nextId = (1 + $row['maxId']);
		} else {
			$nextId = 1;
		}
	
		$s = $s . "<nextId>" . $nextId . "</nextId>";
		
		return $s;	
	}