<?php
    include("connect.ini.php");
    require_once("classes/class.notification.php");
    require_once("classes/class.xmlReader.php");
    require_once("classes/class.logs.php");

    $xmlRms             = new RmsXMLReader();
    $rms_temperature    =$xmlRms->getRmsTemperature();
    $rms2_temperature   =$xmlRms->getRms2Temperature();
    
    Logs::writeLogToDB(1,$rms_temperature);
    Logs::writeLogToDB(2,$rms2_temperature);

    if($rms_temperature>30){
        
        Notification::sendNotification("Teplotne cidlo \"RMS\": Vysoka teplota \n Stara serverovna \n Teplota: ".$rms_temperature);
        
    }

    if($rms2_temperature>30){
        
        Notification::sendNotification("Teplotne cidlo \"RMS2\": Vysoka teplota \n Nova serverovna \n Teplota: ".$rms2_temperature);
        
    }