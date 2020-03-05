<?php

exec('cd /opt/lampp/lampp && git reset --hard && git pull 2>&1', $output);
            print_r($output);  
exec('cd /opt/lampp/lampp/htdocs/extras && git reset --hard && git pull 2>&1', $output);
            print_r($output);  
