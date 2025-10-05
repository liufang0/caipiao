#!/usr/bin/env php
<?php
/**
 * 初始化时间表数据
 * 为北京28和加拿大28生成期数时间数据
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
echo "彩票系统时间表初始化脚本\n";
echo "=================================\n\n";

require './ThinkPHP/ThinkPHP.php';

$time_model = M('time');

// 检查是否已有数据
$bj28_count = $time_model->where("game='bj28'")->count();
$jnd28_count = $time_model->where("game='jnd28'")->count();

echo "当前数据统计:\n";
echo "北京28期数: {$bj28_count}条\n";
echo "加拿大28期数: {$jnd28_count}条\n\n";

// 初始化北京28时间表（每5分钟一期，共288期）
if ($bj28_count == 0) {
    echo "正在初始化北京28时间表...\n";
    $start_time = strtotime('00:00:00');
    for ($i = 1; $i <= 288; $i++) {
        $action_time = date('H:i:s', $start_time + ($i - 1) * 300); // 5分钟 = 300秒
        $data = array(
            'game' => 'bj28',
            'actionno' => $i,
            'actiontime' => $action_time
        );
        $time_model->add($data);
    }
    echo "✓ 北京28时间表初始化完成！共288期\n\n";
} else {
    echo "北京28时间表已存在，跳过初始化\n\n";
}

// 初始化加拿大28时间表（每3分钟一期，共480期）
if ($jnd28_count == 0) {
    echo "正在初始化加拿大28时间表...\n";
    $start_time = strtotime('00:00:00');
    for ($i = 1; $i <= 480; $i++) {
        $action_time = date('H:i:s', $start_time + ($i - 1) * 180); // 3分钟 = 180秒
        $data = array(
            'game' => 'jnd28',
            'actionno' => $i,
            'actiontime' => $action_time
        );
        $time_model->add($data);
    }
    echo "✓ 加拿大28时间表初始化完成！共480期\n\n";
} else {
    echo "加拿大28时间表已存在，跳过初始化\n\n";
}

echo "=================================\n";
echo "初始化完成！\n";
echo "=================================\n\n";

// 显示一些样例数据
echo "北京28样例数据（前5期）:\n";
$samples = $time_model->where("game='bj28'")->limit(5)->select();
foreach ($samples as $s) {
    echo "  期号: {$s['actionno']}, 时间: {$s['actiontime']}\n";
}
echo "\n";

echo "加拿大28样例数据（前5期）:\n";
$samples = $time_model->where("game='jnd28'")->limit(5)->select();
foreach ($samples as $s) {
    echo "  期号: {$s['actionno']}, 时间: {$s['actiontime']}\n";
}
echo "\n";

echo "现在可以运行: php test_api.php 进行测试\n";
echo "或运行: php index.php Home/Api/index 开始采集\n";
