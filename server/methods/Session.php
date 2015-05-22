<?php

// private

function private_Session_calculateAccessCache() 
{	
	return Core::$session->calculateAccessCache();
}

// public

function public_Session_grantAccess($xml) 
{	
	$id = 0 + $xml->id;
	$check = "" . $xml->check;
	
	$sessionAccess = new SessionAccess($id);	
	if (!Core::compareCheck($sessionAccess, $check)) {
		return;
	}

	if ($sessionAccess->grant(Core::$session)) {
		Core::updateAccessCache();
		Core::addCounter("Session.grantAccess_" . $id . "_true");
	} else {
		Core::addCounter("Session.grantAccess_" . $id . "_false");
	}
}

function public_Session_updateStatus($xml)
{
	$idleTime = 0 + $xml->idleTime;
	$_SESSION['idleTime'] = $idleTime;
		
	$uptime = 0 + $xml->uptime;
	$_SESSION['uptime'] = $uptime;
				
	Core::addCounter("Session.updateStatus" . ($idleTime > 5 * 60 ? "_idle" : ""));
}
