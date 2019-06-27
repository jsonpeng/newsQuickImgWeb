

<!-- Type Field -->
<div class="form-group col-sm-8">
    {!! Form::label('type', '类型:') !!}
    {{-- {!! Form::text('type', null, ['class' => 'form-control']) !!} --}}
    <select name="type" class="form-control">
    	<option value="内容" @if(isset($heZuo) && $heZuo->type == '内容') selected="selected" @endif>内容</option>
    	<option value="战略" @if(isset($heZuo) && $heZuo->type == '战略') selected="selected" @endif>战略</option>
    </select>
</div>

<!-- Image Field -->
{{--  --}}

<div class="form-group col-sm-8">
                {!! Form::label('image', '合作图片:') !!}

                <div class="input-append">
                    {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
                    <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image')">选择图片</a>
                    <img src="@if(isset($heZuo)) {{ $heZuo->image }} @endif" style="max-width: 100%; max-height: 150px; display: block;">
                </div>

</div>

<div class="form-group col-sm-8">
    {!! Form::label('link', '合作链接:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('heZuos.index') !!}" class="btn btn-default">返回</a>
</div>
