@extends('layouts.main')
@section('headC')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection
@section('container')
@include('partials/navbar')
    <style>
        .container {
            padding-top: 150px;
        }
        .image {
            width: 400px; 
            height: 300px;
            position: sticky;
            top: 150px;
            float: left;
            margin-right: 10px;
        }
        
        .detail-top h6 {
            margin-top: 10px;
            display: flex;
        }

        .detail-top {
            padding-left: 430px;
        }

        .detail-mid p {
            margin: 0 auto;
            width: 700px;
        }

        .detail-mid {
            padding-left: 430px;
        }
        
        .detail-bot {
            padding-left: 430px;
            margin-bottom: 30px;
        }
        
        .detail-bot img {
            float: left;
            margin-right: 10px;
        }
    </style>
    <div class="container">
        
        <a href="/" style="float: right; text-decoration: none" class="text-muted">Kembali?</a>
        <div class="image">
            @php
                $image = explode(',',$product->image)[0];
            @endphp
            <input type="hidden" id="image-source" value="{{ asset('storage/'.$image) }}">
            @foreach (explode(',',$product->image) as $item)
                <img src="{{ asset('storage/' . $item) }}" class="mySlides" alt="{{ $product->product_name }}">
            @endforeach
            <div class="text-center">
                <label for="stok">Quantity</label>
                <div class="mb-3 d-flex justify-content-center flex-row">
                    <button class="btn btn-primary decrement-btn2">-</button>
                    <input type="text" name="stok" class="form-control qty-input2" value="1" style="width: 50px; background-color: white" disabled>
                    <button class="btn btn-primary increment-btn2">+</button>
                </div>
            </div>
        </div>
    
        <div class="product-content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At sapiente voluptates voluptatibus eum nisi obcaecati ab assumenda nesciunt praesentium velit eos, fugit ratione tempore amet quae asperiores in non nostrum modi similique molestiae aspernatur consequuntur iure? Recusandae quibusdam, inventore hic totam molestiae quidem nobis saepe asperiores minima repudiandae ab culpa modi! Sed ipsa aspernatur temporibus culpa tenetur incidunt officiis magnam, at corporis maiores ab nam ea eius aliquam enim id voluptates. Repellat consequuntur facere nisi? Maxime ipsum iste illo inventore modi ea quo excepturi eos. Saepe quo delectus amet a molestiae, tempora voluptate veniam nesciunt at harum magnam eum, fuga molestias ut nam id eveniet tenetur qui praesentium modi corrupti laborum officia. Fugit ratione temporibus obcaecati officia necessitatibus rerum dolorem unde possimus consectetur sequi, eius ut libero, eligendi illo sed inventore quam, voluptatibus magnam. Aspernatur mollitia dolore ea ipsam similique excepturi corrupti assumenda expedita, recusandae eos cupiditate ullam quasi cumque, pariatur, iusto dolor nisi deserunt neque tempore aliquam harum repudiandae unde! Numquam, quos. Autem, voluptatibus consequatur obcaecati tempora perferendis vel ut eaque mollitia dicta rerum! Facere, voluptas reprehenderit. At repellat perspiciatis dolorum rem ratione fugiat reiciendis aliquid illum. Rem vitae repellat vero harum nemo sit porro. Eius error nulla labore accusantium aspernatur voluptatum modi est, in sapiente aliquid? Quod ab voluptates doloremque beatae, itaque ipsum nesciunt sequi sit hic debitis perferendis ad! Cupiditate accusantium sequi dolorum odio. Vero, perspiciatis quasi? Vel consequatur necessitatibus accusamus! Natus minima suscipit ab corrupti sapiente harum sit esse adipisci ducimus! Necessitatibus assumenda maiores quos, unde quidem voluptatum velit, mollitia non error recusandae tempora fuga in rerum aliquam ratione ad ex autem ipsa debitis explicabo consequatur! Sapiente inventore quibusdam, ea facilis ipsa esse, fugiat delectus natus laboriosam a corrupti voluptas pariatur odio porro deserunt dignissimos nobis obcaecati. Debitis saepe veritatis iste odit nesciunt omnis, hic porro. Et repellendus molestias sunt earum expedita dolorem sit minima, delectus enim? Et fugiat amet ipsam optio inventore accusamus exercitationem doloribus blanditiis similique tempora, quos incidunt dicta nam hic, nulla delectus, error quidem. Ipsam dolores sapiente voluptatum numquam, nobis cum? Eveniet repellat maxime cupiditate fuga, et doloremque inventore. Quos, omnis saepe temporibus quia nisi impedit consectetur hic iusto repudiandae. Laborum iusto architecto dicta quae delectus! Enim veniam magnam ad deserunt a quod blanditiis iure dolorem impedit error nisi fugit accusantium sunt, omnis aliquam adipisci culpa. Accusamus repellat soluta error eius culpa iusto corrupti dolore eos harum esse, voluptas similique vero doloribus numquam ad, dolores inventore magni nihil perspiciatis explicabo iste aspernatur mollitia. Eos quis, pariatur labore officiis quasi dicta sed ea eaque voluptatibus quos laboriosam nostrum optio facilis explicabo aliquam debitis qui, expedita nobis possimus minima, totam iure. Quos harum modi libero temporibus dignissimos beatae sapiente voluptatem. Voluptas sapiente quod similique cupiditate asperiores nulla, enim perspiciatis quo placeat suscipit consequuntur velit vitae provident magnam iusto laborum voluptatem veritatis commodi. Asperiores, non sint consequuntur dolore velit consectetur recusandae in necessitatibus quos, unde quaerat tempore. Eveniet, est atque assumenda ab, laudantium debitis nemo itaque voluptas consectetur ullam exercitationem labore eos, laborum temporibus ipsam.
        </div>
    </div>

    <div class="product-add">
    
    </div>

    <div class="product-comment">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis error corporis, minima provident, reiciendis architecto numquam praesentium aliquam ipsam fugiat, veniam sit! Sapiente maxime magnam pariatur debitis, architecto molestiae ipsum! Id sunt debitis quis nemo explicabo eos molestias. Atque voluptas ut minima amet. Minus, ipsum sapiente quo numquam neque dolorem aliquam eos perferendis ea dicta nihil sit illum excepturi consequuntur velit at. Magnam obcaecati sunt amet maiores laboriosam ducimus sint consequatur voluptatibus. Voluptatum, quas. Animi velit ex perferendis. Nostrum excepturi sit reprehenderit eum distinctio iusto animi, quos delectus non, est sunt suscipit, ea sed ut. Animi vero error, voluptatem nulla reiciendis aspernatur tempora facere quasi eaque? Mollitia veniam beatae officiis illo, commodi dolorem? Architecto quisquam consequatur quia sint saepe provident minus deserunt, fugiat quidem placeat numquam aliquid suscipit similique nostrum vitae perspiciatis dolores, culpa aliquam repellat consequuntur tempora consectetur est! Inventore iste tempore natus ipsa perferendis id. Debitis reiciendis sit fuga quis sapiente iste facere illo, quasi repellat aut placeat explicabo at delectus. Aliquid aut facilis, atque dolorem optio obcaecati facere minus unde, sed illo quasi officia eligendi. Accusamus velit atque exercitationem ducimus sequi doloribus temporibus praesentium, dolor dolorem expedita explicabo vel consequuntur omnis corrupti voluptatem, nisi incidunt. Quos minima ad est tenetur exercitationem corrupti, distinctio provident id, nulla nisi nesciunt praesentium totam molestias ipsum explicabo labore voluptate nobis tempora fugiat deserunt. Alias sit debitis dolorem tenetur dignissimos dolore officia iure dolorum quae ducimus, repellat quas? Dolorem saepe iste ratione sunt quaerat soluta doloremque rerum aliquid accusantium, quas eaque impedit praesentium animi asperiores optio incidunt voluptates laudantium corrupti rem deleniti? At quis recusandae odit ipsa sit nesciunt in animi eos corrupti assumenda reprehenderit iure harum veritatis laboriosam eaque libero, illo quos quod! Quidem dolorum inventore, excepturi quis nobis vitae non at voluptatem, aliquid hic magnam molestiae debitis maxime nisi dignissimos animi aperiam quibusdam incidunt qui quas? Quibusdam veritatis quasi rem optio ea recusandae distinctio, saepe minus, reprehenderit incidunt sit in quos consectetur perferendis aliquid illum fuga numquam, nisi soluta nemo earum ab inventore libero! Magnam, voluptate esse necessitatibus distinctio provident ut laudantium doloribus odit. Praesentium laborum quasi et dolorem labore ratione ipsum laboriosam minus maiores molestias. Inventore corrupti natus animi aliquam odio! Impedit alias illum voluptates quasi, inventore et delectus ipsa reiciendis dignissimos, explicabo quis iste ad beatae perferendis provident asperiores? Quasi mollitia corrupti, reiciendis praesentium aliquam aspernatur architecto officiis doloremque ex consequuntur beatae temporibus. Totam error minima quaerat suscipit sint atque quis repudiandae aspernatur, sunt consectetur eius reiciendis necessitatibus quod laborum cum nulla quasi dolores assumenda doloremque aliquid distinctio est illum at veritatis! Animi obcaecati odit fugiat ea modi, autem voluptatum laborum tempora numquam fuga, nihil reprehenderit non eius harum explicabo placeat delectus repellat ab minus ad! Beatae doloremque repudiandae iusto consectetur vero aut tempore architecto iure totam eos unde tempora deleniti, quidem cupiditate laboriosam accusantium sequi nemo quos aperiam facilis harum, reprehenderit laborum veniam? Minus, ea in nesciunt accusantium sequi tempora voluptate voluptatibus odit voluptatem error a! Sapiente atque nemo exercitationem et eveniet rem sint, pariatur officia sit quibusdam ipsa minus incidunt odio soluta quos eos sequi minima similique tempore repudiandae praesentium! Consequatur perspiciatis molestiae corporis neque est similique, architecto tenetur vitae hic fugit non aliquam expedita aut facere inventore voluptatem dolorum repudiandae earum obcaecati nihil quam quidem delectus cum. Eligendi labore possimus iste. Aliquam impedit iure officiis quod fugit earum unde rerum perferendis atque. Expedita aut perferendis saepe fugit excepturi, magnam, cupiditate vitae quae est laborum soluta asperiores, nam cum corporis odio vero nobis! Perspiciatis labore ipsa aperiam sunt quia hic alias quasi mollitia ipsam. Impedit velit veritatis ducimus voluptates culpa magnam odit iusto? Est voluptatibus commodi, nulla ratione amet repudiandae qui hic quis iste ducimus iusto laborum tenetur fugiat consectetur magni illo, tempora, similique quibusdam provident sequi maxime officia voluptatem debitis at? Incidunt aliquam facilis accusantium? Laboriosam, molestias, sint facere culpa aliquam dicta maiores consequatur in iste commodi facilis minima quam, voluptate at nesciunt? Enim recusandae, quos officia illum aut asperiores necessitatibus! Corrupti non consequatur unde assumenda reprehenderit veritatis facilis? Ratione enim eligendi, exercitationem fugit corrupti aliquam nihil a molestias debitis! Doloribus, obcaecati? Aspernatur consectetur expedita nisi itaque similique sit fugiat dignissimos eum amet ex dolorum commodi quia quisquam quasi, magni totam molestias nemo minima tempora est necessitatibus? Beatae eveniet tenetur nemo amet. Blanditiis dolore velit rem quisquam exercitationem! Voluptates explicabo eaque eos ipsam, laboriosam eius dignissimos corporis incidunt. Vel pariatur omnis soluta veritatis quidem ipsa earum modi inventore. Dolorem quo magni sint vero aspernatur culpa debitis. Fuga, cum provident natus vero animi illo quibusdam, aut rem minima delectus doloremque? Architecto illum quibusdam, tenetur iusto eligendi neque nostrum amet vitae est nihil sunt nam officiis ducimus nemo ipsa aut laboriosam quis ab quod temporibus odio? Provident facilis eos eveniet. Culpa omnis facilis, eos qui laboriosam ratione ullam obcaecati minima illum, fuga eligendi excepturi adipisci eaque velit cupiditate recusandae, earum consequuntur rem. Odit, accusantium doloremque unde eius debitis dolores mollitia et assumenda quae eveniet, molestias labore sed id, voluptatibus illo consequuntur sequi fugiat deserunt reprehenderit alias nostrum! Nobis nihil aliquid magnam asperiores dolores harum ea illum rerum sed commodi nostrum deserunt ipsum ex quam numquam, minus perspiciatis et sit, distinctio vitae earum eveniet! Quas natus reiciendis velit rerum quidem provident quasi adipisci, at omnis non culpa nostrum unde, corrupti quo illo molestiae mollitia, architecto dolorum veniam officiis quisquam odio. Ex id necessitatibus porro fugiat reprehenderit corrupti. Omnis, sed, cum corrupti vel perferendis mollitia aperiam ducimus consequatur id, earum dolorem fugit accusantium quia voluptate vitae odit? Magni inventore accusamus facilis libero ratione impedit enim, eius placeat non vel maxime delectus tempore iste odio, eos molestias suscipit iure laudantium dolor earum sit! Necessitatibus voluptate quas magnam qui fuga dolorem deserunt illo asperiores, recusandae voluptas error quidem quo assumenda. Quae eius quos iure, laborum voluptatem veritatis aut explicabo ex aliquid voluptates obcaecati voluptatibus! Fuga enim dolor, praesentium nobis ducimus, obcaecati minima asperiores quis illum impedit esse in quasi veniam dolores iusto mollitia distinctio eligendi vero aliquam, officiis corporis earum quod? Odio illum odit sapiente id explicabo beatae repellendus exercitationem vitae!
    </div>
