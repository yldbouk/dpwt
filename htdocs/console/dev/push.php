<?php

if($_POST['payload']){
shell_exec('cd C:\xampp && git reset --hard HEAD && git pull');
}
