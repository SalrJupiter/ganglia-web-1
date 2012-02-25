<?php

/* Pass in by reference! */
function graph_proc_report ( &$rrdtool_graph ) {

    global $context,
           $hostname,
           $proc_total_color,
           $proc_forkrate_color,
           $proc_run_color,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $rrdtool_graph['height'] += ($size == 'medium') ? 28 : 0;
    $title = '   PROCESSES   ';
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
    }
    $rrdtool_graph['lower-limit']    = '0';
    $rrdtool_graph['vertical-label'] = 'Processes';
    $rrdtool_graph['extras']         = '--rigid';

    $series  = '';
    $series .= "DEF:'proc_total'='${rrd_dir}/proc_total.rrd':'sum':AVERAGE ";
    $series .= "DEF:'proc_run'='${rrd_dir}/proc_run.rrd':'sum':AVERAGE ";
    $series .= "DEF:'proc_forkrate'='${rrd_dir}/proc_forkrate.rrd':'sum':AVERAGE ";
    $series .= "CDEF:'cproc_run'=proc_run,100,* ";
    $series .= "CDEF:'cproc_forkrate'=proc_forkrate,10,* ";

    $series .="LINE1:'proc_total'#$proc_total_color:'Total processes' ";
    $series .="LINE1:'cproc_run'#$proc_run_color:'Running * 100' ";
    $series .="LINE1:'cproc_forkrate'#$proc_forkrate_color:'Fork rate * 10' ";

    $rrdtool_graph['series'] = $series;

    return $rrdtool_graph;

}
