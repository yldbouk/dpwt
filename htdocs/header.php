<?php

# header file
# define variables based on what you want to show up in the header.
# Eg. $console-active 
# When defined, will set the console link as active.

if(!isset($homeActive)) $homeActive = FALSE;
if(!isset($consoleActive)) $consoleActive = FALSE;
if(!isset($accActive)) $accActive = FALSE;
if(!isset($loginActive)) $loginActive = FALSE;

?>
<header>
      <div class="header">
        <a onclick="document.location.href=window.location.origin;" class="logo">D P W T</a>
        <div class="header-right">
        <nav> 
           <?php if(isset($_SESSION['userid'])) echo "<text>".$_SESSION['userUid']."</text>"?>
        
           <a onclick="document.location.href=window.location.origin;" <?php if($homeActive) echo "class='active'";?>>Home</a>
            <a />
           <?php if(isset($_SESSION['userid'])) echo "<a onclick='window.location.href=window.location.origin+`/console`;'"; if($consoleActive) echo "class='active'"; echo ">Console</a>";?>
            <a />
            <?php if(isset($_SESSION['userid'])) echo "<a onclick='window.location.href=window.location.origin+`/acc`;'"; if($accActive) echo "class='active'"; echo ">Account</a>";?>
            <a />
            <?php if(isset($_SESSION['userid']))echo '<a class="blacknav" onclick="document.location.href=window.location.origin+`/acc/logout`;">Logout</a>'; else echo '<a '; if($loginActive) echo "class='active'"; echo 'onclick="document.location.href=window.location.origin+`/acc/login`;">Login</a>'; ?>
          </nav>
        </div>
      </div>
    </header> 
