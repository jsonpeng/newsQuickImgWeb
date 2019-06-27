<table class="table table-responsive" id="heZuos-table">
    <thead>
        <tr>
            <th>合作类型</th>
            <th>合作图</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($heZuos as $heZuo)
        <tr>
            <td>{!! $heZuo->type !!}</td>
            <td><img src='{!! $heZuo->image !!}' style="max-width: 80px;height: auto;" /></td>
            <td>
                {!! Form::open(['route' => ['heZuos.destroy', $heZuo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('heZuos.show', [$heZuo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('heZuos.edit', [$heZuo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>