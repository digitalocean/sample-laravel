      <html>
            <body>
              <form action="" method="post" name="mcQuestion" id="mcQuestion">
                Name:<input type="test" name="name" value="Test">
              <div><span id="display" style="color:#FF0000;font-size:15px"></span></div>
            <div><span id="submitted" style="color:#FF0000;font-size:15px"></span></div>
            </form>
            <script>
            var div = document.getElementById('display');
            var submitted = document.getElementById('submitted');

              function CountDown(duration, display) {

                        var timer = duration, minutes, seconds;

                      var interVal=  setInterval(function () {
                            minutes = parseInt(timer / 60, 10);
                            seconds = parseInt(timer % 60, 10);

                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            seconds = seconds < 10 ? "0" + seconds : seconds;
                    display.innerHTML ="<b>" + minutes + "m : " + seconds + "s" + "</b>";
                            if (timer > 0) {
                               --timer;
                            }else{
                       clearInterval(interVal)
                                SubmitFunction();
                             }

                       },1000);

                }

              function SubmitFunction(){

                submitted.innerHTML="Time is up!";
                document.getElementById('mcQuestion').submit();

               }
               CountDown(5,div);
            </script>

            </body>
            </html>