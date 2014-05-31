<?php
header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=\"".time().".csv\"");
header("Pragma: no-cache");
header("Expires: 0");

$fp = fopen('php://output', 'w');

foreach ($filelist as $item) {
    fputcsv($fp, array($item['id'],
                       $item['userid'],
                       $item['ip'],
                       $item['country'],
                       $item['isp'],
                       $item['latitude'],
                       $item['longitude'],
                       $item['filename'],
                       $item['timestamp']
                      ),
            ";",'"'
           );
}

fclose($fp);
?>