@extends('layouts.main')
@section('container')
<table id="cart" class="table table-hover table-condensed">
    <thead>
    <tr>
        <th style="width:50%">Product</th>
        <th style="width:10%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Subtotal</th>
        <th style="width:20%">Action</th>
    </tr>
    </thead>
    
    <tbody>
    <?php $total = 0; ?>
        @if (session('cart'))
            @foreach (session('cart') as $id => $details)
                <?php $total += $details['harga'] * $details['quantity']; ?>
                <tr>
                    <td data-th="product">
                        {{-- @if ($details['image'] > 1) --}}
                        @foreach (explode(',',$details['image']) as $item)
                            <img src="{{ asset('storage/' . $item) }}" class="mySlides" alt="{{ $details['product_name'] }}" style="float: left" height="200px" width="250px">
                        @endforeach
                        {{-- <img src="{{ $details['image'] }}" alt="{{ $details['product_name'] }}" style="float: left" height="200px" width="250px"> --}}
                        {{-- @else --}}
                        {{-- @endif --}}
                        <h4 style="font-weight: bold; font-size: 200%">{{ $details['product_name'] }}</h4>
                    </td>
                    <td data-th="harga">Rp. {{ number_format($details['harga'], 0,",",".") }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity">
                    </td>
                    <td class="text-center" data-th="Subtotal">Rp. {{ number_format($details['harga'] * $details['quantity'], 0,",",".") }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}" style="font-weight: bold"><i class="fa fa-refresh"></i> Update</button>
                        <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
        
    </tbody>
    <tfoot>
        <tr>
            <td><a href="/" class="btn btn-primary">Home</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Belanja Rp.{{ number_format($total, 0,",",".") }}</strong></td>
        </tr>
    </tfoot>

    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                        
                    }
                });
            }
        });

        var slideIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > x.length) {slideIndex = 1}
                x[slideIndex-1].style.display = "block";
                setTimeout(carousel, 2000);
            }
    </script>

@endsection