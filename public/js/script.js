	var scriptson = false;

	if (((navigator.appName == 'Netscape') 
	&& (parseInt(navigator.appVersion) >= 3 )) ||
	((navigator.appName == 'Microsoft Internet Explorer')
	&& (parseInt(navigator.appVersion) >= 4)))
	scriptson=true;

	
	var popUpWin
	var isIE3
	var isIE3 = (navigator.appVersion.indexOf("MSIE 3") != -1) ? true : false
	
	function openWindow(url) {
			popUpWin = window.open(url,"gallery","toolbar=no,location=0,directories=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=460,height=365,top=30,left=190");
	
			if (popUpWin.opener == null) {
			popUpWin.opener = window
		}
	
		if (navigator.appName == 'Netscape') {
			popUpWin.focus();
	
			}
	}
        	
	function openWindow1(url,sir,vys) {
		head = "toolbar=no,location=0,directories=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width="+sir+",height="+vys+",top=30,left=190";
			popUpWin = window.open(url,"gallery",head);
	
			if (popUpWin.opener == null) {
			popUpWin.opener = window
		}
	
		if (navigator.appName == 'Netscape') {
			popUpWin.focus();
	
			}
	}
        	
	function openWindow2(url) {
			popUpWin = window.open(url,"gallery2","toolbar=no,location=0,directories=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=460,height=540,top=40,left=190");
	
			if (popUpWin.opener == null) {
			popUpWin.opener = window
		}
	
		if (navigator.appName == 'Netscape') {
			popUpWin.focus();
	
			}
        	
	}
	
	function closeWindow() {
	
		if (isIE3) {
			popUpWin = window.open("/blank.html","gallery","toolbar=no,location=0,directories=0,status=no,menubar=no,scrollbars=yes,resizable=no,height=1,width=1")
		}
		
		if (popUpWin && !popUpWin.closed) {
			popUpWin.close()
		}
		popUpWin = ""
	}
