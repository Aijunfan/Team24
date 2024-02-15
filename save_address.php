<?php
// 引入数据库配置
require 'db_config.php';
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $address_id = $_POST['address_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $line1 = $_POST['line1'];
    $line2 = $_POST['line2'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $phone_number = $_POST['phone_number'];
    $is_default = isset($_POST['is_default']) ? 1 : 0;
    $user_id = $_SESSION['user_id'];

    // 获取表单数据
    $address_id = $_POST['address_id']=="addNew" ? null : $_POST['address_id'];

    // 如果设置为默认地址，先将所有地址设置为非默认
    if ($is_default == 1) {
        $resetDefaultSql = "UPDATE addresses SET is_default = 0 WHERE UserID = ?";
        if ($resetStmt = $conn->prepare($resetDefaultSql)) {
            $resetStmt->bind_param("i", $user_id);
            $resetStmt->execute();
            $resetStmt->close();
        } else {
            // 处理SQL错误
            echo "Something went wrong. Please try again.";
            exit;
        }
    }

    // 检查是新增还是更新
    if ($address_id) {
        // 更新操作
        $sql = "UPDATE addresses SET first_name=?, last_name=?, line1=?, line2=?, postcode=?, city=?, province=?, country=?, phone_number=?, is_default=? WHERE address_id=? AND UserID=?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssssssiii", $first_name, $last_name, $line1, $line2, $postcode, $city, $province, $country, $phone_number, $is_default, $address_id, $user_id);
            
            if ($stmt->execute()) {
                $_SESSION["success_message"] = "The address was updated successfully!";
                header("location: user_center.php?address_update=success");
            } else {
                $_SESSION["error_message"] = "Something went wrong. Please try again.";
                echo "Something went wrong. Please try again.";
            }
            
            $stmt->close();
        }
    } else {
        //新增
        // 准备SQL语句
        $sql = "INSERT INTO addresses (UserID, first_name, last_name, line1, line2, postcode, city, province, country, phone_number, is_default) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = $conn->prepare($sql)){
            // 绑定变量到预准备的语句作为参数
            $stmt->bind_param("isssssssssi", $user_id, $first_name, $last_name, $line1, $line2, $postcode, $city, $province, $country, $phone_number, $is_default);

            // 执行语句
            if($stmt->execute()){
                // 可以在这里重定向用户回到个人中心或显示一个成功消息
                // 成功时
                $_SESSION["success_message"] = "Address added successfully!";
                header("location: user_center.php?address_update=success");
            } else {
                // 失败时
                $_SESSION["error_message"] = "Something went wrong. Please try again.";
                echo "Something went wrong. Please try again.";
            }

            // 关闭语句
            $stmt->close();
        } else {
            // 失败时
            $_SESSION["error_message"] = "Something went wrong. Please try again.";
            echo "Something went wrong. Please try again.";
        }
    }
    // 关闭数据库连接
    $conn->close();
}
?>
