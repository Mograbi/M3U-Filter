<?php

class M3uItem {
    var $id;
    var $name;
    var $logo_url;
    var $group;
    var $az;
    var $channel_url;
}

function parse_m3u($url) {
    if (empty($url))
    {
        return 0;
    }
    $m3u_file = file_get_contents($url);
    $rows = explode("\n", $m3u_file);
    array_shift($rows);

    foreach($rows as $row => $data)
    {
        //get row data
        echo $data;
        echo "<br>";
        //echo "#################&&&&&&&&&&&&&&&&##########################";
        //echo "<br>";
    }
}

?>