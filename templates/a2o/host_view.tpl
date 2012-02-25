<SCRIPT TYPE="text/javascript"><!--
// Script taken from: http://www.netlobo.com/div_hiding.html
function toggleLayer( whichLayer )
{
  var elem, vis;
  if( document.getElementById ) // this is the way the standards work
    elem = document.getElementById( whichLayer );
  else if( document.all ) // this is the way old msie versions work
      elem = document.all[whichLayer];
  else if( document.layers ) // this is the way nn4 works
    elem = document.layers[whichLayer];
  vis = elem.style;
  // if the style.display value is blank we try to figure it out here
  if(vis.display==''&&elem.offsetWidth!=undefined&&elem.offsetHeight!=undefined)
    vis.display = (elem.offsetWidth!=0&&elem.offsetHeight!=0)?'block':'none';
  vis.display = (vis.display==''||vis.display=='block')?'none':'block';
}
--></SCRIPT>



<TABLE BORDER="0" WIDTH="100%">
    <TR>
	<TD ALIGN="LEFT" VALIGN="TOP">






<TABLE BORDER="0">
    <tr>
	<TD COLSPAN="2" BGCOLOR="#03401F" ALIGN="CENTER">
            &nbsp;<br/>
	    <FONT COLOR="#FFFFFF">
    		Host overview<br />
    		<FONT SIZE="4"><b>{host}</b></FONT><br/>
		&nbsp;
	    </FONT>
	</TD>
    </tr>

    <TR><TD colspan="2">&nbsp;</TD></TR>
    <TR>
	<TD align=right><IMG SRC="{node_image}" HEIGHT="60" WIDTH="30" ALT="{host}" BORDER="0"></TD>
	<TD>{node_msg}</TD>
    </TR>

    <TR><TD colspan="2">&nbsp;</TD></TR>

    <TR><TD COLSPAN="2" CLASS=title>Time and String Metrics</TD></TR>
    <!-- START BLOCK : string_metric_info -->
	<TR>
	    <TD CLASS=footer WIDTH=30%>{name}</TD><TD>{value}</TD>
	</TR>
    <!-- END BLOCK : string_metric_info -->

    <TR><TD colspan="2">&nbsp;</TD></TR>

    <TR><TD COLSPAN=2 CLASS=title>Constant Metrics</TD></TR>
    <!-- START BLOCK : const_metric_info -->
	<TR>
	    <TD CLASS=footer WIDTH=30%>{name}</TD><TD>{value}</TD>
	</TR>
    <!-- END BLOCK : const_metric_info -->
</TABLE>






	</TD>
	<TD ALIGN="CENTER" VALIGN="TOP">






<table border="0">
    <tr>
	<td valign="top">
	    <A HREF="./graph.php?g=load_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} LOAD" SRC="./graph.php?g=load_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
	<td valign="top">
	    <A HREF="./graph.php?g=proc_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} PROCESSES" SRC="./graph.php?g=proc_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
	<td valign="top">
	    <A HREF="./graph.php?g=sys_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} SYSTEM" SRC="./graph.php?g=sys_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
    </tr>

    <tr>
	<td valign="top">
	    <A HREF="./graph.php?g=net_bytes_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} NETWORK" SRC="./graph.php?g=net_bytes_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
	<td valign="top">
	    <A HREF="./graph.php?g=mem_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} MEMORY" SRC="./graph.php?g=mem_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
	<td valign="top">
	    <A HREF="./graph.php?g=disk_ops_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} DISK OPS" SRC="./graph.php?g=disk_ops_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
    </tr>

    <tr>
	<td valign="top">
	    <A HREF="./graph.php?g=net_pkts_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} NET PKTS" SRC="./graph.php?g=net_pkts_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
	<td valign="top">
	    <A HREF="./graph.php?g=cpu_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} CPU" SRC="./graph.php?g=cpu_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
	<td valign="top">
	    <A HREF="./graph.php?g=disk_time_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} DISK TIME" SRC="./graph.php?g=disk_time_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
    </tr>

    <tr>
	<td valign="top">
	    <A HREF="./graph.php?g=net_packet_size_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} NET PACKET SIZE" SRC="./graph.php?g=net_packet_size_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
	<td valign="top">
	    <A HREF="./graph.php?g=disk_space_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} DISK SPACE" SRC="./graph.php?g=disk_space_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
	<td valign="top">
	    <A HREF="./graph.php?g=disk_time_per_op_report&z=large&c={cluster_url}&{graphargs}">
		<IMG BORDER=0 ALT="{cluster_url} DISK TIME PER OP" SRC="./graph.php?g=disk_time_per_op_report&z=host_overview&c={cluster_url}&{graphargs}">
	    </A>
	</td>
    </tr>
</table>






	</TD>
    </TR>
    <TR>
	<TD COLSPAN="2" BGCOLOR="#03401F" ALIGN="CENTER">
	    &nbsp;<br />
	    <FONT COLOR="#FFFFFF"><font SIZE="4"><b>Detailed graphs</b></font> for {host}</FONT>
	    <br />&nbsp;
	</TD>
    </TR>
</TABLE>







<TABLE BORDER="0" WIDTH="100%">
    <TR>
	<TD CLASS=title>
	    {host} <strong>graphs</strong>
	    last <strong>{range}</strong>
	    sorted <strong>{sort}</strong>
	    <!-- START BLOCK : columns_dropdown -->
		<FONT SIZE="-1">
		    Columns&nbsp;&nbsp;{metric_cols_menu}
		</FONT>
	    <!-- END BLOCK : columns_dropdown -->
	</TD>
    </TR>
</TABLE>




<br />
<CENTER>




<TABLE>
    <TR>
	<TD>

<!-- START BLOCK : vol_group_info -->
<A HREF="javascript:;" ONMOUSEDOWN="javascript:toggleLayer('{group}');" TITLE="Toggle {group} metrics group on/off" NAME="{group}">
<TABLE BORDER="0" WIDTH="100%">
    <TR>
	<TD CLASS=metric>
	    {group} metrics ({group_metric_count})
	</TD>
    </TR>
</TABLE>
</A>


<DIV ID="{group}">
<TABLE>
    <TR>
	<!-- START BLOCK : vol_metric_info -->
	    <TD>
		<A HREF="./graph.php?{graphargs}&amp;z=large">
		    <IMG BORDER=0 ALT="{alt}" SRC="./graph.php?{graphargs}" TITLE="{desc}">
		</A>
	    </TD>
	    {new_row}
	<!-- END BLOCK : vol_metric_info -->
    </TR>
</TABLE>
</DIV>
<!-- END BLOCK : vol_group_info -->



	</TD>
    </TR>
</TABLE>
</CENTER>
