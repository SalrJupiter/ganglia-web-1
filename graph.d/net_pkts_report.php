<?php

/* Pass in by reference! */
function graph_net_pkts_report ( &$rrdtool_graph ) {

    global $context,
           $hostname,
           $net_pkts_in_color,
           $net_pkts_in_color_area,
           $net_pkts_out_color,
           $net_pkts_out_color_area,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $title = '   NET PACKETS   ';
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
    $rrdtool_graph['vertical-label'] = 'Packets/sec';
    $rrdtool_graph['extras']         = '--rigid --base 1024';

    $series  = '';
    $series .= "DEF:net_pkts_in='${rrd_dir}/pkts_in.rrd':sum:AVERAGE ";
    $series .= "DEF:net_pkts_in_max='${rrd_dir}/pkts_in.rrd':sum:MAX ";
    $series .= "DEF:net_pkts_out='${rrd_dir}/pkts_out.rrd':sum:AVERAGE ";
    $series .= "DEF:net_pkts_out_max='${rrd_dir}/pkts_out.rrd':sum:MAX ";
    $series .= "CDEF:'net_pkts_in_neg'='net_pkts_in',-1,* ";

    $series .= "COMMENT:'\t\tCurrent\t\tAverage\t\tMaximum\l' ";
    $series .= "COMMENT:'\t\t-------\t\t-------\t\t-------\l' ";

    $series .= "AREA:'net_pkts_out'#$net_pkts_out_color_area:'' ";
    $series .= "AREA:'net_pkts_in_neg'#$net_pkts_in_color_area:'' ";

    $series .= "LINE1:'net_pkts_out'#$net_pkts_out_color:'Packets OUT' ";
    $series .= "GPRINT:net_pkts_out:LAST:'%3.1lf %spps\t' ";
    $series .= "GPRINT:net_pkts_out:AVERAGE:'%3.1lf %spps\t' ";
    $series .= "GPRINT:net_pkts_out_max:MAX:'%3.1lf %spps\l' ";

    $series .= "LINE1:'net_pkts_in_neg'#$net_pkts_in_color:'Packets IN ' ";
    $series .= "GPRINT:net_pkts_in:LAST:'%3.1lf %spps\t' ";
    $series .= "GPRINT:net_pkts_in:AVERAGE:'%3.1lf %spps\t' ";
    $series .= "GPRINT:net_pkts_in_max:MAX:'%3.1lf %spps\l' ";

    $series .= "LINE1:0#000000:'' ";

    $rrdtool_graph['series'] = $series;
    return $rrdtool_graph;
}
