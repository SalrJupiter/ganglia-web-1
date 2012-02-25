<?php

/* Pass in by reference! */
function graph_disk_time_per_op_report ( &$rrdtool_graph ) {

    global $context,
           $hostname,
           $disk_time_per_op_read_color,
           $disk_time_per_op_read_color_area,
           $disk_time_per_op_write_color,
           $disk_time_per_op_write_color_area,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $rrdtool_graph['height'] += ($size == 'medium') ? 28 : 0;
    $title = '   DISK TIME per OP   ';
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
	$rrdtool_graph['lower-limit'] = - $_GET['maxY'];
    }
    $rrdtool_graph['vertical-label'] = 'Seconds / operation';
    $rrdtool_graph['extras']         = '--rigid';

    $series  = '';
    $series .= "DEF:disk_time_read='${rrd_dir}/disk_time_read.rrd':sum:AVERAGE ";
    $series .= "DEF:disk_time_write='${rrd_dir}/disk_time_write.rrd':sum:AVERAGE ";
    $series .= "DEF:disk_ops_read='${rrd_dir}/disk_ops_read.rrd':sum:AVERAGE ";
    $series .= "DEF:disk_ops_write='${rrd_dir}/disk_ops_write.rrd':sum:AVERAGE ";

    $series .= "CDEF:disk_ops_read_valid=disk_ops_read,1,LT,1000,disk_ops_read,IF ";
    $series .= "CDEF:disk_ops_write_valid=disk_ops_write,1,LT,1000,disk_ops_write,IF ";
    $series .= "CDEF:disk_time_per_op_read=disk_time_read,disk_ops_read_valid,/,1000,/ ";
    $series .= "CDEF:disk_time_per_op_write=disk_time_write,disk_ops_write_valid,/,1000,/ ";

    $series .= "CDEF:disk_time_per_op_write_neg=disk_time_per_op_write,-1,* ";

    $series .= "COMMENT:'\t\tCurrent\t\tAverage\t\tMaximum\l' ";
    $series .= "COMMENT:'\t\t-------\t\t-------\t\t-------\l' ";

    $series .= "AREA:disk_time_per_op_read#$disk_time_per_op_read_color_area:'' ";
    $series .= "AREA:disk_time_per_op_write_neg#$disk_time_per_op_write_color_area:'' ";

    $series .= "LINE1:disk_time_per_op_read#$disk_time_per_op_read_color:'OP time RD' ";
    $series .= "GPRINT:disk_time_per_op_read:LAST:'%3.1lf %ss/o\t' ";
    $series .= "GPRINT:disk_time_per_op_read:AVERAGE:'%3.1lf %ss/o\t' ";
    $series .= "GPRINT:disk_time_per_op_read:MAX:'%3.1lf %ss/o\l' ";

    $series .= "LINE1:disk_time_per_op_write_neg#$disk_time_per_op_write_color:'OP time WR' ";
    $series .= "GPRINT:disk_time_per_op_write:LAST:'%3.1lf %ss/o\t' ";
    $series .= "GPRINT:disk_time_per_op_write:AVERAGE:'%3.1lf %ss/o\t' ";
    $series .= "GPRINT:disk_time_per_op_write:MAX:'%3.1lf %ss/o\l' ";

    $series .= "LINE1:0#000000:'' ";

    $rrdtool_graph['series'] = $series;
    return $rrdtool_graph;
}
