<?php

// This report is used for specific metric graphs at the bottom of the
// cluster_view page.

/* Pass in by reference! */
function graph_metric ( &$rrdtool_graph ) {

    global $context,
           $default_metric_color,
           $default_metric_color_max_area,
           $default_metric_color_max_line,
           $default_metric_color_avg,
           $default_metric_color_min_area,
           $default_metric_color_min_line,
           $hostname,
           $jobstart,
           $load_color,
           $max,
           $meta_designator,
           $metricname,
           $metrictitle,
           $min,
           $range,
           $rrd_dir,
           $size,
           $summary,
	   $time_ranges,
           $value,
           $vlabel,
           $strip_domainname;

    if ($strip_domainname) {
        $hostname = strip_domainname($hostname);
    }

    $rrdtool_graph['height'] += 0; //no fudge needed

    switch ($context) {

        case 'host':

            if ($summary) {
                $rrdtool_graph['title'] = $hostname;
                $prefix = $metricname;
            } else {
                $prefix = $hostname;
                if ($metrictitle) {
                   $rrdtool_graph['title'] = $metrictitle .' last '. $range .' - '. $hostname;
                } else {
                   $rrdtool_graph['title'] = $metricname .' last '. $range .' - '. $hostname;
                }
            }

            $prefix = $summary ? $metricname : $hostname;
            $value = ($value > 1000)
                        ? number_format($value)
                        : number_format($value, 2);

            if ($range == 'job') {
                $hrs = intval (-$jobrange / 3600);
                $subtitle = "$prefix last ${hrs} (now $value)";
            } else {
                if ($summary) {
                   $subtitle_one = "$metricname last $range";
                } else {
                   $subtitle_one = "$metricname ";
                }
                $subtitle_two = "  (now $value)";
            }

            break;

        case 'meta':
            $rrdtool_graph['title'] = "$meta_designator ". $rrdtool_graph['title'] ."last $range";
            break;

        case 'grid':
            $rrdtool_graph['title'] = "$meta_designator ". $rrdtool_graph['title'] ."last $range";
            break;

        case 'cluster':
            $rrdtool_graph['title'] = "$clustername "    . $rrdtool_graph['title'] ."last $range";
            break;

        default:
            if ($size == 'small') {
                $rrdtool_graph['title'] = $hostname;
            } else if ($summary) {
                $rrdtool_graph['title'] = $hostname;
            } else {
                $rrdtool_graph['title'] = $metricname;
            }
            break;

    }

    if ($load_color)
        $rrdtool_graph['color'] = "BACK#'$load_color'";

    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
    }

    if (isset($max) && is_numeric($max))
        $rrdtool_graph['upper-limit'] = $max;

    if (isset($min) && is_numeric($min))
        $rrdtool_graph['lower-limit'] = $min;

    if ($vlabel) {
        // We should set $vlabel, even if it isn't used for spacing
        // and alignment reasons.  This is mostly for aesthetics
        $temp_vlabel = trim($vlabel);
	$temp_vlabel = strlen($temp_vlabel)   ?   $temp_vlabel   :   ' ';
	if ($temp_vlabel == '%') {
	    $rrdtool_graph['upper-limit'] = '100';
	}

        $rrdtool_graph['vertical-label'] = $temp_vlabel;
    } else {
        $rrdtool_graph['vertical-label'] = ' ';
    }

    //# the actual graph...
    $series  = '';
#    $series .= "DEF:'max'='$rrd_dir/$metricname.rrd:sum':MAX ";
#    $series .= "DEF:'avg'='$rrd_dir/$metricname.rrd:sum':AVERAGE ";
#    $series .= "DEF:'min'='$rrd_dir/$metricname.rrd:sum':MIN ";
#    $series .= " AREA:'max'#$default_metric_color_max_area: ";
#    $series .= " AREA:'min'#$default_metric_color_min_area: ";
#    $series .= " LINE1:'min'#$default_metric_color_min_line: ";
#    $series .= " LINE1:'max'#$default_metric_color_max_line: ";
#    $series .= " LINE1:'avg'#$default_metric_color_avg:'$subtitle_one AVERAGE' ";

    // Shift for this much :)
    $timeShift = $time_ranges[$_REQUEST['r']];

    $series  = '';
    $series .= "DEF:'max'='$rrd_dir/$metricname.rrd:sum':MAX ";
    $series .= "DEF:'avg'='$rrd_dir/$metricname.rrd:sum':AVERAGE ";
    $series .= "DEF:'avgprev'='$rrd_dir/$metricname.rrd:sum':AVERAGE:start=-$timeShift-$timeShift:end=-$timeShift ";
    $series .= "SHIFT:avgprev:$timeShift ";
    $series .= "CDEF:avg_diff=avg,avgprev,- ";
    $series .= "CDEF:avg_diff_abs=avg_diff,ABS ";
    $series .= "DEF:'min'='$rrd_dir/$metricname.rrd:sum':MIN ";
    $series .= " AREA:'max'#$default_metric_color_max_area: ";
    $series .= " AREA:'min'#$default_metric_color_min_area: ";
    $series .= " LINE1:'min'#$default_metric_color_min_line: ";
    $series .= " LINE1:'max'#$default_metric_color_max_line: ";
    $series .= " LINE1:avgprev#888888:'$subtitle_one previous AVERAGE' ";
    $series .= " LINE3:'avg'#$default_metric_color_avg:'$subtitle_one AVERAGE' ";
    $series .= " LINE1:'avg_diff_abs'#EE4444:'$subtitle_one diff with previous period' ";

#    $series .= " :STACK: COMMENT:'$subtitle_two' ";

    if ($jobstart) {
        $series .= "VRULE:$jobstart#$jobstart_color ";
    }

    $rrdtool_graph['series'] = $series;

    return $rrdtool_graph;

}
