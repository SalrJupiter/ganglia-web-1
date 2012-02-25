<h1>All hosts in this grid</h1>
<form action="index.php?view=grid_hosts&{metrictype}={metricname}&z=host_overview&r={range} method="GET">
    <input type="text" name="maxY" value="{maxY}" />
    <input type="submit" value="Set common max Y" />
</form>

<table border="0" width="100%">
    <tr>

	<!-- START BLOCK : host_metric_graph -->
	    {new_row_start}
	    <td class={class}>
		<font size=2>
		    [<a href="./index.php?c={cluster}&h={hostname}&r={range}">{hostname}</a>]
		    [<a href="./graph.php?c={cluster}&h={hostname}&{metrictype}={metricname}&z=large&r={range}">Large</a>]
		</font>
		<br />
		<a href="./index.php?c={cluster}&h={hostname}&r={range}">
		    <img src="./graph.php?c={cluster}&h={hostname}&{metrictype}={metricname}&z=host_overview&r={range}&{graphvars}" border="0">
		</a>
	    </td>
	    {new_row_end}
	<!-- END BLOCK : host_metric_graph -->

    </tr>
</table>
