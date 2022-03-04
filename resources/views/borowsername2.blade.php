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

<h2  id="log">Browser is : <span>UPDATE</h2>
<!-- <h2>Browser is : <span id="browser">...</h2>
<h2>Version is : <span id="version">...</h2> -->

  
<script> 

navigator.sayswho= (function(){
    var ua= navigator.userAgent, tem, 
    M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if(/trident/i.test(M[1])){
        tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];        
        window.alert('IE');
        window.top.close();


        return 'IE '+(tem[1] || '');
        
    }
    if(M[1]=== 'Chrome'){
        tem= ua.match(/\b(OPR|Edge)\/(\d+)/);
        if(tem!= null)
        // window.alert('Chrome Opera000');//window.top.close();


        return tem.slice(1).join(' ').replace('OPR', 'Opera');
        window.top.close();
        window.alert('Chrome Opera');


    }
    M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
    if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
    window.alert('version');


    return M.join(' ');
    window.top.close();

})();

console.log(navigator.sayswho); // outputs: `Chrome 62`
var vv = console.log(navigator.sayswho); // outputs: `Chrome 62`


// getBrowser = () => {
//     const userAgent = navigator.userAgent;
//     let browser = "unkown";
//     // Detect browser name
//     browser = (/ucbrowser/i).test(userAgent) ? 'UCBrowser' : browser;
//     browser = (/edg/i).test(userAgent) ? 'Edge' : browser;
//     browser = (/googlebot/i).test(userAgent) ? 'GoogleBot' : browser;
//     browser = (/chromium/i).test(userAgent) ? 'Chromium' : browser;
//     browser = (/firefox|fxios/i).test(userAgent) && !(/seamonkey/i).test(userAgent) ? 'Firefox' : browser;
//     browser = (/; msie|trident/i).test(userAgent) && !(/ucbrowser/i).test(userAgent) ? 'IE' : browser;
//     browser = (/chrome|crios/i).test(userAgent) && !(/opr|opera|chromium|edg|ucbrowser|googlebot/i).test(userAgent) ? 'Chrome' : browser;;
//     browser = (/safari/i).test(userAgent) && !(/chromium|edg|ucbrowser|chrome|crios|opr|opera|fxios|firefox/i).test(userAgent) ? 'Safari' : browser;
//     browser = (/opr|opera/i).test(userAgent) ? 'Opera' : browser;

//     // detect browser version
//     switch (browser) {
//         case 'UCBrowser': return `${browser}/${browserVersion(userAgent,/(ucbrowser)\/([\d\.]+)/i)}`;
//         case 'Edge': return `${browser}/${browserVersion(userAgent,/(edge|edga|edgios|edg)\/([\d\.]+)/i)}`;
//         case 'GoogleBot': return `${browser}/${browserVersion(userAgent,/(googlebot)\/([\d\.]+)/i)}`;
//         case 'Chromium': return `${browser}/${browserVersion(userAgent,/(chromium)\/([\d\.]+)/i)}`;
//         case 'Firefox': return `${browser}/${browserVersion(userAgent,/(firefox|fxios)\/([\d\.]+)/i)}`;
//         case 'Chrome': return `${browser}/${browserVersion(userAgent,/(chrome|crios)\/([\d\.]+)/i)}`;
//         case 'Safari': return `${browser}/${browserVersion(userAgent,/(safari)\/([\d\.]+)/i)}`;
//         case 'Opera': return `${browser}/${browserVersion(userAgent,/(opera|opr)\/([\d\.]+)/i)}`;
//         case 'IE': const version = browserVersion(userAgent,/(trident)\/([\d\.]+)/i);
//             // IE version is mapped using trident version 
//             // IE/8.0 = Trident/4.0, IE/9.0 = Trident/5.0
//             return version ? `${browser}/${parseFloat(version) + 4.0}` : `${browser}/7.0`;
//         default: return `unknown/0.0.0.0`;
//     }
// }

// browserVersion = (userAgent,regex) => {
//     return userAgent.match(regex) ? userAgent.match(regex)[2] : null;
// }

// console.log(getBrowser());



// function get_browser() {
//     var ua=navigator.userAgent,tem,M=ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || []; 
//     if(/trident/i.test(M[1])){
//         tem=/\brv[ :]+(\d+)/g.exec(ua) || []; 
//         return {name:'IE',version:(tem[1]||'')};
//         }   
//     if(M[1]==='Chrome'){
//         tem=ua.match(/\bOPR|Edge\/(\d+)/)
//         if(tem!=null)   {return {name:'Opera', version:tem[1]};}
//         }   
//     M=M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
//     if((tem=ua.match(/version\/(\d+)/i))!=null) {M.splice(1,1,tem[1]);}
//     return {
//       name: M[0],
//       version: M[1]
//     };
//  }
//  var browser=get_browser(); // browser.name = 'Chrome'
//              window.alert(browser);
//               // browser.version = '40'

// console.log(browser);


//  navigator.sayswho= (function(){
//     var ua= navigator.userAgent, tem, 
//     M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
//     if(/trident/i.test(M[1])){
//         tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
//         return 'IE '+(tem[1] || '');
//     }
//     if(M[1]=== 'Chrome'){
//         tem= ua.match(/\b(OPR|Edge)\/(\d+)/);
//         if(tem!= null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
//     }
//     M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
//     if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
//     return M.join(' ');
// })();

</script>

<script>
// (function () {
//     if (!console) {
//         console = {};
//     }
//     var old = console.log;
//     var logger = document.getElementById('log');
//     console.log = function (message) {
//         if (typeof message == 'object') {
//             logger.innerHTML += (JSON && JSON.stringify ? JSON.stringify(message) : String(message)) + '<br />';
//         } else {
//             logger.innerHTML += message + '<br />';
//         }
//     }
// })();

// console.log('test');
// console.log({
//     test: 2
// });
// console.log([1, 2, 3]);
// console.log([{
//     test: 1
// }, {
//     test: 2
// }]);


</script>
</body>
  
</html>