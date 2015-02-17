<?php
//class SessionHandler implements SessionHandlerInterface
class ServerSessionHandler
{
    public function open($savePath, $sessionName)
    {
		global $CONFIG;
		
		if (Core::$session->key) {
			try {
				Core::$session->loadUsingKey($CONFIG['session_time']);
				return true;
			} catch (Exception $e) {
			}
		}

		// unable to load session, create new
		
		$tries = 0;
		while (!Core::$session->id && $tries<99) {
			Core::$session->key = md5(uniqid());
			Core::$session->secret = md5(uniqid());
			try {
				Core::$session->create();
			} catch (Exception $e) {
			}
			
			$tries++;
			if ($tries==100) {
				return false;
			}
		}
		
		Core::$output = Core::$output . '<sessionKey>' . Core::$session->key . '</sessionKey>' . '<sessionSecret>' . Core::$session->secret . '</sessionSecret>';
		
		return true;	
	}
	
    public function close()
    {
        return true;
    }

    public function read($id)
    {
		return Core::$session->data;
    }

    public function write($id, $data)
    {
		global $CONFIG;
		Core::$session->data = $data;
		try {
			Core::$session->update($CONFIG['session_cache_time']);
			return true;
		} catch (Exception $e) {
			return false;
		}
    }

    public function destroy($id)
    {
		Core::$session->delete();
    }

    public function GC($maxlifetime)
    {
		global $CONFIG;
		Session::GC($CONFIG['session_time']);
	}
}