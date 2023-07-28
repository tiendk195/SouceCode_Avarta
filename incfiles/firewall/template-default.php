<?php require("dqh-header.php"); ?>

<body style="background: #606EA8">
<link rel="stylesheet" href="/giaodien/firewall.css" type="text/css">


        <form name="vtlai_firewall" method="POST" onsubmit="showLoading();">

        <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="dqh_firewall">

		<center><a class="btn btn-2">THITRAN9X.TK</a>
			</center>
			<center><font color="white"><a class="btn-1"><h2>XÁC NHẬN TRUY CẬP !</h2></a></font>
			</center>
			<center><font color="white"><b>Nhấn Vào Đây Để Truy Cập</b></font>
			</center>
			<br>
			<center>
				<button class="btn btn-3" type="submit" name="submit" id="btnSubmit1">Click Here</button>
				<button class="btn btn-3" type="button" id="btnSubmit2" style="display: none;">Loading...</button>
<a href="" class="btn btn-3" id="btnSubmit3" style="display: none;">Chờ Tí</a>
			</center>
			<br>
			<center><font color="white" size="2">FireWall - Thitran9x.tk</font>
			</center>
        </form>
        <div class="loading" id="loading" style="display: none;">

            <div id="fadingBarsG">
                <div id="fadingBarsG_1" class="fadingBarsG">
                </div>
                <div id="fadingBarsG_2" class="fadingBarsG">
                </div>
                <div id="fadingBarsG_3" class="fadingBarsG">
                </div>
                <div id="fadingBarsG_4" class="fadingBarsG">
                </div>
                <div id="fadingBarsG_5" class="fadingBarsG">
                </div>
                <div id="fadingBarsG_6" class="fadingBarsG">
                </div>
                <div id="fadingBarsG_7" class="fadingBarsG">
                </div>
                <div id="fadingBarsG_8" class="fadingBarsG">
                </div>
            </div>
        </div>
</br>
</center>
    </div>
</body>
</html>
