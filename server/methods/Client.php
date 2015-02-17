<?

// private

function private_Client_calculateAccessCache() {
	if (Core::$session->client) {
		return Core::$session->client->calculateAccessCache();
	}
}

// public

function public_Client_set($xml)
{
	$name = "" . $xml->name;
	$client = new Client();
	$client->name = $name;
	$client->loadUsingName();
	
	Core::$session->client = $client;
	
	if ($name == "app.ios.1.1") {
		$capabilities = "" . $xml->capabilities;
		if ($capabilities) {
			$a = explode("&", $capabilities);
			foreach ($a as $aa) {
				$b = explode("=", $aa, 2);
				$s = $s . print_r($b, true);
				if ($b[0]=="OS") {
					if (stristr($b[1], "iPad1") || stristr($b[1], "iPhone2") || stristr($b[1], "iPhone3")) {
						$access = new SessionAccess(43);
						$access->grant(Core::$session);			
					}
				}
			}
		}
	}

	Core::updateAccessCache();
	
	Core::addCounter("Client.set");
}

