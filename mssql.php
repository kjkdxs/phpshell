<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MSSQL 数据库管理</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-group {
            margin-top: 20px;
        }
        .btn-group button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>MSSQL 数据库管理</h2>

        <?php
        session_start();

        // 检查是否提交表单
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 处理连接表单
            if (isset($_POST["connect"])) {
                $_SESSION["serverName"] = $_POST["serverName"];
                $_SESSION["database"] = $_POST["database"];
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = $_POST["password"];
            }
            // 处理退出按钮
            if (isset($_POST["logout"])) {
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
        }

        // 检查会话中是否有连接信息
        if (!isset($_SESSION["serverName"]) || !isset($_SESSION["database"]) || !isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
            // 显示连接表单
            echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
            echo '<div class="form-group">';
            echo '<label for="serverName">服务器名称或 IP 地址:</label>';
            echo '<input type="text" id="serverName" name="serverName" required>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="database">数据库名称:</label>';
            echo '<input type="text" id="database" name="database" required>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="username">用户名:</label>';
            echo '<input type="text" id="username" name="username" required>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="password">密码:</label>';
            echo '<input type="password" id="password" name="password" required>';
            echo '</div>';
            echo '<button type="submit" name="connect">连接数据库</button>';
            echo '</form>';
        } else {
            // 连接到数据库
            try {
                $pdo = new PDO("sqlsrv:Server={$_SESSION["serverName"]};Database={$_SESSION["database"]}", $_SESSION["username"], $_SESSION["password"]);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("连接失败: " . $e->getMessage());
            }

            // 处理查询表单提交
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["query"])) {
                $query = $_POST["query"];
                try {
                    $stmt = $pdo->query($query);
                    if ($stmt) {
                        echo '<p>查询结果:</p>';
                        echo '<table>';
                        $firstRow = true;
                        foreach ($stmt as $row) {
                            if ($firstRow) {
                                echo '<tr>';
                                foreach ($row as $key => $value) {
                                    echo '<th>' . htmlspecialchars($key) . '</th>';
                                }
                                echo '</tr>';
                                $firstRow = false;
                            }
                            echo '<tr>';
                            foreach ($row as $value) {
                                echo '<td>' . htmlspecialchars($value) . '</td>';
                            }
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo '<p>执行失败.</p>';
                    }
                } catch (PDOException $e) {
                    echo '<p>错误: ' . $e->getMessage() . '</p>';
                }
            }

            // 显示查询表单
            echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
            echo '<div class="form-group">';
            echo '<label for="query">输入 SQL 查询:</label><br>';
            echo '<textarea id="query" name="query" placeholder="SELECT * FROM your_table" required></textarea>';
            echo '</div>';
            echo '<button type="submit">执行查询</button>';
            echo '</form>';

            // 显示退出按钮
            echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" class="btn-group">';
            echo '<button type="submit" name="logout">退出</button>';
            echo '</form>';
        }
        ?>

    </div>
</body>
</html>
