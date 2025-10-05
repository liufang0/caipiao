#!/usr/bin/env php
<?php
/**
 * API测试脚本
 * 用于验证彩票数据采集功能是否正常
 */

// 设置错误报告
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 定义路径常量
define('DS','/');
define('MING_SITE_PA', 'http://localhost'.DS );
define('MING_BASE_PA', __DIR__ );
define('MING_BASE_PATH', __DIR__ . '/');
define("UPLOAD_PATH", MING_BASE_PA . "/Uploads/");
define('SITE_PATH', getcwd() . '/');
define('APP_DEBUG', true);
define('VERSION', '20180208');
define('RUNTIME_PATH', './Runtime/');
define('APP_PATH','./Application/');
define("TMPL_PATH", "./Template/");

echo "=================================\n";
echo "彩票系统API测试脚本\n";
echo "=================================\n\n";

// 引入ThinkPHP
require './ThinkPHP/ThinkPHP.php';

// 测试1: 检查数据库连接
echo "测试1: 检查数据库连接...\n";
try {
    $db = M();
    $test = $db->query("SELECT 1");
    if ($test) {
        echo "✓ 数据库连接成功\n\n";
    } else {
        echo "✗ 数据库连接失败\n\n";
        exit(1);
    }
} catch (Exception $e) {
    echo "✗ 数据库连接异常: " . $e->getMessage() . "\n\n";
    exit(1);
}

// 测试2: 检查配置是否加载
echo "测试2: 检查配置加载...\n";
$use_local_api = C('use_local_api');
echo "本地API模式: " . ($use_local_api ? '已启用' : '已禁用') . "\n";
echo "✓ 配置加载成功\n\n";

// 测试3: 检查think_time表
echo "测试3: 检查think_time表...\n";
$time_data = M('time')->where("game='bj28'")->count();
if ($time_data > 0) {
    echo "✓ think_time表有数据 (bj28: {$time_data}条)\n";
} else {
    echo "✗ think_time表为空，需要导入时间数据\n";
}

$time_data_jnd = M('time')->where("game='jnd28'")->count();
if ($time_data_jnd > 0) {
    echo "✓ think_time表有数据 (jnd28: {$time_data_jnd}条)\n";
} else {
    echo "✗ think_time表为空，需要导入时间数据\n";
}
echo "\n";

// 测试4: 检查think_caiji表
echo "测试4: 检查think_caiji表...\n";
$caiji_count = M('caiji')->count();
echo "开奖记录总数: {$caiji_count}条\n";

$latest_bj28 = M('caiji')->where("game='bj28'")->order('id DESC')->find();
if ($latest_bj28) {
    echo "最新北京28记录: 期号 {$latest_bj28['periodnumber']}, 号码 {$latest_bj28['awardnumbers']}\n";
} else {
    echo "暂无北京28记录\n";
}

$latest_jnd28 = M('caiji')->where("game='jnd28'")->order('id DESC')->find();
if ($latest_jnd28) {
    echo "最新加拿大28记录: 期号 {$latest_jnd28['periodnumber']}, 号码 {$latest_jnd28['awardnumbers']}\n";
} else {
    echo "暂无加拿大28记录\n";
}
echo "\n";

// 测试5: 测试本地API数据生成
echo "测试5: 测试本地API数据生成...\n";
if ($time_data > 0) {
    $current_time = date('H:i:s');
    $current_period = M('time')->where("game='bj28' AND actionTime <= '{$current_time}'")->order('actionNo DESC')->find();
    if ($current_period) {
        $periodnumber = date('ymd') . str_pad($current_period['actionno'], 3, "0", STR_PAD_LEFT);
        echo "✓ 当前北京28期号: {$periodnumber}\n";
        echo "  期数编号: {$current_period['actionno']}\n";
        echo "  开奖时间: {$current_period['actiontime']}\n";
    } else {
        echo "当前时间没有可用的期数\n";
    }
} else {
    echo "跳过（think_time表无数据）\n";
}
echo "\n";

// 测试6: 检查预设表
echo "测试6: 检查think_caiji_admin预设表...\n";
$preset_count = M('caiji_admin')->count();
echo "预设记录总数: {$preset_count}条\n";
if ($preset_count > 0) {
    $today_preset = M('caiji_admin')->where("addtime='" . date('Ymd') . "'")->count();
    echo "今日预设记录: {$today_preset}条\n";
}
echo "\n";

echo "=================================\n";
echo "测试完成！\n";
echo "=================================\n";
echo "\n";
echo "使用建议：\n";
echo "1. 如果think_time表为空，需要先导入期数时间数据\n";
echo "2. 如果需要控制开奖结果，在think_caiji_admin表中添加预设\n";
echo "3. 运行采集: php index.php Home/Api/index\n";
echo "4. 查看日志: Runtime/Logs/\n";
echo "\n";
