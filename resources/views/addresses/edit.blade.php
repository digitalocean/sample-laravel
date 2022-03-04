@extends('layouts.mastermap')
@section('content')

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
			<input class="form-control" required="required" name="delivery_address" type="text">
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
			<input class="form-control" required="required" name="invoice_address" type="text">
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
			<input class="form-control" required="required" name="transcript_address" type="text">
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

 <?php echo 'THIS IS PHP TEXT';  ?>
            <div class="panel-heading">Refences</div>


            {!! Form::open(['action' => ['MyaddressController@update',$myaddresses->id], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">
             {{Form::label('country', 'country')}}<br>
            {!! Form::select('country', array(

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
                {{Form::text('addresstype', Auth::user()->addresstype, ['class' => 'from-control', 'id'=>'address_type','placeholder' => 'Type','required'=>'required'])}}
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
                {{Form::text('ZIPCode', Auth::user()->addressZIPcode, ['class' => 'from-control', 'placeholder' => 'ZIPCode','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('phone', 'Phone')}}<br>
                {{Form::text('phone', Auth::user()->addressphone, ['class' => 'from-control', 'placeholder' => 'Phone','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('email', 'Email')}}<br>
                {{Form::text('email', Auth::user()->addressemail, ['class' => 'from-control', 'placeholder' => 'Email','required'=>'required'])}}
             </div>
             {{Form::hidden('_method','PUT')}}
             {{Form::submit('submit', ['class' => 'btn btn-success'])}}
             {!! Form::close() !!}

</div>
</div>
</div>
</fieldset>






                    </div>
                </div>


            </div>
        </div>
@endsection