</div>


@endsection
@section('script')
<script>
$(document).ready(function () {
    $('#addToCartBtn').click(function (e) { 
        let products_qty = $('.qty-input2').val();
        let image = $('#image-source').val();
        let name = '{{ $product->product_name }}';
        let harga = '{{ $product->harga }}';
        let id = '{{ $product->id }}';

        function nDots(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

<<<<<<< HEAD
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'products_id' : '{{ $product->id }}',
                    'products_qty' : products_qty,
                },
                dataType: "json",
                success: function (response) {
                    if(response.status === "Produk Berhasil Ditambahkan Ke Keranjang"){
                        $('#card-body').append(
                            `
                            <div class="product_data mt-3" style="width:100; display:flex; justify-content:flex-end;">
                                <div class="col-md-2">
                                    <img src="`+ image +`" alt="`+ name +`">
                                </div>
                                <div class="col-md-3 my-auto ms-3">
                                    <h3>`+ name +`</h3>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h3>Rp.`+ nDots(harga) +`</h3>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <div class="text-center">
                                        <label for="stok">Quantity</label>
                                        <div class="mb-3 d-flex justify-content-center flex-row" id="qty">
                                            <input type="hidden" class="products_id" value="`+ id +`">
                                            <input type="hidden" class="harga_product" value="`+ harga +`">
                                            <input type="hidden" class="stok_product" value="`+ qty +`">
                                            <button class="btn btn-primary decrement-btn rounded-0">-</button>
                                            <input type="text" name="stok" class="text-center form-control qty-input rounded-0" value="`+ products_qty +`" style="width: 50px; background-color: white; width:70px">
                                            <button class="btn btn-primary increment-btn rounded-0 me-3">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `
                        );
                        window.totalHarga += (products_qty * harga);
                        $('.total-harga').html(nDots(totalHarga));
                        Swal.fire(response.status);
                    }else{
                        Swal.fire(response.status);
                    }
                }
            });
        });
        
        $('.increment-btn2').click(function (e) { 
            e.preventDefault();
            let qty = parseInt('{{ $product->stok }}');
            var inc_value = $('.qty-input2').val();
            var value = parseInt(inc_value);
            value = isNaN(value) ? 0 : value;
            if(qty > value){
                value++;
                $('.qty-input2').val(value);
            }
        });
        
        $('.decrement-btn2').click(function (e) { 
            e.preventDefault();
            var dec_value = $('.qty-input2').val();
            var value = parseInt(dec_value);
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value--;
                $('.qty-input2').val(value);
            }
        });
        window.totalHarga += (products_qty * harga);
        $('.total-harga').html(nDots(totalHarga));
    });
    
    $('.increment-btn2').click(function (e) { 
        e.preventDefault();

        let qty = parseInt('{{ $product->stok }}');
        var inc_value = $('.qty-input2').val();
        var value = parseInt(inc_value);
        value = isNaN(value) ? 0 : value;
        if(qty > value){
            value++;
            $('.qty-input2').val(value);
        }
    });
    
    $('.decrement-btn2').click(function (e) { 
        e.preventDefault();
        var dec_value = $('.qty-input2').val();
        var value = parseInt(dec_value);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $('.qty-input2').val(value);
        }
    });
});
</script>
@endsection
