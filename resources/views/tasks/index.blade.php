@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <h1>قائمة المهام اليومية</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-success">إضافة مهمة جديدة</a>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($tasks->isEmpty())
    <div class="alert alert-warning text-center">
        لا توجد مهام حالياً.
    </div>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>العنوان</th>
                <th>الوصف</th>
                <th>تاريخ الاستحقاق</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
