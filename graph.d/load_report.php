<?php

/* Pass in by reference! */
function graph_load_report ( &$rrdtool_graph ) {

    global $context,
           $cpu_num_color,
           $cpu_user_color,
           $hostname,
           $load_one_color_area,
           $load_one_color,
           $num_nodes_color,
           $proc_run_color,
           $proc_forkrate_color,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $rrdtool_graph['height'] += ($size == 'medium') ? 28 : 0;
    $title = '   LOAD   ';
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
    }
    $rrdtool_graph['lower-limit']    = '0';
    $rrdtool_graph['vertical-label'] = 'Load/Procs';
    $rrdtool_graph['extras']         = '--rigid';

    $series = "DEF:'load_one'='${rrd_dir}/load_one.rrd':'sum':AVERAGE "
        ."DEF:'proc_run'='${rrd_dir}/proc_run.rrd':'sum':AVERAGE "
        ."DEF:'cpu_num'='${rrd_dir}/cpu_num.rrd':'sum':AVERAGE ";

    $series .="AREA:'load_one'#$load_one_color_area:'' ";
    $series .="LINE:'load_one'#$load_one_color:'1-min Load' ";

    if( $context != 'host' ) {
        $series .="DEF:'num_nodes'='${rrd_dir}/cpu_num.rrd':'num':AVERAGE ";
        $series .= "LINE1:'num_nodes'#$num_nodes_color:'Nodes' ";
    }

    $series .="LINE1:'cpu_num'#$cpu_num_color:'CPUs' ";
    $series .="LINE1:'proc_run'#$proc_run_color:'Running Processes' ";

    $rrdtool_graph['series'] = $series;

    return $rrdtool_graph;

}
