<?php
define("DQH_FIREWALL", true);
require ("dqh-default.php");
DQH_Firewall::init(array(
    // Danh Sách Tên Miền Của Bạn(để domain của bạn)
    'domains' => array(
        'thitran9x.tk',
        'www.thitran9x.tk',
        'localhost'),
    // Luôn bật tường lửa 2 lớp: 1 - tắt: 0
    'dqh_firewall_2nd_layer' => 1,
    // Thời gian đợi sau mỗi đợt request
    'dqh_firewall_wait_time' => 60,
    // Số Request tối đa trong 1 đợt
    'dqh_firewall_penalty_allow' => 10,
    // Giới hạn khóa IP nếu lượng request vượt qua số này trong 1 phút
    'dqh_firewall_request_to_block_in_min' => 1000,
    ));

