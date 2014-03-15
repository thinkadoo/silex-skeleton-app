<?php

    $row = 1;

    if (($handle = fopen("reserved.csv", "r")) !== FALSE) {

        $rlist = array();

        while (($data = fgetcsv($handle, 1000, "\n")) !== FALSE) {
            $num = count($data);
            $row++;

            for ($c=0; $c < $num; $c++) {
                $rlist [] =  "- " . $data[$c];
                $rlist [] =  "- " . strtolower($data[$c]);
                $rlist [] =  "- " . ucfirst(strtolower($data[$c]));
            }
        }
        fclose($handle);

        $fp = fopen('reserved.yml', 'w');
        fwrite($fp, implode("\n",$rlist));
        fclose($fp);
    }
?>