<TABLE BORDER="0" CELLSPACING=5 WIDTH="100%">
    <TR>
	<TD ALIGN=left VALIGN=top>



	    <table cellspacing=1 cellpadding=1 width="350px" border=0>
		<TD COLSPAN="2" BGCOLOR="#147EB3" ALIGN="CENTER">
		    &nbsp;<br/>
    		    <FONT COLOR="#FFFFFF">
			Cluster overview<br />
    			<FONT SIZE="5"><b>{cluster}</b></FONT>
		    </FONT>
		    <br/>&nbsp;
		</TD>
	        <tr><td>CPUs Total:</td><td align=right><B>{cpu_num}</B></td></tr>
	        <tr><td width="60%">Hosts up:</td><td align=right><B>{num_nodes}</B></td></tr>
	        <tr><td>Hosts down:</td><td align=right><B>{num_dead_nodes}</B></td></tr>
	        <tr><td colspan=2>&nbsp;</td></tr>
	        <tr><td>Avg Load (15, 5, 1m):</td><td align=right><b>{cluster_load}</b></td></tr>
	        <tr><td>Localtime:</td><td align=right><b>{localtime}</b></td></tr>
	        <tr><td colspan=2><hr></td></tr>
	        <tr><td colspan=2>&nbsp;</td></tr>
	        <tr><td colspan=2 align=center><IMG SRC="./pie.php?{pie_args}" ALT="Pie Chart" BORDER="0"></b></td></tr>
	    </table>



	</TD>
	<TD ROWSPAN=2 ALIGN="CENTER" VALIGN=top>



<table border="0">
    <tr>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=load_report#hosts">
	        <IMG BORDER=0 ALT="{cluster} LOAD" SRC="./graph.php?g=load_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=proc_report#hosts">
	        <IMG BORDER=0 ALT="{cluster} PROCESSES" SRC="./graph.php?g=proc_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=sys_report#hosts">
	        <IMG BORDER=0 ALT="{cluster} SYS" SRC="./graph.php?g=sys_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
    </tr>

    <tr>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=net_bytes_report#hosts">
	        <IMG BORDER=0 ALT="{cluster} NET BYTES" SRC="./graph.php?g=net_bytes_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=mem_report#hosts">
		<IMG BORDER=0 ALT="{cluster} MEMORY" SRC="./graph.php?g=mem_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=disk_ops_report#hosts">
		<IMG BORDER=0 ALT="{cluster} DISK OPS" SRC="./graph.php?g=disk_ops_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
    </tr>

    <tr>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=net_pkts_report#hosts">
	        <IMG BORDER=0 ALT="{cluster} NET PACKETS" SRC="./graph.php?g=net_pkts_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=cpu_report#hosts">
		<IMG BORDER=0 ALT="{cluster} CPU" SRC="./graph.php?g=cpu_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=disk_time_report#hosts">
	        <IMG BORDER=0 ALT="{cluster} DISK TIME" SRC="./graph.php?g=disk_time_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
    </tr>

    <tr>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=net_packet_size_report#hosts">
	        <IMG BORDER=0 ALT="{cluster} NET PACKET SIZE" SRC="./graph.php?g=net_packet_size_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=disk_space_report#hosts">
	        <IMG BORDER=0 ALT="{cluster} DISK SPACE" SRC="./graph.php?g=disk_space_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
	<td align="center" valign="top">
	    <A HREF="?c={cluster}&r={range}&s={sort}&m=disk_time_per_op_report#hosts">
	        <IMG BORDER=0 ALT="{cluster} DISK TIME" SRC="./graph.php?g=disk_time_per_op_report&amp;z=cluster&amp;{graph_args}">
	    </A>
	</td>
    </tr>

</table>



	</TD>
    </TR>
</TABLE>


<A NAME="hosts"></A>
<TABLE BORDER="0" WIDTH="100%">
    <TR>
	<td COLSPAN="2" BGCOLOR="#147EB3" align=center>
	    <FONT SIZE="5" COLOR="#FFFFFF">&nbsp;<br />Hosts in cluster <b>{cluster}</b><br />&nbsp;</FONT>
	</td>
    </TR>

    <TR>
	<TD CLASS=TITLE COLSPAN="2"> 
	    <FONT SIZE="-1">
		Show Hosts:
		yes<INPUT type=radio name="sh" value="1" OnClick="ganglia_form.submit();" {checked1}>
		no<INPUT type=radio name="sh" value="0" OnClick="ganglia_form.submit();" {checked0}>
	    </FONT>
	    |
	    {cluster} <strong>{metric}</strong>
	    last <strong>{range}</strong>
	    sorted <strong>{sort}</strong>
	    <!-- START BLOCK : columns_size_dropdown -->
		|
		<FONT SIZE="-1">
		    Columns&nbsp;&nbsp;{cols_menu}
		    Size&nbsp;&nbsp;{size_menu}
		</FONT>
	    <!-- END BLOCK : columns_size_dropdown -->
	</TD>
    </TR>
</TABLE>



<CENTER>



<TABLE>
    <TR>
	<!-- START BLOCK : sorted_list -->
	    {metric_image}{br}
	<!-- END BLOCK : sorted_list -->
    </TR>
</TABLE>



<p>
<!-- START BLOCK : node_legend -->
(Nodes colored by 1-minute load) | <A HREF="./node_legend.html">Legend</A>
<!-- END BLOCK : node_legend -->

</CENTER>
