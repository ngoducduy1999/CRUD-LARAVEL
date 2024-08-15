@extends('layouts.admin')

@section('content')

    <h1>Danh sách Biến thể của sản phẩm: {{ $product->name }}</h1>

    <a href="{{ route('admin.product_items.create', $product) }}" class="btn btn-primary mb-3">Tạo Biến thể</a>

    @if ($items->count())
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SKU</th>
                    <th>Số lượng trong kho</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Tùy chọn Biến thể</th> <!-- Thêm cột cho tùy chọn biến thể -->
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->sku }}</td>
                        <td>{{ $item->qty_in_stock }}</td>
                        <td>{{ number_format($item->price, 2) }} đ</td>
                        <td>
                            @if ($item->product_image)
                                <img src="{{ asset('storage/' . $item->product_image) }}" alt="{{ $item->sku }}" width="100">
                            @else
                                Không có hình ảnh
                            @endif
                        </td>
                        <td>
                            <!-- Hiển thị các tùy chọn biến thể -->
                            @foreach ($item->variationOptions as $option)
                                <span class="badge bg-info">{{ $option->value }}</span>
                            @endforeach
                        </td>
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.product_items.edit', [$product, $item]) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('admin.product_items.destroy', [$product, $item]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa biến thể này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $items->links() }} <!-- Phân trang nếu cần -->
    @else
        <p>Không có biến thể nào.</p>
    @endif

@endsection
