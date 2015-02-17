<?php

require_once("JSON.php");

$pic_types = array("jpg", "jpeg", "gif", "png");
$audio_types = array("mp3", "wav");
$video_types = array("flv", "mp4", "mov");
$swf_types = array("swf", "swf2");

$path = $_REQUEST['path'];
$fileTypes = isset($_REQUEST['fileTypes']) ? $_REQUEST['fileTypes'] : array();

function cmp($a, $b)
{
	if ($a['kind']!=$b['kind']) {
		if ($a['kind']=="directory") {
			return -1;
		}
		if ($b['kind']=="directory") {
			return 1;
		}
	}
	if (strtolower($a['name']) > strtolower($b['name'])) {
		return 1;
	} else {
		return -1;
	}
}
	
function scan_directory_recursively($directory, $fileTypes)
{
	$fileExtensions = array();
	
	if (in_array("image", $fileTypes)) {
		array_push($fileExtensions, "jpg", "jpeg", "gif", "png");			
	}
	if (in_array("audio", $fileTypes)) {
		array_push($fileExtensions, "mp3", "wav");		
	}
	if (in_array("video", $fileTypes)) {
		array_push($fileExtensions, "flv", "f4v", "mp4", "m4v");				
	}
	if (in_array("flash", $fileTypes)) {
		array_push($fileExtensions, "swf");						
	} 

	$useFileExtensions = count($fileExtensions);
	
	$directory_tree = "";
    // if the path has a slash at the end we remove it here
    if (substr($directory, -1) == '/')
    {
        $directory = substr($directory,0,-1);
    }
	
    // if the path is not valid or is not a directory ...
    if(!file_exists($directory) || !is_dir($directory))
    {
        // ... we return false and exit the function
        return FALSE;
 
    // ... else if the path is readable
    } else if (is_readable($directory))
    {
        // we open the directory
        $directory_list = opendir($directory);
		
        // and scan through the items inside
        while (FALSE !== ($file = readdir($directory_list)))
        {
            // if the filepointer is not the current directory
            // or the parent directory
			            
            if ($file != '.' && $file != '..' && substr($file, 0,1) != '.')
            {
                // we build the new path to scan
                $path = $directory . '/' . $file;
				
                // if the path is readable
                if (is_readable($path))
                {
                    // we split the new path by directories
                    $subdirectories = explode('/', $path);

                    // if the new path is a directory
                    if(is_dir($path))
                    {
                        // add the directory details to the file list
                        $directory_tree[] = array(
                            'name'    => end($subdirectories),
                            'kind'    => 'directory'
						);
 
						// we scan the new path by calling this function
						//'magicast' => scan_directory_recursively($path, $filter));
 
                    // if the new path is a file
                    } else if (is_file($path))
                    {
                        // get the file extension by taking everything after the last dot
                        $extension = end(explode('.', end($subdirectories)));
 
						if (!$useFileExtensions || in_array($extension, $fileExtensions)) {

							list($width, $height, $type, $attr) = @getimagesize($path);
							 
							$directory_tree[] = array(
								'path'      => utf8_encode($path),
								'name'      => utf8_encode(end($subdirectories)),
								'extension' => $extension,
								'size'      => filesize($path),
								'kind'      => 'file',
								'width'		=> $width,
								'height'	=> $height
							);
							
						}	
                    }
                }
            }
        }
        // close the directory
        closedir($directory_list); 
 
        // return file list
        usort($directory_tree, "cmp");
		return $directory_tree;
 
    // if the path is not readable ...
    } else {
        // ... we return false
        return FALSE;    
    }
}

$directoryItems = scan_directory_recursively($path, $fileTypes);

$json = new Services_JSON();
$output = $json->encode($directoryItems);

echo($output);
