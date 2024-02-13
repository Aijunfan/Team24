<?php
session_start(); // 确保这行在最顶部，且在任何输出之前
// 引入数据库配置文件
require_once 'db_config.php';

// 初始化变量
$username = $password = "";
$username_err = $password_err = $login_err = "";

// 当表单提交时处理以下逻辑
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 检查用户名是否为空
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter your username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // 检查密码是否为空
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // 验证凭据
    if (empty($username_err) && empty($password_err)) {
        // 准备一个select语句
        $sql = "SELECT UserID, Username, PasswordHash FROM Users WHERE Username = ?";

        if ($stmt = $conn->prepare($sql)) {
            // 绑定变量到准备好的语句作为参数
            $stmt->bind_param("s", $param_username);

            // 设置参数
            $param_username = $username;

            // 尝试执行准备好的语句
            if ($stmt->execute()) {
                // 存储结果
                $stmt->store_result();

                // 检查用户名是否存在，如果是，则验证密码
                if ($stmt->num_rows == 1) {
                    // 绑定结果变量
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {

                            // 存储数据在会话变量中
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // 重定向用户到欢迎页面
                            header("location: index.php");
                        } else {
                            // 密码不正确，显示一个错误消息
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // 用户名不存在，显示一个错误消息
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // 关闭声明
            $stmt->close();
        }
    }

    // 关闭连接
    $conn->close();
}
?>

<?php include 'header.php'; ?>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
        <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
            <h1 class="title-font font-medium text-3xl text-gray-900">24-Sports: Unleash Your Potential with
                High-Performance Gear</h1>
            <p class="leading-relaxed mt-4">At 24-Sports, we believe in the power of sports to transform lives. Our
                premium selection of running, football, basketball, and outdoor gear is designed for athletes who demand
                the best. From innovative footwear to cutting-edge apparel, we equip you with the tools you need to
                excel in your sport of choice. Join the 24-Sports community and experience the difference that quality
                and passion can make in your athletic journey.</p>
        </div>
        <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
            <!-- <div id="toast-simple"
                class="flex items-center w-full max-w-xs p-4 space-x-4 rtl:space-x-reverse text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert">
                <svg class="w-5 h-5 text-blue-600 dark:text-blue-500 rotate-45" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9" />
                </svg>
                <div class="ps-4 text-sm font-normal">Login successfully.</div>
            </div> -->
            <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Login</h2>
            <!-- 检查并显示反馈消息 -->
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($login_err)): ?>
                <div class="alert alert-info">
                    <?php echo $login_err; ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="relative mb-4">
                    <label for="username" class="leading-7 text-sm text-gray-600">Username</label>
                    <input type="text" id="username" name="username"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        required>
                </div>
                <div class="relative mb-4">
                    <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        required>
                </div>
                <button
                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</button>
            </form>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>