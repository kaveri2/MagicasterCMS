<?php

class SessionAccess extends Access
{

	function SessionAccess($id = 0) {
		$this->id = $id;
	}
	
	public function grant($session)
	{
		$sql = "INSERT INTO " . DB::$table_prefix . "sessionAccess (sessionId, accessId, grantOrDeny) VALUES (" . $session->id . ", " . $this->id . ", 1) ON DUPLICATE KEY UPDATE grantOrDeny=1";
		DB::mysqli_query($sql);
		return DB::mysqli_affected_rows() > 0;
	}
	
	public function deny($session)
	{
		$sql = "INSERT INTO " . DB::$table_prefix . "sessionAccess (sessionId, accessId, grantOrDeny) VALUES (" . $session->id . ", " . $this->id . ", 0) ON DUPLICATE KEY UPDATE grantOrDeny=0";
		DB::mysqli_query($sql);
		return DB::mysqli_affected_rows() > 0;
	}
}