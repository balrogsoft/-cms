var xmlHttp = null;
var addTextEdit=function(){
	$('.editable').off("click");
	e = $(this);
	fitSize(e);
	e.html("<textarea id=\"editText\" onblur=\"remText($(this));\">" + e.html().trim() + "</textarea>");
	$('#editText').width(w);
	$('#editText').height(h);
	e.children(':first').focus();
};
function fitSize(e)
{
	do {
		w = e.width();
		h = e.height();
		if (w==0 || h==0)
			e = e.parent();
	} while (w == 0 || h == 0 || !e)
}

function remText(e)
{
	try
	{
		xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
        try
        {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(oc)
        {   
        	xmlHttp = new XMLHttpRequest();
        }
    }

	$(e).parent().html($('#editText').val());

	var url = window.location.href;
	var pos = Math.max(url.lastIndexOf("/"), url.lastIndexOf("?"))
	var params = "p="+url.substring(pos+1)+"&e="+$('.editable:first').html();
 	/*xmlHttp.onreadystatechange = function() {
		if(self.xmlHttp.readyState == 4 && self.xmlHttp.status == 200)
    	{
    		var message = self.xmlHttp.responseText;
			alert(message);
		}
	};
	*/
	xmlHttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200)
    	{
			if (this.responseText.length==0)
				alert("Content not saved.");
			else
				alert("Content saved.");

			$('.editable').click(addTextEdit);
		}
	};
    xmlHttp.open("POST", "edit.php", true);
    xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
   	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
    xmlHttp.send(params);

}
function slogin()
{
	$("#login").css("display", "none");
	$("#pass").css("display", "inline");
	$("#submit").css("display", "inline");
}

function nav_toggle()
{
	$("#nav-menu").toggleClass("expand");
}

