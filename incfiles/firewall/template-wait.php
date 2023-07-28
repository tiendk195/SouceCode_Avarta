<?php header('HTTP/1.0 403 Forbidden'); require("dqh-header.php"); ?>
    <div class="knight"></div>
    <h1>Bạn Load Trang Quá Nhanh</h1>
    <h2>Vui lòng thử lại sau <font color="red"><?php echo $_SESSION['dqh_seconds']; ?></font> giây!</h1>
        <button type="button" onclick="tai_lai_trang()">Tải lại trang</button>

    <script>
        function tai_lai_trang(){
            location.reload();
        }
    </script>
    </div>
</body>
</html>