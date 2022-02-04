<div>
    <div class="d-flex justify-content-center" style="margin-top:100px">
        <table class="table-striped table-sm col-md-8 text-center">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Product</th>
                    <th class="border px-4 py-2">Qty</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $product->product_name }}</td>
                        <td class="border px-4 py-2">
                            <button style="border: none; background-color:transparent; font-size:22px" wire:click="plus({{ $loop->index }})">+</button>
                            {{ $qty[$loop->index] }}
                            <button style="border: none; background-color:transparent; font-size:24px" wire:click="min({{ $loop->index }})">-</button>
                        </td>
                        <td class="border px-4 py-2">
                            <a href="/dashboard/edit/{{ $product->id }}" class="badge bg-warning">Edit</a>
                            <form action="/dashboard/delete/{{ $product->id }}" method="post" class="d-inline">
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    @if ($indicator)
                        <th class="px-4 py-2" colspan="3"><div class="d-flex justify-content-end" style="margin-left: 20px"><button class="btn btn-success" wire:click="save">Simpan</button><button class="btn btn-danger" wire:click="remove" style="margin-left: 20px">Buang</button></div></th>
                    @endif
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
