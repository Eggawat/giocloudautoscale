#!/bin/bash
yum -y install epel-release
yum -y install git
yum -y install httpd
yum -y install php --skip-broken
yum -y install php-mysql
yum -y install python --skip-broken
yum -y install mariadb-server mariadb
yum -y install python-pip
