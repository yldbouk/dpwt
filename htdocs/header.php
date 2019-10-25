<?php

# header file
# define variables based on what you want to show up in the header.
# Eg. $console-active 
# When defined, will set the console link as active.

?>
<header>
      <div class="header">
      
        <a href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?> class="logo">D P W T</a>
        
        <div class="header-right">
        <nav>
            
           <?php if(isset($_SESSION['userid'])) echo "<text>".$_SESSION['userUid']."</text>"?><a />
           
           <a href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>" #class active >Home</a>
            
            <?php if(isset($_SESSION['userid'])) echo "<a href='console'>Console</a>"?><a />
            
            <?php
            
            if (isset($_SESSION['userUid'])) {
              echo '<a class="blacknav" href="acc/logout">Logout</a>';
            } else {
              echo '<a href="acc/">Login</a>';
            }
            
            ?>
          </nav>
        </div>
      </div>
    </header> 
