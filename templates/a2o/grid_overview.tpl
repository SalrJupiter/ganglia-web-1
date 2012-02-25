<!-- START BLOCK : source_info -->
<!-- START BLOCK : public -->



<TABLE BORDER="0" WIDTH="100%">
    <TR>
	<TD ALIGN="LEFT" VALIGN="TOP" width="300px">



	    <table cellspacing=1 cellpadding=1 width="300px" border=0>
	        <tr>
		    <td bgcolor="#c41111" align="center" valign="center" colspan="3">
			<font color="#FFFFFF" size="6">
			    <B>
				&nbsp;<br />
				GRID OVERVIEW<br />
				&nbsp;
			    </B>
			</font>
		    </td>
		</tr>
	        <tr><td colspan="2">&nbsp;</td></tr>
	        <tr><td>CPUs Total:</td><td align=right><B>{cpu_num}</B></td></tr>
	        <tr><td width="80%">Hosts up:</td><td align=right><B>{num_nodes}</B></td></tr>
	        <tr><td>Hosts down:</td><td align=right><B>{num_dead_nodes}</B></td></tr>
	        <tr><td colspan="2">&nbsp;</td></tr>
	        <tr><td class=footer colspan=2>{cluster_load}</td></tr>
	        <tr><td class=footer colspan=2>{localtime}</td></tr>
	    </table>



	    <br />&nbsp;<br />



	</TD>
	<TD ALIGN=center VALIGN=top>




<table border="0">
    <tr>

<!-- START BLOCK : report_graph -->
	<td align="left" valign="top">
            <font size="2">[<a href="./index.php?view=grid_mesh&mesh_first_metric={report_id}&r={range}">Clusters</a>]</font>
            <font size="2">[<a href="./index.php?view=grid_hosts&m={report_id}&r={range}">Hosts</a>]</font>
            <font size="2">[<a href="./index.php?view=grid_hosts&m={report_id}&r={range}&maxY={maxY}">Hosts (same Y)</a>]</font>
            <font size="2">[<a href="./graph.php?g={report_id}&r={range}&z=large">Large</a>]</font>
            <a href="./index.php?view=grid_mesh&mesh_first_metric={report_id}&r={range}">
        	<img src="./graph.php?g={report_id}&r={range}&z=grid_overview&{graph_args}" alt="{name} {report_title}" border=0>
    	    </a>
	    <br />
	    &nbsp;
	</td>
	{new_table_row}
<!-- END BLOCK : report_graph -->

    </tr>
</table>



	</TD>
    </TR>
</TABLE>



<!-- END BLOCK : public -->
<!-- END BLOCK : source_info -->



<br />
<br />



<!-- START BLOCK : show_snapshot -->
<TABLE BORDER="0" WIDTH="100%">
    <TR>
	<TD COLSPAN="5" BGCOLOR=#c41111 align=center>
	    <FONT COLOR="#FFFFFF" SIZE=4><b>GRID OVERVIEW</b></FONT>
	</TD>
    </TR>
    <TR>
	<TD COLSPAN="5" CLASS=title>Snapshot of the {self} |
	    <FONT SIZE="-1"><A HREF="./cluster_legend.html" ALT="Node Image Legend">Legend</A></FONT>
	</TD>
    </TR>
</TABLE>

<CENTER>
    <TABLE CELLSPACING=12 CELLPADDING=2>
	<!-- START BLOCK : snap_row -->
	    <tr>{names}</tr>
	    <tr>{images}</tr>
	<!-- END BLOCK : snap_row -->
    </TABLE>
</CENTER>
<!-- END BLOCK : show_snapshot -->
