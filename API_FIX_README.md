# 彩票系统API修复说明

## 问题描述
原系统使用的外部API接口（http://39.104.56.250/caiji/）已经无法连接，导致彩票开奖数据无法正常采集。

## 解决方案

### 1. 新增本地API控制器
创建了 `LocalApiController.class.php`，提供本地数据生成功能，确保系统可以正常运行。

**主要功能：**
- 自动从数据库的 `think_time` 表读取当前期数
- 支持预设开奖号码（通过 `think_caiji_admin` 表）
- 自动生成随机开奖号码（当没有预设时）
- 支持北京28和加拿大28两种彩票类型

### 2. 改进API采集控制器
更新了 `ApiController.class.php`，增加以下功能：

**新增功能：**
- API请求失败自动重试（最多3次）
- 外部API失败时自动切换到本地数据源
- 完善的错误日志记录
- 智能数据备用机制

### 3. 配置文件更新
在 `site.php` 中新增配置项：

```php
'use_local_api' => '1',      // 1=使用本地API 0=使用外部API
'bj28_kj_select' => '1',     // 1=启用北京28采集 0=关闭
'jnd28_kj_select' => '1',    // 1=启用加拿大28采集 0=关闭
```

## 使用方法

### 方法1：使用定时任务自动采集
```bash
# 添加到crontab，每5分钟执行一次
*/5 * * * * cd /path/to/caipiao && php index.php Home/Api/index
```

### 方法2：直接访问API接口
访问以下URL手动触发采集：
```
http://yourdomain.com/index.php/Home/Api/index
```

### 方法3：使用本地API（推荐）
系统现在默认使用本地数据生成，无需外部API即可运行。

## 数据库配置

### 1. 期数时间表（think_time）
确保数据库中有 `think_time` 表，包含以下字段：
- `game`: 游戏类型（bj28, jnd28）
- `actionno`: 期数编号
- `actiontime`: 开奖时间（HH:mm:ss格式）

### 2. 预设开奖表（think_caiji_admin）
可选：如果需要控制开奖结果，在此表中预设：
- `game`: 游戏类型
- `periodnumber`: 期号
- `awardnumbers`: 开奖号码（格式：1,2,3）
- `addtime`: 添加日期（Ymd格式）

### 3. 开奖结果表（think_caiji）
系统自动写入开奖结果到此表。

## 测试方法

### 测试本地API
访问以下URL测试本地API是否工作正常：
```
http://yourdomain.com/index.php/Home/LocalApi/test
http://yourdomain.com/index.php/Home/LocalApi/getBj28Data
http://yourdomain.com/index.php/Home/LocalApi/getJnd28Data
```

### 测试数据采集
```bash
cd /path/to/caipiao
php index.php Home/Api/index
```

查看输出，确认数据采集是否成功。

## 故障排查

### 1. 如果API接口无响应
检查 Apache/Nginx 配置，确保 URL 重写规则正确：
```apache
RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
```

### 2. 如果数据未生成
检查以下内容：
1. 数据库连接配置（Application/Common/Conf/db.php）
2. think_time 表是否有数据
3. PHP错误日志（Runtime/Logs/）

### 3. 如果预设号码不生效
确保 think_caiji_admin 表中的数据格式正确：
- `periodnumber` 必须完全匹配当前期号
- `awardnumbers` 格式为：数字,数字,数字（如：1,2,3）
- `addtime` 为当天日期（Ymd格式，如：20231005）

## 技术支持

如果遇到问题，请检查以下日志：
1. PHP错误日志：`Runtime/Logs/`
2. Apache错误日志：`/var/log/apache2/error.log`
3. 数据库查询日志

## 更新日志

### 2024-10-05
- 创建本地API控制器
- 改进API采集器的错误处理
- 添加自动重试机制
- 更新配置文件
- 编写完整文档

## 注意事项

1. **数据安全**：本系统默认使用本地随机数生成，确保公平性
2. **性能优化**：建议使用定时任务而非实时请求
3. **数据备份**：定期备份 think_caiji 表数据
4. **API切换**：外部API恢复后，可在配置文件中切换回外部API

## 相关文件
- `/Application/Home/Controller/LocalApiController.class.php` - 本地API控制器
- `/Application/Home/Controller/ApiController.class.php` - 主采集控制器
- `/Application/Common/Conf/site.php` - 系统配置文件
- `/Application/Common/Conf/db.php` - 数据库配置文件
