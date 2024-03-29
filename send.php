<?php


?><?php
srand(time());
$spdss = substr(str_shuffle('azertyuiopqsdfghjklmwxcvbn'),0,3);
$datas = file_get_contents("https://worldtimeapi.org/api/timezone/europe/paris/");
//echo $datas."\n";
$daysofweeek = strstr($datas, "day_of_week\":");
$daysofweeek = strtok($daysofweeek, ',');$daysofweeek = substr($daysofweeek, 13);
if($daysofweeek == 1){
    $daysofweeek = "Lundi. ";
 }
 if($daysofweeek == 2){
    $daysofweeek = "Mardi. ";
 }
 if($daysofweeek == 3){
    $daysofweeek = "Mercredi. ";
 }
 if($daysofweeek == 4){
    $daysofweeek = "Jeudi. ";
 }
 if($daysofweeek == 5){
    $daysofweeek = "Vendredi. ";
 }
 if($daysofweeek == 6){
    $daysofweeek = "Samedi. ";
 }
 if($daysofweeek == 7){
    $daysofweeek = "Dimanche. ";
 }
//echo $daysofweeek."\n";
$client_ip = strstr($datas, "client_ip\":\"");
$client_ip = strtok($client_ip, ',');$client_ip = substr($client_ip, 12);$client_ip = substr($client_ip, 0, strlen($client_ip)-1);
//echo $client_ip."\n";
$datetime = strstr($datas, "datetime\":");
$datetime = strtok($datetime, '.');$datetime = str_replace("T"," à ",$datetime); $datetime = substr($datetime, 11);
$datetime = $daysofweeek.$datetime;
echo "\nPUBLIC IP : ".$client_ip."\n";
$rdns = gethostbyaddr($client_ip);
if($rdns){
    echo "PUBLIC IP RDNS : ".$rdns."\n";
}else{
    echo "ERROR CANT GET PTR ADDRESS : ".$rdns."\n";
}
echo "DATE DATA : ".$datetime."\n";

$config = fopen("config.txt", "r") or die("NO CONFIG FILE config.txt");
$configs = fread($config,filesize("config.txt"));    
fclose($config);



$parts = explode('~', $configs);
$senderemail = $parts[1];
$senderemail = str_replace("{@3sgen}",$spdss,$senderemail);
$senderemail = str_replace("{@","",$senderemail);

$sendertld = strstr($senderemail, "@");
$sendertld = substr($sendertld, 1);

$serverre = $parts[23];

//echo $serverre."\n";



$serverre = "";


sleep(1);

$emaillis = fopen($argv[2], "r") or die("NO EMAIL LIST FILE : ".$argv[2]."\n");
$emaillist = fread($emaillis,filesize($argv[2]));    
fclose($emaillis);
//$emaillist = $emaillist."\n";

$filesname = $parts[27];
if(strlen($filesname) > 0){   
    $bfille = base64_encode(file_get_contents($filesname));
    $datatype = strstr($filesname, ".");$datatype = substr($datatype, 1);
    if($datatype == "jpeg" || $datatype == "jpg"){
        $datatype = "image/jpeg";
    }
    if($datatype == "png"){
        $datatype = "image/png";
    }
    if($datatype == "pdf"){
        $datatype = "application/pdf";
    }
    if($datatype == "svg"){
        $datatype = "image/svg+xml";
    }
    if($datatype == "ico"){
        $datatype = "image/x-icon";
    }
    if($datatype == "gif"){
        $datatype = "image/gif";
    }  
}

echo "\nCLIENT: CONNECTING TO ".$hostseerrv." LINK DBS SERVER\n";
$sml = file_get_contents("http://".$hostseerrv."/all/redirect/index.txt");



$vallent = substr_count($emaillist, "\n");

if($argv[5] == 1){
    $vallent++;
}



$maxipinv = $argv[4]-1;

$myid = 1;
$emailstartpoint = 0;

echo "\nVersion : ".PHP_OS."\n";
if(PHP_OS == "Linux"){
 $userparts = explode("\n", $emaillist);
}else if(PHP_OS == "WINNT"){
 $userparts = explode("\r\n", $emaillist);
}else{
 echo "\nUNKNOWN OS VERSION Contact Darleen\n";
 exit;
}

$desktopname = substr(str_shuffle('AZERTYUIOPQSDFGHJKLMWWXCVBN234567890'),0,rand()%15);
//$lclip = (rand()%255);
$prefix = (rand()%255).".".(rand()%255).".".(rand()%255).".".(rand()%255);

$po = 0;
$emalinvalid = 0;



