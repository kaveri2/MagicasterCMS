<?

function private_AccessCache_update()
{
	global $CONFIG;
	
	if (!isset($_SESSION['accessCache_update_time']) || time() - $_SESSION['accessCache_update_time'] > $CONFIG[__FUNCTION__]['interval']) {
		Core::updateAccessCache();
	}
}