<?php

/* $Id: meta_view.php 1710 2008-08-21 16:44:54Z bernardli $ */
$tpl = new TemplatePower( template("grid_hosts_view.tpl") );
$tpl->prepare();



// Store context for later
$oldContext = $context;



// Loop through clusters to get all grid hosts
$gridClusterHosts = array();
$gridHosts = array();
foreach ($grid as $gridItem) {

    // Skip fake grid cluster
    if ($gridItem['NAME'] == 'ITSIS') {
	continue;
    }
    $clusterName = $gridItem['NAME'];
    $gridData[$clusterName] = array();

    // Get cluster hosts
    $context = 'cluster';
    $clustername = $clusterName;
    $metrics = array();
    Gmetad();

    // Assign to array
    foreach ($metrics as $hostName => $hostData) {
	$gridClusterHosts[$clusterName][$hostName] = $hostName;
	$gridHosts[$hostName] = $clusterName;
    }
}



// Get max y value for RRD graph
if (isset($_GET['maxY']) && ($_GET['maxY'] != '')) {
    $maxY = $_GET['maxY'];
} else {
    $maxY = '';
}
$tpl->assign('maxY', $maxY);



// Draw graphs
$metricType = 'm';
if (isset($reportArray[$metricname])) {
    $metricType = 'g';
}
$hostsInLine = 0;
$lastClusterName = '';
foreach ($gridHosts as $hostName => $clusterName) {
    $hostsInLine++;

/*
    // Each cluster goes to new row
    if ($lastClusterName == '') {
	$hostsInLine = 1;
	$lastClusterName = $clusterName;
    }
    if ($clusterName != $lastClusterName) {
	$hostsInLine = 1;
	$tpl->assign('new_row_end', '</tr> <tr>');
    }
*/

    // Assign vars
    $tpl->newBlock('host_metric_graph');
    $tpl->assign('hostname', $hostName);
    $tpl->assign('cluster', $clusterName);
    $tpl->assign('metrictype', $metricType);
    $tpl->assign('metricname', $metricname);
    $tpl->assign('range', $range);

    // Add common Y scale
    $graphVars = '';
    if ($maxY) {
	$graphVars .= "maxY=$maxY";
    }
    $tpl->assign('graphvars', $graphVars);

    // Line break hack
    if ($hostsInLine >= 4) {
        $hostsInLine = 0;
	$tpl->assign('new_row_end', '</tr>  <tr>');
    }

    // Save state data
    $lastClusterName = $clusterName;
}



$tpl->printToScreen();
