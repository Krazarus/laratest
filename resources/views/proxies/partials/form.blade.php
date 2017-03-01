<div class="form-group">
    {{  Form::select('status', array(
    'enabled' => 'enabled',
    'disabled' => 'disabled'
    ), null ,array('class'=>'form-control')) }}
</div>

<div class="form-group">

    {{ Form::submit($buttonText, ['class'=>'btn btn-success']) }}

</div>