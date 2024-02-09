<?php
require_once 'db_config.php'; // 引入数据库配置文件

// 初始化变量
$username = $password = $email = $mobile = "";
$username_err = $password_err = $email_err = $mobile_err = "";
$feedback_msg = ""; // 用于存储反馈消息

// 输入清理和验证函数
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// 当表单提交时处理以下逻辑
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 检查用户名是否为空
    if (empty(clean_input($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // 准备一个select语句
        $sql = "SELECT UserID FROM Users WHERE Username = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = clean_input($_POST["username"]);

            // 执行查询，检查用户名是否存在
            if ($stmt->execute()) {
                $stmt->store_result();
                
                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = $param_username;
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    // 验证密码
    if (empty(clean_input($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(clean_input($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = clean_input($_POST["password"]);
    }

    // 验证电子邮件
    if (empty(clean_input($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var(clean_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    } else {
        $email = clean_input($_POST["email"]);
    }

    // 验证手机号码（可选）
    if (!empty(clean_input($_POST["mobile"]))) {
        $mobile = clean_input($_POST["mobile"]);
        // 可以添加更严格的手机号验证逻辑
    }

    // 检查错误前提交数据
    if (empty($username_err) && empty($password_err) && empty($email_err) && !empty($username)) {
        // 准备插入语句
        $sql = "INSERT INTO Users (Username, PasswordHash, Email, Mobile) VALUES (?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // 绑定变量到准备好的语句作为参数
            $stmt->bind_param("ssss", $param_username, $param_password, $param_email, $param_mobile);

            // 设置参数
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // 创建密码哈希
            $param_email = $email;
            $param_mobile = $mobile;

            // 尝试执行准备好的语句
            if ($stmt->execute()) {
                $feedback_msg = "Registration successful. You can now login.";
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }
    $conn->close();
}
?>

<?php include 'header.php'; ?>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
        <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
            <h1 class="title-font font-medium text-3xl text-gray-900">Join the 24-Sports Family: Your Adventure Awaits</h1>
            <p class="leading-relaxed mt-4">Welcome to 24-Sports, where champions are made and adventures begin. By creating an account with us, you're taking the first step towards unlocking exclusive benefits and personalized updates. Stay ahead of the game with early access to our latest gear, special member discounts, and tips from top athletes. Register now to become part of a community that celebrates your passion for sports and supports your journey to greatness.</p>
        </div>
        <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
           <!-- 只有在表单提交后才检查并显示反馈消息 -->
           <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($feedback_msg)): ?>
                <div class="alert alert-info">
                    <?php echo $feedback_msg; ?>
                </div>
            <?php endif; ?>
            <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>
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
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        required>
                </div>
                <div class="relative mb-4">
                    <label for="mobile" class="leading-7 text-sm text-gray-600">Mobile (Optional)</label>
                    <input type="text" id="mobile" name="mobile"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button
                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
            </form>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>