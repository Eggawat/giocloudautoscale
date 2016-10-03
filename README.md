Get your API and Secret Key



1. Clone source code : git clone https://github.com/biznetgiocloud/giocloudautoscale.git
2. Run install.sh : bash install.sh
3. Run service mysql : systemctl start mariadb
4. Configure mysql with wizard : mysql_secure_installation
5. Restore sql dump to your mysql server : 
mysql -u <user_name> -p db_name
mysql> source <full_path>/autoscale.sql
6. Install cs : pip install cs
7. Modify cloudstack.ini file according to your profile