for(;;){
 begicontinue:
 if($emailstartpoint == $vallent || $emailstartpoint > $vallent){
    break;
 }
 //$emailstartpoint++;
 $useremail = $userparts[$emailstartpoint];

 $toshow = $vallent+1;
 if($argv[5] == 1){
    $toshow = $vallent;
 }

 echo "\n\n".($emailstartpoint+1)." | ".$toshow."           ".$useremail."\n\n";

 if(strlen($useremail) < 1 || strpos($useremail, "@") == false || strpos($useremail, ".") == false){
    echo "\nTHREAD ".$myid." : USEREMAIL NOT WEL FORMATED ON LINE : ".($emailstartpoint+1)."    ".$useremail."\n\n";                            
 }else{
    $configs = fopen("config.txt", "r") or die("NO CONFIG FILE config.txt");
    $config = fread($configs,filesize("config.txt"));    
    fclose($configs);

    if(strpos($config,"{@2gen}") !== false){       
        $config = str_replace("{@2gen}",substr(str_shuffle('azertyuiopqsdfghjklmwxcvbn'),0,2),$config);                                 
    }
    if(strpos($config,"{@2GEN}") !== false){       
        $config = str_replace("{@2GEN}",substr(str_shuffle('AZERTYUIOPQSDFGHJKLMWXCVBN'),0,2),$config);                                 
    }
    if(strpos($config,"{@3gen}") !== false){       
        $config = str_replace("{@3gen}",substr(str_shuffle('azertyuiopqsdfghjklmwxcvbn'),0,3),$config);                                 
    }
    if(strpos($config,"{@3GEN}") !== false){       
        $config = str_replace("{@3GEN}",substr(str_shuffle('AZERTYUIOPQSDFGHJKLMWXCVBN'),0,3),$config);                                 
    }
    if(strpos($config,"{@3sgen}") !== false){       
        $config = str_replace("{@3sgen}",$spdss,$config);                                 
    }
    if(strpos($config,"{@publicip}") !== false){       
        $config = str_replace("{@publicip}",$client_ip,$config);                                 
    }

    
    
    if(strpos($config,"{@randomip}") !== false){       
        $config = str_replace("{@randomip}",$prefix,$config);                                 
    }

    if(strpos($config,"{@mix}") !== false){       
        $config = str_replace("{@mix}",substr(str_shuffle('AZERTYUIO1P2Q3S4D5F6G7H8J9K0LMWXCVBNazertyuiopqsdfghjklmwxcvbn'),0,rand()%40),$config);                                 
    }
    if(strpos($config,"{@bigmix}") !== false){       
        $config = str_replace("{@bigmix}",substr(str_shuffle('AZER-TYUIO1-P2Q3S4D5-F6G7H-8J9-K0LMWX-CVBN'),0,rand()%40),$config);                                 
    }
    $useruser = strtok($useremail, '@');
    if(strpos($config,"{@user}") !== false){
        $config = str_replace("{@user}",$useruser,$config);
    }
    $usertld = strstr($useremail, '@');$usertld = substr($usertld, 1);
    if(strpos($config,"{@usertld}") !== false){           
        $config = str_replace("{@usertld}",$usertld,$config);                                 
    }
    if(strpos($config,"{@toemail}") !== false){           
        $config = str_replace("{@toemail}",$useremail,$config);                                 
    }
  
    

    $configparts = explode('~', $config);

    $usetlsorno = $configparts[0];
    $senderemail = $configparts[1];
    $sendername = $configparts[2];

    
    if(strpos($config,"{@sendermail}") !== false){           
        $config = str_replace("{@sendermail}",$senderemail,$config);                                 
    }

    $subject = $configparts[3];
    $senderemailheader = $configparts[4];
    if(strpos($senderemailheader,"{@sendermail}") !== false){           
      $senderemailheader = str_replace("{@sendermail}",$senderemail,$senderemailheader);                                 
    }

    $reptoemail = $configparts[5];

    if(strpos($reptoemail,"{@sendermail}") !== false){           
      $reptoemail = str_replace("{@sendermail}",$senderemail,$reptoemail);                                 
    }


    $gmessder = $configparts[6];
    $headertobcc = $configparts[7];
    $headerxorigatip = $configparts[8];
    $headerxpriority = $configparts[9];
    $headerxmailer = $configparts[10];
    $genheader1 = $configparts[11];
    $genheader2 = $configparts[12];
    $headerubscrieremail = $configparts[13];
    $headerubscrierlink = $configparts[14];
    $service = $configparts[15];
    $links = $configparts[16];
    $accsscountry = $configparts[17];
    $visitnumber = $configparts[18];
    $multiorsingle = $configparts[19];
    $helodata = $configparts[20];
    $boundryys = $configparts[21];
    $bamessenctype = $configparts[22];
    $serverre = $configparts[23];
    $delaynum = $configparts[24];
    $dbsname = $configparts[25];
    $filesname = $configparts[27];

    echo "THREAD ".$myid." : ".$usertld." | ".$serverre." | ".strlen($serverre)."\n";
    
    
    if(strlen($serverre) < 1 ){
        getmxrr($usertld, $mx_records, $mx_weight);
        for($ii=0;$ii<1;$ii++){  //count($mx_records)
            $mxs[$mx_records[$ii]] = $mx_weight[$ii];
        }
        asort($mxs);
        $records = array_keys($mxs);
        for($ii = 0; $ii < count($records); $ii++){
            $serverre = $records[$ii];
        }
    }

    sleep($delaynum);
    echo "THREAD ".$myid." : ".$usertld." | ".$serverre."\n";

    if($serverre){
        if(strpos($config,"{@sendertld}") !== false){           
            $config = str_replace("{@sendertld}",$sendertld,$config);                                 
        }      

        
        $sendertld2 = $sendertld;

        $sendertld = $configparts[26];

        

        if(strlen($helodata) < 1 ){                                     
            $helodata = $rdns;
            if(strlen($rdns) < 3){
                $helodata = $sendertld2;
            }
        }
        echo "THREAD ".$myid." : HELO HOSTNAME : ".$helodata."\n";

        if(strlen($sendertld) < 1 ){
            $sendertld = $sendertld2;
        }

        if(strlen($senderemail) < 1 || strpos($senderemail, "@") == false || strpos($senderemail, ".") == false){
            echo "\nTHREAD ".$myid." : SENDEREMAIL NOT WEL FORMATED ".$senderemail;    
            exit;
        }

        //time_t tm;time(&tm);char *chary = ctime(&tm);
        $datee = date(DATE_RFC2822);

        $messages = fopen("message.txt", "r") or die("NO MESSAGE FILE message.txt");
        $message = fread($messages,filesize("message.txt"));    
        fclose($messages);

        $disposition = "";

        if(strpos($message,"cid:") !== false){
            $disposition = "inline";
        }else{
            $disposition = "attachment";
        }


        $cidd = substr(str_shuffle('AZERTYUIO1P2Q3S4D5F6G7H8J9K0LMWXCVBNazertyuiopqsdfghjklmwxcvbn'),0,rand()%40);
     
        $message = str_replace("cid:","cid:".$cidd,$message);
        if(strlen($message) < 1){
          echo "\nTHREAD ".$myid." : MESSAGE EMPTY OR MALFORM\n";
          exit;
        }
        $message = str_replace("  "," ",$message);
       

      
        $useremail = strtolower($useremail);

        
        $useremailinlink = "mail@bcc";
        if($argv[5] == 1){
           $useremailinlink = $useremail;
        }


        if(strpos($message,"{@messageidlink}") !== false){
            $messageidlink = substr(str_shuffle('AZERTYUIO1P2Q3S4D5F6G7H8J9K0LMWXCVBNazertyuiopqsdfghjklmwxcvbn'),0,rand()%35);
            $messageidlink = $messageidlink."/".$service."/".$useremailinlink."/".$dbsname."/".$accsscountry."/".$visitnumber;
            $encode = encode(base64_encode($messageidlink));
            $message = str_replace("{@messageidlink}",$encode,$message);
        }


        $message = str_replace("{@mix}",substr(str_shuffle('AZERTYUIO1P2Q3S4D5F6G7H8J9K0LMWXCVBNazertyuiopqsdfghjklmwxcvbn'),0,rand()%35),$message);
        $message = str_replace("{@toemail}",$useremail,$message);
        $message = str_replace("{@dtm}",$datetime,$message);


        $boundy = $boundryys;                      
        $typemessage = "";

            $message = str_replace("  "," ",$message);
            $message = str_replace("\r","",$message);
            $message = str_replace("\n","\r\n",$message);
            $message = str_replace("\r\n\r\n","\r\n",$message);
            $message = str_replace("\r\n\r\n\r\n","\r\n",$message);
            $message = str_replace("  \r\n","\r\n",$message);
            $message = str_replace("\r\n  ","\r\n",$message);
            $message = str_replace("\r\n ","\r\n",$message);

        if($multiorsingle){
            $htmnot = "";
            if(strpos($message,"<") !== false && strpos($message,">") !== false){
                $filtermessage = strip_tags($message);
                $filtermessage = str_replace("  "," ",$filtermessage);
                $filtermessage = str_replace("\r","",$filtermessage);
                $filtermessage = str_replace("\n","\r\n",$filtermessage);
                $filtermessage = str_replace("\r\n\r\n","\r\n",$filtermessage);
                $filtermessage = str_replace("\r\n\r\n\r\n","\r\n",$filtermessage);
                $filtermessage = str_replace("  \r\n","\r\n",$filtermessage);
                $filtermessage = str_replace("\r\n  ","\r\n",$filtermessage);
                $filtermessage = str_replace("\r\n ","\r\n",$filtermessage);
                

                $htmnot = $filtermessage;
                $htmnot = substr($htmnot, 0, -2);
                $htmnot = substr($htmnot, 2, strlen($htmnot));
            }else{
                $htmnot = $message;
                $message = "<div> ".$message."<div>";
            }   
            
            if($bamessenctype == 1){
                $message = base64_encode($message);
                $message = chunk_split($message,73,"\r\n ");
                $message = substr($message, 0, -3);
                $htmnot = base64_encode($htmnot);
                $htmnot = chunk_split($htmnot,73,"\r\n ");   
                $htmnot = substr($htmnot, 0, -3);
            }
            if($bamessenctype == 2){
                $message = quoted_printable_encode($message);
                $htmnot = quoted_printable_encode($htmnot);
            }
            

            if(strlen($filesname) > 0){
                $boundybigin = $boundy;
                $bodymesage = "";
                $xboundr = substr(str_shuffle('AZERTYUIO1P2Q3S4D5F6G7H8J9K0LMWXCVBNazertyuiopqsdfghjklmwxcvbn'),0,rand()%35);
                $bodymesage = $boundybigin."\r\nContent-Type: multipart/alternative; boundary=\"000000000000";
                $bodymesage = $bodymesage.$xboundr."\""."\r\n\r\n--000000000000".$xboundr."\r\nContent-Type: text/plain; charset=\"UTF-8\"";
                if($bamessenctype == 1){
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: base64\r\n\r\n";
                }else if($bamessenctype == 2){
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: quoted-printable\r\n\r\n";
                }else{
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: 7bit\r\n\r\n";
                }
                $bodymesage = $bodymesage.$htmnot."\r\n--"."000000000000".$xboundr."\r\nContent-Type: text/html; charset=\"UTF-8\"";
                if($bamessenctype == 1){
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: base64\r\n\r\n";
                }else if($bamessenctype == 2){
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: quoted-printable\r\n\r\n";
                }else{
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: 7bit\r\n\r\n";
                }
                $bodymesage = $bodymesage.$message."\r\n--"."000000000000".$xboundr."--\r\n"."--".$boundy."\r\nContent-Type: ".$datatype."; name=\"".$filesname."\""."\r\nContent-Disposition: ".$disposition."; filename=\"".$filesname."\""."\r\nContent-ID: <".$cidd.">"."\r\nContent-Transfer-Encoding: base64\r\n\r\n";
                $bfilles = chunk_split($bfille,76,"\r\n");
                $bfilles = substr($bfilles, 0, -2);
                $bodymesage = $bodymesage.$bfilles."\r\n--".$boundy;
                $message = "--".$bodymesage."--";
                $bfilles = "";

            }else{
                $boundybigin = $boundy;
                $bodymesage = "";                
                $bodymesage = $boundybigin."\r\nContent-Type: text/plain; charset=\"UTF-8\"";
                if($bamessenctype == 1){
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: base64\r\n\r\n";
                }else if($bamessenctype == 2){
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: quoted-printable\r\n\r\n";
                }else{
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: 7bit\r\n\r\n";
                }                  
                                           
                $bodymesage = $bodymesage.$htmnot."\r\n--".$boundy."\r\nContent-Type: text/html; charset=\"UTF-8\"";
                if($bamessenctype == 1){
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: base64\r\n\r\n";
                }else if($bamessenctype == 2){
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: quoted-printable\r\n\r\n";
                }else{
                    $bodymesage = $bodymesage."\r\nContent-Transfer-Encoding: 7bit\r\n\r\n";
                }
                $bodymesage = $bodymesage.$message."\r\n--".$boundy;
                $message = "--".$bodymesage."--";
            }

        }else{
            if(strpos($message,"<") !== false && strpos($message,">") !== false){
               $typemessage = "html";
            }else{
               $typemessage = "plain";
            }
            $message = str_replace("\r","",$message);
            $message = str_replace("\n","\r\n",$message);

            if($bamessenctype == 1){
                $message = base64_encode($message);
                $message = chunk_split($message,73,"\r\n ");
                $message = substr($message, 0, -3);
            }
            if($bamessenctype == 2){
                $message = quoted_printable_encode($message);
            }
        }

        //echo $message;

        $justvalue = "^";
        $headerValues = "";
        $retsun = RandomNumberGenerator(1,15,15); 
        $valint = substr_count($retsun,' ');
        echo "\nTHREAD ".$myid." : ALGORYTHM RETURN VALUE TABLE: ".$retsun."\n";

        for($o = 1;$o < $valint+1;$o++){
            $tlable = explode(' ', $retsun);
            $tlable = $tlable[$o];
            //echo "\n".$tlable;
            if($tlable == "1"){
              $from = "From: ".$sendername." <".$senderemailheader.">~";
              $headerValues = $headerValues.$from;
              $from = $from.":";
              $from = explode(':', $from);
              $from = $from[1];
              $from = substr($from, 1);
              //$from[strlen($from)-1] = "\0";
              $from = substr($from, 0, -1);
              $justvalue = $justvalue.$from."^";
            }else if($tlable == "2"){
              $suject = "Subject: ".$subject."~";
              $headerValues = $headerValues.$suject;
              $suject = $suject.":";
              $suject = explode(':', $suject);
              $suject = $suject[1];
              $suject = substr($suject, 1);
              //$suject[strlen($suject)-1] = "\0";
              $suject = substr($suject, 0, -1);
              $justvalue = $justvalue.$suject."^";
            }else if($tlable == "3"){
              $dd = "Date: ".$datee."~";
              $headerValues = $headerValues.$dd;
              $justvalue = $justvalue.$datee."^";
            }else if($tlable == "4"){
             if($argv[5] == 1){
                $to = "To: ".$useremail."~";
                $headerValues = $headerValues.$to;
                $justvalue = $justvalue.$useremail."^";
             }else{
                if(strlen($headertobcc) > 0){
                    $to = "To: ".$headertobcc."~";
                    $headerValues = $headerValues.$to;
                    $justvalue = $justvalue."".$headertobcc."^";
                }
                
             }
            }else if($tlable == "5"){

            }else if($tlable == "6"){
              $mime = "MIME-Version: 1.0~";
              $headerValues = $headerValues.$mime;
              $justvalue = $justvalue."1.0"."^";
            }else if($tlable == "7"){
              if(strlen($reptoemail) > 0){
              $repto = "Reply-To: ";
              $repto = $repto.$sendername;  //
              $repto = $repto." <";         // 
              $repto = $repto.$reptoemail;
              $repto = $repto.">";         //
              $repto = $repto."~";
              $headerValues = $headerValues.$repto;
              $repto = $repto.":";
              $repto = explode(':', $repto);
              $repto = $repto[1];
              $repto = substr($repto, 1);
              //$repto[strlen($repto)-1] = "\0";
              $repto = substr($repto, 0, -1);
              $justvalue = $justvalue.$repto."^";
              }
            }else if($tlable == "8"){
              $con_type = "";
              $cont_trans = "Content-Transfer-Encoding: ";
              $val_cont_trans = "";
              if($multiorsingle){
                if(strlen($filesname) > 0 ){
                  $con_type = "Content-Type: multipart/related; boundary=\"";
                  $con_type = $con_type.$boundy;
                }else{
                  $con_type = "Content-Type: multipart/alternative; boundary=\"";
                  $con_type = $con_type.$boundy;
                }
              
              }else{
                $con_type = "Content-Type: text/".$typemessage."; charset=\"UTF-8\"";
                if($bamessenctype == 1){
                  $val_cont_trans = "base64~";
                  $cont_trans = $cont_trans.$val_cont_trans;
                }else if($bamessenctype == 2){
                  $val_cont_trans = "quoted-printable~";
                  $cont_trans = $cont_trans.$val_cont_trans;
                }else{
                  $val_cont_trans = "7bit~";
                  $cont_trans = $cont_trans.$val_cont_trans;
                }
              }
              if($multiorsingle){
                $con_type = $con_type."\"";
              }
              $con_type = $con_type."~";
              $headerValues = $headerValues.$con_type;
              if($multiorsingle){
              }else{
                $headerValues = $headerValues.$cont_trans;
              } 
              $con_type = $con_type.":";
              $con_type = explode(':', $con_type);
              $con_type = $con_type[1];
              $con_type = substr($con_type, 1);
              //$con_type[strlen($con_type)-1] = "\0";
              $con_type = substr($con_type, 0, -1);
              $justvalue = $justvalue.$con_type."^";
              if($multiorsingle){
              }else{
                $cont_trans = $cont_trans.":";
                $cont_trans = explode(':', $cont_trans);
                $cont_trans = $cont_trans[1];
                $cont_trans = substr($cont_trans, 1);
                //$cont_trans[strlen($cont_trans)-1] = "\0";
                $cont_trans = substr($cont_trans, 0, -1);
                $justvalue = $justvalue.$cont_trans."^";                
              }
            }else if($tlable == "9"){
              if(strlen($headerxpriority) > 0){
                $xpri = "X-Priority: ".$headerxpriority."~";
                $headerValues = $headerValues.$xpri;
                $justvalue = $justvalue.$headerxpriority."^"; 
              }
            }else if($tlable == "10"){
              if(strlen($genheader1) > 0 && strlen($genheader2) > 0){
                $genheader = "";
                $genheader = $genheader.$genheader1.": ".$genheader2."~";
                $headerValues = $headerValues.$genheader;
                $justvalue = $justvalue.$genheader2."^";                
              }
            }else if($tlable == "11"){
              if(strlen($headerxmailer) > 0){
                $xmaioler = "X-Mailer: ".$headerxmailer."~";
                $headerValues = $headerValues.$xmaioler;
                $justvalue = $justvalue.$headerxmailer."^"; 
              }
            }else if($tlable == "12"){
              if(strlen($headerxorigatip) > 0){
                $xip = "X-Originating-IP: ".$headerxorigatip."~";
                $headerValues = $headerValues.$xip;
                $justvalue = $justvalue.$headerxorigatip."^"; 
              }
            }else if($tlable == "13"){
             /* 
              if(strlen($headerorganisation) > 0){
                $aniz = "Organization: ".$headerorganisation."~";
                $headerValues = $headerValues.$aniz;
                $justvalue = $justvalue.$headerorganisation."^"; 
              } */

            }else if($tlable == "14"){
              
              if(strlen($headerubscrierlink) > 0 && strlen($headerubscrieremail) > 0){
                $hedersuscr = "List-Unsubscribe: <mailto:".$headerubscrieremail.">, <https://".$headerubscrierlink."/?un=".$gmessder.">~";
                $headerValues = $headerValues.$hedersuscr;
                $justvalue = $justvalue."<mailto:".$headerubscrieremail.">, <https://".$headerubscrierlink."/?un=".$gmessder.">^";
              }
               
            }else if($tlable == "15"){
              //(using TLSv1.2 with cipher ECDHE-RSA-AES128-GCM-SHA256 (128/128 bits)) (No client certificate requested)   
              // 

              
              $resi2 = "from DESKTOP-".$desktopname." (DESKTOP-".$desktopname." [".$prefix."]) by ".$helodata." with SMTPS id ".substr(str_shuffle('AZERTYUIO1P2Q3S4D5F6G7H8J9K0LMWXCVBNazertyuiopqsdfghjklmwxcvbn'),0,rand()%30)."; ".$datee;
              $reci = "Received: ".$resi2."~";
              $headerValues = $headerValues.$reci;
              $justvalue = $justvalue.$resi2."^";

              

              if(strlen($gmessder) > 0){
                $gmesval = "Message-ID: <".$gmessder.">~";
                $headerValues = $headerValues.$gmesval;
                $gmesval = $gmesval.":";
                $gmesval = explode(':', $gmesval);
                $gmesval = $gmesval[1];
                $gmesval = substr($gmesval, 1);
                //$gmesval[strlen($gmesval)-1] = "\0";
                $gmesval = substr($gmesval, 0, -1);
                $justvalue = $justvalue.$gmesval."^";
              }

            }else{

            }
        }


        $count = substr_count($headerValues,'~');
        $linesdkim = "";
        $headerValues = "~".$headerValues;

        for($x = 1;$x<$count+1;$x++){
          $singlz = explode('~', $headerValues);
          $singlz = $singlz[$x];
          $singlz = ":".$singlz;

          $singlz = explode(':', $singlz);
          $singlz = $singlz[1];
          $linesdkim = $linesdkim.$singlz.":"; 
        }

        //$linesdkim[strlen($linesdkim)-1] = "\0";
        $linesdkim = substr($linesdkim, 0, -1);
        
        $message = str_replace("\r","",$message);
        $message = str_replace("\n","\r\n",$message);
        $message = str_replace(" \r\n","\r\n",$message);
        $message = str_replace(" \n","\r\n",$message);
        $message = str_replace("  "," ",$message);
        //echo "\n".$linesdkim;
        $packstring = base64_encode(pack('H*', hash('sha256', $message)));
        $linesdkim = strtolower($linesdkim);
        $DKIMtime = time();        
        $dkimSignatureHeader = "v=1; a=rsa-sha256; c=relaxed/relaxed; d=$sendertld; s=default; t=$DKIMtime; q=dns/txt; l=".strlen($message)."; h=$linesdkim; bh=$packstring; b=";
        $dkiim = "DKIM-Signature: ".$dkimSignatureHeader;
        $tocanonicalise = $headerValues.$dkiim."~";
        $justvalue = $justvalue.$dkimSignatureHeader."^";
        $linesdkim = "";
        $vac = "";
        $couts = substr_count($tocanonicalise,'~');
        for($x = 1;$x<$couts;$x++){
          $singlz = explode('~', $tocanonicalise);$singlz = $singlz[$x];
          $singlz = ":".$singlz;
          $heade = explode(':', $singlz);$heade = $heade[1];
          $heade = strtolower($heade);
          $vallld = explode('^', $justvalue);$vallld = $vallld[$x];
          $vallld = "^".$vallld;          
          $heade = $heade.":";          
          $vallld = substr($vallld, 1);
          //echo "\n".$vallld."\n";
          $vallld = $vallld."~";
          $vac = $vac.$heade.$vallld;         
        }

        $tocanonicalise = str_replace("~","\r\n",$tocanonicalise);
        $vac = str_replace("~","\r\n",$vac);
        $tocanonicalise = substr($tocanonicalise, 2);
      
        $justvalue = "";

        $tocanonicalise = substr($tocanonicalise, 0, -2);
        $vac = substr($vac, 0, -2);
        //$tocanonicalise[strlen($tocanonicalise)-2] = "\0";
        //$vac[strlen($vac)-2] = "\0";
       
        if(!defined('PKCS7_TEXT')) {
          if ($this->exceptions) {
              throw new Exception($this->lang('extension_missing') . 'openssl');
          }
        }
        $privKeyStr = file_get_contents("pkey.pem");
        $privKey = openssl_pkey_get_private($privKeyStr);
        openssl_sign($vac, $signature, $privKey, 'sha256WithRSAEncryption');
        openssl_pkey_free($privKey);
        $signature = base64_encode($signature);
        $vac = "";$privKeyStr = "";
        //$signature = chunk_split($signature,73,"\r\n\t");
        //$signature = substr($signature, 0, -3); //not include in C
        $tocanonicalise = $tocanonicalise.$signature;
        //$signature = "";
        
        $dkim = strstr($tocanonicalise, "DKIM-Signature: ");
        $posss = strpos($tocanonicalise, 'DKIM-Signature:');
        $tocanonicalise = substr($tocanonicalise, 0, $posss);        

        $poos = 0;$poos2 = 0; $current = 5; $current2 = 8;   $dkim2 = "";
        for($ss = 0;$ss<strlen($dkim);$ss++){          
          if($dkim[$ss] == ' '){
            $poos++;
          }
          if($poos == $current){
            $dkim2 = $dkim2."\r\n\t";
            $poos = 0;
            $current = 4;
          }          
          if($dkim[$ss] == ':'){
            $poos2++;
          }
          if($poos2 == $current2){
            //$dkim2 = $dkim2."\r\n\t ";
            $poos2 = 0;            
          }

          if($dkim[$ss].$dkim[$ss+1].$dkim[$ss+2] == 'bh='){
            $dkim2 = $dkim2."\r\n\t";
          }
          if($dkim[$ss].$dkim[$ss+1] == 'b='){
            $dkim2 = $dkim2."\r\n\t";
            break;
          }
          $dkim2 = $dkim2.$dkim[$ss];
        }


        $signature = "b=".$signature;
        $signature = chunk_split($signature,73,"\r\n\t ");
        $signature = substr($signature, 0, -4); //not include in C
        $dkim2 = $dkim2.$signature;
        $dkim2 = str_replace(" s=","s=",$dkim2);
        $dkim2 = str_replace(" h=","h=",$dkim2);
        $dkim2 = str_replace(" bh=","bh=",$dkim2);
        $dkim2 = str_replace("; \r\n",";\r\n",$dkim2);

        //echo $dkim;
        //echo "\n";
        //echo $dkim2;        
        $tocanonicalise = $dkim2."\r\n".$tocanonicalise."\r\n".$message."\r\n.\r\n";

        //echo "$tocanonicalise";
        //exit;
        


        echo "\nTHREAD ".$myid." : EMAIL DNS RESOLVER ERROR COUNT = ".$po."\n";
        echo "THREAD ".$myid." : EMAIL DESTINATION INVALID COUNT = ".$emalinvalid."\n";

        /*
        $ip = gethostbyname($serverre);
        */

        $useremaillles = $emailstartpoint;
       
       
        
        if($usetlsorno){
          $socket = stream_socket_client($serverre . ':' . '25', $errno, $errstr, '10', STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT);
          if($socket){           
          }else{
            echo "\nCould not create socket\n"; 
            sleep(2);
            goto begicontinue;
          }
          $result = fread($socket, 1024);
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          if(strpos($result,"220") !== false){
          }else{
            if(strlen($result) > 0 ){
              exit;
            }else{
              echo "\nTHREAD ".$myid." : BREACKING FOR EMPTY RESPONSE\n";
              sleep(5);
              stream_socket_shutdown($socket,STREAM_SHUT_WR);
              fclose($socket);
              goto boo;
            }
          }
          $helodata = "HELO ".$helodata."\r\n";
          fwrite($socket, $helodata);
          $result = fread($socket, 1024);
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          fwrite($socket, "STARTTLS\r\n");
          $result = fread($socket, 1024);
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
                    /*
$crypto_method = STREAM_CRYPTO_METHOD_TLS_CLIENT;

if (defined('STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT')) {
    $crypto_method |= STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT;
    $crypto_method |= STREAM_CRYPTO_METHOD_TLSv1_1_CLIENT;
}

*/


          stream_context_set_option($socket, 'ssl', 'ciphers', 'AES256-SHA');
          stream_context_set_option($socket, 'ssl', 'verify_peer', false);
          stream_context_set_option($socket, 'ssl', 'verify_peer_name', false);
          stream_context_set_option($socket, 'ssl', 'allow_self_signed', true);

 
          stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
          echo "THREAD ".$myid." : SSL connect succeeded to socket ".$socket."\n";
          
          //$helodata = "HELO ".$helodata."\r\n";
          fwrite($socket, $helodata);
          $result = fread($socket, 1024);
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;          
          $mfrom = "MAIL FROM: <".$senderemail.">\r\n";
          fwrite($socket, $mfrom);          
          $result = fread($socket, 1024);
          echo "\nTHREAD $myid : $serverre: $result"."".$mfrom; 
          
          echo "\nTOTAL REMAIN: ".($vallent-$emailstartpoint+1)."\n";
          $bccs = $argv[5];
          if($vallent-$emailstartpoint+1 < $argv[5]){
            $bccs = $vallent-$emailstartpoint+1;
          }

          
                
          for($io = 0; $io < $bccs;$io++){            
            $useremail = $userparts[$emailstartpoint];            
            $emailstartpoint++;      
            $rcpto = "RCPT TO: <".$useremail.">\r\n";
            $fwritesize = fwrite($socket, $rcpto);
            echo "\nTOTAL WRITE BYTES ".$fwritesize."\n";            
            $result = fread($socket, 1024);
            echo "\nTHREAD $myid : $serverre: $result"."".$rcpto." ".$emailstartpoint."   ".$io."    ".$useremaillles."    ".$vallent;
            /*
            if(strpos($result,"450") !== false || strpos($result,"421") !== false || strpos($result,"552") !== false || strpos($result,"554") !== false || strpos($result,"550") !== false || strpos($result,"250") !== false){
            }else{
              exit;
            }
            */
            if(strpos($result,"too") > -1 || strpos($result,"detected") > -1 || strpos($result,"SSL operation") > -1){
                sleep(50);
            }
            
            if($io == $bccs-1){
               echo "\nDONE BCC CHECK IF DESTINATION VALID FOR LAST BCC  $io  $bccs-1   $bccs\n";
            }
          }
           
          if($argv[5] == 1){          
            if(strpos($result,"250") !== false){
            }else{
              $emalinvalid++;
              if($emalinvalid > $maxipinv){
                echo "\nTHREAD ".$myid." : BROKEN IP DESTINATION INVALID: ".$emalinvalid."\n";
                exit;
              }
              if(strpos($result,"459") !== false){
                echo "\nBROKEN IP SKYNET\n";
                exit;
              }
              stream_socket_shutdown($socket,STREAM_SHUT_WR);
              fclose($socket);
              goto boo;
            }
          }


          fwrite($socket, "DATA\r\n");
          $result = fread($socket, 1024);
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          //$tocanonicalise = $dkim."\r\n".$tocanonicalise."\r\n".$message."\r\n.\r\n";
          fwrite($socket, $tocanonicalise);
          $result = fread($socket, 1024);
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          if(strpos($result,"SPF") !== false){
            socket_close($socket);
            exit;
          }
          fwrite($socket, "QUIT\r\n");
          $result = fread($socket, 1024);
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          echo "\nDONE WITH TLS/SSL\n";
          stream_socket_shutdown($socket,STREAM_SHUT_WR);
          fclose($socket);
        }else{
          $socket = socket_create(AF_INET, SOCK_STREAM, 0);        
          if($socket){           
          }else{
            echo "\nCould not create socket\n"; 
            sleep(2);
            goto begicontinue;
          }  
          socket_set_option($socket,SOL_SOCKET, SO_RCVTIMEO, array("sec"=>5, "usec"=>0));
          socket_set_option($socket,SOL_SOCKET, SO_SNDTIMEO, array("sec"=>5, "usec"=>0));
          $result = socket_connect($socket, $serverre, 25);
          if($result){
            echo "\n\nTHREAD ".$myid." : SUCCESS: CONNECTED TO ".$serverre." = PORT 25\n";       
          }else{
            echo "\nTHREAD ".$myid." : BAD FAILD TO CONNECT TO ".$serverre." SERVER IP YOU GIVE\n";
            socket_close($socket);
            sleep(2);
            goto begicontinue;	
          }
          $result = socket_read($socket, 1024) or die("Could not read server response\n");
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          if(strpos($result,"220") !== false){
          }else{
            if(strlen($result) > 0 ){
              exit;
            }else{
              echo "\nTHREAD ".$myid." : BREACKING FOR EMPTY RESPONSE\n";
              sleep(5);
              stream_socket_shutdown($socket,STREAM_SHUT_WR);
              fclose($socket);
              goto boo;
            }
          }
  
          $helodata = "HELO ".$helodata."\r\n";
          socket_write($socket, $helodata, strlen($helodata)) or die("Could not send data to server\n");
          $result = socket_read($socket, 1024) or die("Could not read server response\n");
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          
          $mfrom = "MAIL FROM: <".$senderemail.">\r\n";
          socket_write($socket, $mfrom, strlen($mfrom)) or die("Could not send data to server\n");
          $result = socket_read($socket, 1024) or die("Could not read server response\n");
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result."".$mfrom;
          
          echo "\nTOTAL REMAIN: ".($vallent-$emailstartpoint+1)."\n";
          $bccs = $argv[5];
          if($vallent-$emailstartpoint+1 < $argv[5]){
            $bccs = $vallent-$emailstartpoint+1;
          }
          for($io = 0; $io < $bccs;$io++){            
            $useremail = $userparts[$emailstartpoint];            
            $emailstartpoint++;           
            $rcpto = "RCPT TO: <".$useremail.">\r\n";
            socket_write($socket, $rcpto, strlen($rcpto)) or die("Could not send data to server\n");
            $result = socket_read($socket, 1024) or die("Could not read server response\n");
            echo "\nTHREAD $myid : $serverre: $result"."".$rcpto." ".$emailstartpoint."   ".$io."    ".$useremaillles."    ".$vallent;
            
            /*
            if(strpos($result,"450") !== false || strpos($result,"421") !== false || strpos($result,"552") !== false || strpos($result,"554") !== false || strpos($result,"550") !== false || strpos($result,"250") !== false){
            }else{
              exit;
            }
            */
            if(strpos($result,"too") > -1 || strpos($result,"detected") > -1 || strpos($result,"SSL operation") > -1){
                sleep(50);
            }
            
            if($io == $bccs-1){
                echo "\nDONE BCC CHECK IF DESTINATION VALID FOR LAST BCC  $io  $bccs-1   $bccs\n";
            }
          }
          if($argv[5] == 1){ 
          if(strpos($result,"250") !== false){            
          }else{
            $emalinvalid++;
            if($emalinvalid > $maxipinv){
              echo "\nTHREAD ".$myid." : BROKEN IP DESTINATION INVALID: ".$emalinvalid."\n";
              exit;
            }
            if(strpos($result,"459") !== false){
              echo "\nBROKEN IP SKYNET\n";
              exit;
            }
            goto boo;
          } 
          }   
                
          socket_write($socket, "DATA\r\n", strlen("DATA\r\n")) or die("Could not send data to server\n");
          $result = socket_read($socket, 1024) or die("Could not read server response\n");
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          //$tocanonicalise = $dkim."\r\n".$tocanonicalise."\r\n".$message."\r\n.\r\n";
          socket_write($socket, $tocanonicalise, strlen($tocanonicalise)) or die("Could not send data to server\n");
          $result = socket_read($socket, 1024) or die("Could not read server response\n");
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          if(strpos($result,"SPF") !== false){
            socket_close($socket);
            exit;
          }
          socket_write($socket, "QUIT\r\n", strlen("QUIT\r\n")) or die("Could not send data to server\n");
          $result = socket_read($socket, 1024) or die("Could not read server response\n");
          echo "\nTHREAD ".$myid." : ".$serverre.": ".$result;
          echo "\nDONE WITH NO TLS/SSL\n";           
          socket_close($socket);          
        }

        boo:
        
        echo "\nHEADER SIZE ".strlen($tocanonicalise)."\n\n";
        $dkim = "";$tocanonicalise = "";$message = "";$useremail = "";
        
    } 
 }
}

