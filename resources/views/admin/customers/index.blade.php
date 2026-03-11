@extends('layouts.admin')

@section('title', 'Quản lý khách hàng - AutoLux Admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold">Danh sách khách hàng</h1>
        <a href="{{ route('admin.customers.create') }}" class="flex items-center gap-2 bg-primary text-primary-foreground px-4 py-2 rounded-xl font-bold hover:shadow-lg transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Thêm khách hàng
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    <div class="bg-card border rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-muted/50 border-b">
                        <th class="px-6 py-4 text-left font-medium text-muted-foreground">Khách hàng</th>
                        <th class="px-6 py-4 text-left font-medium text-muted-foreground">Thông tin liên hệ</th>
                        <th class="px-6 py-4 text-left font-medium text-muted-foreground">Địa chỉ</th>
                        <th class="px-6 py-4 text-left font-medium text-muted-foreground">Số đơn hàng</th>
                        <th class="px-6 py-4 text-left font-medium text-muted-foreground">Ngày tham gia</th>
                        <th class="px-6 py-4 text-right font-medium text-muted-foreground">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($customers as $customer)
                    <tr class="hover:bg-muted/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-muted flex items-center justify-center overflow-hidden">
                                     @if($customer->avatar)
                                        <img src="{{ Str::startsWith($customer->avatar, 'http') ? $customer->avatar : Storage::url($customer->avatar) }}" alt="" class="w-full h-full object-cover">
                                    @else
                                        <span class="font-bold text-muted-foreground">{{ substr($customer->name, 0, 1) }}</span>
                                    @endif
                                </div>
                                <span class="font-bold">{{ $customer->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium">{{ $customer->email }}</p>
                            <p class="text-xs text-muted-foreground">{{ $customer->phone ?? 'Chưa cập nhật' }}</p>
                        </td>
                        <td class="px-6 py-4 max-w-xs truncate" title="{{ $customer->address }}">
                            {{ $customer->address ?? 'Chưa cập nhật' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-primary/10 text-primary">
                                {{ $customer->contracts_count }} đơn
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $customer->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.customers.edit', $customer) }}" class="p-2 hover:bg-muted rounded-lg transition-colors text-blue-600" title="Chỉnh sửa">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                </a>
                                <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản này? Thao tác này không thể hoàn tác.')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-muted rounded-lg transition-colors text-destructive" title="Xóa">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-muted-foreground">Chưa có khách hàng nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($customers->hasPages())
        <div class="p-4 border-t">
            {{ $customers->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
