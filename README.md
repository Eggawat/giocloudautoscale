#GIOCloud Autoscale
Biznet GIO Cloud :heart: Cloudstack

1. Get your API and Secret Key <br />
   a. Login to cloud.biznetgiocloud.com

   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image1.png) <br />
   b. My Profile <br />
   
   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image2.png) <br />
   c. API Credential <br />
   
   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image3.png)
   
2. Clone source code : git clone https://github.com/biznetgiocloud/giocloudautoscale.git <br />
3. Run install.sh : bash install.sh <br />
4. Run service mysql : systemctl start mariadb <br />
5. Configure mysql with wizard : mysql_secure_installation <br />
6. Restore sql dump to your mysql server : 
   mysql -u <user_name> -p db_name
   mysql> source <full_path>/autoscale.sql <br />
7. Install cs : pip install cs <br />
8. Modify cloudstack.ini file according to your profile <br />
9. Open your autoscale dashboard : http://yourpublicip/dashboard.php <br />

More technical detail : biznetgiocloud.com
