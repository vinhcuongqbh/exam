<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Page Visibility API</title>
<script src="/jquery.min.js"></script>
<script>
	var i = localStorage.getItem("phamqui");
	$(window).on("blur focus", function (e) {
    var prevType = $(this).data("prevType");
    if (prevType != e.type) {   //  reduce double fire issues
	switch (e.type) {
	    case "blur":
		// do work
		alert("Pham qui");
		localStorage.setItem("phamqui", i++)
		break;
	    case "focus":
		// do work
		console.log('activated');
		break;
	}
    }
    $(this).data("prevType", e.type);
});
</script>
</head>
<body>	

</body>
</html>