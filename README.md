1. Get your API and Secret Key
   a. Login to cloud.biznetgiocloud.com
   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image1.png)
   b. My Profile
   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image2.png)
   c. API Credential
   ![alt tag] (https://github.com/biznetgiocloud/giocloudautoscale/blob/master/img/image3.png)
2. Clone source code : git clone https://github.com/biznetgiocloud/giocloudautoscale.git
3. Run install.sh : bash install.sh
4. Run service mysql : systemctl start mariadb
5. Configure mysql with wizard : mysql_secure_installation
6. Restore sql dump to your mysql server : 
   mysql -u <user_name> -p db_name
   mysql> source <full_path>/autoscale.sql
7. Install cs : pip install cs
8. Modify cloudstack.ini file according to your profile
