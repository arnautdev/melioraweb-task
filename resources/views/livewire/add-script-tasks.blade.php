@php
    /**
     * @var \App\Models\AdScriptTask $task
     */
@endphp
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>{{__('Created at')}}</th>
        <th>{{__('Updated at')}}</th>
        <th>{{__('Status')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($adTasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->created_at}}</td>
            <td>{{$task->updated_at}}</td>
            <td>{{$task->status->label()}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
