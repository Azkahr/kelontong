<div>
    <div class="d-flex justify-content-center" style="margin-top:100px">
        <table class="table-striped table-sm col-md-8 text-center">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Product</th>
                    <th class="border px-4 py-2">Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $product->product_name }}</td>
                        <td class="border px-4 py-2"><button wire:model="check" wire:click="plus({{ $loop->index }}, {{ $product->id }})">+</button>{{ $qty[$loop->index] }}<button wire:model="check" wire:click="min({{ $loop->index }}, {{ $product->id }})">-</button></td>
                    </tr>
                @endforeach
                <tr>
                    @if ($check)
                        <th class="px-4 py-2" colspan="3"><div class="d-flex justify-content-end" style="margin-left: 20px"><button class="btn btn-success" wire:click="debug">Simpan</button><button class="btn btn-danger" wire:click="remove" style="margin-left: 20px">Buang</button></div></th>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>
