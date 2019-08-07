<?php

class M3uItem {
    var $id;
    var $name;
    var $logo_url;
    var $group;
    var $az;
    var $channel_url;

    public function print() {
        printf("name=%s\nlogo=%s\ngroup=%s\nurl=%s", $this->name, $this->logo_url, $this->group, $this->channel_url);
    }
}

function parse_m3u($url) {
    if (empty($url))
    {
        return 0;
    }
    $m3u_file = file_get_contents($url);
    $rows = explode("#", $m3u_file);
    array_shift($rows);
    $groups_map = array();
    
    foreach($rows as $row => $data)
    {
        //get row data
        //echo $data;
        $m3uitem = new M3UItem;
        $extinf = explode("\n", $data);
        //echo $extinf[0];
        if (preg_match("/EXTINF:.*/", $extinf[0], $match)) {
            if (preg_match("/tvg-name=\"[^:]*: ([^\"]+)\"/", $extinf[0], $match)) {
                $m3uitem->name = $match[1];
            }
            if (preg_match("/tvg-logo=\"([^\"]*)\"/", $extinf[0], $match)) {
                $m3uitem->logo_url = $match[1];
            }
            if (preg_match("/group-title=\"([^\"]*)\"/", $extinf[0], $match)) {
                $m3uitem->group = $match[1];
            }
            $m3uitem->channel_url = $extinf[1];
        }
        //$m3uitem->print();
        if (array_key_exists($m3uitem->group, $groups_map)) {
            array_push($groups_map[$m3uitem->group], $m3uitem);
        }
        else {
            $groups_map[$m3uitem->group] = array($m3uitem);
        }
        
    }
    /*
    foreach ($groups_map as $group => $m3uitemlist) {
        echo "<br>";
        echo $group; echo "############<br>";
        foreach ($m3uitemlist as $key => $m3uitem) {
            $m3uitem->print();
            echo "<br><br>";
        }
    }*/
    foreach (array_keys($groups_map) as $key => $group) {
        echo "<input type=\"checkbox\" name=\"$group\" value=\"$group\">$group<br>";
        //print_r($group);
    }
}

?>