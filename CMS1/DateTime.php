<?php
date_default_timezone_set("Europe/London");
$CurrenTime=time();
//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrenTime);
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrenTime);
echo $DateTime;
?>