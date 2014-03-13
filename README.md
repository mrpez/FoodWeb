FoodWeb
=======

FoodWeb is a service based application with which food can be ordered via the web from local food vendors who will deliver to you.

Set Up - How To
=======

To setup the FoodWeb codebase, go to XAMPP, link to lite version: http://softlayer-ams.dl.sourceforge.net/project/xampp/XAMPP%20Windows/1.8.3/xampp-portable-win32-1.8.3-3-VC11-installer.exe.
Once downloaded, run the installer. Install the product to any location you would like. If you are using a school computer, throw it on your H: drive so you can use it on another computer. 
The only required components are PHP and MySQL, check the rest if only you would like. 

Once installed, run the control panel (the exe for this is in the install directory root).
Configure apache httpd.conf first. Changes needed:
<ul>
<li>Change 'Listen 80' to 'Listen 8880'</li>
<li>Change 'ServerName localhost:80' to 'ServerName localhost:8880'</li>
<li>Under the [&lt;Directory &gt;] block, change 'Require all denied' to 'Require all granted'</li>
<li>
 Change 'DocumentRoot "[install directory]"' to 'DocumentRoot "[The webRoot folder in your cloned repo]"
 and do the same thing with the directory in quotes directly below the DocumentRoot line
</li>
<li>Save the Document</li>
</ul>
 
Next configure apache httpd-ssl.conf
<ul>
<li>Change 'Listen 443' to 'Listen 4443'</li>
<li>Change '&lt;VirtualHost _default_:443&gt;' to '&lt;VirtualHost _default_:4443&gt;'</li>
<li>Save this file as well</li>
</ul>

Now you should be able to click start on APACHE and MySQL from the control panel. Browsing to http://127.0.0.1:8880 should provide you with the homepage for your cloned version of FoodWeb.
