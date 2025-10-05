# 彩票系统部署和设置指南
# Caipiao System Setup Guide

## 快速开始

### 1. 环境检查

确保您的服务器满足以下要求：

- PHP 5.3+ (推荐 PHP 7.4)
- MySQL 5.5+
- Apache/Nginx
- PHP扩展: curl, json, pdo_mysql

检查PHP版本:
```bash
php -v
```

检查PHP扩展:
```bash
php -m | grep -E "curl|json|pdo_mysql"
```

### 2. 数据库配置

编辑 `Application/Common/Conf/db.php`:

```php
'DB_HOST' => '127.0.0.1',     // 数据库主机
'DB_NAME' => 'c11',           // 数据库名称
'DB_USER' => 'c11',           // 数据库用户名
'DB_PWD' => 'c11',            // 数据库密码
'DB_PORT' => '3306',          // 数据库端口
'DB_PREFIX' => 'think_',      // 数据库表前缀
```

导入数据库:
```bash
mysql -u root -p < think_admin.sql
```

### 3. 目录权限设置

设置Runtime目录可写:
```bash
chmod -R 777 Runtime/
chmod -R 777 Uploads/
```

### 4. API配置

编辑 `Application/Common/Conf/site.php` 配置API地址:

```php
'pk10_api' => 'http://your-api-domain/api/pk10',
'xyft_api' => 'http://your-api-domain/api/xyft',
'ssc_api' => 'http://your-api-domain/api/ssc',
'bj28_api' => 'http://your-api-domain/api/bj28',
'jnd28_api' => 'http://your-api-domain/api/jnd28',
```

### 5. 测试API

在浏览器中访问:
```
http://your-domain/api_test.php
```

这将测试所有配置的API并显示诊断信息。

### 6. 配置自动采集（可选）

#### 方式1: 使用Cron定时任务

编辑crontab:
```bash
crontab -e
```

添加以下行（每5分钟执行一次）:
```cron
*/5 * * * * /path/to/caipiao/caiji_cron.sh >> /path/to/logs/caiji.log 2>&1
```

或者直接使用PHP命令:
```cron
*/5 * * * * cd /path/to/caipiao && php -f index.php Home/Api/index >> /path/to/logs/caiji.log 2>&1
```

#### 方式2: 手动执行

```bash
# 使用Shell脚本
./caiji_cron.sh

# 或直接使用PHP
php -f index.php Home/Api/index
```

### 7. Web服务器配置

#### Apache (.htaccess)

项目已包含.htaccess文件，确保Apache启用了mod_rewrite:
```bash
a2enmod rewrite
service apache2 restart
```

#### Nginx

配置示例:
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/caipiao;
    index index.php index.html;

    location / {
        if (!-e $request_filename) {
            rewrite ^(.*)$ /index.php?s=$1 last;
            break;
        }
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## 常见问题解决

### API连接失败

1. 运行 api_test.php 诊断
2. 检查服务器防火墙设置
3. 确认API URL是否正确
4. 查看PHP错误日志

### 数据库连接失败

1. 检查数据库配置
2. 确认MySQL服务运行中
3. 验证用户权限
4. 检查防火墙端口

### 页面显示错误

1. 检查Runtime目录权限
2. 查看Runtime/Logs/下的日志文件
3. 启用调试模式（index.php中设置APP_DEBUG为true）
4. 检查PHP错误日志

### 采集任务不执行

1. 检查cron日志: `/var/log/cron`
2. 确认脚本有执行权限
3. 手动运行测试
4. 检查PHP CLI路径

## 安全加固

### 生产环境配置

1. **关闭调试模式**

编辑 index.php:
```php
define('APP_DEBUG', false);
```

2. **限制目录访问**

在Runtime和Application目录添加.htaccess:
```apache
Deny from all
```

3. **修改默认密码**

首次登录后立即修改管理员密码

4. **定期备份**

设置数据库自动备份:
```bash
# 添加到crontab
0 2 * * * mysqldump -u root -p'password' c11 > /backup/caipiao_$(date +\%Y\%m\%d).sql
```

5. **更新依赖**

定期检查和更新ThinkPHP框架

## 监控和维护

### 日志位置

- PHP错误日志: `/var/log/php/error.log` (视配置而定)
- 应用日志: `Runtime/Logs/`
- 采集日志: 如配置了cron，在指定的日志文件中

### 性能优化

1. 启用OPcache
2. 配置MySQL查询缓存
3. 使用Memcached或Redis缓存
4. 定期清理旧数据

## 技术支持

遇到问题请：

1. 查看README.md文档
2. 检查日志文件
3. 运行api_test.php诊断
4. 查看GitHub Issues

## 更新日志

### 最新版本

- 增强API错误处理
- 添加API测试工具
- 改进日志记录
- 修复逻辑bug
- 添加自动化部署脚本
