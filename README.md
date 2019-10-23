# DPWT

Dimensional Printing Web Terminal

Currently a web server to create and manage requests to print objects on specified 3D printers.

## Initial Installation

This install guide is intended for Windows only on the hosting computer.

- Download [XAMPP](https://www.apachefriends.org)
- Set System Enviornemnt Variables: `xamppdir` = Root location of xampp (`C:\xampp`).
- Navigate to apache/bin and locate "httpd." Open a command prompt as admin there and run `httpd -k install`. When complete, run `NET START Apache2.4`. When Started, stop it. (`NET STOP Apache2.4`) This is so that you can stop the website from the developer console.
- Replace `htdocs` in xampp with the contents of `htdocs` in the repo.
- Navigate to `xampp/apache/conf` and apphend the following code somewhere in the middle of `http.conf`:
  ```
    <Directory />
        AllowOverride none
        Require all denied
    </Directory>

    <Location "/console/uploads">
        Order Deny,Allow
        Deny from all
    </Location>
   
    ErrorDocument 404 /http/404.php
    ErrorDocument 403 /http/403.php
- Open the xampp control panel and start Apache and SQL.
- Make sure to set Apache and MySQL to autorun in Config. Also add the control panel to start with Windows.
- Start Apache and MySQL.

=======

- Navigate to http://localhost/phpmyadmin and create a database named `dpwt`.
- Import `dpwt.sql` into the db.
- **TRUNCATE** the tables named `job_data` and `login_data`. The only table that should be filled is `printer_data`.

=======

- Navigate to http://localhost/acc/request
- Make an account.
- After making an account, go back to phpmyadmin to the users table. Set the perms (`permsUsers`) to to whatever the appropriate permission group is. (See below for permission descriptions.) **NOTE:** The first entry in a table is hidden in the web console. This is becasue I'm bad at code. 


# Guides

## Permission Roles

Roles are ordered from most to least powerful. 

- Server: Not a real role. Just here to tell you that `/console/uploads` is restricted from the web.
- Developer (`developer`): Strongest role; Access to everything.
- Admin (`admin`): Access to the Admin Console. Can create and manage jobs created by anyone. Can manage DPWT users. Can manage printers.
- Default (`default`): Default Permissions. Can Request and view jobs created by user.
- Revoked (`revoked`): Previously higher role but access was revoked. Permissions can be returned. Unable to login.
- Unapproved (`awaitingAction`) Newly created account that still needs approval. Unable to login.
- Deleted Account (`deleted`): Placeholder for deleted account. Unable to login.







-
## Copyright
Dimensional Printing Web Terminal (DPWT)

© 2019  Youssef Dbouk\
All Rights Reserved.
