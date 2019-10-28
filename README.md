# DPWT

Dimensional Printing Web Terminal

Currently a web server to create and manage requests to print objects on specified 3D printers.

## Initial Installation

This install guide is intended for Windows only on the hosting computer.

- Download [XAMPP](https://www.apachefriends.org)
- Set System Enviornemnt Variables: `xamppdir` = Root location of xampp (`C:\xampp`).
- Make sure `git` is a valid command in cmd.
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


# Roles

## Permission Roles

Roles are ordered from most to least powerful.\
Note that `/console/uploads` is restricted from the web and can only be accessed through the local machine or ftp. Not that you need to access the folder anyway.

- Developer (`developer`): Strongest role; Access to everything.
- Admin (`admin`): Access to the Admin Console. Can create and manage jobs created by anyone. Can manage DPWT users. Can manage printers.
- Default (`default`): Default Permissions. Can Request and view jobs created by user.
- Password Reset (`newUser`): Will force user to reset their password upon login. (The Default Password is `lmps3D`.)
- Revoked (`revoked`): Previously higher role but access was revoked. Permissions can be returned. Unable to login.
- Unapproved (`awaitingAction`) Newly created account that still needs approval. Unable to login.
- Deleted Account (`deleted`): Placeholder for deleted account. Unable to login.

## Job Roles

These are used to identify the status of print jobs.

- Needs Review (`review`): Newly created job that needs review.
- On Queue (`queue`): On queue for printing. 
- Paused (`paused`): Was previously accepted, but is not on queue.
- Printing (`printing`): Is currently printing.
- Needs Processing (`complete_waiting`): Is finished printing and still on the printer. Complete the form while setting the job as complete in job viewer.
- Complete (`complete`): It's a complete job.
- Denied (`denied`): Is a job that was denied.
- Purged (`purge`): Placeholder for deleted job.

## Printer Settings

These are settings for the printers.

- Name (readonly): The name of the printer.
- Grade (readonly): Restricts printers that are not the same grade as user. (not implemented)
- Filament Color: Color of the filament currently in the printer. Only used for file preview.
- Locked: Locks the printer so users can not access or create jobs on it.

# Guides
The guides are located [here.](Guides.md)

## Copyright
Dimensional Printing Web Terminal (DPWT)

© 2019  Youssef Dbouk\
All Rights Reserved.
