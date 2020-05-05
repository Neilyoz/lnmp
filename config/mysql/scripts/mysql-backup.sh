#!/bin/sh
mDATE=\$(date +%Y%m%d)
mkdir /data/mysql/backup/\$mDATE
mysqldump -h '127.0.0.1' -uroot -p'123456' --databases 数据库名字 > /data/mysql/backup/\$mDATE/数据库名字.sql