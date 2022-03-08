<div align="center">
 <style> td, th {  border: 0px;}  </style>
 <style>
p{
    padding:0px;
    margin:0px;
    font-size:12px;
}
p.ex1 {
  margin-right: 15px;
}
td.ex1 {
  margin-right: 15px;
}
table{
        margin-right: 15px;

}

td{
    padding:0px;
    margin:0px;
    font-size:12px;
} 
th{
    padding:0px;
    margin:0px;
    font-size:12px;
}   
 </style>
    <div>
    <div style="width:750px;  text-align:center;margin-right:20px; padding-right:20px;">
    <br><br><br><br><br><br><br><br><br>
    <br>

  <p style="font-size:10px;">Continuous Education CE</p>
<br>
<table style="width:90%;"> 
        <tr >
        <td >Name and Address: <b>{{$user->fullname}}</b></td><td >Registration Date:2020-07-31</td>
        </tr>
        <tr>
        <td>Company or House: {{$user->house}}</td><td>Major: {{$certifiname}}</td>
        </tr>
        <tr>
        <td>Street: {{$user->street}}</td><td>Graduation Date: 2020-07-01</td>
        </tr>
        <tr>
        <td>P.O.Box: {{$user->ZIPcode}}</td><td>Registeration Number: {{$user->student_id}}</td>
        </tr>
        <tr>
        <td>Town: {{$user->town}}</td><td>Issue Date: <?php echo $date = date('Y-m-d') ; ?></td>
        </tr>
        <tr>
        <td>Tel: {{$user->phone}}</td><td></td>
        </tr>
        <tr>
        <td>Country: {{$user->country}}</td><td></td>
        </tr>
</table>


<br>

 
        <table style="width:100%  ;border:1px solid #999; "> 
        <tr>
        <th style="border: 1px solid #000000  padding: 0.1rem;">Unit ID </th><th style="border: 1px solid #000000  padding: 0.1rem;">QCF Unit Title</th><th style="border: 1px solid #000000  padding: 0.1rem;">Award Date </th><th style="border: 1px solid #000000  padding: 0.1rem;">Grade</th><th style="border: 1px solid #000000  padding: 0.1rem;">Percentage</th><th style="border: 1px solid #000000  padding: 0.1rem;">QCF Award Level</th>
        </tr>
        <?php //$exams2 = DB::table('exam')->where('examcode','<',5)->get();?>
         @foreach($exams as $exam2)

<?php 

$ref_result = DB::table('ref_result')->where('examcode',$exam2->examcode)->where('student_id',$user->student_id)->first();
$level = DB::table('levels')->where('id',1)->first();
?>
         <tr>
        <td style="border: 1px solid #000000  padding: 0.1rem;">{{$exam2->realcode}} </td><td style="border: 1px solid #000000  padding: 0.1rem;">{{$exam2->examtitle}} </td><td style="border: 1px solid #000000  padding: 0.1rem;"> {{ $ref_result->created_at}}</td><td style="border: 1px solid #000000  padding: 0.1rem;">
        
