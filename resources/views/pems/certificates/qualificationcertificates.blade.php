<div align="center">
 <style>
p{
    padding:0px;
    margin:0px;
}
p.ex1 {
  margin-right: 150px;
}
 </style>
    <div>
    <div style="width:750px;  padding:20px; text-align:center;margin-right:10px;">
        <br><br><br><br><br><br><br>
        <p style="font-size:10px;">Continuous Education CE</p>

        <br>
        <span style="font-size:50px; color:#A9A9A9; font-weight:normal;padding:20px;margin:20px;">Professional Academic  Qualification</span>
 
        <br><br>
 
        <h3><em>This is to certify that</em></span>
 
        <br>
 
 
       <h1>{{$user->fullname}}</h1>
 
        <h3><em>Has achieved the Following Qualification:</em></h3>
    
        <p class="ex1" style="font-size:50px; color:#A9A9A9; font-weight:normal;padding:20px;margin-right:20px;"><b><em>Certificate in <br>{{$certificates->certificate}}</em></b></p>
 
       <p style="color:#A9A9A9;"><em>On This day</em></p>
       <p style="color:#A9A9A9;"><em>{{ $scheduleexamdate}}</em></p>
        
        <table style="width:100%"><tr>
        <td><img src="{{$user->avatar}}" width="120px" heigh="120%"></td><td></td><td></td><td></td></tr>
        <tr><td><br></td><td></td><td></td><td></td></tr>
        <tr>
        <td>Dr. Omaima. N. Elshiek :</td><td><img src="signofomima.JPG" width="100px"></td><td>Dr. khaled. H. FadlElmola</td><td><img src="signofkhalid.JPG" width="100px"></td>
        </tr>
        <tr>
        <td>Dean of College</td><td></td><td>Scientific Affairs</td><td></td>
        </tr>
        </table>
        <br>
       <!--<p style="padding-right:200px;margin-right:200px;"></p><p></p>-->
       <div align="left" style="font-size:12px; ">Registration Number : {{$user->student_id}}</div>
       <div align="left"  style="font-size:12px; ">Title: {{$certificates->levelcode}}</div>
       <div align="center" style="font-size:12px;">Nazlawi Business College</div>
       
        </div>
 
    </div>
 
 </div>
 