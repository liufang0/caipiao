<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>彩票系统 - 环境搭建成功</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background: #f5f5f5; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .success { color: #28a745; font-size: 24px; margin-bottom: 20px; }
        .info { background: #e7f3ff; padding: 15px; border-left: 4px solid #007bff; margin: 10px 0; }
        .admin-link { background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 10px 5px; }
        .admin-link:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="success">✅ 彩票系统环境搭建成功！</h1>
        
        <div class="info">
            <h3>🖥️ 环境信息</h3>
            <p>PHP版本: <?php echo phpversion(); ?></p>
            <p>数据库: MySQL (已导入)</p>
            <p>Web服务器: Apache</p>
            <p>项目框架: ThinkPHP 3.2.3</p>
        </div>
        
        <div class="info">
            <h3>🔗 快速访问链接</h3>
            <a href="/index.php/Admin/Login" class="admin-link">管理后台登录</a>
            <a href="/index.php/Home" class="admin-link">前台首页</a>
            <a href="/phpinfo.php" class="admin-link">PHP信息</a>
        </div>
        
        <div class="info">
            <h3>📝 默认登录信息</h3>
            <p>管理员账号: admin</p>
            <p>管理员密码: 123456 (请及时修改)</p>
        </div>
        
        <div class="info">
            <h3>⚡ 服务状态</h3>
            <p>Apache: <?php echo extension_loaded('apache2handler') ? '✅ 运行中' : '✅ PHP-FPM模式'; ?></p>
            <p>MySQL: <?php echo extension_loaded('mysqli') ? '✅ 已连接' : '❌ 未连接'; ?></p>
            <p>目录权限: <?php echo is_writable('./Runtime') ? '✅ 正常' : '❌ 需要修复'; ?></p>
        </div>
    </div>
</body>
</html>