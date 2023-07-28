<?php
if (!defined("DQH_FIREWALL")) exit("Fuck You !");
session_start();

class DQH_Firewall
{
    static $cfg = array();
    static $agents = array();

    public static function init($cfg)
    {
        self::$cfg = $cfg;
        self::$agents = array(
                            'Googlebot',
                            'msnbot',
                            'slurp',
                            'fast-webcrawler',
                            'Googlebot-Image',
                            'teomaagent1',
                            'directhit',
                            'lycos',
                            'ia_archiver',
                            'gigabot',
                            'whatuseek',
                            'Teoma',
                            'scooter',
                            'Ask Jeeves',
                            'slurp@inktomi',
                            'gzip(gfe) (via translate.google.com)',
                            'Mediapartners-Google',
                            'crawler@alexa.com'
                        );
        self::run();
    }

    public static function checkCookie()
    {
        if (setcookie('DQH_Check', md5('DQH'), time() + 360))
        {
            if (isset($_COOKIE['DQH_Check']))
            {
                return true;
            }
        }
        return false;
    }

    public static function check2ndLayer()
    {
        $_SESSION['dqh_firewall_request_wait'] = isset($_SESSION['dqh_firewall_request_wait']) ? $_SESSION['dqh_firewall_request_wait'] : 0;
        $_SESSION['dqh_firewall_request_bcount'] = isset($_SESSION['dqh_firewall_request_bcount']) ? $_SESSION['dqh_firewall_request_bcount'] : 0;
        $_SESSION['dqh_blocked'] = isset($_SESSION['dqh_blocked']) ? $_SESSION['dqh_blocked'] : false;

        if($_SESSION['dqh_firewall_request_wait'] <= time())
        {
            $_SESSION['dqh_firewall_request_bcount'] = 0;
            $_SESSION['dqh_firewall_request_wait'] = time() + 60;
            $_SESSION['dqh_blocked'] = '';
        }

        if($_SESSION['dqh_blocked'] == 'ok')
        {
            require("template-deny.php");
            exit;
        }
        else
        {
            $_SESSION['dqh_firewall_request_bcount']++;
            if ($_SESSION['dqh_firewall_request_bcount'] == self::$cfg['dqh_firewall_request_to_block_in_min']) {
                $_SESSION['dqh_blocked'] = 'ok';
                $_SESSION['dqh_firewall_request_wait'] =  time() + 86400;
                require("template-deny.php");
                exit;
            }
        }


        if(self::$cfg['dqh_firewall_2nd_layer'] == 1){
            $_SESSION['dqh_firewall_penalty_count'] = isset($_SESSION['dqh_firewall_penalty_count']) ? $_SESSION['dqh_firewall_penalty_count'] : 0;
            $_SESSION['dqh_firewall_wait_time']     = isset($_SESSION['dqh_firewall_wait_time']) ? $_SESSION['dqh_firewall_wait_time'] : 0;
            $_SESSION['dqh_firewall_last_request_timestamp'] = isset($_SESSION['dqh_firewall_last_request_timestamp']) ? $_SESSION['dqh_firewall_last_request_timestamp'] : 0;

            if($_SESSION['dqh_firewall_penalty_count'] > self::$cfg['dqh_firewall_penalty_allow']){
                if($_SESSION['dqh_firewall_wait_time'] > time() - self::$cfg['dqh_firewall_wait_time'])
                {
                    $_SESSION['dqh_seconds'] = self::$cfg['dqh_firewall_wait_time'] - (time() - $_SESSION['dqh_firewall_wait_time']);

                    if($_SESSION['dqh_seconds'] < 2){ $_SESSION['dqh_firewall_penalty_count'] = 0;
                    unset($_SESSION['shfirewall']);}
                    // echo "<center><b style='color:red'>Multiple Requests have been directly targeted our forum, as the result the current access is temporarily restricted for ".$seconds." second(s)</b></center>";
                    require("template-wait.php");
                    exit;
                }
            }

            if((time() - $_SESSION['dqh_firewall_last_request_timestamp']) < 1 ){
                $_SESSION['dqh_firewall_penalty_count'] = $_SESSION['dqh_firewall_penalty_count'] + 1;
                $_SESSION['dqh_firewall_wait_time'] = time();
            }

            if((time() - $_SESSION['dqh_firewall_last_request_timestamp']) > 2 ){
                $_SESSION['dqh_firewall_penalty_count'] = 0;
            }

            $_SESSION['dqh_firewall_last_request_timestamp'] = time();
        }
    }

    public static function run()
    {
        //Search Engines do not need to see the firewall
        $agent_mode = 0;
        $get_user_agent = $_SERVER['HTTP_USER_AGENT'];
        if(empty($get_user_agent)){
            $get_user_agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
        }

        foreach (self::$agents as $Agent)
        {
            if(strstr($get_user_agent ,$Agent) and self::checkCookie() == false)
            {
                $agent_mode++;
            }
        }

        if($agent_mode == 0)
        {
            self::check2ndLayer();
            if (empty($_SESSION['shfirewall']))
            {
                if (!empty($_POST['dqh_firewall']) and !empty($_SESSION['temp']))
                {
                    $Domain_Allowed = 0;
                    foreach (self::$cfg['domains'] as $Domain)
                    {
                            if(strpos($_SERVER['HTTP_REFERER'], $Domain) !== false)
                            {
                                $Domain_Allowed++;
                            }
                    }

                    if($Domain_Allowed > 0)
                    {
                        $_SESSION['shfirewall'] = 'ready';
                        header("location: ". $_POST['dqh_firewall']);
                    } else {
                        require("template-deny.php");
                        exit;
                    }

                } else {
                        require("template-default.php");
                        $_SESSION['temp'] = 1;
                        exit;
                }
            }
        }
    }
}
