<?php
include("library/api/Request.php");

$api = new Request();
function saveCache($dir = null, $fileName = null, $data = null, $keep = true)
{
    $tempFile = fopen($dir . '/' . $fileName, "w");
    fputs($tempFile, $data);
    fclose($tempFile);
    if ($keep === false) {
        unlink($tempFile);
    }
    return $tempFile;
}
function generateJson()
{
    date_default_timezone_set('Asia/Dhaka');
    $hourFormat=date("A");
    $hour=date("h");
    $min=date("i");
    if($hourFormat =="PM")
    {
    	$time1 = new DateTime(date('Y-m-d h:i:s'));
        if($hour<5)
        {
          $time2 = new DateTime(date('Y-m-d h:i:s', filectime('cache/dseData.json')));
          $interval = $time1->diff($time2);
          if ($interval->i > 0 || file_exists('cache/dseData.json') === false) {
              unlink('cache/dseData.json');
              $api = new Request();
              saveCache('cache', "dseData.json", $api->getResponse('json'));
          }
        }
        else
        {
          $time2 = new DateTime(date('Y-m-d h:i:s', filectime('cache/dseData.json')));
          $interval = $time1->diff($time2);
          if ($interval->h > 0 || file_exists('cache/dseData.json') === false) {
              unlink('cache/dseData.json');
              $api = new Request();
              saveCache('cache', "dseData.json", $api->getResponse('json'));
          }
        }
        
    }
    if($hourFormat =="AM")
   {
   		if($hour<9)
       {
            $time1 = new DateTime(date('Y-m-d h:i:s'));
            $time2 = new DateTime(date('Y-m-d h:i:s', filectime('cache/dseData.json')));
            $interval = $time1->diff($time2);
            if ($interval->h > 0 || file_exists('cache/dseData.json') === false) {
                unlink('cache/dseData.json');
                $api = new Request();
                saveCache('cache', "dseData.json", $api->getResponse('json'));
            }
       }
       if($hour>11)
       {
            $time1 = new DateTime(date('Y-m-d h:i:s'));
            $time2 = new DateTime(date('Y-m-d h:i:s', filectime('cache/dseData.json')));
            $interval = $time1->diff($time2);
            if ($interval->i > 0 || file_exists('cache/dseData.json') === false) {
                unlink('cache/dseData.json');
                $api = new Request();
                saveCache('cache', "dseData.json", $api->getResponse('json'));
            }
       }
       if($hour==9)
       {
       		if($min<=15)
       		{
       			$time1 = new DateTime(date('Y-m-d h:i:s'));
	            $time2 = new DateTime(date('Y-m-d h:i:s', filectime('cache/dseData.json')));
	            $interval = $time1->diff($time2);
	            if ($interval->h > 0 || file_exists('cache/dseData.json') === false) {
	                unlink('cache/dseData.json');
	                $api = new Request();
	                saveCache('cache', "dseData.json", $api->getResponse('json'));
	            }
       		}
       }
       if($hour==11)
       {
       		if($min>=15)
       		{
       			$time1 = new DateTime(date('Y-m-d h:i:s'));
	            $time2 = new DateTime(date('Y-m-d h:i:s', filectime('cache/dseData.json')));
	            $interval = $time1->diff($time2);
	            if ($interval->i > 0 || file_exists('cache/dseData.json') === false) {
	                unlink('cache/dseData.json');
	                $api = new Request();
	                saveCache('cache', "dseData.json", $api->getResponse('json'));
	            }
       		}
       }
   }
}
?>