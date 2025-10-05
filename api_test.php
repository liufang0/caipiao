<?php
/**
 * API测试工具
 * 用于测试和诊断彩票数据采集API的可用性
 */

// 引入ThinkPHP框架
define('APP_PATH','./Application/');
define('RUNTIME_PATH', './Runtime/');
require './ThinkPHP/ThinkPHP.php';

// 测试API列表
$test_apis = array(
    'pk10' => 'http://39.104.56.250/caiji/?name=bjpks',
    'xyft' => 'http://39.104.56.250/caiji/?name=xyft',
    'ssc' => 'http://39.104.56.250/caiji/?name=cqssc',
    'bj28' => 'http://39.104.56.250/caiji/?name=bjklb',
    'jnd28' => 'http://39.104.56.250/caiji/?name=jndklb',
);

// 备用API列表（可以添加更多备用源）
$backup_apis = array(
    // 可以在这里添加备用API
);

echo "<h2>彩票数据采集API测试</h2>\n";
echo "<style>
    body { font-family: 'Microsoft YaHei', Arial, sans-serif; padding: 20px; }
    .success { color: green; background: #e8f5e9; padding: 10px; margin: 5px 0; border-radius: 5px; }
    .error { color: red; background: #ffebee; padding: 10px; margin: 5px 0; border-radius: 5px; }
    .warning { color: orange; background: #fff3e0; padding: 10px; margin: 5px 0; border-radius: 5px; }
    .info { color: blue; background: #e3f2fd; padding: 10px; margin: 5px 0; border-radius: 5px; }
    pre { background: #f5f5f5; padding: 10px; border-radius: 5px; overflow-x: auto; }
</style>\n\n";

echo "<p class='info'>开始测试API连接...</p>\n\n";

foreach ($test_apis as $game => $api_url) {
    echo "<hr>\n";
    echo "<h3>测试游戏: {$game}</h3>\n";
    echo "<p>API地址: {$api_url}</p>\n";
    
    if (empty($api_url)) {
        echo "<p class='warning'>⚠️ API URL未配置</p>\n";
        continue;
    }
    
    $start_time = microtime(true);
    $result = http_get($api_url, 10);
    $end_time = microtime(true);
    $elapsed = round(($end_time - $start_time) * 1000, 2);
    
    echo "<p>请求耗时: {$elapsed}ms</p>\n";
    
    if ($result === false) {
        echo "<p class='error'>❌ API请求失败 - 可能原因：</p>\n";
        echo "<ul>\n";
        echo "<li>API服务器无法访问</li>\n";
        echo "<li>网络连接超时</li>\n";
        echo "<li>API地址已失效</li>\n";
        echo "</ul>\n";
        echo "<p class='warning'>建议：请联系API提供商或更换API源</p>\n";
        continue;
    }
    
    if (empty($result)) {
        echo "<p class='error'>❌ API返回空数据</p>\n";
        continue;
    }
    
    // 尝试解析JSON
    $json_data = json_decode($result, true);
    if ($json_data === null) {
        echo "<p class='error'>❌ 返回数据不是有效的JSON格式</p>\n";
        echo "<p>原始返回数据（前500字符）:</p>\n";
        echo "<pre>" . htmlspecialchars(substr($result, 0, 500)) . "</pre>\n";
        continue;
    }
    
    echo "<p class='success'>✅ API连接成功，数据格式正确</p>\n";
    echo "<p>返回数据结构:</p>\n";
    echo "<pre>" . htmlspecialchars(json_encode($json_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) . "</pre>\n";
    
    // 检查数据结构
    if (isset($json_data['result']['data'][0])) {
        echo "<p class='success'>✅ 数据结构符合预期（result.data格式）</p>\n";
        $data = $json_data['result']['data'][0];
        if (isset($data['preDrawIssue']) && isset($data['preDrawTime'])) {
            echo "<p class='success'>✅ 包含期号和开奖时间信息</p>\n";
        }
    } elseif (isset($json_data['data'][0])) {
        echo "<p class='success'>✅ 数据结构符合预期（data格式）</p>\n";
        $data = $json_data['data'][0];
        if (isset($data['issue']) && isset($data['time'])) {
            echo "<p class='success'>✅ 包含期号和开奖时间信息</p>\n";
        }
    } else {
        echo "<p class='warning'>⚠️ 数据结构与预期不符，可能需要调整解析代码</p>\n";
    }
}

echo "\n<hr>\n";
echo "<h3>测试总结</h3>\n";
echo "<p class='info'>✅ 连接成功的API可以正常使用</p>\n";
echo "<p class='warning'>⚠️ 对于失败的API，建议：</p>\n";
echo "<ul>\n";
echo "<li>1. 检查网络连接</li>\n";
echo "<li>2. 确认API地址是否正确</li>\n";
echo "<li>3. 联系API提供商确认服务状态</li>\n";
echo "<li>4. 考虑使用备用API源</li>\n";
echo "<li>5. 如果所有API都失败，系统会使用随机数生成数据</li>\n";
echo "</ul>\n";

echo "<p class='info'>测试完成！</p>\n";
?>
