#GIOCloud Autoscale
Biznet GIO Cloud :heart: Cloudstack

##Installation <br />
1. Get your API and Secret Key <br />
   a. Login to cloud.biznetgiocloud.com

   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image1.png) <br />
   b. My Profile <br />
   
   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image2.png) <br />
   c. API Credential <br />
   
   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image3.png)
   
2. Run install.sh : 
```
bash install.sh 
```
3. Clone source code : 
```
git clone https://github.com/biznetgiocloud/giocloudautoscale.git 
```
4. Run service mysql : systemctl start mariadb <br />
5. Configure mysql with wizard : mysql_secure_installation <br />
6. Restore sql dump to your mysql server : 
   mysql -u <user_name> -p db_name
   mysql> source <full_path>/autoscale.sql <br />
7. Install cs : pip install cs <br />
8. Modify cloudstack.ini file according to your profile <br />
9. Modify config.php file according to your environment <br />
10. Open your autoscale dashboard : http://yourip/dashboard.php <br />
![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/Screen%20Shot%202016-10-03%20at%203.32.58%20PM.png)<br />
11. Create crontab to run autoscale.php<br />
<br /><br />
More technical detail : biznetgiocloud.com
