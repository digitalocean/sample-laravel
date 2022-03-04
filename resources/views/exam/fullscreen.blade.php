<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Open Page FullScreen</title>
    <script type="text/javascript">  
   //  this is simply jQuery shorthand for document.ready = function ...
$(function(){
    //  this is how to dynamically assign events
    //  why is this important? let's say, in the future,
    //  you decide to add elements after the page is loaded,
    //  this allows the NEW elements to still use the same events you've assigned
    $(document)
        //  .on and .off are as simple as they appear, 
        //  on adds an event to a group of elements and off removes
        //  as you'll notice, I assign just one method to both elements
        //  the reason is this move is extremely simple
        //  all you need is to have one element hide or show, based on 
        //  clicking one of the divs
        .on('click', '#bandeau, #full_screen', function(e) {
            //  .toggle accepts a booleen argument
            //  if true = show, if false = hide
            //  thus i simply test the id name within the parameter!
            $('#full_screen').toggle(this.id == 'bandeau');
         })
});
    </script>
   <style>



html {
  width: 100%;
  height: 100%;  
  background: lavender;
  text-align: center;
  font-family: arial, sans-serif;
}

input { 
  display: none;
}

#target { 
  display: none;
}

#click:checked ~ label > #target {
  position: fixed;
  top: 0;
  left: 0;
  display: inline-block;
  height: 100%;
  width: 100%;
  background: url('http://i.imgur.com/bv80Nb7.png');
  background-repeat: no-repeat;
  background-size: 100% 100%;
}

.item {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  left: 0;
  right: 0;
  margin: auto;
  cursor: pointer;  
  user-select: none;
  -webkit-user-select: none;  
}

#warning {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  left: 0;
  right: 0;
  margin: auto;
}

   </style>
</head>
<body>
 
 


<input type="checkbox" id="click" name="click" value="click" />

<label for="click">
<p class="item"><b>CLICK HERE</b></p>
<div id=target><h1 id=warning>FULLSCREEN CONTENT</h1></div>  
</label>





    <input id="Button1" type="button" value="Full Screen"
    onclick="FullScreenMode()"/>
</body>
</html>