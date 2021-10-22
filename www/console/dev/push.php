<?php

$output = shell_exec('cd /opt/lampp/lampp && git reset --hard && git pull');
            echo($output);  
            echo('\n\n');
$output = shell_exec('cd /opt/lampp/lampp/htdocs/extras && git reset --hard && git pull');
            echo($output);  
