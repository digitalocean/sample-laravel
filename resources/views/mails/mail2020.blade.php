<!--<h1>Mail body goes  here</h1>
<p>pass here anything you want inside $data array in your controller.</p>-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #D70B1A;
            color: #FFF;
        }

            .information1 {
            background-color: #D70B1A;
            border:2px;
            color: #FFF;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 15px;
        }

        .information1 table {
            padding: 10px;
        }
        .information1 table h2 {
             background-color: #fff;
            border:2px;
            color: #000;
        }

    </style>

</head>
<body>

<div class="information1">
    <table width="20%">
    <tr><td><h1>NBC</h1></td><td><h2>Nazlawi Business College</h2></td></tr>
    </table>
</div>


<br><br>
<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>{{Auth::user()->name}}</h3>
                <pre>
        Street 15
        123456 City
        United Kingdom
        <br /><br />
        Date: 2018-01-01
        Identifier: {{Auth::user()->name}}
        Status: Paid
        </pre>


            </td>
            <td align="center">
                <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>NBC Nazlawi Business College</h3>
                <pre>
                    https://acpaglobal.net

                    Street 26
                    123456 Kafuri
                    Sudan
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Invoice specification #123</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Item 1</td>
            <td>1</td>
            <td align="left">€15,-</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">€15,-</td>
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Company Slogan
            </td>
        </tr>

    </table>
</div>
</body>
</html>
<div class="panel-heading">Member Details Section</div>
			<div class="panel-body">
                <form action="/sendmail2020" method="POST" role="search">
                    {{ csrf_field() }}
					<div class="form-grounp">
					<label for="memberid">Enter the Member ID below, or select from the list. </label>
                    <input type="text" class="form-control" name="user_id" value="1015" placeholder="user_id"> <span class="input-group-btn">
                     			</div>
					<div class="form-grounp">
					<input name="client_name" type="text" value="client_name">
					<input name="email" type="text" value="s@s.s">
					<input class="btn btn-success" type="submit" value="Get Member">
					</div>
				</form>
			</div>
		</div>
<!-- { !! Form::open(['route' => 'sendmail2020']) !!}

        <!--//@ include('ross.receiptsfields')-->


<!-- Name Field -- >
<div class="form-group">
    { !! Form::label('user_id', 'user_id:') !!}
    { !! Form::text('user_id', $account->id, ['class' => 'form-control']) !!}
</div>
<!--<div class="form-group">
             { {Form::label('subject_id', 'Subject')}}<br>
            { !! Form::select('subject_id', array('1' => 'Advance Accountant','2' => 'Advance Accountant',
            'Client' => 'Client', 'Business Partner ' => 'Business Partner ',
            'Teacher / Lecturer / Trainer' => 'Teacher / Lecturer / Trainer', 'Friend / Family' => 'Friend / Family', 'Other' => 'Other'), 'S'); !!}
            </div>-- >

<div class="form-group">
    { !! Form::label('client_name', 'client_name :') !!}
    { !! Form::text('client_name', 'Ahmed', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    { !! Form::label('email', 'email :') !!}
    { !! Form::text('email', 's@s.s', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    { !! Form::label('subject', 'subject :') !!}
    { !! Form::text('subject', 'subject TEST', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field
<div class="form-group col-sm-12">
    { !! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{ { route('roles.index') }}" class="btn btn-default">Cancel</a>
</div>
        <p>Some text in the modal.</p> -- >
      </div>
      <div class="modal-footer">

        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> - ->
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        { !! Form::submit('Create mail', ['class' => 'btn btn-success']) !!}
      </div>
    </div>
{ !! Form::close() !!}-->
