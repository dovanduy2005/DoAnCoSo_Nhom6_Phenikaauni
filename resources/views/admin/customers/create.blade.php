@extends('layouts.admin')

@section('title', 'Thêm khách hàng mới - AutoLux Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.customers.index') }}" class="p-2 hover:bg-muted rounded-xl transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </a>
        <h1 class="text-3xl font-bold">Thêm khách hàng mới</h1>
    </div>

    <form action="{{ route('admin.customers.store') }}" method="POST" class="space-y-8">
        @csrf
        
        <div class="bg-card p-6 rounded-xl border shadow-sm space-y-6">
            <h2 class="font-bold text-lg border-b pb-4">Thông tin cá nhân</h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-medium text-sm">Họ và tên <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                    @error('name') <p class="text-destructive text-xs">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="font-medium text-sm">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                    @error('email') <p class="text-destructive text-xs">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="font-medium text-sm">Số điện thoại</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                    @error('phone') <p class="text-destructive text-xs">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="font-medium text-sm">Địa chỉ</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                    @error('address') <p class="text-destructive text-xs">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="bg-card p-6 rounded-xl border shadow-sm space-y-6">
            <h2 class="font-bold text-lg border-b pb-4">Mật khẩu</h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-medium text-sm">Mật khẩu <span class="text-red-500">*</span></label>
                    <input type="password" name="password" required class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                    @error('password') <p class="text-destructive text-xs">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="font-medium text-sm">Xác nhận mật khẩu <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" required class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.customers.index') }}" class="px-6 py-2 rounded-xl border font-bold hover:bg-muted transition-colors">Hủy bỏ</a>
            <button type="submit" class="px-6 py-2 rounded-xl bg-primary text-primary-foreground font-bold hover:shadow-lg transition-all">Lưu thông tin</button>
        </div>
    </form>
</div>
@endsection
