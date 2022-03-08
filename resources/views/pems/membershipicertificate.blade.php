<div align="center">
<style>
p{
    padding:0px;
    margin:0px;
}
p.ex1 {
  margin-right: 15px;
}
td.ex1 {
  margin-right: 15px;
}
 </style>
    <div>
    <div style="width:750px;  text-align:center;margin-right:20px; padding-right:20px;">
        <p style="margin-right:15px;"><img src="logonbcfull2.jpg" width="95%" style="margin-right:15px;"></p>
        <span style="font-size:47px; color:#808080; font-weight:normal;;margin-right:20px;">Membership Certificate</span>
        <p style="font-size:30px;  color:#808080;"> of Good Standing</p>
        <br>
        <br>
 
        <p style="font-size:20px;"><em><b>This is to certify that<b></em></p>
        <p style="font-size:42px; color:#808080; font-weight:normal;margin-right:20px;">{{$user->fullname}}</p>
        <br>
        <br>
 
        <p style="font-size:20px;"><em><b>Has been admitted membership of the College as a:</b></em></p>
        <span style="font-size:40px; color:#808080; font-weight:normal;margin-right:20px;"><b><em>{{$level->certificate2}}<br>{{$level->level}}</em></b></span>
        <p style="color:#2F4F4F;"><em>And has remained a Member of the College since
        <br>

        <?php $today =$user->created_at;echo $today;  ?>
        </em></p>
        <p> 

        <p style="color:#2F4F4F;"><em>And to this date has continued to be regarded by the Members of the Executive Board
        as a Member in good standing through the continued commitment to the following: </em></p>
        <p style="color:#2F4F4F;"><em>Application of the International Federation of Accountants’ (IFAC)</em></p>
        <p style="color:#2F4F4F;"><em>Code of Ethics for Professional Accountants,</em></p>
        <p style="color:#2F4F4F;"><em>Adherence to the rules of the College</em></p>
        <p><em>This Certificate has been issued on this day</em></p>
        <p><em><?php $today = date('Y-M-d');echo $today;  ?></em>

        <p align="left"> <img src="{{$user->avatar}}" width="80px" heigh="180px"></p>

        
 
        <table style="float:left;width:500px"><tr>
        <td>S.N. Mohammed </td><td></td><td></td><td></td>
        </tr>
        <tr>
        <td>Chairman:<img src="chairmansign.JPG" width="100px"></td><td></td><td> </td><td></td>
        </tr><tr>
        <td>H.M. Slam</td><td></td><td> </td><td></td>
        </tr>
         
        <tr>
        <td>Deputy Chairwoman:<img src="deputychairwomensign.JPG" width="100px"></td><td></td><td> </td><td></td>
        </tr>
        <tr>
        <td>Member Number: {{$user->student_id}} </td><td></td><td> </td><td></td>
        </tr>
        <tr>
        <td>Member Title: {{$level->level}}</td><td></td><td> </td><td></td>
        </tr>
        <tr>
        <?php 
        $StaringDate = date("Y-M-d");
        $oneYearOn = date("Y-M-d", strtotime(date("Y-M-d", strtotime($StaringDate)) . " + 1 year")); ?>
        <td>Designation: {{$level->levelcode}}</td><td></td></td><td><td align="right" style="font-size:17px;"> </td>
        </tr>
        <tr>
        <td></td><td></td><td style="font-size:11px;"><br></td><td></td>
        </tr>
         
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
       <p align="right" style="font-size:17px;margin-right:25px;"> <em><b>Expiry date: {{ $oneYearOn}}</b></em></p>
       <p align="center">Nazlawi Business College, LLC</p>
        </div>
 
  
    </div>

    </div>
 