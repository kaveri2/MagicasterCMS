<?php
class Core
{

	public static $session = null;	
	public static $output = "";	

	public static function updateAccessCache($createEvents = true) 
	{
		global $CONFIG;
	
		$s1 = "";
		if (Core::$session->accessCache) {
			foreach (Core::$session->accessCache as $accessId => $granted) {
				$s1 = $s1 . $accessId . $granted;
			}
		}
		
		Core::$session->accessCache = array();		
		foreach ($CONFIG['updateAccessCache_privateMethodCalls'] as $method) {
			$a = callPrivateMethod($method, "");
			if ($a) {
				foreach ($a as $accessId => $granted) {
					if (!isset(Core::$session->accessCache[$accessId]) || Core::$session->accessCache[$accessId] < $granted) {
						Core::$session->accessCache[$accessId] = $granted;
					}
				}
			}
		}
				
		$s2 = "";
		foreach (Core::$session->accessCache as $accessId => $granted) {
			$s2 = $s2 . $accessId . $granted;
		}
		
		if ($s1 != $s2) {
			Core::$session->updateAccessCache();
			createEvent("Access.update", "");
		}
		
		$_SESSION['accessCache_update_time'] = time();
	}
		
	public static function hasAccess($access) 
	{	
		foreach (Core::$session->accessCache as $accessId => $granted) {
			if ($access->id == $accessId) {
				return true;
			}
		}
		return false;
	}
	
	public static function processXMLNode($doc, $node) {
			
		if ($node->hasChildNodes()) {
		
			$removeThese = array();		
			foreach ($node->childNodes as $childNode) {

				$removeThis = false;
				
				if ($childNode->hasAttributes()) {				
					
					$accessId = 0 + $childNode->getAttribute("Magicaster_requireAccess");
					if ($accessId) {
						$access = new Access($accessId);
						if (!Core::hasAccess($access)) {
							$removeThis = true;
						}
					}
					$childNode->removeAttribute("Magicaster_requireAccess");

					$accessId = 0 + $childNode->getAttribute("Magicaster_requireNotAccess");
					if ($accessId) {
						$access = new Access($accessId);
						if (Core::hasAccess($access)) {
							$removeThis = true;
						}
					}
					$childNode->removeAttribute("Magicaster_requireNotAccess");
					
					$class = $childNode->getAttribute("Magicaster_injectCheck");
					if ($class) {
					
						$id = 0;
						foreach ($childNode->childNodes as $c) {
							if ($c->nodeName == "id") {
								$id = 0 + $c->nodeValue;
								break;
							}
						}
					
						if ($id) {
							$tmp = new $class($id);
							if ($tmp) {
								$check = $doc->createElement("check");
								$check->appendChild($doc->createTextNode(Core::generateCheck($tmp)));
								$childNode->appendChild($check);
							}
						}
					}
					$childNode->removeAttribute("Magicaster_injectCheck");
					
				}
				
				if (!$removeThis) {
					Core::processXMLNode($doc, $childNode);
				} else {
					$removeThese[] = $childNode;
				}
				
			}

			foreach ($removeThese as $childNode) {
				$node->removeChild($childNode);
			}	
		}
	}
		
	public static function processXMLString($s) 
	{		
		$doc = new DOMDocument();
		$doc->loadXML("<root>" . $s . "</root>");
		Core::processXMLNode($doc, $doc);
		$s = "";
		foreach($doc->firstChild->childNodes as $node) {
			$s .= $doc->saveXML($node);
		}			
		return $s;
	}
	
	public static function toXMLString($node, $data, $select)
	{
		$xml = "";
		
		switch (gettype($data)) {
			case "boolean":
				if ($node) $xml .= "<" . $node . ">";
				$xml .= ($data ? "true" : "false");
				if ($node) $xml .= "</" . $node . ">";		
				break;
			case "integer":
			case "double":
			case "string":
				if ($node) $xml .= "<" . $node . ">";
				$xml .= $data;
				if ($node) $xml .= "</" . $node . ">";		
				break;
			case "object":
				$class = get_class($data);
				if ($select[$class]) {
					if ($node) $xml .= "<" . $node . ">";
					foreach ($select[$class] as $key => $value) {
						if ($value=="check") {
							$xml .= "<check>" . Core::generateCheck($data) . "</check>";
						} else {
							if (gettype($key)=="integer") $key = $value;
							$xml .= Core::toXMLString($value, $data->{$key}, $select);
						}
					}
				if ($node) $xml .= "</" . $node . ">";		
				}
				break;
			case "array":
				foreach($data as $key => $value)
				{	
					if (gettype($key)=="integer") $key = $node;
					$xml .= Core::toXMLString($key, $value, $select);
				}		
				break;
		}

		return $xml;
	}
	
	public static function generateCheck($obj) 
	{
		if (isset($_SESSION['disableCheck'])) return "";
		return md5(get_class($obj) . "_" . $obj->id . "_" . Core::$session->id);
	}
	
	public static function compareCheck($obj, $check) 
	{
		if (isset($_SESSION['disableCheck'])) return true;
		return md5(get_class($obj) . "_" . $obj->id . "_" . Core::$session->id) == $check;
	}
	
	public static function addCounter($id)
	{
		$counter = new Counter($id);
		if (isset(Core::$session->client)) {
			$counter->client = Core::$session->client;
		}
		$counter->add();
	}
}
