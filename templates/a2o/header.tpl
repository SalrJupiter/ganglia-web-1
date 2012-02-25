<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
    <HEAD>
	<TITLE>{page_title} {default_metric}</TITLE>
	<META http-equiv="Content-type" content="text/html; charset=utf-8">
	<META http-equiv="refresh" content="{refresh}">
	<LINK rel="stylesheet" href="./styles.css" type="text/css">
	<link type="image/ico" rel="icon" href="{favicon_url}" />
    </HEAD>
    <BODY BGCOLOR="#FFFFFF">

<FORM ACTION="{page}" METHOD="GET" NAME="ganglia_form">



<TABLE WIDTH="100%" CELLPADDING="0" CELLSPACING="0" BORDER="0">
    <TR>
	<TD ROWSPAN="2" WIDTH="150">
	    <A HREF="{base_url}"><IMG SRC="{logo_url}" ALT="a2o ganglia frontend" BORDER="0"></A>
	</TD>
	<TD BGCOLOR="#FFFFFF" align="left">
	    &nbsp;
	    &nbsp;
	    <FONT SIZE="+4">
<!--	        <B><FONT COLOR="#1F6B75">{page_title}</FONT> for <FONT COLOR="orange">{date}</FONT></B>
	        <B>{page_title} for {date}</B>
		<B>GANGLIA MONITORING SYSTEM</B> -->
		<B>GANGLIA</B>
	    </FONT>
	</TD>
        <TD BGCOLOR="#FFFFFF" ALIGN="RIGHT">
	    <B>{alt_view}</B>
	</TD>
    </tr>

    <tr>
	<TD COLSPAN="1">
	    &nbsp;
	    &nbsp;
	    {node_menu}   &nbsp;&nbsp;
	    {metric_menu} &nbsp;&nbsp;
	    {range_menu}  &nbsp;&nbsp;
	    {sort_menu}
	</TD>
	<TD align="right">
	    <INPUT TYPE="SUBMIT" VALUE="Get Fresh Data">
	    &nbsp;
	</TD>
    </TR>
</TABLE>



<HR SIZE="1" NOSHADE>
