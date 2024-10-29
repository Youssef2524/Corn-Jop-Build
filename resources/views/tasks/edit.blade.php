@extends('layouts.app')

@section('content')
<h1>تعديل المهمة</h1>

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">العنوان</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
    </div>

    <div class="form-group">
        <label for="description">الوصف</label>
        <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="due_date">تاريخ الاستحقاق</label>
        <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $task->due_date }}">
    </div>
    
    <div class="form-group">
                <label for="status_{{ $task->id }}">الحالة</label>
                <select name="status" id="status_{{ $task->id }}" class="form-control" data-task-id="{{ $task->id }}">
                    <option value="" disabled>اختر الحالة</option>
                    <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

       
    </div>

    <button type="submit" class="btn btn-primary">تحديث المهمة</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">إلغاء</a>
</form>
@endsection
