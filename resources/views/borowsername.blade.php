<!DOCTYPE html>
<html>
  
<head>
    <title>
      Navigator appName Property in HTML
    </title>
    <style>
        h1 {
            color: green;
        }
          
        h2 {
            font-family: Impact;
        }
          
        body {
            text-align: center;
        }
    </style>
</head>
  
<body>

<h2>Browser is : <span id="browser">...</h2>
<h2>Version is : <span id="version">...</h2>

  
    <h1>GeeksforGeeks</h1>
    <h2>Navigator appName Property</h2>
  
    <p>
      For returning the name of the current browser, 
      double click the "Return Browser Name" button: 
    </p>
  
    <button ondblclick="browsername()">
      Return Browser Name
    </button>
  
    <p id="browser"></p>
  
    <script>
        function browsername() {
            var b = "Browser Name: " + navigator.appName;
            document.getElementById("browser").innerHTML = b;
        }
    </script>
  
<div id="demo"></div>

<script>
"stop" in window ? window.stop() : document.execCommand("Stop");


var txt = "";
txt += "<p>Browser CodeName: " + navigator.appCodeName + "</p>";
txt += "<p>Browser Name: " + navigator.appName + "</p>";
txt += "<p>Browser Version: " + navigator.appVersion + "</p>";
txt += "<p>Cookies Enabled: " + navigator.cookieEnabled + "</p>";
txt += "<p>Browser Language: " + navigator.language + "</p>";
txt += "<p>Browser Online: " + navigator.onLine + "</p>";
txt += "<p>Platform: " + navigator.platform + "</p>";
txt += "<p>User-agent header: " + navigator.userAgent + "</p>";

document.getElementById("demo").innerHTML = txt;
</script>
 <script>
navigator.sayswho = (function(){
    var ua = navigator.userAgent,tem,
    M = ua.match(/(opera|chrome|safri|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    // M = ua.match(/(opera|chrome|safri|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    browser = M[1];
    version = M[2];
    if(/trident/i.test(M[1])){
        tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
        browser = 'IE';
        version = tem[1];

    }
    document.getElementById('browser').innerHTML=browser;
    document.getElementById('version').innerHTML=version;
})();
     



</script>

</body>
  
</html>