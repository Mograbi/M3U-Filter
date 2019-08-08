<?php

    class M3uItem {
        var $id;
        var $name;
        var $logo_url;
        var $group;
        var $channel_url;

        function __construct() {
            $id = "";
            $name = "";
            $logo_url = "";
            $group = "unknown";
            $channel_url = "";
        }

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
            $m3uitem = new M3UItem;
            if (preg_match("/EXTINF:[^,]+,(.+)\s*(.*)/", $data, $match)) {
                if (preg_match("/tvg-name=\"[^:]*: ([^\"]+)\"/", $data, $matchname)) {
                    $m3uitem->name = $matchname[1];
                } else {
                    $m3uitem->name = $match[1];
                }
                if (preg_match("/tvg-logo=\"([^\"]*)\"/", $data, $matchlogo)) {
                    $m3uitem->logo_url = $matchlogo[1];
                }
                if (preg_match("/group-title=\"([^\"]*)\"/", $data, $matchgroup)) {
                    $m3uitem->group = $matchgroup[1];
                }
                $m3uitem->channel_url = $match[2];
            }
            //$m3uitem->print();
            if (array_key_exists($m3uitem->group, $groups_map)) {
                array_push($groups_map[$m3uitem->group], $m3uitem);
            }
            else {
                $groups_map[$m3uitem->group] = array($m3uitem);
            }

        }
        return $groups_map;
    }

?>