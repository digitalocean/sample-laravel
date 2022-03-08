@extends('layouts.mastermap')
@section('title','Edit Form')
@push('link')
	<link rel="stylesheet" href="/css/style.css" >
@endpush

@section('content')

<div class="container">




<div class="row">
	<h3>Show Form</h3>

	<div class="row">
		<div class="col"></div>
		<div class="col">
		<form action="/address/data/{{$data->id}}" method="post">

				{{csrf_field()}}
				{{method_field('patch')}}
				<div class="form-group">
					<input type="text" name="type" placeholder="name" class="form-control" value="{{$data->type}}">
				</div>
				<div class="form-group">
					<input type="text" name="house" placeholder="house" class="form-control" value="{{$data->house}}">
				</div>
				<div class="form-group">
					<input type="text" name="street" placeholder="street" class="form-control" value="{{$data->street}}">
				</div>
                <div class="form-group">
					<input type="text" name="town" placeholder="town" class="form-control" value="{{$data->town}}">
				</div>
				<div class="form-group">
					<input type="text" name="email" placeholder="email" class="form-control" value="{{$data->email}}">
				</div>
				<div class="form-group">
					<input type="text" name="ZIPcode" placeholder="ZIPcode" class="form-control" value="{{$data->ZIPcode}}">
				</div>
                <div class="form-group">
					<input type="text" name="country" placeholder="country" class="form-control" value="{{$data->country}}">
				</div>
				<div class="form-group">
					<input type="text" name="phone" placeholder="phone" class="form-control" value="{{$data->phone}}">
				</div>
				<div class="form-group">
					<input type="text" name="deliveryaddress" placeholder="deliveryaddress" class="form-control" value="{{$data->deliveryaddress}}">
				</div>
				<div class="form-group">
					<input type="text" name="invoiceaddress" placeholder="invoiceaddress" class="form-control" value="{{$data->invoiceaddress}}">
				</div>
				<div class="form-group">
					<input type="text" name="transscriptaddress" placeholder="transscriptaddress" class="form-control" value="{{$data->transscriptaddress}}">
				</div>
                <!--
				<div class="form-check">
					<label for="">Owner Gender: </label>
					<input type="radio" name="gender" value="male" @ if($data->gender=="male") checked @ endif>
					<label for="">Male</label>
					<input type="radio" name="gender" value="female" @ if($data->gender=="female") checked @ endif>
					<label for="">Female</label>
				</div>
			<div class="form-group">
					<label for="">town:</label>
					<select name="town" id="" class="form-control">
						<option value="Rajkot" @ if($data->city=="Rajkot") selected @ endif>Rajkot</option>
						<option value="Ahmedabad" @ if($data->city=="Ahmedabad") selected @ endif>Ahmedabad</option>
						<option value="Vadodara" @ if($data->city=="Vadodara") selected @ endif>Vadodara</option>
						<option value="Surat" @ if($data->city=="Surat") selected @ endif>Surat</option>
					</select>
				</div>-->

				<div class="mt-2 form-group">
					<input type="submit" value="submit" class="btn btn-primary">
				<!--	<input type="reset" value="reset" class="btn btn-secondary">-->
				</div>

			</form>
		</div>
		<div class="col"></div>
	</div>

    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">

                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>UserType</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $data->user_id }} </td>
                        <td>{{ $data->type }} </td>
                        <td>{{ $data->house }} </td>
                        <td>{{ $data->street }} </td>
                        <td>{{ $data->town }} </td>
                        <td>{{ $data->ZIPcode }} </td>
                        <td>{{ $data->country }} </td>
                        <td>{{ $data->phone }} </td>
                        <td>{{ $data->deliveryaddress }} </td>
                        <td>{{ $data->invoiceaddress }} </td>
                        <td>{{ $data->transscriptaddress }} </td>
                        <td>{{ $data->user_id }} </td>
                        <td>{{ $data->updated_at }} </td>
                        <td>{{ $data->email }} </td>
                        <td>{{ $data->creates_at }} </td>
                        <td><a href="/address/data/{{ $data->id }}" class="btn btn-success">Edit</a></td>
                        <td><form action="/role-delete/{{ $data->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <br>

<br>


<div class="container">

