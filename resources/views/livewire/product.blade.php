<div>
    @if ($products->count())
        <div class="d-flex justify-content-center mt-7">
            <table class="table-striped table-sm col-md-12 text-center">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama Product</th>
                        <th class="border px-4 py-2">Stock Product</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody wire:poll="refresh">
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
                                <div class="d-flex align-items-lg-center">
                                    <a href="dashboard/#" class="badge bg-primary"><span data-feather="eye"></span></a>
                                    <a href="/dashboard/update/{{ $product->id }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form method="POST" action="/dashboard/delete/{{ $product->id }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="badge badge-danger bg-danger border-0 show_confirm" data-toggle="tooltip" title='Delete'><span data-feather="x-circle"></span></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <input type="hidden" id="idA" wire:model="confirm">
            </table>
        </div>
    @else
        <div class="d-flex justify-content-center" style="margin-top:100px; opacity:65%"><h2 class="">Belum Ada Produk Yang Diposting</h2></div>
    @endif
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
            title: 'Lanjutkan?',
            text: "Anda Akan Menghapus Produk dan Postingannya",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Saja',
            cancelButtonText: 'Tidak, Jangan Hapus',
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Berhasil',
                'Product Berhasil Terhapus',
                'success'
                )
                form.submit();
            }
            })
        });
    </script>
</div>
