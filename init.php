<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// 禁止缓存的头部信息
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); // 设置为过去的时间
?>