<?php
/* $Id: index.php 2183 2010-01-07 16:09:55Z d_pocock $ */
include_once "./eval_config.php";
# ATD - function.php must be included before get_context.php.  It defines some needed functions.
include_once "./lib/functions.php";
include_once "./get_context.php";
include_once "./ganglia.php";
include_once "./get_ganglia.php";
include_once "./class.TemplatePower.inc.php";
# Usefull for addons.
$GHOME = ".";


if ($context == "grid_overview") {
      $title = "$self $meta_designator Overview";
      include_once "./header.php";
      include_once "./grid_overview.php";

} elseif ($context == "grid_mesh") {
      $title = "$self $meta_designator Mesh";
      include_once "./header.php";
      include_once "./grid_mesh_view.php";

} elseif ($context == "grid_hosts") {
      $title = "$self $meta_designator Hosts";
      include_once "./header.php";
      include_once "./grid_hosts_view.php";

} elseif ($context == "meta" or $context == "control")
   {
      $title = "$self $meta_designator Report";
      include_once "./header.php";
      include_once "./meta_view.php";
   }
else if ($context == "tree")
   {
      $title = "$self $meta_designator Tree";
      include_once "./header.php";
      include_once "./grid_tree.php";
   }
else if ($context == "cluster" or $context == "cluster-summary")
   {
      $title = "$clustername Cluster Report";
      include_once "./header.php";
      include_once "./cluster_view.php";
   }
else if ($context == "physical")
   {
      $title = "$clustername Physical View";
      include_once "./header.php";
      include_once "./physical_view.php";
   }
else if ($context == "node")
   {
      $title = "$hostname Node View";
      include_once "./header.php";
      include_once "./show_node.php";
   }
else if ($context == "host")
   {
      $title = "$hostname Host Report";
      include_once "./header.php";
      include_once "./host_view.php";
   }
else
   {
      $title = "Unknown Context";
      print "Unknown Context Error: Have you specified a host but not a cluster?.";
   }
include_once "./footer.php";

?>
