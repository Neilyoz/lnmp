FROM redis:6.0.1

MAINTAINER Neilyoz <neilyoz@foxmail.com>

# 创建时区连接
ENV TimeZone=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TimeZone /etc/localtime && echo $TimeZone > /etc/timezone

# 复制相关配置
COPY redis.conf /usr/local/etc/redis/redis.conf
CMD ["redis-server", "/usr/local/etc/redis/redis.conf"]

LABEL Author="Neilyoz"
LABEL Version="2020.05"
LABEL Description="PHP 7.4.5 开发环境镜像. "