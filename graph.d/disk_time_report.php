<?php

/* Pass in by reference! */
function graph_disk_time_report ( &$rrdtool_graph ) {

    global $context,
	   $graphColors,
           $disk_time_read_color,
           $disk_time_read_color_area,
           $disk_time_write_color,
           $disk_time_write_color_area,
           $hostname,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $rrdtool_graph['height'] += ($size == 'medium') ? 28 : 0;
    $title = '   DISK TIME   ';
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
	$rrdtool_graph['lower-limit'] = - $_GET['maxY'];
    }
    $rrdtool_graph['vertical-label'] = 'Seconds spent doing IO/second';
    $rrdtool_graph['extras']         = '--rigid';

    $series  = '';
    $series .= "DEF:disk_time_read_ms='${rrd_dir}/disk_time_read.rrd':sum:AVERAGE ";
    $series .= "DEF:disk_time_read_max_ms='${rrd_dir}/disk_time_read.rrd':sum:MAX ";
    $series .= "DEF:disk_time_write_ms='${rrd_dir}/disk_time_write.rrd':sum:AVERAGE ";
    $series .= "DEF:disk_time_write_max_ms='${rrd_dir}/disk_time_write.rrd':sum:MAX ";

    $series .= "CDEF:disk_time_read=disk_time_read_ms,1000,/ ";
    $series .= "CDEF:disk_time_read_max=disk_time_read_max_ms,1000,/ ";
    $series .= "CDEF:disk_time_write=disk_time_write_ms,1000,/ ";
    $series .= "CDEF:disk_time_write_max=disk_time_write_max_ms,1000,/ ";

    $series .= "CDEF:disk_time_write_neg=disk_time_write,-1,* ";

    $series .= "COMMENT:'\t\tCurrent\t\tAverage\t\tMaximum\l' ";
    $series .= "COMMENT:'\t\t-------\t\t-------\t\t-------\l' ";

    $series .= "AREA:disk_time_read#$disk_time_read_color_area:'' ";
    $series .= "AREA:disk_time_write_neg#$disk_time_write_color_area:'' ";

    $series .= "LINE1:disk_time_read#$disk_time_read_color:'IO read' ";
    $series .= "GPRINT:disk_time_read:LAST:'%3.1lf %ss/s\t' ";
    $series .= "GPRINT:disk_time_read:AVERAGE:'%3.1lf %ss/s\t' ";
    $series .= "GPRINT:disk_time_read_max:MAX:'%3.1lf %ss/s\l' ";

    $series .= "LINE1:disk_time_write_neg#$disk_time_write_color:'IO write' ";
    $series .= "GPRINT:disk_time_write:LAST:'%3.1lf %ss/s\t' ";
    $series .= "GPRINT:disk_time_write:AVERAGE:'%3.1lf %ss/s\t' ";
    $series .= "GPRINT:disk_time_write_max:MAX:'%3.1lf %ss/s\l' ";

    $series .= "LINE1:0#000000:'' ";

    $rrdtool_graph['series'] = $series;
    return $rrdtool_graph;
}
