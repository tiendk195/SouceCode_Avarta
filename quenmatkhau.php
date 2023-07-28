<?php

/**
 * @package     JohnCMS
 * @link        http://johncms.com
 * @copyright   Copyright (C) 2008-2011 JohnCMS Community
 * @license     LICENSE.txt (see attached file)
 * @version     VERSION.txt (see attached file)
 * @author      http://johncms.com/about
 */

define('_IN_JOHNCMS', 1);

$rootpath = '';
$headmod = 'login';
require('incfiles/core.php');
require('incfiles/head.php');


echo'<div class="thanhhchi">Để lấy lại mật khẩu vui lòng gửi tin nhắn thông tin tài khoản của bạn vào <a href="http://fb.com/lethinhpro123">đây</a></br>';
 echo' <table border="1"><th>Tên tài khoản</th>
<th> Số điện thoại hoặc Email</th>';

    echo'<tr><td>Ví dụ: thinh123 </td>
<td> Ví dụ: 123456@gmail.com</td>

</tr>';

echo'</table></br>';
echo'<b><font color="red">Không hỗ trợ lấy lại mật khẩu cho các trường hợp:</b></font>';
echo'<p style="text-algin:left">
								- Không nhớ số điện thoại hoặc Email của bạn thì chúng tôi không hỗ trợ.<br>
- Số điện thoại hoặc Email không trùng với tài khoản của bạn.<br>

</p>';
echo'</div>';

require('incfiles/end.php');
echo'</div>';echo'</div>';