#!/bin/bash
#
# 彩票系统定时任务安装脚本
# 用于设置cron定时任务，自动采集开奖数据
#

echo "================================="
echo "彩票系统定时任务安装脚本"
echo "================================="
echo ""

# 获取当前脚本所在目录
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

echo "项目目录: $SCRIPT_DIR"
echo ""

# 检查PHP路径
PHP_PATH=$(which php)
if [ -z "$PHP_PATH" ]; then
    echo "错误: 未找到PHP命令"
    exit 1
fi
echo "PHP路径: $PHP_PATH"
echo ""

# 定时任务配置
CRON_JOB="*/5 * * * * cd $SCRIPT_DIR && $PHP_PATH index.php Home/Api/index >> $SCRIPT_DIR/Runtime/caiji.log 2>&1"

echo "将要添加的定时任务:"
echo "$CRON_JOB"
echo ""

# 检查是否已存在相同的定时任务
if crontab -l 2>/dev/null | grep -q "$SCRIPT_DIR.*Home/Api/index"; then
    echo "警告: 已存在类似的定时任务"
    echo ""
    echo "当前的定时任务:"
    crontab -l | grep "$SCRIPT_DIR.*Home/Api/index"
    echo ""
    read -p "是否要替换？(y/n): " -n 1 -r
    echo ""
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        # 删除旧的任务
        crontab -l | grep -v "$SCRIPT_DIR.*Home/Api/index" | crontab -
        echo "已删除旧的定时任务"
    else
        echo "取消安装"
        exit 0
    fi
fi

# 添加新的定时任务
(crontab -l 2>/dev/null; echo "$CRON_JOB") | crontab -

if [ $? -eq 0 ]; then
    echo "✓ 定时任务安装成功！"
    echo ""
    echo "定时任务将每5分钟执行一次数据采集"
    echo "日志文件: $SCRIPT_DIR/Runtime/caiji.log"
    echo ""
    echo "查看当前所有定时任务:"
    echo "  crontab -l"
    echo ""
    echo "查看采集日志:"
    echo "  tail -f $SCRIPT_DIR/Runtime/caiji.log"
    echo ""
    echo "手动执行采集:"
    echo "  cd $SCRIPT_DIR && $PHP_PATH index.php Home/Api/index"
    echo ""
else
    echo "✗ 定时任务安装失败"
    exit 1
fi

echo "================================="
echo "安装完成"
echo "================================="
