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
        <br>
        <span style="font-size:32px; color:#808080; font-weight:normal;padding:20px;margin:20px;">Membership Certificate of Good Standing</span>
 
  
        <h3><em>This is to certify that</em></span>
        <p style="font-size:42px; color:#808080; font-weight:normal;padding:20px;margin:20px;">{{$user->fullname}}</p>
 
        <h3><em>Has been admitted membership of the College as a:</em></h3>
        <span style="font-size:40px; color:#808080; font-weight:normal;margin-right:20px; padding-right:20px;"><b><em>{{$level->certificate2}}<br>{{$level->level}}</em></b></span>
        <p style="color:#A9A9A9;"><em>And has remained a Member of the College since</em></p>
        <p> 

        <p style="color:#A9A9A9;"><em>And to this date has continued to be regarded by the Members of the Executive Board
        as a Member in good standing through the continued commitment to the following: </em></p>
        <p style="color:#A9A9A9;"><em>Application of the International Federation of Accountants’ (IFAC)</em></p>
        <p style="color:#A9A9A9;"><em>Code of Ethics for Professional Accountants,</em></p>
        <p style="color:#A9A9A9;"><em>Adherence to the rules of the College</em></p>
        <p><em>This Certificate has been issued on this day</em></p>
        <p><em><?php $today = date('Y-m-d');echo $today;  ?></em>

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
        $StaringDate = date("Y-m-d");
        $oneYearOn = date("Y-m-d", strtotime(date("Y-m-d", strtotime($StaringDate)) . " + 1 year")); ?>
        <td>Designation: {{$level->levelcode}}</td><td></td><td style="font-size:17px;"><br><em><b>Expiry date: {{ $oneYearOn}}</b></em></td><td></td>
        </tr>
        <tr>
        <td></td><td></td><td style="font-size:11px;"><br>Nazlawi Business College</td><td></td>
        </tr>
         
        </table>
      
        </div>
 
  
    </div>

    </div>
 