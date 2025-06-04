<?php
    $stmt = $conn->prepare("CALL GetLogin(?)");
    $stmt->bind_param("s", $_SESSION['user']['email']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
    } else {
        $_SESSION['notif'] = ["Warn", "Akun tidak ditemukan!"];
    }

    $stmt->close();
?>