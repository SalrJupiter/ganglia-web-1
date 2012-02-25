<?php

/* Pass in by reference! */
function graph_disk_ops_report ( &$rrdtool_graph ) {

    global $context,
	   $graphColors,
           $disk_ops_read_color,
           $disk_ops_write_color,
           $disk_ops_read_color_area,
           $disk_ops_write_color_area,
           $hostname,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $rrdtool_graph['height'] += ($size == 'medium') ? 28 : 0;
    $title = '   DISK OPS   ';
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
	$rrdtool_graph['lower-limit'] = - $_GET['maxY'];
    }
    $rrdtool_graph['vertical-label'] = 'Operations/Second';
    $rrdtool_graph['extras']         = '--rigid';

    $series  = '';
    $series .= "DEF:disk_ops_read='${rrd_dir}/disk_ops_read.rrd':sum:AVERAGE ";
    $series .= "DEF:disk_ops_read_max='${rrd_dir}/disk_ops_read.rrd':sum:MAX ";
    $series .= "DEF:disk_ops_write='${rrd_dir}/disk_ops_write.rrd':sum:AVERAGE ";
    $series .= "DEF:disk_ops_write_max='${rrd_dir}/disk_ops_write.rrd':sum:MAX ";
    $series .= "CDEF:disk_ops_write_neg=disk_ops_write,-1,* ";

    $series .= "COMMENT:'\t\tCurrent\t\tAverage\t\tMaximum\l' ";
    $series .= "COMMENT:'\t\t-------\t\t-------\t\t-------\l' ";

    $series .= "AREA:disk_ops_read#$disk_ops_read_color_area:'' ";
    $series .= "AREA:disk_ops_write_neg#$disk_ops_write_color_area:'' ";

    $series .= "LINE1:disk_ops_read#$disk_ops_read_color:'IOPS read ' ";
    $series .= "GPRINT:disk_ops_read:LAST:'%3.1lf %sops\t' ";
    $series .= "GPRINT:disk_ops_read:AVERAGE:'%3.1lf %sops\t' ";
    $series .= "GPRINT:disk_ops_read_max:MAX:'%3.1lf %sops\l' ";

    $series .= "LINE1:disk_ops_write_neg#$disk_ops_write_color:'IOPS write' ";
    $series .= "GPRINT:disk_ops_write:LAST:'%3.1lf %sops\t' ";
    $series .= "GPRINT:disk_ops_write:AVERAGE:'%3.1lf %sops\t' ";
    $series .= "GPRINT:disk_ops_write_max:MAX:'%3.1lf %sops\l' ";

    $series .= "LINE1:0#000000:'' ";

    $rrdtool_graph['series'] = $series;

    return $rrdtool_graph;
}
