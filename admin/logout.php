<?php
	session_start();
	session_destroy();
	echo '<script>location="login-admin.php"</script>';
?>