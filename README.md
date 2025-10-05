# 彩票系统 (Caipiao System)

## 项目说明

这是一个基于ThinkPHP 3.x框架的彩票系统，支持多种彩票游戏的数据采集和投注管理。

## 最新更新 (Latest Updates)

### API接口修复 (API Interface Fixes)

针对API接口连接问题进行了全面修复和优化：

#### 主要改进：

1. **增强的错误处理**
   - API请求失败时返回false而不是错误消息
   - 添加了HTTP状态码检查
   - 增加了连接超时和总超时设置
   - 添加了重定向跟随功能

2. **API可用性验证**
   - 在发起请求前检查API URL是否配置
   - 验证返回数据格式的有效性
   - 自动跳过无效的API请求

3. **改进的超时设置**
   - 连接超时：5秒
   - 数据传输超时：10-15秒
   - 支持自定义超时参数

4. **详细的日志记录**
   - 记录API请求失败的详细信息
   - 记录HTTP状态码和错误原因
   - 便于问题诊断和调试

5. **逻辑修复**
   - 修复了条件判断的逻辑运算符优先级问题
   - 改进了JSON数据解析的安全性
   - 添加了continue语句避免处理无效数据

#### 配置说明：

API接口地址在 `Application/Common/Conf/site.php` 中配置。

#### API测试工具：

使用 `api_test.php` 测试所有API的可用性：

```bash
# 在浏览器中访问
http://your-domain/api_test.php
```

该工具会测试所有配置的API连接、显示响应时间、验证数据格式并提供详细的诊断信息。

#### 故障处理机制：

1. **API失败时的处理**：系统会记录错误日志，跳过本次数据采集，等待下一个采集周期重试

2. **无API配置时**：bj28和jnd28游戏会使用系统预设数据，其他游戏会跳过采集并记录警告

3. **数据采集优先级**：首先尝试从外部API获取，API失败时使用预设数据（如果有），最后使用随机数据作为兜底

#### 常见问题：

**Q: API请求总是失败怎么办？**

A: 运行 api_test.php 诊断具体原因，检查服务器网络连接，确认API地址是否正确

**Q: 系统支持哪些游戏？**

A: 北京赛车(pk10)、幸运飞艇(xyft)、重庆时时彩(ssc)、北京快乐8(bj28)、加拿大28(jnd28)

## 系统要求

- PHP 5.3.0 或更高版本（推荐 PHP 7.4）
- MySQL 5.5 或更高版本
- Apache/Nginx Web服务器
- PHP扩展：curl, json, pdo_mysql

## 安装说明

1. 上传所有文件到Web服务器
2. 导入数据库文件 think_admin.sql
3. 配置数据库连接 Application/Common/Conf/db.php
4. 配置站点信息 Application/Common/Conf/site.php
5. 设置Runtime目录可写权限
6. 访问网站进行初始化

## 安全建议

1. 部署到生产环境前，将index.php中的APP_DEBUG改为false
2. 定期更换数据库密码
3. 限制Runtime、Application目录的Web访问
4. 配置防火墙规则
5. 定期备份数据库

## 技术支持

如遇到问题，请检查PHP错误日志、Runtime/Logs目录下的日志文件、使用api_test.php诊断API问题。