<!-- Marketing Icons Section -->
<div class="row">
    <div class="col-lg-12">

    <div class="panel panel-default">
    <div class="panel-heading">
        <h4>  </h4>
    </div>
    <div class="panel-body">

<fieldset>
<div  class="col-lg-6">
	<div class = "panel">
	<div class = "panel-body">
		<h2>Delivery Address</h2>
	<form method="POST" action="http://acpa-global.com/map/myaddresses" accept-charset="UTF-8"><input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">
		<div class="form-group">
			<input class="form-control" required="required" name="delivery_address" type="text" value= "">
		</div>
		<div class="form-group">
			<input name="process" type="hidden" value="changeit">
			<input class="btn btn-primary" type="submit" value="Change Delivery Address">

			<input class="btn btn-primary" type="submit" value="Confirm Address to EO">
		</div>
		</form>


		<h2>(Optional) Invoice Address: </h2>
			<form method="POST" action="http://acpa-global.com/map/myaddresses" accept-charset="UTF-8"><input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">
		<div class="form-group">
			<input class="form-control" required="required" name="invoice_address" type="text" value= " ">
		</div>
			<input name="process" type="hidden" value="change_invoice_address">
		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="Change Invoice Address">
			<input class="btn btn-primary" type="submit" value="Remove Invoice Address">
		</div>
	</form>


	<h2>Transcript Address</h2>
	<form method="POST" action="http://acpa-global.com/map/myaddresses" accept-charset="UTF-8"><input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">
		<div class="form-group">
			<input class="form-control" required="required" name="transcript_address" type="text" value= "  ">
			<input name="process" type="hidden" value="change_transcript_address">
		</div>
		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="Change Transcript Address">
			<input class="btn btn-primary" type="submit" value="Remove Transcript Address">
		</div>
	</form>
		</div><!-- pandel body -->
	</div>
</div>


	<div  class="col-lg-6">
	<div class = "panel">
	<div class = "panel-body">
