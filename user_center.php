<?php
include 'init.php';
include 'header.php';
include 'db_config.php';
// 检查用户是否已登录，如果没有，则重定向到登录页面
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
if (isset($_SESSION["success_message"])) {
    echo "<script>alert('" . $_SESSION['success_message'] . "');</script>";
    unset($_SESSION["success_message"]);
}

if (isset($_SESSION["error_message"])) {
    echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
    unset($_SESSION["error_message"]);
}

// 假设用户ID存储在session中
$userId = $_SESSION['user_id'];

// 查询用户基本信息
$userSql = "SELECT * FROM Users WHERE UserID = ?";
$stmt = $conn->prepare($userSql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$userResult = $stmt->get_result();
$userInfo = $userResult->fetch_assoc();

// 查询用户地址信息
$addressSql = "SELECT * FROM addresses WHERE UserID = ? ORDER BY is_default DESC, address_id ASC";
$addressStmt = $conn->prepare($addressSql);
$addressStmt->bind_param("i", $userId);
$addressStmt->execute();
$addressResult = $addressStmt->get_result();

// 创建一个数组来存储所有地址
$addresses = [];
// 使用循环来获取所有行
while ($row = $addressResult->fetch_assoc()) {
    $addresses[] = $row;
}
// 关闭语句
$addressStmt->close();
?>

<div class="container flex">
    <div class="flex md:w-1/2 w-full flex-col md:flex-row">
        <ul role="tablist"
            class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
            <li>
                <a href="#" data-target="Profile"
                    class="inline-flex items-center px-4 py-3 text-white bg-indigo-500 rounded-lg w-full active"
                    aria-current="page">
                    <svg class="w-6 h-6 me-2" aria-hidden="true" focusable="false" viewBox="0 0 48 48" role="img"
                        fill="none">
                        <path stroke="currentColor" stroke-width="3"
                            d="M7.5 42v-6a7.5 7.5 0 017.5-7.5h18a7.5 7.5 0 017.5 7.5v6m-9-27a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z">
                        </path>
                    </svg>
                    Profile
                </a>
            </li>
            <li>
                <a href="#" data-target="Address"
                    class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900  hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-6 h-6 me-2" aria-hidden="true" aria-hidden="true" focusable="false"
                        viewBox="0 0 48 48" role="img" fill="none">
                        <path stroke="currentColor" stroke-miterlimit="10" stroke-width="3"
                            d="M24 27V13c0-3.48 2.02-5.5 4.5-5.5h8.78l3.22 12m0 0h-33m33 0v21h-33v-21m0 0l3.22-12H21">
                        </path>
                    </svg>
                    Addresses
                </a>
            </li>
        </ul>

        <div id="Profile"
            class=" tab-content p-6  text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Profile</h3>
            <form action="update_user_info.php" method="post" class="profile ">
                <div class="mb-6">
                    <label for="Username"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="Username" id="Username" name="Username"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php echo htmlspecialchars($userInfo['Username']); ?>" disabled>
                </div>
                <div class="mb-6">
                    <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                        address</label>
                    <input type="email" id="Email" name="Email"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php echo htmlspecialchars($userInfo['Email']); ?>" required>
                </div>
                <div class="mb-6">
                    <label for="Mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                        Number</label>
                    <input type="tel" id="Mobile" name="Mobile"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php echo htmlspecialchars($userInfo['Mobile']); ?>" required>
                </div>
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <div class="flex relative items-center justify-end">
                        <input type="password" id="password"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••" disabled>
                        <a href="#" data-modal-target="password-modal" data-modal-toggle="password-modal"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline absolute mr-4">Edit</a>
                    </div>
                </div>
                <button type="submit"
                    class="text-white  bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 hover:bg-indigo-600 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>

        <div id="Address"
            class="hidden tab-content p-6 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full min-h-64">
            <h3 class="font-bold text-gray-900 dark:text-white mb-2">Saved Delivery Addresses</h3>

            <!-- 循环遍历每个地址并显示 -->
            <?php foreach ($addresses as $address): ?>
                <div class="address-item text-xs p-4 border-b-2 border-gray-100 font-normal mb-4">
                    <div class="flex justify-between">
                        <p>Delivery Address</p>
                        <a href="#" data-modal-target="address-modal" data-modal-toggle="edit-address-modal"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</a>
                    </div>
                    <input class="address_id" type="hidden" name="address_id"
                        value="<?php echo isset($address) ? $address['address_id'] : ''; ?>">
                    <p><span class="first_name">
                            <?php echo htmlspecialchars($address['first_name']) ?>
                        </span>,<span class="last_name">
                            <?php echo htmlspecialchars($address['last_name']) ?>
                        </span></p>
                    <p><span class="line1">
                            <?php echo htmlspecialchars($address['line1']); ?>
                        </span>, <span class="line2">
                            <?php echo htmlspecialchars($address['line2']); ?>
                        </span></p>
                    <p class="postcode">
                        <?php echo htmlspecialchars($address['postcode']); ?>
                    </p>
                    <p class="city">
                        <?php echo htmlspecialchars($address['city']); ?>
                    </p>
                    <p><span class="province">
                            <?php echo htmlspecialchars($address['province']); ?>
                        </span>, <span class="country">
                            <?php echo htmlspecialchars($address['country']); ?>
                        </span></p>
                    <p class="phone_number">
                        <?php echo htmlspecialchars($address['phone_number']); ?>
                    </p>
                    <p class="is_default font-bold">
                        <?php echo $address['is_default'] ? 'Default Address' : ''; ?>
                    </p>
                </div>
            <?php endforeach; ?>
            <?php

            if (count($addresses) < 3) {
                echo '<div class="flex justify-end mt-6">
                                    <button type="button" data-modal-target="address-modal" data-modal-toggle="new-address-modal" class="rounded-full text-white bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full sm:w-auto p-2.5 text-center dark:bg-blue-600 hover:bg-indigo-600 dark:focus:ring-blue-800">
                                        Add address
                                    </button>
                                </div>';
            }

            ?>
        </div>

    </div>
</div>





<!-- Main modal -->
<div id="modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <!-- Modal content -->
    <div id="address-modal"
        class="modal-content relative top-20 mx-auto p-6 border md:w-[32rem] shadow-lg rounded-md bg-white transition-opacity duration-300 ease-in-out hidden">
        <!-- Modal header -->
        <div class="mb-4 flex items-center justify-between pb-2 border-b rounded-t dark:border-gray-600">
            <h3 id="modal-address-title" class="text-xl font-semibold text-gray-900 dark:text-white">Edit Address</h3>
            <button type="button"
                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="password-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <form class="address-form" action="save_address.php" method="post">
            <input class="address_id" type="hidden" name="address_id" value="">
            <div class="grid gap-6 mb-2 md:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                        name</label>
                    <input type="text" id="first_name" name="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" required>
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                        name</label>
                    <input type="text" id="last_name" name="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Doe" required>
                </div>
            </div>

            <div class="mb-2">
                <div class="mb-2">
                    <label for="line1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address Line
                        1</label>
                    <input type="text" id="line1" name="line1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Address Line 1" required>
                </div>
                <div class="mb-2">
                    <label for="line2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address Line
                        2</label>
                    <input type="text" id="line2" name="line2"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Address Line 2" required>
                </div>
            </div>
            <div class="grid gap-6 mb-2 md:grid-cols-2">
                <div>
                    <label for="postcode"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postcode</label>
                    <input type="tel" id="postcode" name="postcode" minlength="5" maxlength="5"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="13100" pattern="[0-9]{5}" required title="postcode">

                </div>
                <div>
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                    <input type="text" id="city" name="city"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="city" required>
                </div>
                <div>
                    <label for="province"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">province</label>
                    <input type="text" id="province" name="province"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="province" required>
                </div>
                <div>
                    <label for="country"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                    <input type="text" id="country" name="country"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Country" required>
                </div>
            </div>
            <div class="mb-4">
                <div class="mb-2">
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                        number</label>
                    <input type="tel" id="phone_number" name="phone_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="123-45-678" required>
                </div>
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="is_default" type="checkbox" value="1" name="is_default"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                </div>
                <label for="is_default" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Set as default
                    delivery address.</label>
            </div>
            <div class="flex items-center justify-end">
                <button type="submit"
                    class="mr-2 leading-normal text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-3 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Save
                </button>
                <button type="button"
                    class="delete-btn leading-normal text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-3 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Delete
                </button>
            </div>

        </form>
    </div>


    <div id="password-modal"
        class="modal-content relative top-20 mx-auto p-2 border w-96 shadow-lg rounded-md bg-white transition-opacity duration-300 ease-in-out hidden">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Password</h3>
            <button type="button"
                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="password-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
            <form class="space-y-4 password-form" action="change_password.php" method="post">
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current
                        password</label>
                    <input type="password" name="current_password" id="current_password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                </div>
                <div>
                    <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                        password</label>
                    <input type="password" name="new_password" id="new_password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                </div>
                <div>
                    <label for="confirm_new_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                        new password</label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                </div>
                <button type="submit"
                    class="text-white bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 hover:bg-indigo-600 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    function change_password() {
        // 获取表单元素
        var form = document.querySelector(".password-form");

        // 绑定submit事件
        form.addEventListener("submit", function (event) {
            // 阻止表单的默认提交行为
            event.preventDefault();
            toggleOverlay()
            // 获取表单数据
            var currentPassword = document.getElementById("current_password").value;
            var newPassword = document.getElementById("new_password").value;
            var confirmNewPassword = document.getElementById("confirm_new_password").value;

            // 进行密码验证
            if (newPassword.length < 8) {
                alert("The new password length needs to be at least 8 characters.");
                return false; // 阻止表单提交
            }

            if (newPassword !== confirmNewPassword) {
                alert("The new password does not match the confirmation password.");
                return false; // 阻止表单提交
            }

            // 如果所有验证通过，则继续表单提交
            form.submit();
        });
    }
    function delete_address() {
        const deleteBtn = document.querySelector('.delete-btn');
        if (deleteBtn) {
            deleteBtn.addEventListener('click', function () {
                const addressId = document.querySelector('.address_id').value;
                if (confirm('Are you sure you want to delete this address?')) {
                    fetch('delete_address.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'address_id=' + addressId
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // 处理成功，例如重定向或刷新页面
                                window.location.reload();
                            } else {
                                // 显示错误消息
                                alert('Error: ' + data.error);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        }
    }
    // document.addEventListener('readystatechange', function() {
    //     if (document.readyState === 'complete') {
    //         document.querySelector('[data-target="Address"]').click()
    //     }
    // });
    document.addEventListener('DOMContentLoaded', function () {
        change_password()
        delete_address()
        // 你的代码放在这里
        lastModal = ""
        document.addEventListener('click', function (e) {

            const modal = document.getElementById('modal')
            // 使用.closest()尝试找到包含特定类名的最近的父元素（在这个例子中是按钮本身）
            var button = e.target.closest('button');

            // 检查是否找到了按钮，并且该按钮有data-modal-hide属性
            if (button && button.hasAttribute('data-modal-hide')) {
                // 在这里处理你的逻辑
                modal.querySelector('#' + lastModal).classList.add('hidden')
                modal.classList.add('hidden'); // 隐藏模态框
            }
            lastModal = e.target.getAttribute('data-modal-target') ? e.target.getAttribute('data-modal-target') : lastModal
            // 如果点击了toggle按钮
            if (e.target.matches('[data-modal-toggle]')) {
                // console.log('data-modal-toggle',e.target.getAttribute('data-modal-toggle'));
                if (e.target.getAttribute('data-modal-toggle') == 'edit-address-modal') {
                    document.querySelector('#modal-address-title').innerHTML = "Edit Address"
                    set_address_info(e.target.closest('.address-item'))
                    const value = e.target.parentElement.parentElement.querySelector('.address_id').value
                    document.querySelector('.address-form').querySelector('.address_id').value = value
                    document.querySelector('.delete-btn').classList.remove('hidden')
                } else if (e.target.getAttribute('data-modal-toggle') == 'new-address-modal') {
                    set_address_info(false)
                    document.querySelector('#modal-address-title').innerHTML = "Add new Address"
                    document.querySelector('.address_id').value = "addNew"
                    document.querySelector('.delete-btn').classList.add('hidden')
                }
                modal.querySelector('#' + lastModal).classList.toggle('hidden')
                modal.classList.toggle('hidden'); // 切换模态框显示和隐藏
                e.preventDefault(); // 阻止默认行为，如果有的话
            }

            // 如果点击的是模态框以外的区域且模态框是可见的
            else if (e.target === modal && !modal.classList.contains('hidden')) {
                modal.classList.add('hidden'); // 隐藏模态框
                console.log('lastModal', lastModal);
                modal.querySelector('#' + lastModal).classList.add('hidden')
            }
        });
        function set_address_info(el) {
            document.getElementById('first_name').value = el ? el.querySelector('.first_name').innerText : ''
            document.getElementById('last_name').value = el ? el.querySelector('.last_name').innerText : ''
            document.getElementById('line1').value = el ? el.querySelector('.line1').innerText : ''
            document.getElementById('line2').value = el ? el.querySelector('.line2').innerText : ''
            document.getElementById('postcode').value = el ? el.querySelector('.postcode').innerText : ''
            document.getElementById('city').value = el ? el.querySelector('.city').innerText : ''
            document.getElementById('province').value = el ? el.querySelector('.province').innerText : ''
            document.getElementById('country').value = el ? el.querySelector('.country').innerText : ''
            document.getElementById('phone_number').value = el ? el.querySelector('.phone_number').innerText : ''
            document.getElementById('is_default').checked = el && el.querySelector('.is_default').innerText == 'Default Address' ? true : false
        }

        const tabs = document.querySelectorAll('ul[role="tablist"] a');
        const tabContentBoxes = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function (e) {
                e.preventDefault();
                const target = this.getAttribute('data-target');

                // 隐藏所有tab内容区域
                tabContentBoxes.forEach(box => {
                    box.classList.add('hidden');
                });

                // 移除所有tabs的active状态和aria-current属性
                tabs.forEach(t => {
                    t.classList.remove('active', 'bg-indigo-500', 'text-white');
                    t.classList.add('hover:bg-gray-100', 'hover:text-gray-900');
                    t.removeAttribute('aria-current');
                });

                // 显示当前tab的内容区域
                document.getElementById(target).classList.remove('hidden');

                // 设置当前tab为active状态
                this.classList.add('active', 'bg-indigo-500', 'text-white');
                this.classList.remove('hover:bg-gray-100', 'hover:text-gray-900');
                this.setAttribute('aria-current', 'page');
            });
        });
    });

</script>