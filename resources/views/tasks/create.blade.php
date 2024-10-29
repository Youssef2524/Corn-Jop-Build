@extends('layouts.app')

@section('content')
<h1>إضافة مهمة جديدة</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">العنوان</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">الوصف</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="due_date">تاريخ الاستحقاق</label>
        <input type="date" name="due_date" id="due_date" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">إضافة المهمة</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">إلغاء</a>
</form>
@endsection
