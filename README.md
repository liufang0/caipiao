# 彩票系统 - 快速部署指南

本系统已修复所有外部API连接问题，现在可以完全本地化运行。

## 快速开始

### 1. 环境要求
- PHP 7.0+
- MySQL 5.6+
- Apache/Nginx with mod_rewrite

### 2. 安装步骤

```bash
# 1. 配置数据库
# 编辑 Application/Common/Conf/db.php
# 设置数据库连接信息

# 2. 导入数据库
mysql -u用户名 -p 数据库名 < think_admin.sql

# 3. 初始化时间表数据
php init_time_data.php

# 4. 测试系统
php test_api.php

# 5. 设置定时任务（可选）
./install_cron.sh
```

### 3. 手动运行采集

```bash
php index.php Home/Api/index
```

## 主要改进

### ✓ 修复的问题
1. **外部API失败问题** - 添加本地备用数据源
2. **无错误处理** - 完善的异常捕获和日志记录
3. **缺少文档** - 详细的使用说明和故障排查

### ✓ 新增功能
1. **本地API控制器** - 无需外部API即可运行
2. **自动重试机制** - API失败自动重试3次
3. **智能降级** - 外部API失败自动切换本地数据
4. **初始化脚本** - 一键初始化所需数据表
5. **测试脚本** - 快速验证系统状态
6. **定时任务安装** - 自动化部署cron

## 配置说明

### 数据库配置 (Application/Common/Conf/db.php)
```php
'DB_HOST' => '127.0.0.1',
'DB_NAME' => 'c11',
'DB_USER' => 'c11',
'DB_PWD' => 'c11',
```

### 站点配置 (Application/Common/Conf/site.php)
```php
'use_local_api' => '1',      // 1=使用本地API 0=使用外部API
'bj28_kj_select' => '1',     // 1=启用北京28 0=关闭
'jnd28_kj_select' => '1',    // 1=启用加拿大28 0=关闭
```

## 文件说明

| 文件 | 说明 |
|------|------|
| `init_time_data.php` | 初始化期数时间表 |
| `test_api.php` | 测试系统状态 |
| `install_cron.sh` | 安装定时任务 |
| `API_FIX_README.md` | 详细技术文档 |
| `Application/Home/Controller/LocalApiController.class.php` | 本地API控制器 |
| `Application/Home/Controller/ApiController.class.php` | 主采集控制器（已优化） |
| `Application/Home/Controller/CaiController.class.php` | 采集控制器（已优化） |

## 故障排查

### 问题1: 数据库连接失败
检查 `Application/Common/Conf/db.php` 配置是否正确

### 问题2: think_time表为空
运行 `php init_time_data.php` 初始化数据

### 问题3: 采集无数据
1. 检查日志: `Runtime/Logs/`
2. 运行测试: `php test_api.php`
3. 手动执行: `php index.php Home/Api/index`

### 问题4: 定时任务不执行
```bash
# 查看定时任务
crontab -l

# 查看日志
tail -f Runtime/caiji.log
```

## 技术支持

详细文档: [API_FIX_README.md](API_FIX_README.md)

## 更新日志

### 2024-10-05
- ✓ 修复所有外部API连接问题
- ✓ 添加本地数据生成功能
- ✓ 完善错误处理和日志
- ✓ 添加测试和初始化脚本
- ✓ 创建自动化部署工具

## 系统架构

```
彩票系统
├── Application/              # 应用代码
│   ├── Home/Controller/
│   │   ├── ApiController.class.php          # 主采集控制器
│   │   ├── LocalApiController.class.php     # 本地API
│   │   └── CaiController.class.php          # 采集控制器
│   └── Common/Conf/
│       ├── config.php        # 基础配置
│       ├── db.php           # 数据库配置
│       └── site.php         # 站点配置
├── init_time_data.php       # 初始化脚本
├── test_api.php            # 测试脚本
├── install_cron.sh         # 定时任务安装
└── API_FIX_README.md       # 详细文档
```

## 功能特点

- 🔄 **自动采集**: 定时采集开奖数据
- 🛡️ **容错机制**: API失败自动降级
- 📝 **日志记录**: 完整的操作日志
- ⚙️ **灵活配置**: 多项可配置选项
- 🎯 **预设控制**: 支持预设开奖结果
- 🚀 **快速部署**: 一键初始化和安装

## 安全说明

1. 修改默认数据库密码
2. 限制API访问权限
3. 定期备份数据库
4. 检查日志文件权限

## 许可证

请遵守当地法律法规使用本系统。
