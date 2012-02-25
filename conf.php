<?php
# $Id: conf.php.in 2194 2010-01-08 16:58:25Z d_pocock $
#
# Gmetad-webfrontend version. Used to check for updates.
#
include_once "./version.php";

#
# The name of the directory in "./templates" which contains the
# templates that you want to use. Templates are like a skin for the
# site that can alter its look and feel.
#
$template_name     = "a2o";
$conf_base_url     = '/';
$conf_logo_url     = 'templates/default/images/logo.jpg';
$conf_favicon_url  = '';
$conf_title_prefix = 'a2o ganglia frontend :: ';

#
# If you installed gmetad in a directory other than the default
# make sure you change it here.
#

# Where gmetad stores the rrd archives.
$gmetad_root = "/var/ganglia";
$rrds = "$gmetad_root/rrds";

# Leave this alone if rrdtool is installed in $gmetad_root,
# otherwise, change it if it is installed elsewhere (like /usr/bin)
define("RRDTOOL", "/usr/bin/rrdtool");

# If rrdcached is being used, this argument must specify the 
# socket to use.
#
# ganglia-web only requires, and should use, the low-privilege socket
# created with the -L option to rrdcached.  gmetad requires, and must use,
# the fully privileged socket created with the -l option to rrdcached.
$rrdcached_socket = "/var/run/rrdcached.sock.nogroup";
#$rrdcached_socket = "";

# Location for modular-graph files.
$graphdir='./graph.d';

#
# If you want to grab data from a different ganglia source specify it here.
# Although, it would be strange to alter the IP since the Round-Robin
# databases need to be local to be read. 
#
$ganglia_ip = "127.0.0.1";
$ganglia_port = 8652;

#
# The maximum number of dynamic graphs to display.  If you set this
# to 0 (the default) all graphs will be shown.  This option is
# helpful if you are viewing the web pages from a browser with a
# small pipe.
#
$max_graphs = 0;

#
# In the Cluster View this sets the default number of columns used to
# display the host grid below the summary graphs.
#
$hostcols = 3;

#
# In the Host View this sets the default number of columns used to
# display the metric grid below the summary graphs.
#
$metriccols = 3;

#
# Turn on and off the Grid Snapshot. Now that we have a
# hierarchical snapshot (per-cluster instead of per-node) on
# the meta page this makes more sense. Most people will want this
# on.
#
$show_meta_snapshot = "yes";

#
# The default refresh frequency on pages.
#
$default_refresh = 60;

#
# General graph colors
#
$graphColors = array(
    'canvas'          => 'FFFFFF',

    'full_red'        => 'FF0000',
    'full_green'      => '00E000',
    'full_blue'       => '0000FF',
    'full_yellow'     => 'F0A000',
    'full_cyan'       => '00A0FF',
    'full_magenta'    => 'A000FF',

    'half_red'        => 'F7B7B7',
    'half_green'      => 'B7EFB7',
    'half_blue'       => 'B7B7F7',
    'half_yellow'     => 'F3DFB7',
    'half_cyan'       => 'B7DFF7',
    'half_magenta'    => 'DFB7F7',

    'half_blue_green' => '89B3C9',
);



#
# Colors for the CPU report graph
#
$cpu_user_color = "3333bb";
$cpu_nice_color = "ffea00";
$cpu_system_color = "dd0000";
$cpu_wio_color = "ff8a60";
$cpu_idle_color = "e2e2f2";

#
# Colors for the DISK report graphs
#
$disk_ops_read_color               = "10b030";
$disk_ops_read_color_area          = "90f090";
$disk_ops_write_color              = "f05000";
$disk_ops_write_color_area         = "ffd090";

$disk_time_read_color              = "109020";
$disk_time_read_color_area         = "60d060";
$disk_time_write_color             = "d05000";
$disk_time_write_color_area        = "f09060";

$disk_time_per_op_read_color       = "007010";
$disk_time_per_op_read_color_area  = "50b050";
$disk_time_per_op_write_color      = "b03000";
$disk_time_per_op_write_color_area = "d06040";

$disk_space_avail_color       = "00a050";
$disk_space_avail_color_area  = "40f0a0";
$disk_space_used_color        = "d04000";
$disk_space_used_color_area   = "ffa050";


#
# Colors for the MEMORY report graph
#
$mem_used_color          = "3030d0";
$mem_used_color_area     = "5050d0";
$mem_shared_color        = "000080";
$mem_shared_color_area   = "0000b0";
$mem_cached_color        = "10a010";
$mem_cached_color_area   = "30d030";
$mem_buffers_color       = "70c020";
$mem_buffers_color_area  = "90ff30";
$mem_free_color_area     = "f0ffc0";
$mem_total_color         = "ff0000";
$mem_swapped_color       = "9000CC";
$mem_swapped_color_area  = "9000CC";


#
# Colors for the LOAD report graph
#
$load_one_color      = "A0A0A0";
$load_one_color_area = "DDDDDD";
$proc_run_color      = "0000FF";
$proc_total_color    = "BB00B2";
$proc_forkrate_color = "BAD800";
$cpu_num_color       = "FF0000";
$num_nodes_color     = "00FF00";


#
# Colors for the PACKET SIZE report graph
#
$net_bytes_out_color            = "808000";
$net_bytes_out_color_area       = "FFFF20";
$net_bytes_in_color             = "C05000";
$net_bytes_in_color_area        = "FFC030";

$net_pkts_out_color             = "606000";
$net_pkts_out_color_area        = "E0D000";
$net_pkts_in_color              = "A03000";
$net_pkts_in_color_area         = "E0A020";

