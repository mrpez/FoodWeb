FoodWeb
=======

FoodWeb is a service based application with which food can be ordered via the web from local food vendors who will deliver to you.

Better/Easier Set Up
=======
Since we need this on the school computers, here is an easier way of doing things.<br />
<ul>
<li>Download the zipped portable edition from <a href="http://softlayer-dal.dl.sourceforge.net/project/xampp/XAMPP%20Windows/1.8.3/xampp-portable-win32-1.8.3-2-VC11.7z">here</a></li>
<li>Use 7-zip (right click, find 7-zip option) and extract to H: drive. Rename folder to XAMPP</li>
<li>
	Navigate into the folder you just extracted. Open the apache folder, open the conf folder, and edit httpd.conf
	<ul>
		<li>Change this 
<pre>
&lt;Directory /&gt;
    AllowOverride none
    Require all denied
&lt;/Directory&gt;
</pre>
to this
<pre>
&lt;Directory /&gt;
    AllowOverride none
    Require all granted
&lt;/Directory&gt;
</pre>
		</li>
		<li>Change this
<pre>
DocumentRoot "/My Documents/xampp/htdocs"
&lt;Directory "/My Documents/xampp/htdocs"&gt;
</pre>
to this (unless your FoodWeb clone is located somewhere else)
<pre>
DocumentRoot "/Desktop/GitHub/FoodWeb/webRoot"
&lt;Directory "/Desktop/GitHub/FoodWeb/webRoot"&gt;
</pre>
		
		</li>
	</ul>
</li>
<li>
	That&apos;s it! To start the server, open apache_start.bat and mysql_start.bat in the top of the XAMPP folder.
</li>
</ul>

Pulling Changes
=======
Pulling changes from other's repo into your own fork.
<ul>
	<li>
		In the GitHub app, under the repositories section, right click on your clone of the FoodWeb repository
		and select &apos;Open a shell here&apos;
	</li>
	<li>
		After waiting for the shell to initialize (takes some time) type &apos;git pull https://github.com/[username]/FoodWeb&apos; and press Enter
	</li>
	<li>
		This should have merged the new changes into your local clone of your repo. To then merge into your
		online GitHub account, close the prompt window and &apos;Sync&apos; your repo up.
	</li>
</ul>

Additional Changes (Port Changing)
=======

Sometimes port 80 might be taken by another process on your system. This shows how to change that.

Configure apache httpd.conf. Changes needed:
<ul>
<li>Change 'Listen 80' to 'Listen 8880'</li>
<li>Change 'ServerName localhost:80' to 'ServerName localhost:8880'</li>
<li>Save the Document</li>
</ul>
 
Next configure apache httpd-ssl.conf
<ul>
<li>Change 'Listen 443' to 'Listen 4443'</li>
<li>Change '&lt;VirtualHost _default_:443&gt;' to '&lt;VirtualHost _default_:4443&gt;'</li>
<li>Save this file as well</li>
</ul>

Now you should be able to click start on APACHE and MySQL from the control panel. Browsing to http://127.0.0.1:8880 should provide you with the homepage for your cloned version of FoodWeb.