@include('messages  ')
 <?php echo 'THIS IS PHP TEXT';  ?>
            <div class="panel-heading">Refences</div>

            {!! Form::open(['action' => ['MapController@updatemyaddress' , Auth::user()->id], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">
             {{Form::label('addresscountry', 'addresscountry')}}<br>
            {!! Form::select('addresscountry', array(

'Afghanistan' => 'Afghanistan','Albania' => 'Albania','Antarctica' => 'Antarctica','Algeria' => 'Algeria','American Samoa' => 'American Samoa','Andorra' => 'Andorra' ,'Angola' =>'Angola' ,'Antigua and Barbuda' => 'Antigua and Barbuda','Azerbaijan' => 'Azerbaijan','Argentina' => 'Argentina','Australia' => 'Australia','Austria' => 'Austria','Bahamas' =>'Bahamas','Bahrain' => 'Bahrain','Bangladesh' => 'Bangladesh','Armenia' => 'Armenia','Barbados' =>'Barbados', 'Belgium' =>'Belgium', 'Bermuda' =>'Bermuda', 'Bhutan' =>'Bhutan', 'Bolivia'=>'Bolivia', 'Plurinational State of' =>'Plurinational State of', 'Bosnia and Herzegovina' =>'Bosnia and Herzegovina', 'Botswana' =>'Botswana', 'Bouvet Island' =>'Bouvet Island', 'Brazil' =>'Brazil', 'Belize' =>'Belize', 'British Indian Ocean Territory' =>'British Indian Ocean Territory', 'Solomon Islands' => 'Solomon Islands','Virgin Islands, British' => 'Virgin Islands, British','Brunei Darussalam' =>'Brunei Darussalam', 'Bulgaria' =>'Bulgaria', 'Myanmar' => 'Myanmar','Burundi' =>'Burundi', 'Belarus' =>'Belarus', 'Cambodia' =>'Cambodia', 'Cameroon' =>'Cameroon', 'Canada' =>'Canada', 'Cape Verde' => 'Cape Verde','Cayman Islands' =>'Cayman Islands', 'Central African Republic' =>'Central African Republic', 'Sri Lanka' =>'Sri Lanka', 'Chad' =>'Chad', 'Chile' => 'Chile','China' =>'China', 'Taiwan, Province of China' =>'Taiwan, Province of China', 'Christmas Island' => 'Christmas Island','Cocos (Keeling) Islands' =>'Cocos (Keeling) Islands', 'Colombia' =>'Colombia', 'Comoros' => 'Comoros','Mayotte' => 'Mayotte','Congo' =>'Congo',
'Congo, the Democratic Republic of the' =>'Congo, the Democratic Republic of the', 'Cook Islands' =>'Cook Islands', 'Costa Rica' =>  'Costa Rica','Croatia' => 'Croatia','Cuba' =>'Cuba', 'Cyprus' => 'Cyprus','Czech Republic' =>'Czech Republic', 'Benin' => 'Benin','Denmark' => 'Denmark','Dominica' =>'Dominica', 'Dominican Republic' => 'Dominican Republic','Ecuador' => 'Ecuador','El Salvador' =>'El Salvador' , 'Equatorial Guinea' => 'Equatorial Guinea',
'Ethiopia' =>'Ethiopia', 'Eritrea' =>'Eritrea', 'Estonia' => 'Estonia', 'Faroe Islands' =>'Faroe Islands', 'Falkland Islands (Malvinas)' =>'Falkland Islands (Malvinas)',
'South Georgia and the South Sandwich Islands' =>'South Georgia and the South Sandwich Islands','Fiji' =>'Fiji', 'Finland' =>'Finland', 'Åland Islands' =>'Åland Islands', 'France' =>  'France','French Guiana' =>'French Guiana', 'French Polynesia' =>'French Polynesia',
'French Southern Territories' =>'French Southern Territories','Djibouti' => 'Djibouti','Gabon' => 'Gabon','Georgia' =>'Georgia', 'Gambia' => 'Gambia', 'Palestinian Territory, Occupied' =>'Palestinian Territory, Occupied', 'Germany' =>'Germany',
'Ghana' => 'Ghana', 'Gibraltar' =>'Gibraltar', 'Kiribati' =>'Kiribati', 'Greece' =>  'Greece','Greenland' =>'Greenland', 'Grenada' =>'Grenada', 'Guadeloupe' =>'Guadeloupe',
'Guam' =>'Guam', 'Guatemala' =>'Guatemala', 'Guinea' =>'Guinea', 'Guyana' =>'Guyana', 'Haiti' => 'Haiti','Heard Island and McDonald Islands' => 'Heard Island and McDonald Islands',
'Holy See (Vatican City State)' => 'Holy See (Vatican City State)','Honduras' => 'Honduras','Hong Kong' => 'Hong Kong','Hungary' => 'Hungary' ,'Iceland' =>'Iceland','India' =>  'India' ,'Indonesia' => 'Indonesia','Iran, Islamic Republic of' =>'Iran, Islamic Republic of' , 'Iraq' =>'Iraq', 'Ireland' => 'Ireland','Israel' =>'Israel','Italy' =>'Italy', 'Côte d&#0;Ivoire' =>'Côte d&#0;Ivoire', 'Jamaica' =>  'Jamaica','Japan' =>'Japan', 'Kazakhstan' =>'Kazakhstan', 'Jordan' =>'Jordan', 'Kenya' =>'Kenya', 'Korea, Democratic People&#0;s Republic of' =>'Korea, Democratic People&#0;s Republic of',
'Korea, Republic of' =>'Korea, Republic of','Kuwait' =>'Kuwait', 'Kyrgyzstan' =>'Kyrgyzstan', 'Lao People&#0;s Democratic Republic' =>'Lao People&#0;s Democratic Republic',
'Lebanon' =>  'Lebanon','Lesotho' => 'Lesotho' ,'Latvia' => 'Latvia','Liberia' =>'Liberia','Libya' => 'Libya','Liechtenstein' => 'Liechtenstein' ,'Lithuania' =>  'Lithuania','Luxembourg' => 'Luxembourg','Macao' =>'Macao', 'Madagascar' =>  'Madagascar', 'Malawi' =>'Malawi' , 'Malaysia' => 'Malaysia' ,'Maldives' =>'Maldives',
'Mali' =>'Mali', 'Malta' => 'Malta','Martinique' => 'Martinique','Mauritania' =>'Mauritania', 'Mauritius' =>'Mauritius', 'Mexico' => 'Mexico', 'Monaco' => 'Monaco', 'Mongolia' =>'Mongolia',
'Moldova, Republic of' =>'Moldova, Republic of', 'Montenegro' =>'Montenegro', 'Montserrat' => 'Montserrat' ,'Morocco' =>'Morocco', 'Mozambique' => 'Mozambique', 'Oman' => 'Oman',
'Namibia' =>  'Namibia','Nauru' =>'Nauru', 'Nepal' => 'Nepal','Netherlands' =>'Netherlands', 'Curaçao' => 'Curaçao','Aruba' => 'Aruba','Sint Maarten (Dutch part)' =>'Sint Maarten (Dutch part)',
'Bonaire, Sint Eustatius and Saba' =>'Bonaire, Sint Eustatius and Saba' ,'New Caledonia' =>'New Caledonia', 'Vanuatu' => 'Vanuatu','New Zealand' =>'New Zealand', 'Nicaragua' =>'Nicaragua',
'Niger' =>'Niger', 'Nigeria' =>'Nigeria', 'Niue' =>'Niue', 'Norfolk Island' =>'Norfolk Island', 'Norway' =>'Norway', 'Northern Mariana Islands' => 'Northern Mariana Islands','United States Minor Outlying Islands' => 'United States Minor Outlying Islands' , 'Micronesia, Federated States of' => 'Micronesia, Federated States of','Marshall Islands' => 'Marshall Islands','Palau' =>'Palau', 'Pakistan' =>'Pakistan', 'Panama' => 'Panama','Papua New Guinea' =>'Papua New Guinea' , 'Paraguay' => 'Paraguay',
'Peru' =>'Peru', 'Philippines' =>'Philippines','Pitcairn' => 'Pitcairn' , 'Poland' =>'Poland', 'Portugal' =>'Portugal', 'Guinea-Bissau' => 'Guinea-Bissau', 'Timor-Leste' =>'Timor-Leste', 'Puerto Rico' =>'Puerto Rico',
'Qatar' => 'Qatar', 'Réunion' =>'Réunion', 'Romania' =>'Romania', 'Russian Federation' =>'Russian Federation', 'Rwanda' =>'Rwanda', 'Saint Barthélemy' =>'Saint Barthélemy',
'Saint Helena, Ascension and Tristan da Cunha' =>'Saint Helena, Ascension and Tristan da Cunha', 'Saint Kitts and Nevis' => 'Saint Kitts and Nevis','Anguilla' =>'Anguilla', 'Saint Lucia' => 'Saint Lucia','Saint Martin (French part)' =>'Saint Martin (French part)', 'Saint Pierre and Miquelon' =>'Saint Pierre and Miquelon',
'Saint Vincent and the Grenadines' =>'Saint Vincent and the Grenadines', 'San Marino' => 'San Marino','Sao Tome and Principe' => 'Sao Tome and Principe', 'Saudi Arabia' => 'Saudi Arabia','Senegal' => 'Senegal','Serbia' => 'Serbia','Seychelles' =>'Seychelles', 'Sierra Leone' => 'Sierra Leone' ,'Singapore' =>'Singapore',
'Slovakia' =>'Slovakia' , 'Viet Nam' => 'Viet Nam' ,'Slovenia' =>'Slovenia', 'Somalia' => 'Somalia','South Africa' => 'South Africa',  'Zimbabwe' =>  'Zimbabwe','Spain' => 'Spain','South Sudan' =>'South Sudan', 'Sudan' =>'Sudan', 'Western Sahara' => 'Western Sahara',
'Suriname' =>  'Suriname','Svalbard and Jan Mayen' =>'Svalbard and Jan Mayen' , 'Swaziland' => 'Swaziland','Sweden' =>'Sweden', 'Switzerland' =>'Switzerland', 'Syrian Arab Republic' =>'Syrian Arab Republic',
'Tajikistan' => 'Tajikistan', 'Thailand' => 'Thailand', 'Togo' => 'Togo', 'Tokelau' => 'Tokelau','Tonga' =>'Tonga', 'Trinidad and Tobago' =>'Trinidad and Tobago',
'United Arab Emirates' =>'United Arab Emirates' ,'Tunisia' =>  'Tunisia' ,'Turkey' =>'Turkey', 'Turkmenistan' =>'Turkmenistan', 'Turks and Caicos Islands' =>'Turks and Caicos Islands', 'Tuvalu' =>'Tuvalu',
'Uganda' =>'Uganda', 'Ukraine' => 'Ukraine', 'Macedonia, the former Yugoslav Republic of' =>'Macedonia, the former Yugoslav Republic of',
'Egypt' =>'Egypt', 'United Kingdom' =>'United Kingdom', 'Guernsey' =>'Guernsey', 'Jersey' => 'Jersey','Isle of Man' =>'Isle of Man',
'Tanzania, United Republic of' =>'Tanzania, United Republic of', 'United States' =>'United States', 'Virgin Islands, U.S.' =>'Virgin Islands, U.S.' ,
'Burkina Faso' => 'Burkina Faso', 'Uruguay' => 'Uruguay', 'Uzbekistan' =>'Uzbekistan', 'Venezuela, Bolivarian Republic of' => 'Venezuela, Bolivarian Republic of',
'Wallis and Futuna' =>'Wallis and Futuna', 'Samoa' =>'Samoa', 'Yemen' =>'Yemen', 'Zambia'=>'Zambia'  ), 'S'); !!}</div>
             <div class="form-group">
             {{Form::label('type', 'Type')}}<br>
                {{Form::text('addresstype', Auth::user()->type, ['class' => 'from-control', 'id'=>'address_type','placeholder' => 'Type','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('house', 'House')}}<br>
                {{Form::text('addresshouse', Auth::user()->addresshouse, ['class' => 'from-control', 'placeholder' => 'House','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('street', 'Street')}}<br>
                {{Form::text('addressstreet', Auth::user()->addressstreet, ['class' => 'from-control', 'placeholder' => 'Street','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('town', 'Town')}}<br>
                {{Form::text('addresstown', Auth::user()->addresstown, ['class' => 'from-control', 'placeholder' => 'Town','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('ZIPCode', 'ZIPCode')}}<br>
                {{Form::text('addressZIPcode', Auth::user()->addressZIPcode, ['class' => 'from-control', 'placeholder' => 'ZIPCode','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('phone', 'Phone')}}<br>
                {{Form::text('addressphone', Auth::user()->addressphone, ['class' => 'from-control', 'placeholder' => 'Phone','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('email', 'Email')}}<br>
                {{Form::text('addressemail', Auth::user()->addressemail, ['class' => 'from-control', 'placeholder' => 'Email','required'=>'required'])}}
             </div>
             {{Form::hidden('_method','PUT')}}
             {{Form::submit('submit', ['class' => 'btn btn-success'])}}
             {!! Form::close() !!}



<!--
		<form method="POST" action="http://acpa-global.com/map/myaddresses" accept-charset="UTF-8"><input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">
			<div class="form-group">
				<label for="address_type">Type</label>
				<input class="form-control" name="address_type" type="text" id="address_type">
			</div>
			<div class="form-group">
				<label for="house">House</label>
				<input class="form-control" name="house" type="text" id="house">
			</div>
			<div class="form-group">
				<label for="street">Street</label>
				<input class="form-control" name="street" type="text" id="street">
			</div>
			<div class="form-group">
				<label for="town">Town</label>
				<input class="form-control" name="town" type="text" id="town">
			</div>
			<div class="form-group">
				<label for="zipcode">ZIPCode</label>
				<input class="form-control" name="zipcode" type="text" id="zipcode">
			</div>
			<div class="form-group">
				<label for="country">country</label>
				<select class="form-control" id="country" name="country"><option value="4">Afghanistan</option><option value="8">Albania</option><option value="10">Antarctica</option><option value="12">Algeria</option><option value="16">American Samoa</option><option value="20">Andorra</option><option value="24">Angola</option><option value="28">Antigua and Barbuda</option><option value="31">Azerbaijan</option><option value="32">Argentina</option><option value="36">Australia</option><option value="40">Austria</option><option value="44">Bahamas</option><option value="48">Bahrain</option><option value="50">Bangladesh</option><option value="51">Armenia</option><option value="52">Barbados</option><option value="56">Belgium</option><option value="60">Bermuda</option><option value="64">Bhutan</option><option value="68">Bolivia, Plurinational State of</option><option value="70">Bosnia and Herzegovina</option><option value="72">Botswana</option><option value="74">Bouvet Island</option><option value="76">Brazil</option><option value="84">Belize</option><option value="86">British Indian Ocean Territory</option><option value="90">Solomon Islands</option><option value="92">Virgin Islands, British</option><option value="96">Brunei Darussalam</option><option value="100">Bulgaria</option><option value="104">Myanmar</option><option value="108">Burundi</option><option value="112">Belarus</option><option value="116">Cambodia</option><option value="120">Cameroon</option><option value="124">Canada</option><option value="132">Cape Verde</option><option value="136">Cayman Islands</option><option value="140">Central African Republic</option><option value="144">Sri Lanka</option><option value="148">Chad</option><option value="152">Chile</option><option value="156">China</option><option value="158">Taiwan, Province of China</option><option value="162">Christmas Island</option><option value="166">Cocos (Keeling) Islands</option><option value="170">Colombia</option><option value="174">Comoros</option><option value="175">Mayotte</option><option value="178">Congo</option><option value="180">Congo, the Democratic Republic of the</option><option value="184">Cook Islands</option><option value="188">Costa Rica</option><option value="191">Croatia</option><option value="192">Cuba</option><option value="196">Cyprus</option><option value="203">Czech Republic</option><option value="204">Benin</option><option value="208">Denmark</option><option value="212">Dominica</option><option value="214">Dominican Republic</option><option value="218">Ecuador</option><option value="222">El Salvador</option><option value="226">Equatorial Guinea</option><option value="231">Ethiopia</option><option value="232">Eritrea</option><option value="233">Estonia</option><option value="234">Faroe Islands</option><option value="238">Falkland Islands (Malvinas)</option><option value="239">South Georgia and the South Sandwich Islands</option><option value="242">Fiji</option><option value="246">Finland</option><option value="248">Åland Islands</option><option value="250">France</option><option value="254">French Guiana</option><option value="258">French Polynesia</option><option value="260">French Southern Territories</option><option value="262">Djibouti</option><option value="266">Gabon</option><option value="268">Georgia</option><option value="270">Gambia</option><option value="275">Palestinian Territory, Occupied</option><option value="276">Germany</option><option value="288">Ghana</option><option value="292">Gibraltar</option><option value="296">Kiribati</option><option value="300">Greece</option><option value="304">Greenland</option><option value="308">Grenada</option><option value="312">Guadeloupe</option><option value="316">Guam</option><option value="320">Guatemala</option><option value="324">Guinea</option><option value="328">Guyana</option><option value="332">Haiti</option><option value="334">Heard Island and McDonald Islands</option><option value="336">Holy See (Vatican City State)</option><option value="340">Honduras</option><option value="344">Hong Kong</option><option value="348">Hungary</option><option value="352">Iceland</option><option value="356">India</option><option value="360">Indonesia</option><option value="364">Iran, Islamic Republic of</option><option value="368">Iraq</option><option value="372">Ireland</option><option value="376">Israel</option><option value="380">Italy</option><option value="384">Côte d&#039;Ivoire</option><option value="388">Jamaica</option><option value="392">Japan</option><option value="398">Kazakhstan</option><option value="400">Jordan</option><option value="404">Kenya</option><option value="408">Korea, Democratic People&#039;s Republic of</option><option value="410">Korea, Republic of</option><option value="414">Kuwait</option><option value="417">Kyrgyzstan</option><option value="418">Lao People&#039;s Democratic Republic</option><option value="422">Lebanon</option><option value="426">Lesotho</option><option value="428">Latvia</option><option value="430">Liberia</option><option value="434">Libya</option><option value="438">Liechtenstein</option><option value="440">Lithuania</option><option value="442">Luxembourg</option><option value="446">Macao</option><option value="450">Madagascar</option><option value="454">Malawi</option><option value="458">Malaysia</option><option value="462">Maldives</option><option value="466">Mali</option><option value="470">Malta</option><option value="474">Martinique</option><option value="478">Mauritania</option><option value="480">Mauritius</option><option value="484">Mexico</option><option value="492">Monaco</option><option value="496">Mongolia</option><option value="498">Moldova, Republic of</option><option value="499">Montenegro</option><option value="500">Montserrat</option><option value="504">Morocco</option><option value="508">Mozambique</option><option value="512">Oman</option><option value="516">Namibia</option><option value="520">Nauru</option><option value="524">Nepal</option><option value="528">Netherlands</option><option value="531">Curaçao</option><option value="533">Aruba</option><option value="534">Sint Maarten (Dutch part)</option><option value="535">Bonaire, Sint Eustatius and Saba</option><option value="540">New Caledonia</option><option value="548">Vanuatu</option><option value="554">New Zealand</option><option value="558">Nicaragua</option><option value="562">Niger</option><option value="566">Nigeria</option><option value="570">Niue</option><option value="574">Norfolk Island</option><option value="578">Norway</option><option value="580">Northern Mariana Islands</option><option value="581">United States Minor Outlying Islands</option><option value="583">Micronesia, Federated States of</option><option value="584">Marshall Islands</option><option value="585">Palau</option><option value="586">Pakistan</option><option value="591">Panama</option><option value="598">Papua New Guinea</option><option value="600">Paraguay</option><option value="604">Peru</option><option value="608">Philippines</option><option value="612">Pitcairn</option><option value="616">Poland</option><option value="620">Portugal</option><option value="624">Guinea-Bissau</option><option value="626">Timor-Leste</option><option value="630">Puerto Rico</option><option value="634">Qatar</option><option value="638">Réunion</option><option value="642">Romania</option><option value="643">Russian Federation</option><option value="646">Rwanda</option><option value="652">Saint Barthélemy</option><option value="654">Saint Helena, Ascension and Tristan da Cunha</option><option value="659">Saint Kitts and Nevis</option><option value="660">Anguilla</option><option value="662">Saint Lucia</option><option value="663">Saint Martin (French part)</option><option value="666">Saint Pierre and Miquelon</option><option value="670">Saint Vincent and the Grenadines</option><option value="674">San Marino</option><option value="678">Sao Tome and Principe</option><option value="682">Saudi Arabia</option><option value="686">Senegal</option><option value="688">Serbia</option><option value="690">Seychelles</option><option value="694">Sierra Leone</option><option value="702">Singapore</option><option value="703">Slovakia</option><option value="704">Viet Nam</option><option value="705">Slovenia</option><option value="706">Somalia</option><option value="710">South Africa</option><option value="716">Zimbabwe</option><option value="724">Spain</option><option value="728">South Sudan</option><option value="729" selected="selected">Sudan</option><option value="732">Western Sahara</option><option value="740">Suriname</option><option value="744">Svalbard and Jan Mayen</option><option value="748">Swaziland</option><option value="752">Sweden</option><option value="756">Switzerland</option><option value="760">Syrian Arab Republic</option><option value="762">Tajikistan</option><option value="764">Thailand</option><option value="768">Togo</option><option value="772">Tokelau</option><option value="776">Tonga</option><option value="780">Trinidad and Tobago</option><option value="784">United Arab Emirates</option><option value="788">Tunisia</option><option value="792">Turkey</option><option value="795">Turkmenistan</option><option value="796">Turks and Caicos Islands</option><option value="798">Tuvalu</option><option value="800">Uganda</option><option value="804">Ukraine</option><option value="807">Macedonia, the former Yugoslav Republic of</option><option value="818">Egypt</option><option value="826">United Kingdom</option><option value="831">Guernsey</option><option value="832">Jersey</option><option value="833">Isle of Man</option><option value="834">Tanzania, United Republic of</option><option value="840">United States</option><option value="850">Virgin Islands, U.S.</option><option value="854">Burkina Faso</option><option value="858">Uruguay</option><option value="860">Uzbekistan</option><option value="862">Venezuela, Bolivarian Republic of</option><option value="876">Wallis and Futuna</option><option value="882">Samoa</option><option value="887">Yemen</option><option value="894">Zambia</option></select>

			</div>
			<div class="form-group">
				<input name="process" type="hidden" value="changeinfo">
				<input class="btn btn-primary" type="submit" value="Save Address">
				</form>
		</div>
		<form method="POST" action="http://acpa-global.com/map/myaddresses" accept-charset="UTF-8"><input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">
		<div class="form-group">
			<label for="phone">Phone</label>
			<input class="form-control" name="phone" type="text" id="phone">
			<input name="process" type="hidden" value="changephone">
		</div>
		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="Save Phone">
		</div>
	</form>
    -->

</div>
</div>
</div>
</fieldset>






                    </div>
                </div>


            </div>
        </div>
@endsection
