# 来源
FROM nginx:1.18.0

MAINTAINER Neilyoz <neilyoz@foxmail.com>

# 创建时区连接
ENV TimeZone=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TimeZone /etc/localtime && echo $TimeZone > /etc/timezone