<?php if($ref_result->pass == 'Pass'){echo 'Pass';}else{
        if($ref_result->pass == 'Exempt'){echo 'Pass';}else{
            echo 'Available';}    
        }
        ?>
        </td>
        <td style="border: 1px solid #000000  padding: 0.1rem;"><?php if($ref_result->pass == 'Pass'){echo '65%';}else{
                if($ref_result->pass == 'Exempt'){echo '65%';}else{
                    echo '0%';}    
                }
                ?></td>
            <td  style="border: 1px solid #000000  padding: 0.1rem;">QCF ({{$ref_result->level}})</td>

        </tr>
        @endforeach 
        @if(($certificates == 3)||($certificates == 5)||($certificates == 13))
        <?php 
        $ref_result = DB::table('ref_result')->where('examcode',10)->first();
        $exam = DB::table('exam')->where('examcode',10)->first(); 
        $level = DB::table('levels')->where('id',3)->first();

        ?>

         <tr>
        <td style="border: 1px solid #000000  padding: 0.1rem;">{{$exam->realcode}} </td><td style="border: 1px solid #000000  padding: 0.1rem;">{{$exam->examtitle}} </td><td style="border: 1px solid #000000  padding: 0.1rem;"> {{ $ref_result->created_at}}</td><td style="border: 1px solid #000000  padding: 0.1rem;">
        <?php if($ref_result->pass == 'Pass'){echo 'Pass';}else{
                if($ref_result->pass == 'Exempt'){echo 'Pass';}else{
                    echo 'Available';}    
                }
                ?>
        </td>
        <td style="border: 1px solid #000000  padding: 0.1rem;"><?php if($ref_result->pass == 'Pass'){echo '65%';}else{
                if($ref_result->pass == 'Exempt'){echo '65%';}else{
                    echo '0%';}    
                }
                ?></td>
        </tr>

        <?php 
        $ref_result = DB::table('ref_result')->where('examcode',12)->first();
        $exam = DB::table('exam')->where('examcode',12)->first();
        ?>
         <tr>
        <td style="border: 1px solid #000000  padding: 0.1rem;">{{$exam->realcode}} </td><td style="border: 1px solid #000000  padding: 0.1rem;">{{$exam->examtitle}} </td><td style="border: 1px solid #000000  padding: 0.1rem;"> {{ $ref_result->created_at}}</td><td style="border: 1px solid #000000  padding: 0.1rem;">
        <?php if($ref_result->pass == 'Pass'){echo 'Pass';}else{
                if($ref_result->pass == 'Exempt'){echo 'Pass';}else{
                    echo 'Available';}    
                }
                ?>
        </td>
        <td style="border: 1px solid #000000  padding: 0.1rem;"><?php if($ref_result->pass == 'Pass'){echo '65%';}else{
                if($ref_result->pass == 'Exempt'){echo '65%';}else{
                    echo '0%';}    
                }
                ?></td>
                            <td  style="border: 1px solid #000000  padding: 0.1rem;">QCF ({{$ref_result->level}})</td>

        </tr>

          @endif
          @if(($certificates == 14))
        <?php 
        $ref_result = DB::table('ref_result')->where('examcode',5)->first();
        $exam = DB::table('exam')->where('examcode',5)->first(); 
        $level = DB::table('levels')->where('id',3)->first();

        ?>
         <tr>
        <td style="border: 1px solid #000000  padding: 0.1rem;">{{$exam->realcode}} </td><td style="border: 1px solid #000000  padding: 0.1rem;">{{$exam->examtitle}} </td><td style="border: 1px solid #000000  padding: 0.1rem;"> {{ $ref_result->created_at}}</td><td style="border: 1px solid #000000  padding: 0.1rem;">
        <?php if($ref_result->pass == 'Pass'){echo 'Pass';}else{
                if($ref_result->pass == 'Exempt'){echo 'Pass';}else{
                    echo 'Available';}    
                }
                ?>
        </td>
        <td style="border: 1px solid #000000  padding: 0.1rem;"><?php if($ref_result->pass == 'Pass'){echo '65%';}else{
                if($ref_result->pass == 'Exempt'){echo '65%';}else{
                    echo '0%';}    
                }
                ?></td>
        </tr>

        <?php 
        $ref_result = DB::table('ref_result')->where('examcode',12)->first();
        $exam = DB::table('exam')->where('examcode',12)->first();
        ?>
         <tr>
        <td style="border: 1px solid #000000  padding: 0.1rem;">1.0 </td><td style="border: 1px solid #000000  padding: 0.1rem;">Arab & African Computer Driving license </td><td style="border: 1px solid #000000  padding: 0.1rem;"> {{ $ref_result->created_at}}</td><td style="border: 1px solid #000000  padding: 0.1rem;">
        <?php if($certificates == 14){echo 'Pass';}else{
                if($ref_result->pass == 'Exempt'){echo 'Pass';}else{
                    echo 'Available';}    
                }
                ?>
        </td>
        <td style="border: 1px solid #000000  padding: 0.1rem;"><?php if($ref_result->pass == 'Pass'){echo '65%';}else{
                if($ref_result->pass == 'Exempt'){echo '70%';}else{
                    echo '0%';}    
                }
                ?></td>
        </tr>

          @endif
          <tr>
          <td><p><b>GAT</b>:</p>
          <b>AAT</b>:<br>
          <b>CP</b>:<br>
          <b>CA</b>:<br>
          <b>ACP</b>:<br>
          <b>ACA</b>:<br>
          <b>PM</b>:<br>
          <b>IT</b>:<br>
          </td>
          <td>
          <p> Certificate in Technical Accounting</p>
           Certificate in Advanced Technical Accounting<br>
          Certificate in Project Accounting<br>
          Certificate in Corporate Accounting<br>
          Certificate in Project Advanced Accounting<br>
          Certificate in Corporate Advanced Accounting<br>
          Certificate in Project Management<br>
           Certificate in Information Technology<br></td>

          </tr>
        </table>
        <p align="left">I certify that this Credit Transcript has been issued without alteration or erasure, signed and sealed under my
authorization.</p>
<p align="left">
<img src="chairmansign.JPG" width="100px"> <img align="right" style="margin-right:25px;" src="{{$user->avatar}}" width="80px" heigh="180px">
<!--<img src="certificatesign.jpg" width="150px">-->
</p>
<br>
<br>
<br>
<br>
<p align="left">Khaled.H.Fadl ELmola Nazlawi Business College Scientific Affairs For and on behalf of the Nazlawi Business
College.</p>
       
<table style="width:100%"><tr>
        <td></td><td></td><td></td><td></td></tr>
        </table >

        </div>
 
  
    </div>

    </div>
 