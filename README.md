# DPWT

Dimensional Printing Web Terminal

Management software that allows users to create and manage requests to print on specified 3D printers.\
Future plans include fully automating the printer side of things.

## Getting Started

This guide assumes you have Debian Linux on the hosting computer.

- Install Docker and git: `apt-get install docker git`
- Clone this repo: `git clone https://github.com/yldbouk/dpwt && cd dpwt`
- Start the containers: `docker-compose up`
- Wait a couple minutes for the containers to install. While you wait, look for a line that looks like `YOUR MYSQL PASSWORD IS:`. Make note of the password that follows.
- Navigate to http://localhost/acc/request.php
- Make an account.
- After making an account, go to http://localhost:81 and log in with the username `root` and the password that you made note of. Navigate the the database named `dpwt` and then to the table named `login_data`. Set the column `permsUsers` to `developer`. (See below for additional permissions.)
- You should be done. Login to the website and enjoy.

# Roles

## Permission Roles

Roles are ordered from most to least powerful.\
Note that the `/console/uploads` folder stores files used for printing and cannot be accessed from the web.

- Developer (`developer`): Access to everything.
- Admin (`admin`): Can create and manage jobs, printers, or users.
- Default (`default`): Can request and view jobs created by themselves.
- Password Reset (`newUser`): Forces the user to reset their password upon login. (The default Password is `lmps3D`.)
- Revoked (`revoked`): Disallows the ability to sign in.
- Unapproved (`awaitingAction`) Newly created account that still needs approval. Unable to login.
- Deleted Account (`deleted`): Placeholder for deleted account. Unable to login.

## Job Roles

These are used to identify the status of print jobs.

- Needs Review (`review`): Newly created and needs review.
- On Queue (`queue`): In queue for printing. 
- Paused (`paused`): Accepted, but is not on queue.
- Printing (`printing`): Currently printing.
- Needs Processing (`complete_waiting`): Finished printing and still on the printer.
- Complete (`complete`): Fully complete.
- Denied (`denied`): A job that was denied.
- Purged (`purge`): Placeholder for deleted job.

## Printer Settings

These are settings for the printers.

- Name (readonly): The name of the printer.
- Filament Color: Color of the filament currently in the printer. Only used for file preview.
- Locked: Locks the printer so users can not access or create jobs on it.

# Guides
The guides are located [here.](Guides.md)

## Copyright
Dimensional Printing Web Terminal (DPWT)

© 2019-2021 Youssef Dbouk, Dean Anderson\
All Rights Reserved.
