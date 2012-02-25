<?php

/* Pass in by reference! */
function graph_mem_report ( &$rrdtool_graph ) {

    global $context,
           $hostname,
           $mem_used_color,
           $mem_used_color_area,
           $mem_shared_color,
           $mem_shared_color_area,
           $mem_cached_color,
           $mem_cached_color_area,
           $mem_buffers_color,
           $mem_buffers_color_area,
           $mem_free_color_area,
           $mem_total_color,
           $mem_swapped_color,
           $range,
           $rrd_dir,
           $size,
           $strip_domainname;

    if ($strip_domainname) {
       $hostname = strip_domainname($hostname);
    }

    $title = '   MEMORY   ';
    if ($context != 'host') {
       $rrdtool_graph['title'] = $title;
    } else {
       $rrdtool_graph['title'] = "$hostname $title last $range";
    }
    if (isset($_GET['maxY'])) {
	$rrdtool_graph['upper-limit'] = $_GET['maxY'];
    }
    $rrdtool_graph['lower-limit']    = '0';
    $rrdtool_graph['vertical-label'] = 'Bytes';
    $rrdtool_graph['extras']         = '--rigid --base 1024';

    $series  = '';
    $series .= "DEF:mem_total='${rrd_dir}/mem_total.rrd':sum:AVERAGE ";
    $series .= "DEF:mem_shared='${rrd_dir}/mem_shared.rrd':sum:AVERAGE ";
    $series .= "DEF:mem_cached='${rrd_dir}/mem_cached.rrd':sum:AVERAGE ";
    $series .= "DEF:mem_buffers='${rrd_dir}/mem_buffers.rrd':sum:AVERAGE ";
    $series .= "DEF:mem_free='${rrd_dir}/mem_free.rrd':sum:AVERAGE ";

    $series .= "CDEF:bmem_total=mem_total,1024,* ";
    $series .= "CDEF:bmem_shared=mem_shared,1024,* ";
    $series .= "CDEF:bmem_cached=mem_cached,1024,* ";
    $series .= "CDEF:bmem_buffers=mem_buffers,1024,* ";
    $series .= "CDEF:bmem_free=mem_free,1024,* ";

    $series .= "CDEF:bmem_used=bmem_total,bmem_shared,-,bmem_free,-,bmem_cached,-,bmem_buffers,- ";

    $series .= "CDEF:lmem_shared=bmem_used,bmem_shared,+ ";
    $series .= "CDEF:lmem_cached=lmem_shared,bmem_cached,+ ";
    $series .= "CDEF:lmem_buffers=lmem_cached,bmem_buffers,+ ";

    $series .= "AREA:bmem_used#$mem_used_color_area:'Used' ";
    $series .= "STACK:bmem_shared#$mem_shared_color_area:'Shared' ";
    $series .= "STACK:bmem_cached#$mem_cached_color_area:'Cached' ";
    $series .= "STACK:bmem_buffers#$mem_buffers_color_area:'Buffers' ";
    $series .= "STACK:bmem_free#$mem_free_color_area:'Free' ";

    if (file_exists("$rrd_dir/swap_total.rrd")) {
        $series .= "DEF:swap_total='${rrd_dir}/swap_total.rrd':sum:AVERAGE ";
        $series .= "DEF:swap_free='${rrd_dir}/swap_free.rrd':sum:AVERAGE ";
        $series .= "CDEF:bmem_swapped=swap_total,swap_free,-,1024,* ";
        $series .= "STACK:bmem_swapped#$mem_swapped_color:'Swapped' ";
    }

    $series .= "LINE1:bmem_used#$mem_used_color ";
    $series .= "LINE1:lmem_shared#$mem_shared_color ";
    $series .= "LINE1:lmem_cached#$mem_cached_color ";
    $series .= "LINE1:lmem_buffers#$mem_buffers_color ";
    $series .= "LINE1:bmem_total#$mem_total_color:'Total' ";

    $rrdtool_graph['series'] = $series;
    return $rrdtool_graph;
}
