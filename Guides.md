# Guides
This is a guide on operating DPWT.\
To make the guide simpler, we will use a fake URL at http://www.dpwt.org. **DO NOT ACTUALLY GO TO THIS WEBSITE.** Just translate this to wherever it is hosted currently.

## Basics

http://www.dpwt.org is the home page.\
On the top of the page is the header. To the left of the header is the name of the website. It is a button to the home page. To the right of the header is the navigation panel. There, you will see links to the specific parts of the website, like account, console, etc.\
The bottom of the page houses the footer. You will seldom use it. It just contains some quick-links and copyright information.

# Account

## Request/Create An Account

First, navigate to the request page. You can either do this by using the `Request Access` link in the footer or by clicking `Request Access Here` right below the login button on the login page. Once on the page, fill out the details needed, then submit. You are done. Now, an admin has to give you permissions so you can log in.

## Login

Click the `Login` button on the header. This will only show up if you are currently logged out. Once on the page, fill out the details needed, then submit. Fater submitting, select the printer you want to use, the press `Select this Printer`.

## Accessing Account Details

**NOTE:** This page is currently being worked on, so there is no way to access it normally. However, you could get to it by going to `dpwt.org/acc` when logged in.\
This page consists of your account data. You can not edit this information. However, if you need to change something, contact an admin. You can also change your password here.

## Changing Your Own Password

To change your password, go to the accounts page, the click on `Change Password`. Then, type your new password in, and submit.

## Resetting Another User's Password (Admin Only)

Please refer to `Reset a User's Password` in the `Admin Console` section.

# Console

First, you have to be logged in to access the console. On the header, click `Console`. Then, you will see a different number of options based on your rank.

## Request a Print

To Request a print, navigate to the console, and click `Make a Print`. Then, fill out the form. After filling it out, click the orange button and upload your file. Currently, the only accepted file type is `STL`. After filling out the form and uploading your file, submit. You are done. Now, an admin must review and accept your request for your model to print.\
**NOTE:** There is a checkbox labeled `Auto Accept` that only admins can see and use. This is to skip the review process and automatically put the job on queue.

## View Your Prints

To view your prints, navigate to the console, and click on `View Your Prints`. From there, you can see detailed information about your job, such as location and status. You can also click `View` on the rightmost side of the table to view your model.\
**NOTE:** There is a link only visible to admins labeled `Manage Print Requests` on the top of the page. Clicking this will lead you to the Job Manager, which allows admins to view and manage all jobs.

# Admin Console

This is only available to admins. To get to the Admin Console, go to the regular console, and click `Admin Console`.

## Manage Users
 
To manage users, go to the Admin Console, and click on `User Management`. From there, you can see all users registered on DPWT. At first, users needing access are the only thing you'll see. To see all the users, click on `Show All Users` at the top of the page. To edit a user, first find the user in the table, then click `edit` on the rightmost side of the table. This will bring up a detailed view of the user, where the edit options are.

- **Manage New Users:** Once a new user creates an account, they will be automatically given the `Awaiting Review` role. This will prevent them from logging in until they recieve permissions. To give them permissions, bring up the detailed view of the user. From there, you will see two options, `Give Permissions` and `Deny`. Obvioulsly, the `Deny` button will deny them access and will not allow them to log in. The `Give Permissions` button will bring up a dropdown box requesting a rank. Select the rank you want to give that user, then submit.

- **Reset a User's Password:** To reset another user's password, navigate to the Admin Console, and to `User Management`. From there. find the user whose password you want to reset. Then, view the user. There will be a red button labeled `Reset Password`. Clicking it will reset their passeord to the default password (`lmps3D`). If nothing shows up, then you can not reset that user's password. It will have to be manually reset.

- **Delete an Account:** To delete an account, make sure that user does not have any active jobs (On Queue, Printing, Processing). Please note that any jobs that are not already purged will be purged. Navigate to the Admin Console and go to `User Management`. From there, find the user whose account you want to delete, and view the user. Click on the `Delete User` button. A confirmation prompt will show up where you have to type the username of the account. Just in case, the username is in the parentheses () at the end of the prompt text. After typing in the *exact* username, confirm. Depending on the user's number of jobs, this may take a while.

## Manage Jobs

To manage jobs, go to the Admin Console, and click `Job Management`. From there, you can see all jobs. To edit a job, first find it, then click `View` on the rightmost side of the table. This will bring up the detailed view of the job, where the edit options are.\
**NOTE:** Please always check for jobs that need review as you are not notified of new ones.\
**NOTE:** Denied, complete, and purged jobs are not shown. To see those, click `Include Denied, Purged and Completed Prints` at the top of the page.

- **Manage New Jobs:** Once a user creates a job, you will need to either accept or deny it. To do this, bring up the detailed view of the job. From there, you will see two options, `Accept Job` and `Deny Job`. Obvioulsly, the `Deny Job` button will not let the job continue to the queue. The `Accept Job` button will put the job on the queue. When it is first on queue, it will start printing.

- **Pause Prints:** If a print is already on queue, you can temporarily remove it by pausing the job. To pause the job, bring up the detailed view of the job you want to pause. Then, press `Pause Job`. To Unpause a print, click on the `Unpause Job` button.

- **View Jobs In 3D:** To view a job in 3D, first find one. Then, open the detailed view, and click on `View in 3D`. Once done, click on `<< Back` on the top left of the page to return.

- **Purge Jobs:** To purge a job, make sure it is not in an active state (On Queue, Printing, Processing). First, find it, and open the detailed view. Then, click on the `purge` button, and confirm. To purge a print that is on the queue, first pause it, then purge it.

## Printer Management

**NOTE:** This page is not finished yet and is broken, so please do not access it. The guide for it will be available once it is done.



# Copyright

Dimensional Printing Web Terminal (DPWT)

© 2019  Youssef Dbouk\
All Rights Reserved.
