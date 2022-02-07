<div>
    @if ($products->count())
        <div class="d-flex justify-content-center" style="margin-top:100px">
            <table class="table-striped table-sm col-md-8 text-center">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama Product</th>
                        <th class="border px-4 py-2">Stock Product</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $product->product_name }}</td>
                            <td class="border px-4 py-2">
                                <button style="border: none; background-color:transparent; font-size:22px" wire:click="plus({{$product}}, {{ $loop->index }})">+</button>
                                {{ $qty[$loop->index] }}
                                <button style="border: none; background-color:transparent; font-size:24px" wire:click="min({{$product}}, {{ $loop->index }})">-</button>
                            </td>
                            <td class="border px-4 py-2">
                                <a href="/dashboard/update/{{ $product->id }}" class="badge bg-warning">Edit</a>
                                <form action="/dashboard/delete/{{ $product->id }}" method="post" class="d-inline">
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    @else
        <div class="d-flex justify-content-center" style="margin-top:100px; opacity:65%"><h2 class="">Belum Ada Produk Yang Diposting</h2></div>
    @endif
</div>
