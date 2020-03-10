<?php

exec("cd /opt/lampp/lampp && git reset --hard && git pull 2>&1", $retArr, $output);
            echo($output);  
            echo('/n/n');
exec("cd /opt/lampp/lampp/htdocs/extras && git reset --hard && git pull 2>&1", $retArr, $output);
            echo($output); 
