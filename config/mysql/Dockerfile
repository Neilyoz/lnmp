# 来源
FROM mysql:8.0.20

MAINTAINER Neilyoz <neilyoz@foxmail.com>

# 创建时区连接
ENV TimeZone=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TimeZone /etc/localtime && echo $TimeZone > /etc/timezone

# Mysql backup 计划任务
# COPY ./scripts/ /data/mysql/backup/scripts/
# RUN crontab /data/mysql/backup/scripts/mysql-crontab
# RUN service cron start

LABEL Author="Neilyoz"
LABEL Version="2020.05"
LABEL Description="PHP 7.4.5 开发环境镜像. "