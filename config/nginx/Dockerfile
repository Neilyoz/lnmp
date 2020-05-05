# 来源
FROM nginx:1.18.0

# 创建时区连接
ENV TimeZone=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TimeZone /etc/localtime && echo $TimeZone > /etc/timezone

LABEL Author="Neilyoz"
LABEL Version="2020.05"
LABEL Description="PHP 7.4.5 开发环境镜像. "