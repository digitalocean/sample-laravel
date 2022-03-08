@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
       
        
     
<div class="container">
  <div class="col-lg-12">
	<div class="panel panel-default">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Pending Members</div>
					<div class="panel-body">
							
							<table class="table">
							<tr>
							<th></th>
								<th>PK</th>
								<th>FirstName</th>
								<th>LastName</th>
								<th>Email</th>
								<th>Password</th>
								<th>Status</th>
								<th>Date</th>
								<th>Country</th>
							</tr>
							@foreach($pendeingusers as $puser)
							<tr>
									<th><form method="POST" action="/pems/deletependingmembers" accept-charset="UTF-8">
									@csrf
									<input name="userid" type="hidden" value="{{$puser->id}}">	
									<input name="id" type="hidden" value="{{$puser->id}}">
									<input class="btn btn-danger" type="submit" value="Delete">
									</form></th>
								<td>{{$puser->id}}</td>
								<td>{{$puser->firstname}}</td>
								<td>{{$puser->lastname}}</td>
								<td>{{$puser->email}}</td>
								<td>{{$puser->password2}}</td>
								<td>{{$puser->type}}</td>
								<td>{{$puser->created_at}}</td>
								<td>{{$puser->country}}</td>

							</tr>
							@endforeach
						</table>
					</div>

				</div>

			</div>
	</div>	





		<div class="row">
			     	<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">Pro Forma Invoices</div>
							<div class="panel-body" style="max-height: 300px;overflow-y: scroll;">
												
									<table class="table">
									<tr>
									<th></th>
										<th>PK</th>
										<th>RegID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Country</th>
										<th>Inv No</th>
										<th>Gross</th>
										<th>Net	Date</th>
										<th>Status</th>
									</tr>
									@foreach($invoices as $inv)
										<tr>
											<th>
											<form method="POST" action="/pems/delinvoice" accept-charset="UTF-8">
											@csrf
											<input name="id" type="hidden" value="{{$inv->id}}">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<?php $user = DB::table('users')->where('student_id',$inv->student_id)->orWhere('id',$inv->student_id)->first(); ?>
										<td>{{$user->id}}</td>
										<td>{{$user->student_id}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td>{{$user->country}}</td>
										<td>{{$inv->id}}</td>
										<td>{{$inv->amount}}</td>
										<td>{{$inv->created_at}}9</td>
										<td><?php if($inv->paied == 0){echo 'Unpaid';}else{echo 'Paid';}?></td>
									</tr>
									@endforeach
				
									</tr>
									
									<tr>
<th>
<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
<input name="id" type="hidden" value="350">
<input class="btn btn-danger" type="submit" value="Delete">
</form>
</th>
<td>350</td>
<td>10200</td>
<td>altaj tample</td>
<td>acpa2011@hotamil.com</td>
<td>Sudan</td>
<td>999</td>
<td>15</td>
<td>2019-04-01 21:10:49</td>
<td>Unpaid</td>
</tr>
									<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="352">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>352</td>
										<td>10202</td>
										<td>tafoul elkhair</td>
										<td>tafoulelkhair@gmail.com</td>
																				<td>Sudan</td>
										<td>1002</td>
										<td>15</td>
										<td>2019-07-15 13:06:41</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="353">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>353</td>
										<td>10203</td>
										<td>Mahmoud Elhag</td>
										<td>M-Elhag@outlook.com</td>
																				<td>Sudan</td>
										<td>1003</td>
										<td>15</td>
										<td>2019-07-15 18:06:22</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="207">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>207</td>
										<td>10188</td>
										<td>Abdallah Alheber</td>
										<td>dollyprinces93@gmail.com</td>
																				<td>Sudan</td>
										<td>515</td>
										<td>15</td>
										<td>2018-04-27 15:06:08</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="156">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>156</td>
										<td>10153</td>
										<td>Mohammed Ayoub</td>
										<td>mohd.ayoub.nbc@gmail.com</td>
																				<td>Sudan</td>
										<td>464</td>
										<td>15</td>
										<td>2018-02-14 15:23:20</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="166">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>166</td>
										<td>10157</td>
										<td>Ahmed Mustafa</td>
										<td>nawawi.nbc@gmail.com</td>
																				<td>Sudan</td>
										<td>468</td>
										<td>15</td>
										<td>2018-03-12 12:26:38</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="182">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>182</td>
										<td>10172</td>
										<td>Hamid Makki</td>
										<td>ham.didannbc@gmail.com</td>
																				<td>Sudan</td>
										<td>485</td>
										<td>15</td>
										<td>2018-03-27 18:36:39</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="184">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>184</td>
										<td>10182</td>
										<td>Abdalmoaiz Abdalmajed</td>
										<td>moaiz.nbc@gmail.com</td>
																				<td>Sudan</td>
										<td>504</td>
										<td>15</td>
										<td>2018-03-31 14:24:33</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="186">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>186</td>
										<td>10174</td>
										<td>nf nf</td>
										<td>computer.programmer@ymail.com</td>
																				<td>Sudan</td>
										<td>490</td>
										<td>15</td>
										<td>2018-04-04 15:57:14</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="194">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>194</td>
										<td>10178</td>
										<td>Tahjod Hagar</td>
										<td>tah.hagar.nbc@gmail.com</td>
																				<td>Sudan</td>
										<td>494</td>
										<td>15</td>
										<td>2018-04-07 16:10:04</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="198">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>198</td>
										<td>10180</td>
										<td>Mohammed Elmustafa Salah</td>
										<td>moh.h.nbc@gmail.com</td>
																				<td>Sudan</td>
										<td>502</td>
										<td>15</td>
										<td>2018-04-11 06:55:06</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="200">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>200</td>
										<td>10183</td>
										<td>Nisreen Bashir</td>
										<td>nis.bashir.nbc@gmail.com</td>
																				<td>Sudan</td>
										<td>505</td>
										<td>15</td>
										<td>2018-04-12 22:09:02</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="201">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>201</td>
										<td>10184</td>
										<td>Elnazer Khamis</td>
										<td>nazer.nbc@gmail.com</td>
																				<td>Sudan</td>
										<td>506</td>
										<td>15</td>
										<td>2018-04-15 18:22:30</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="204">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>204</td>
										<td>10185</td>
										<td>Mohammed Elmustafa Salah jebril</td>
										<td>moh.jeb.nbc@gmail.com</td>
																				<td>Sudan</td>
										<td>507</td>
										<td>15</td>
										<td>2018-04-17 16:22:17</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="260">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>260</td>
										<td>10038</td>
										<td>Mohammed alraooof</td>
										<td>mohammedraoof9999@gmail.com</td>
																				<td>Sudan</td>
										<td>195</td>
										<td>15</td>
										<td>2018-08-28 15:14:54</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="316">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>316</td>
										<td>10154</td>
										<td>Adil Awad</td>
										<td>adilawad038@gmail.com</td>
																				<td>Sudan</td>
										<td>465</td>
										<td>15</td>
										<td>2018-08-28 15:14:55</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="322">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>322</td>
										<td>10195</td>
										<td>Tarig Mohammed</td>
										<td>tarigtibin94@gmail.com</td>
																				<td>Sudan</td>
										<td>560</td>
										<td>15</td>
										<td>2018-08-28 15:14:55</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="351">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>351</td>
										<td>10201</td>
										<td>Elrayah Sanhory</td>
										<td>elrayah.alsanhory@gmail.com</td>
																				<td>Sudan</td>
										<td>1000</td>
										<td>15</td>
										<td>2019-07-10 11:16:27</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="356">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>356</td>
										<td>10245</td>
										<td>Amar Eisa</td>
										<td>amarhaj7@gmail.com</td>
																				<td>Sudan</td>
										<td>1005</td>
										<td>15</td>
										<td>2019-07-18 10:43:06</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="357">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>357</td>
										<td>10246</td>
										<td>KHALED AL HABABI</td>
										<td>alkhalid2002@gmail.com</td>
																				<td>United Arab Emirates</td>
										<td>1006</td>
										<td>15</td>
										<td>2019-08-22 14:05:32</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="381">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>381</td>
										<td>10249</td>
										<td>Moufay Alsheilsh</td>
										<td>Moufayalsheilhh11@gmail.com</td>
																				<td>Sudan</td>
										<td>1009</td>
										<td>15</td>
										<td>2019-09-12 11:27:37</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="408">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>408</td>
										<td>10282</td>
										<td>Asrar Sabir</td>
										<td>asrarsabir@live.com</td>
																				<td>Sudan</td>
										<td>1044</td>
										<td>15</td>
										<td>2019-10-13 02:04:06</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="424">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>424</td>
										<td>10298</td>
										<td>Abulgasim Salim</td>
										<td>abuel_salih@yahoo.com</td>
																				<td>Sudan</td>
										<td>1163</td>
										<td>15</td>
										<td>2019-10-30 13:36:16</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="485">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>485</td>
										<td>10304</td>
										<td>Samah Awad Ibrahim Mohammed</td>
										<td>sama7.3awad@gmail.com</td>
																				<td>Sudan</td>
										<td>1275</td>
										<td>15</td>
										<td>2019-11-24 13:21:59</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="490">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>490</td>
										<td>10305</td>
										<td>Shayma Esmail Omer</td>
										<td>Shaymaomer567116@gmail.com</td>
																				<td>Sudan</td>
										<td>1317</td>
										<td>15</td>
										<td>2019-11-28 09:50:39</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="553">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>553</td>
										<td>10311</td>
										<td>alsir gamal</td>
										<td>seralkhatem332211@gmail.com</td>
																				<td>Sudan</td>
										<td>1528</td>
										<td>15</td>
										<td>2020-02-03 18:05:33</td>
										<td>Unpaid</td>
									</tr>
																															<tr>
											<th>
											<form method="POST" action="/pems/pendingmembers" accept-charset="UTF-8"><input name="_token" type="hidden" value="8wHqV4zCfk1ZIZjA3ILa3ylZxmjnogiI8HG8Nk8d">	
											<input name="id" type="hidden" value="682">
											<input class="btn btn-danger" type="submit" value="Delete">
											</form>
											</th>
										<td>682</td>
										<td>10316</td>
										<td>Khalid Mahgoub</td>
										<td>krarkhaid777@gmail.com</td>
																				<td>Sudan</td>
										<td>1569</td>
										<td>15</td>
										<td>2020-06-25 07:45:25</td>
										<td>Unpaid</td>
									</tr>
										
									
									</table>
							</div>

						</div>

					</div>
		</div>				
	</div>
</div> <!-- end of 12 -->
				


				


  
</div>
                             
 @endsection