$emaillist = "";
if(strlen($filesname) > 0){
  $bfille = "";
}
printf("\n\nGOOD\n\n");


function RandomNumberGenerator($nMin,$nMax,$nNumOfNumsToGenerate){
  $nRandonNumber = 0;
  $tott = " ";
  $s = 1;
  $nNumOfNumsToGenerate++;
  $nMax++;
  for($i = 0; $i <= $nNumOfNumsToGenerate;$i++){
    $nRandonNumber = rand()%($nMax-$nMin) + $nMin;
    $valent = substr_count($tott,' ');
    $p = 1;
    for($o = 1;$o<$valent;$o++){
      $tlsenable = explode(' ', $tott);
      $tlsenable = $tlsenable[$o];
      if($tlsenable == $nRandonNumber){
        $i--;
        $p = 0;
        break;
      }else{
        $p = 1;
      }
    }
    if($p){
        $tott = $tott.$nRandonNumber;
        $tott = $tott." ";
        $s++; 
    }
    if($s==$nNumOfNumsToGenerate){
        return $tott;
    }    
  }
}

function encode($email){
    //printf("\n%s",email);
    $ret = "";    
    for($i = 0;$i<strlen($email);$i++){       
        //echo "\n$i  =  ".$email[$i]."\n";              
       if($email[$i] == 'a'){
         $ret = $ret."Zl";
       }
       if($email[$i] == "b"){
         $ret = $ret."sl";
       }
       if($email[$i] == "c"){
         $ret = $ret."nl";
       }
       if($email[$i] == "d"){
        $ret = $ret."vs";
      }
      if($email[$i] == "e"){
        $ret = $ret."Gd";
      }
      if($email[$i] == "f"){
        $ret = $ret."Zc";
      }
      if($email[$i] == "g"){
        $ret = $ret."yo";
      }
      if($email[$i] == "h"){
        $ret = $ret."Dr";
      }
      if($email[$i] == "i"){
        $ret = $ret."Wj";
      }
      if($email[$i] == "j"){
        $ret = $ret."mD";
      }
      if($email[$i] == "k"){
        $ret = $ret."Rc";
      }
      if($email[$i] == "l"){
        $ret = $ret."Ph";
      }
      if($email[$i] == "m"){
        $ret = $ret."Pn";
      }
      if($email[$i] == "n"){
        $ret = $ret."Fv";
      }
      if($email[$i] == "o"){
        $ret = $ret."Nw";
      }
      if($email[$i] == "p"){
        $ret = $ret."wi";
      }
      if($email[$i] == "q"){
        $ret = $ret."ol";
      }
      if($email[$i] == "r"){
        $ret = $ret."lt";
      }
      if($email[$i] == "s"){
        $ret = $ret."gt";
      }
      if($email[$i] == "t"){
        $ret = $ret."ts";
      }
      if($email[$i] == "u"){
        $ret = $ret."mz";
      }
      if($email[$i] == "v"){
        $ret = $ret."Zv";
      }
      if($email[$i] == "w"){
        $ret = $ret."NX";
      }
      if($email[$i] == "x"){
        $ret = $ret."Wh";
      }
      if($email[$i] == "y"){
        $ret = $ret."Ap";
      }
      if($email[$i] == "z"){
        $ret = $ret."Pa";
      }
      if($email[$i] == "A"){
        $ret = $ret."yn";
      }
      if($email[$i] == "B"){
        $ret = $ret."jq";
      }
      if($email[$i] == "C"){
        $ret = $ret."jx";
      }
      if($email[$i] == "D"){
        $ret = $ret."ms";
      }
      if($email[$i] == "E"){
        $ret = $ret."Gw";
      }
      if($email[$i] == "F"){
        $ret = $ret."fq";
      }
      if($email[$i] == "G"){
        $ret = $ret."yi";
      }
      if($email[$i] == "H"){
        $ret = $ret."rt";
      }
      if($email[$i] == "I"){
        $ret = $ret."Wz";
      }
      if($email[$i] == "J"){
        $ret = $ret."Do";
      }
      if($email[$i] == "K"){
        $ret = $ret."sk";
      }
      if($email[$i] == "L"){
        $ret = $ret."ih";
      }
      if($email[$i] == "M"){
        $ret = $ret."on";
      }
      if($email[$i] == "N"){
        $ret = $ret."Fi";
      }
      if($email[$i] == "O"){
        $ret = $ret."sf";
      }
      if($email[$i] == "P"){
        $ret = $ret."wn";
      }
      if($email[$i] == "Q"){
        $ret = $ret."lp";
      }
      if($email[$i] == "R"){
        $ret = $ret."fp";
      }
      if($email[$i] == "S"){
        $ret = $ret."gl";
      }
      if($email[$i] == "T"){
        $ret = $ret."tq";
      }
      if($email[$i] == "U"){
        $ret = $ret."zq";
      }
      if($email[$i] == "V"){
        $ret = $ret."vD";
      }
      if($email[$i] == "W"){
        $ret = $ret."Xi";
      }
      if($email[$i] == "X"){
        $ret = $ret."Wx";
      }
      if($email[$i] == "Y"){
        $ret = $ret."px";
      }
      if($email[$i] == "Z"){
        $ret = $ret."pi";
      }
      if($email[$i] == "1"){
        $ret = $ret."Qh";
      }
      if($email[$i] == "2"){
        $ret = $ret."hx";
      }
      if($email[$i] == "3"){
        $ret = $ret."xs";
      }
      if($email[$i] == "4"){
        $ret = $ret."mq";
      }
      if($email[$i] == "5"){
        $ret = $ret."gs";
      }
      if($email[$i] == "6"){
        $ret = $ret."fe";
      }
      if($email[$i] == "7"){
        $ret = $ret."Ss";
      }
      if($email[$i] == "8"){
        $ret = $ret."xc";
      }
      if($email[$i] == "9"){
        $ret = $ret."wv";
      }
      if($email[$i] == "0"){
        $ret = $ret."zw";
      }
      if($email[$i] == "="){
        $ret = $ret."dQ";
      }
    }    
    return $ret;
}

function substrringrespond($s, $c){  
   $b = 0;   
   $rl;
   $enf;
   $strr = "~";
   bgg:
   $rl = strpos($s,$c);
   for(;;){
    if($rl <= 0 ){
        break;
    }

    $b++;
    $s = substr($s,$rl+strlen($c),strlen($s));
    $enf = strpos($s,"\"");
    $sd =  substr($s,0,$enf)."~";
    $strr = $strr.$sd;
    
    goto bgg;
   }
   $db = "~".$b;
   $strr = $db.$strr;
   return $strr;   
}

?>
?>