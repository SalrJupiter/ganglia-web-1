<TABLE BORDER="0" WIDTH="100%">

<!-- START BLOCK : source_info -->
    <TR>
	<TD CLASS={class} COLSPAN=14>&nbsp;
	    <A HREF="{url}"><STRONG><FONT COLOR="#FFFFFF">{name}</FONT></STRONG></A> {alt_view}
	</TD>
    </TR>



    <TR>
	<!-- START BLOCK : public -->
	<TD ALIGN="LEFT" VALIGN="TOP">
	    <table cellspacing=1 cellpadding=1 width="200px" border=0>
		<tr><td>CPUs Total:</td><td align=left><B>{cpu_num}</B></td></tr>
		<tr><td width="80%">Hosts up:</td><td align=left><B>{num_nodes}</B></td></tr>
		<tr><td>Hosts down:</td><td align=left><B>{num_dead_nodes}</B></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td class=footer colspan=2>{cluster_load}</td></tr>
		<tr><td class=footer colspan=2>{localtime}</td></tr>
	    </table>
	</TD>



    <TD VALIGN=top>
	<A HREF="{url}&m={mesh_first_metric}#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g={mesh_first_metric}&z=grid_mesh_first&r={range}"
		ALT="{name}" BORDER="1">&nbsp;&nbsp;
	</A>
	<A HREF="./graph.php?{graph_url}&g={mesh_first_metric}&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=load_report#hosts">
	    <IMG SRC="./graph.php?{graph_url}&g=load_report&z=grid_mesh&r={range}"
		ALT="{name} LOAD REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=load_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=proc_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=proc_report&z=grid_mesh&r={range}"
		ALT="{name} PROC REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=proc_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=disk_ops_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=disk_ops_report&z=grid_mesh&r={range}"
		ALT="{name} DISK OPS REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=disk_ops_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=net_bytes_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=net_bytes_report&z=grid_mesh&r={range}"
		ALT="{name} NET BYTES REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=net_bytes_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=mem_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=mem_report&z=grid_mesh&r={range}"
		ALT="{name} MEM REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=mem_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=disk_time_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=disk_time_report&z=grid_mesh&r={range}"
		ALT="{name} DISK TIME REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=disk_time_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=net_pkts_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=net_pkts_report&z=grid_mesh&r={range}"
		ALT="{name} NET PKTS REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=net_pkts_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=cpu_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=cpu_report&z=grid_mesh&r={range}"
		ALT="{name} CPU REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=cpu_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=disk_time_per_op_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=disk_time_per_op_report&z=grid_mesh&r={range}"
		ALT="{name} DISK TIME PER OP REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=disk_time_per_op_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=net_pkt_size_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=net_packet_size_report&z=grid_mesh&r={range}"
		ALT="{name} NET PACKET SIZE REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=net_packet_size_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=sys_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=sys_report&z=grid_mesh&r={range}"
		ALT="{name} SYS REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=sys_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>

    <TD VALIGN=top>
	<A HREF="{url}&m=disk_space_report#hosts" VALIGN=top>
	    <IMG SRC="./graph.php?{graph_url}&g=disk_space_report&z=grid_mesh&r={range}"
		ALT="{name} DISK SPACE REPORT" BORDER="0">
	</A>
	<A HREF="./graph.php?{graph_url}&g=disk_space_report&z=large&r={range}"><font size=1 color=gray>(big)</font></A>
    </TD>
<!-- END BLOCK : public -->



    </TR>
<!-- END BLOCK : source_info -->
</TABLE>






<!-- START BLOCK : show_snapshot -->
<TABLE BORDER="0" WIDTH="100%">
<TR>
  <TD COLSPAN="5" CLASS=title BGCOLOR="#c41111">Snapshot of the {self} |
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
