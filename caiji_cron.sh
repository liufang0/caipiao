#!/bin/bash
#
# 彩票数据自动采集脚本
# Auto Collection Script for Caipiao System
#
# 用法 (Usage):
# 1. 给脚本添加执行权限: chmod +x caiji_cron.sh
# 2. 添加到crontab: crontab -e
#    示例: */5 * * * * /path/to/caipiao/caiji_cron.sh >> /path/to/logs/caiji.log 2>&1
#
# 这将每5分钟执行一次数据采集
#

# 获取脚本所在目录
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$SCRIPT_DIR"

# 记录开始时间
echo "=================================="
echo "开始采集 - $(date '+%Y-%m-%d %H:%M:%S')"

# 执行采集
php -f index.php Home/Api/index

# 记录结束时间
echo "采集完成 - $(date '+%Y-%m-%d %H:%M:%S')"
echo "=================================="
echo ""
