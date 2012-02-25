<?php

/* Pass in by reference! */
function graph_net_bytes_report ( &$rrdtool_graph ) {

    global $context,
           $hostname,
           $net_bytes_in_color,
           $net_bytes_in_color_area,
           $net_bytes_out_color,
           $net_bytes_out_color_area,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $title = '   NET BYTES   ';
    $rrdtool_graph['height'] += ($size == 'medium') ? 28 : 0;
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
	$rrdtool_graph['lower-limit'] = - $_GET['maxY'];
    }
    $rrdtool_graph['vertical-label'] = 'Bytes/sec';
    $rrdtool_graph['extras']         = '--rigid --base 1024';

    $series  = '';
    $series .= "DEF:'bytes_in'='${rrd_dir}/bytes_in.rrd':'sum':AVERAGE ";
    $series .= "DEF:'bytes_in_max'='${rrd_dir}/bytes_in.rrd':'sum':MAX ";
    $series .= "DEF:'bytes_out'='${rrd_dir}/bytes_out.rrd':'sum':AVERAGE ";
    $series .= "DEF:'bytes_out_max'='${rrd_dir}/bytes_out.rrd':'sum':MAX ";
    $series .= "CDEF:'bytes_in_neg'='bytes_in',-1,* ";

    $series .= "COMMENT:'\t\tCurrent\t\tAverage\t\tMaximum\l' ";
    $series .= "COMMENT:'\t\t-------\t\t-------\t\t-------\l' ";

    $series .= "AREA:'bytes_in_neg'#$net_bytes_in_color_area:'' ";
    $series .= "AREA:'bytes_out'#$net_bytes_out_color_area:'' ";

    $series .= "LINE1:'bytes_out'#$net_bytes_out_color:'Bytes OUT' ";
    $series .= "GPRINT:bytes_out:LAST:'%3.1lf %sB/s\t' ";
    $series .= "GPRINT:bytes_out:AVERAGE:'%3.1lf %sB/s\t' ";
    $series .= "GPRINT:bytes_out_max:MAX:'%3.1lf %sB/s\l' ";

    $series .= "LINE1:'bytes_in_neg'#$net_bytes_in_color:'Bytes IN ' ";
    $series .= "GPRINT:bytes_in:LAST:'%3.1lf %sB/s\t' ";
    $series .= "GPRINT:bytes_in:AVERAGE:'%3.1lf %sB/s\t' ";
    $series .= "GPRINT:bytes_in_max:MAX:'%3.1lf %sB/s\l' ";

    $series .= "LINE1:0#000000:'' ";

    $rrdtool_graph['series'] = $series;
    return $rrdtool_graph;
}
