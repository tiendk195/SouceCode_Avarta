<?php

    if (! empty($_GET['pkoolvn']) && $_GET['pkoolvn'] == "ok")
    {
        if (! empty($_GET['q']))
        {
            if (preg_match('/^(soundcloud\.com)/', $_GET['q']))
            {
                $newdata = array(
                    'status' => 200,
                    'type' => 'embed',
                    'sc_uri' => $_GET['q']
                );
                
                if (!preg_match('/^(http\:\/\/|https\:\/\/)/', $_GET['q']))
                {
                    $newdata['sc_uri'] = 'https://' . $data['sc_uri'];
                }

                return $data;
            }
            else
            {
                $api_url = 'http://api.soundcloud.com/tracks.json?client_id=4346c8125f4f5c40ad666bacd8e96498&q=' . urlencode($_GET['q']);
                $api_content = @file_get_contents($api_url);
                $html = '';
                
                if (! $api_content)
                {
                    $data = "";
                }
                
                $api_content_array = json_decode($api_content, true);
                
                if (! is_array($api_content_array))
                {
                    $data = "";
                }
                
                foreach ($api_content_array as $k => $v)
                {
                    $soundcloud_title = $v['title'];
                    $soundcloud_uri = $v['uri'];
                    $soundcloud_thumbnail = $v['artwork_url'];
                    $soundcloud_genre = $v['genre'];

                    $html .= '<div class="menu"><img src="' . $soundcloud_thumbnail . '" title="' . $soundcloud_title . '" class="avatar_vina"/><b><font color="blue"> ' . $soundcloud_title . '</b></font><br><form action="/pages/nhac.php?pkoolvn" method="post"><input type="hidden" name="url" value="'.$soundcloud_uri.'"><input type="submit" name="submit" value="Chọn"/></form></div>';
                }
                
                if (! empty($html))
                {
                    $data = array(
                        'status' => 200,
                        'type' => 'api',
                        'html' => $html
                    );
                }
            }
        }
    }

header("Content-type: application/json; charset=utf-8");
echo json_encode($data, true);
exit();