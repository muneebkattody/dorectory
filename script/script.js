function ajaxFunction()	{
	var ajaxRequest;
	try{
		ajaxRequest = new XMLHttpRequest();
	}catch (e){
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			}catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				}catch (e){
					alert("Your browser broke!");
					return false;
				}
			}
		}
		
	return ajaxRequest;
	}
function ajaxReady()	{
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
}
function ajaxGet(query)	{
	ajaxFunction();
	ajaxReady();
	var queryString = "?" ;
	queryString +=query;
	ajaxRequest.open("GET", "ajax-example.php" + queryString, true);
	ajaxRequest.send(null);
	}

function ajaxPost(query,source)	{
		ajaxRequest=ajaxFunction();
		ajaxRequest.onreadystatechange = function(){
			if(ajaxRequest.readyState == 4){
				var response=ajaxRequest.responseText;
				showToast(response);
			}
		}
		ajaxRequest.open("POST", source, true);
		ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajaxRequest.send(query);
	}