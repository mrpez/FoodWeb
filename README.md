FoodWeb
=======

FoodWeb is a service based application with which food can be ordered via the web from local food vendors who will deliver to you.

Set Up - How To
=======

To setup the FoodWeb codebase, go to XAMPP, link to lite version: http://softlayer-ams.dl.sourceforge.net/project/xampp/XAMPP%20Windows/1.8.3/xampp-portable-win32-1.8.3-3-VC11-installer.exe.
Once downloaded, run the installer. Install the product to any location you would like. If you are using a school computer, throw it on your H: drive so you can use it on another computer. 
The only required components are PHP and MySQL, check the rest if only you would like. 

Once installed, run the control panel (the exe for this is in the install directory root).
Configure apache httpd.conf first. Changes needed: change 'Listen 80' to 'Listen 8880', 'ServerName localhost:80' to 'ServerName localhost:8880', under the Directory block
 change 'Require all denied' to 'Require all granted', finally in document root text in quotes to the location of your cloned GIT repo (mine is 'C:\Users\Ryan\...\FoodWeb') and the text in quotes 
 one line immeditately below. Finally save the file.
 
Next configure apache httpd-ssl.conf. Change 'Listen 443' to 'Listen 4443' and change '<VirtualHost _default_:443>' to '<VirtualHost _default_:4443>'. Save this file as well.

Now you should be able to click start on APACHE and MySQL. Browsing to http://127.0.0.1:8880 should provide you with the homepage for your cloned version of FoodWeb.