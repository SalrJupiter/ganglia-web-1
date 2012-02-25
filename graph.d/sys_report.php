<?php

/* Pass in by reference! */
function graph_sys_report ( &$rrdtool_graph ) {

    global $context,
           $hostname,
           $sys_ctxt_color,
           $sys_intr_color,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $rrdtool_graph['height'] += ($size == 'medium') ? 28 : 0;
    $title = '   SYS   ';
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
    }
    $rrdtool_graph['lower-limit']    = '0';
    $rrdtool_graph['vertical-label'] = 'Ctxt switches, irqs';
    $rrdtool_graph['extras']         = '--rigid';

    $series  = '';
    $series .= "DEF:'sys_ctxt'='${rrd_dir}/sys_ctxt.rrd':'sum':AVERAGE ";
    $series .= "DEF:'sys_intr'='${rrd_dir}/sys_intr.rrd':'sum':AVERAGE ";
    $series .= "LINE1:'sys_ctxt'#$sys_ctxt_color:'Context switches' ";
    $series .= "LINE1:'sys_intr'#$sys_intr_color:'Interrupts' ";

    $rrdtool_graph['series'] = $series;

    return $rrdtool_graph;
}
