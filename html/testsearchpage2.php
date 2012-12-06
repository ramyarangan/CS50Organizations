<head>
<script type="text/javascript" src="dropdowncontent.js">

/***********************************************
* Drop Down/ Overlapping Content- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
</head>

<body>
<!--Example #1: -->

<p>Demo #1: <a href="http://www.dynamicdrive.com" id="searchlink" rel="subcontent">Search DD</a></p>


<DIV id="subcontent" style="position:absolute; visibility: hidden; border: 9px solid orange; background-color: white; width: 300px; padding: 8px;">

<p><b>Search Dynamic Drive:</b></p>
<form method="get" action="http://search.freefind.com/find.html" id="topform">
<input name="query" maxlength="255" style="width: 150px" id="topsearchbox" alt="Search" /> 
<input value="Search" class="topformbutton" type="submit" />
</form>

<div align="right"><a href="javascript:dropdowncontent.hidediv('subcontent')">Hide this DIV manually</a> | <a href="http://www.dynamicdrive.com">Dynamic Drive</a></div>


</DIV>






<!--Example #2: -->

<p align="right" style="margin-top: 400px">Demo #2 (click): <a href="http://www.dynamicdrive.com/resources/" id="contentlink" rel="subcontent2">Additional Resources</a> </p>


<DIV id="subcontent2" style="position:absolute; visibility: hidden; border: 9px solid black; background-color: lightyellow; width: 350px; height: 120px; padding: 4px;">

<div style="width: 49%; float: left">
<ul>
<li><a href="http://www.dynamicdrive.com">Dynamic Drive</li>
<li><a href="http://www.javascriptkit.com">JavaScript Kit</li>
<li><a href="http://www.cssdrive.com">CSS Drive</li>
<li><a href="http://www.codingforums.com">Coding Forums</li>
</ul>
</div>

<div style="width: 49%; float: left">
<ul>
<li><a href="http://www.cnn.com">CNN</li>
<li><a href="http://www.msnbc.com">MSNBC</li>
<li><a href="http://www.news.bbc.co.uk">BBC News</li>
<li><a href="http://www.slashdot.org">Slashdot</li>
</ul>
</div>

<div align="right"><a href="javascript:dropdowncontent.hidediv('subcontent2')">Hide this DIV manually</a></div>

</DIV>

<script type="text/javascript">
//Call dropdowncontent.init("anchorID", "positionString", glideduration, "revealBehavior") at the end of the page:

dropdowncontent.init("searchlink", "right-bottom", 500, "mouseover")
dropdowncontent.init("contentlink", "left-top", 300, "click")

</script>
</body>s
