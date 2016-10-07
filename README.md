#GIOCloud Autoscale
Biznet GIO Cloud :heart: Cloudstack

##Installation <br />
-  Get your API and Secret Key <br />
   a. Login to cloud.biznetgiocloud.com

   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image1.png) <br />
   b. My Profile <br />
   
   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image2.png) <br />
   c. API Credential <br />
   
   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image3.png)
   
   
-  Run install.sh : 
```
bash install.sh 
```
-  Clone source code : 
```
git clone https://github.com/biznetgiocloud/giocloudautoscale.git 
```
-  Run service mysql : 
```
systemctl start mariadb
```
-  Configure mysql with wizard :
```
mysql_secure_installation
```
-  Restore sql dump to your mysql server : 
```
mysql -u <user_name> -p db_name
mysql> source <full_path>/autoscale.sql <br />
```
-  Install cs :
```
pip install cs
```
-  Modify cloudstack.ini file according to your profile <br />
-  Modify config.php file according to your environment <br />
-  Open your autoscale dashboard : http://yourip/dashboard.php <br />
![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/Screen%20Shot%202016-10-03%20at%203.32.58%20PM.png)<br />
-  Create crontab to run autoscale.php<br />
<br /><br />
More technical detail : biznetgiocloud.com
