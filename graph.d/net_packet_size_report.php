<?php

/* Pass in by reference! */
function graph_net_packet_size_report ( &$rrdtool_graph ) {

    global $context,
           $hostname,
           $net_packet_size_in_color,
           $net_packet_size_in_color_area,
           $net_packet_size_out_color,
           $net_packet_size_out_color_area,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $rrdtool_graph['height'] += ($size == 'medium') ? 28 : 0;
    $title = '  NET PACKET SIZE  ';
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
	$rrdtool_graph['lower-limit'] = - $_GET['maxY'];
    }
    $rrdtool_graph['vertical-label'] = 'Bytes/packet';
    $rrdtool_graph['extras']         = '--rigid';

    $series  = '';
    $series .= "DEF:'bytes_in'='${rrd_dir}/bytes_in.rrd':'sum':AVERAGE ";
    $series .= "DEF:'bytes_out'='${rrd_dir}/bytes_out.rrd':'sum':AVERAGE ";
    $series .= "DEF:'pkts_in'='${rrd_dir}/pkts_in.rrd':'sum':AVERAGE ";
    $series .= "DEF:'pkts_out'='${rrd_dir}/pkts_out.rrd':'sum':AVERAGE ";
    $series .= "CDEF:'net_pkts_in_valid'=pkts_in,1,LT,100000,pkts_in,IF ";
    $series .= "CDEF:'net_pkts_out_valid'=pkts_out,1,LT,100000,pkts_out,IF ";
    $series .= "CDEF:'net_packet_size_in'=bytes_in,net_pkts_in_valid,/ ";
    $series .= "CDEF:'net_packet_size_out'=bytes_out,net_pkts_out_valid,/ ";
    $series .= "CDEF:'net_packet_size_in_neg'='net_packet_size_in',-1,* ";

    $series .= "COMMENT:'\t\tCurrent\t\tAverage\t\tMaximum\l' ";
    $series .= "COMMENT:'\t\t-------\t\t-------\t\t-------\l' ";

    $series .= "AREA:'net_packet_size_out'#$net_packet_size_out_color_area:'' ";
    $series .= "AREA:'net_packet_size_in_neg'#$net_packet_size_in_color_area:'' ";

    $series .= "LINE1:'net_packet_size_out'#$net_packet_size_out_color:'B/P OUT' ";
    $series .= "GPRINT:net_packet_size_out:LAST:'%3.1lf %sbpp\t' ";
    $series .= "GPRINT:net_packet_size_out:AVERAGE:'%3.1lf %sbpp\t' ";
    $series .= "GPRINT:net_packet_size_out:MAX:'%3.1lf %sbpp\l' ";

    $series .= "LINE1:'net_packet_size_in_neg'#$net_packet_size_in_color:'B/P IN ' ";
    $series .= "GPRINT:net_packet_size_in:LAST:'%3.1lf %sbpp\t' ";
    $series .= "GPRINT:net_packet_size_in:AVERAGE:'%3.1lf %sbpp\t' ";
    $series .= "GPRINT:net_packet_size_in:MAX:'%3.1lf %sbpp\l' ";

    $series .= "LINE1:0#000000:'' ";

    $rrdtool_graph['series'] = $series;
    return $rrdtool_graph;
}