$net_packet_size_out_color      = "505000";
$net_packet_size_out_color_area = "C0B000";
$net_packet_size_in_color       = "902000";
$net_packet_size_in_color_area  = "C08010";


#
# Colors for the SYS report graph
#
$sys_ctxt_color      = "FF9200";
$sys_intr_color      = "0B61A4";

# Other colors
$jobstart_color = "ff3300";

#
# Colors for the load ranks.
#
$load_colors = array(
   "100+" => "ff634f",
   "75-100" =>"ffa15e",
   "50-75" => "ffde5e",
   "25-50" => "caff98",
   "0-25" => "e2ecff",
   "down" => "515151"
);

#
# Load scaling
#
$load_scale = 1.0;

#
# Default color for single metric graphs
#
$default_metric_color          = "555555";
$default_metric_color_max_area = "C0FFC0";
$default_metric_color_max_line = "80DF80";
$default_metric_color_avg      = "40AF40";
$default_metric_color_min_area = "FFFFFF";
$default_metric_color_min_line = "80DF80";

#
# Default metric 
#
$default_metric = "load_one";

#
# remove the domainname from the FQDN hostnames in graphs
# (to help with long hostnames in small charts)
#
$strip_domainname = false;

#
# Optional summary graphs
#
#$optional_graphs = array('packet');



#
# Time ranges
# Each value is the # of seconds in that range.
#
$time_ranges = array(
   '10mins'  =>      600,
   '30mins'  =>     1800,
   'hour'    =>     3600,
   '3hours'  =>     3600 *  3,
   '6hours'  =>     3600 *  6,
   '12hours' =>     3600 * 12,
   'day'     =>    86400,
   '2days'   =>    86400 *  2,
   '4days'   =>    86400 *  4,
   'week'    =>   604800,
   '2weeks'  =>   604800 *  2,
   'month'   =>  2419200,
   '2months' =>  2419200 *  2,
   '4months' =>  2419200 *  4,
   '6months' =>  2419200 *  6,
   'year'    => 31449600,
   '2years'  => 31449600 *  2,
   '4years'  => 31449600 *  4,
);

# This key must exist in $time_ranges
$default_time_range = 'hour';



#
# Graph sizes
#
$graph_sizes = array(
   'grid_overview' => array(
     'height'  => 170,
     'width'   => 330,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),
   'grid_mesh' => array(
     'height'  => 150,
     'width'   => 200,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),
   'grid_mesh_first' => array(
     'height'  => 150,
     'width'   => 400,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),

   'host_overview' => array(
     'height'  => 140,
     'width'   => 300,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),

   'host' => array(
     'height'  => 200,
     'width'   => 300,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),
   'meta' => array(
     'height'  => 200,
     'width'   => 250,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),
   'grid' => array(
     'height'  => 200,
     'width'   => 250,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),
   'cluster' => array(
     'height'  => 140,
     'width'   => 320,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),
   'small' => array(
     'height'  => 150,
     'width'   => 300,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),
   'medium' => array(
     'height'  => 300,
     'width'   => 400,
     'fudge_0' =>   0,
     'fudge_1' =>  14,
     'fudge_2' =>  28,
   ),
   'large' => array(
     'height'  => 600,
     'width'   => 800,
     'fudge_0' =>   0,
     'fudge_1' =>   0,
     'fudge_2' =>   0,
   ),
   'export' => array(
     'height'  => 300,
     'width'   => 400,
     'fudge_0' =>   0,
     'fudge_1' =>   0,
     'fudge_2' =>   0,
   ),
   # this was the default value when no other size was provided.
   'default' => array(
     'height'  => 100,
     'width'   => 400,
     'fudge_0' =>   0,
     'fudge_1' =>   0,
     'fudge_2' =>   0,
   )
);
$default_graph_size = 'default';
$graph_sizes_keys   = array_keys($graph_sizes);



#
# Reports
#
$reportArray = array(
    'load_report'             => array('title' => 'LOAD',             'maxY' =>      10),
    'proc_report'             => array('title' => 'PROCESSES',        'maxY' =>    1000),
    'sys_report'              => array('title' => 'SYS',              'maxY' =>   10000),

    'net_bytes_report'        => array('title' => 'NET BYTES',        'maxY' => 2000000),
    'mem_report'              => array('title' => 'MEMORY',           'maxY' =>    13e9),
    'disk_ops_report'         => array('title' => 'DISK OPS',         'maxY' =>     300),

    'net_pkts_report'         => array('title' => 'NET PACKETS',      'maxY' =>    3000),
    'cpu_report'              => array('title' => 'CPU',              'maxY' =>       1),
    'disk_time_report'        => array('title' => 'DISK TIME',        'maxY' =>       2),

    'net_packet_size_report'  => array('title' => 'NET PACKET SIZE',  'maxY' =>    2000),
    'disk_space_report'       => array('title' => 'DISK SPACE',       'maxY' =>  100000),
    'disk_time_per_op_report' => array('title' => 'DISK TIME per OP', 'maxY' =>     0.1),
);
$defaultReport = 'load_one';



# In earlier versions of gmetad, hostnames were handled in a case
# sensitive manner
# If your hostname directories have been renamed to lower case,
# set this option to 0 to disable backward compatibility.
# From version 3.2, backwards compatibility will be disabled by default.
# default: true  (for gmetad < 3.2)
# default: false (for gmetad >= 3.2)
# FIXME change
$case_sensitive_hostnames = true;



#
# Include local config if present
#
if (file_exists('./conf.local.php')) {
    include_once('./conf.local.php');
}
