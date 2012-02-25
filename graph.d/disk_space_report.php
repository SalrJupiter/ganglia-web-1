<?php

/* Pass in by reference! */
function graph_disk_space_report ( &$rrdtool_graph ) {

    global $context,
	   $graphColors,
           $disk_space_avail_color,
           $disk_space_avail_color_area,
           $disk_space_used_color,
           $disk_space_used_color_area,
           $hostname,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $rrdtool_graph['height'] += ($size == 'medium') ? 28 : 0;
    $title = '   DISK SPACE   ';
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
    }
    $rrdtool_graph['lower-limit']    = '0';
    $rrdtool_graph['vertical-label'] = 'GB';
    $rrdtool_graph['extras']         = '--rigid';

    $series  = '';
    $series .= "DEF:disk_avail='${rrd_dir}/disk_total.rrd':sum:AVERAGE ";
    $series .= "DEF:disk_free='${rrd_dir}/disk_free.rrd':sum:AVERAGE ";
    $series .= "CDEF:disk_used=disk_avail,disk_free,- ";
    $series .= "AREA:disk_avail#$disk_space_avail_color_area:'Available disk space' ";
    $series .= "LINE1:disk_avail#$disk_space_avail_color:'' ";
    $series .= "AREA:disk_used#$disk_space_used_color_area:'Used disk space' ";
    $series .= "LINE1:disk_used#$disk_space_used_color:'' ";

    $rrdtool_graph['series'] = $series;

    return $rrdtool_graph;
}
