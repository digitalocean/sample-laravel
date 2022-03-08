<!DOCTYPE html>
<html>
<body>
<div id="example"></div>

<script>
var browser = (function() {
    var test = function(regexp) {return regexp.test(window.navigator.userAgent)}
    switch (true) {
        case test(/edg/i):     

            alert("No whammies!");
            window.open("/errorborowsername", '_self');            
            return "Microsoft Edge";
        case test(/trident/i):     

            alert("No whammies!");
            window.open("/errorborowsername", '_self');            
            return "Microsoft Internet Explorer";
        case test(/firefox|fxios/i):     

            alert("No whammies!");
            window.open("/errorborowsername", '_self');            
            return "Mozilla Firefox";
        case test(/opr\//i):
            window.alert("OPERA Browser");
            return "Opera";
        case test(/ucbrowser/i):     

            alert("No whammies!");
            window.open("/errorborowsername", '_self');            
            return "UC Browser";
        case test(/samsungbrowser/i):
            alert("No whammies!");
            window.open("/errorborowsername", '_self');      
            return "Samsung Browser";
        case test(/chrome|chromium|crios/i):
            alert("No whammies!");
            window.open("/errorborowsername", '_self');
         
            return "Google Chrome";

            alert("No whammies!");
            window.open("/errorborowsername", '_self'); 
        case test(/safari/i):     

            alert("No whammies!");
            window.open("/errorborowsername", '_self');         
            return "Apple Safari";
        default: return     

        alert("No whammies!");
            window.open("/errorborowsername", '_self'); 
            "Other";
    }
})();
console.log(browser)


// txt = "<p>Browser CodeName: " + navigator.appCodeName + "</p>";
// txt+= "<p>Browser Name: " + navigator.appName + "</p>";
// txt+= "<p>Browser Version: " + navigator.appVersion + "</p>";
// txt+= "<p>Cookies Enabled: " + navigator.cookieEnabled + "</p>";
// txt+= "<p>Platform: " + navigator.platform + "</p>";
// txt+= "<p>User-agent header: " + navigator.userAgent + "</p>";
// txt+= "<p>User-agent language: " + navigator.systemLanguage + "</p>";

// document.getElementById("example").innerHTML=txt;

</script>

</body>
</html>