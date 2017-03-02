<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, array('class'=>'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email', null, array('class'=>'form-control')) }}
</div>


<div class="form-group">
    {{  Form::select('role', array(
    'admin' => 'admin',
    'customer' => 'customer',
    'user' => 'user'), null ,array('class'=>'form-control')) }}
</div>

<div class="form-group">

    {{ Form::submit($buttonText, ['class'=>'btn btn-success']) }}

</div>