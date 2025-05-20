@extends('layouts.app')

@section('content')

    <div class="header">
        <div class="background">
            <img class="" src="{{ asset('assets/images/vector-1.png') }}" width="60%" alt="text">
        </div>
        <div class="center" style="position: absolute; top:0">
            <img src="{{ asset('assets/images/rabbani_school_uniform.png') }}" width="50%" alt="text" style="margin-left: 20px">
            <img src="{{ asset('assets/images/disc_20.png') }}" alt="discount" width="50%">
        </div>
        <div class="vector">
            <img src="{{ asset('assets/images/sun.png') }}" class="badge-sun" width="25%" alt="sun">
            <img src="{{ asset('assets/images/badge-putih.png') }}" class="badge-putih" width="15%" alt="putih">
            <img src="{{ asset('assets/images/badge-pangsi.png') }}" class="badge-pangsi" width="15%" alt="pangsi">
            <img src="{{ asset('assets/images/badge-pramuka.png') }}" class="badge-pramuka" width="15%" alt="pramuka">
            <img src="{{ asset('assets/images/badge-kebaya.png') }}" class="badge-kebaya" width="15%" alt="kebaya">
        </div>
        
       
    </div>    
    
    <div class="container">
        <img class="center mt-3" src="{{ asset('assets/images/biodata.png') }}" alt="biodata" width="30%">
        <div class="row mx-auto">
            <div class="col-md">
                <form action="{{route('seragam.store')}}"  method="POST" id="simpan_seragam">
                    @csrf
                    <div class="form-floating mt-3">
                        <input class="form-control form-control-sm" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan Nama Pemesan" required>
                        <label for="nama_pemesan" class="form-label">Nama Ayah/Bunda</label>
                    </div>


                    <div class="form-floating mt-3">
                        <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Whatsapp" required>
                        <label for="no_hp" class="form-label">No Whatsapp</label>
                    </div>

                    <div class="center my-4">
                        <img src="{{ asset('assets/images/katalog_produk_tk.png') }}" alt="discount" width="50%">
                    </div>

                    <div class="d-grid-card" >
                        @foreach ($produk_seragam as $item)
                            @if($item->jenjang_id == 2)
                            <div class="card">
                                <img src="{{ asset('assets/images/'.$item->image) }}" class="card-img-top" alt="{{$item->image}}">
                                <div class="card-body center">
                                    <h6 class="card-title ">{{$item->nama_produk}}</h6>
                                    <p class="mb-0"> Rp. {{number_format($item->harga_awal)}} </p>
                                    <span class="mt-2"> Ukuran </span>
                                    <div class="d-flex" style="justify-content: center">
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}"  id="uk_s_{{$item->id}}" value="S">
                                            <label class="form-check-label" for="uk_s_{{$item->id}}">
                                            <span>S </span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_m_{{$item->id}}" value="M">
                                            <label class="form-check-label" for="uk_m_{{$item->id}}">
                                            <span>M </span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_l_{{$item->id}}" value="L">
                                            <label class="form-check-label" for="uk_l_{{$item->id}}">
                                            <span>L </span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_xl_{{$item->id}}" value="XL">
                                            <label class="form-check-label" for="uk_xl_{{$item->id}}">
                                                <span>XL</span>
                                            </label>
                                        </div>
                                    </div>
                                    <span class="mb-0 text-danger" style="font-size: 10px; display: none" id="valid_ukuran_{{$item->id}}" > Pilih ukuran terlebih dahulu! </span>

                                    <button type="button"  class="btn btn-primary btn-sm mt-2 px-3" id="btn-order-{{$item->id}}" onclick="openModal({{$item->id}})">Add to Cart</button>
                                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn" id="remove-btn-{{$item->id}}" style="display: none"><i class="fas fa-trash" aria-hidden="true"></i> Remove Cart</button>

                                    
                                    <div class="quantity" id="quantity_{{$item->id}}" style="display: none">
                                        <div class="d-flex  mt-3">
                                            <p class="mt-1" style="font-size: 13px"> Jumlah </p>
                                            <div class="input-group" style="border: none; justify-content:end">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-outline-plus-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$item->id}}]">
                                                        <i class="fas fa-minus-circle"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="quant[{{$item->id}}]" id="quant_{{$item->id}}" class="input-number" min="1" max="10">
                                                {{-- <input type="hidden" name="qty_id[]" value=""> --}}
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-outline-plus-minus btn-number" data-type="plus" data-field="quant[{{$item->id}}]">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="center my-4">
                        <img src="{{ asset('assets/images/katalog_produk_sd.png') }}" alt="discount" width="50%">
                    </div>

                    <div class="d-grid-card" >
                        @foreach ($produk_seragam as $item)
                            @if($item->jenjang_id == 3)
                            <div class="card">
                                <img src="{{ asset('assets/images/'.$item->image) }}" class="card-img-top" alt="{{$item->image}}">
                                <div class="card-body center">
                                    <h6 class="card-title ">{{$item->nama_produk}}</h6>
                                    <p> Rp. {{number_format($item->harga_awal)}} </p>
                                    <span> Ukuran </span>
                                    <div class="d-flex" style="justify-content: center">
                                        <div class="button-ukuran" >
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}"  id="uk_s_{{$item->id}}" value="S">
                                            <label class="form-check-label" for="uk_s_{{$item->id}}">
                                            <span>    S </span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_m_{{$item->id}}" value="M">
                                            <label class="form-check-label" for="uk_m_{{$item->id}}">
                                            <span>    M </span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_l_{{$item->id}}" value="L">
                                            <label class="form-check-label" for="uk_l_{{$item->id}}">
                                            <span>    L </span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_xl_{{$item->id}}" value="XL">
                                            <label class="form-check-label" for="uk_xl_{{$item->id}}">
                                                <span>    XL </span>
                                            </label>
                                        </div>
                                    </div>
                                    <span class="mb-0 text-danger" style="font-size: 10px; display: none" id="valid_ukuran_{{$item->id}}" > Pilih ukuran terlebih dahulu! </span>

                                    <button type="button"  class="btn btn-primary btn-sm mt-2 px-3" id="btn-order-{{$item->id}}" onclick="openModal({{$item->id}})">Add to Cart</button>
                                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn" id="remove-btn-{{$item->id}}" style="display: none"><i class="fas fa-trash" aria-hidden="true"></i> Remove Cart</button>

                                    
                                    <div class="quantity" id="quantity_{{$item->id}}" style="display: none">
                                        <div class="d-flex  mt-3">
                                            <p class="mt-1" style="font-size: 13px"> Jumlah </p>
                                            <div class="input-group" style="border: none; justify-content:end">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-outline-plus-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$item->id}}]">
                                                        <i class="fas fa-minus-circle"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="quant[{{$item->id}}]" id="quant_{{$item->id}}" class="input-number" min="1" max="10">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-outline-plus-minus btn-number" data-type="plus" data-field="quant[{{$item->id}}]">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="center my-4">
                        <img src="{{ asset('assets/images/katalog_produk_smp.png') }}" alt="discount" width="50%">
                    </div>

                    <div class="d-grid-card" >
                        @foreach ($produk_seragam as $item)
                            @if($item->jenjang_id == 4)
                            <div class="card">
                                <img src="{{ asset('assets/images/'.$item->image) }}" class="card-img-top" alt="{{$item->image}}">
                                <div class="card-body center">
                                    <h6 class="card-title ">{{$item->nama_produk}}</h6>
                                    <p> Rp. {{number_format($item->harga_awal)}} </p>
                                    <span> Ukuran </span>
                                    <div class="d-flex" style="justify-content: center">
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}"  id="uk_s_{{$item->id}}" value="S">
                                            <label class="form-check-label" for="uk_s_{{$item->id}}">
                                            <span>S</span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_m_{{$item->id}}" value="M">
                                            <label class="form-check-label" for="uk_m_{{$item->id}}">
                                            <span>M</span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_l_{{$item->id}}" value="L">
                                            <label class="form-check-label" for="uk_l_{{$item->id}}">
                                            <span>L</span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_xl_{{$item->id}}" value="XL">
                                            <label class="form-check-label" for="uk_xl_{{$item->id}}">
                                                <span>XL</span>
                                            </label>
                                        </div>
                                    </div>
                                    <span class="mb-0 text-danger" style="font-size: 10px; display: none" id="valid_ukuran_{{$item->id}}" > Pilih ukuran terlebih dahulu! </span>

                                    <button type="button"  class="btn btn-primary btn-sm mt-2 px-3" id="btn-order-{{$item->id}}" onclick="openModal({{$item->id}})">Add to Cart</button>
                                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn" id="remove-btn-{{$item->id}}" style="display: none"><i class="fas fa-trash" aria-hidden="true"></i> Remove Cart</button>

                                    
                                    <div class="quantity" id="quantity_{{$item->id}}" style="display: none">
                                        <div class="d-flex  mt-3">
                                            <p class="mt-1" style="font-size: 13px"> Jumlah </p>
                                            <div class="input-group" style="border: none; justify-content:end">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-outline-plus-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$item->id}}]">
                                                        <i class="fas fa-minus-circle"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="quant[{{$item->id}}]" id="quant_{{$item->id}}" class="input-number" min="1" max="10">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-outline-plus-minus btn-number" data-type="plus" data-field="quant[{{$item->id}}]">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="center my-4">
                        <img src="{{ asset('assets/images/katalog_produk_bani.png') }}" alt="discount" width="75%">
                    </div>

                    <div class="d-grid-card" >
                        @foreach ($produk_seragam as $item)
                            @if($item->jenjang_id == 5)
                            <div class="card">
                                <img src="{{ asset('assets/images/'.$item->image) }}" class="card-img-top" alt="{{$item->image}}">
                                <div class="card-body center">
                                    <h6 class="card-title ">{{$item->nama_produk}}</h6>
                                    <p> Rp. {{number_format($item->harga_awal)}} </p>
                                    <span> Ukuran </span>
                                    <div class="d-flex" style="justify-content: center">
                                        <div class="button-ukuran btn-bani">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}"  id="uk_xs_{{$item->id}}" value="XS">
                                            <label class="form-check-label" for="uk_xs_{{$item->id}}">
                                            <span style="font-size: 13px" >XS</span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran btn-bani">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}"  id="uk_s_{{$item->id}}" value="S">
                                            <label class="form-check-label" for="uk_s_{{$item->id}}">
                                            <span style="font-size: 13px" >S</span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran btn-bani">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_m_{{$item->id}}" value="M">
                                            <label class="form-check-label" for="uk_m_{{$item->id}}">
                                            <span style="font-size: 13px" >M</span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran btn-bani">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_l_{{$item->id}}" value="L">
                                            <label class="form-check-label" for="uk_l_{{$item->id}}">
                                            <span style="font-size: 13px" >L</span>
                                            </label>
                                        </div>
                                        <div class="button-ukuran btn-bani">
                                            <input class="form-check-input" type="radio" name="ukuran_{{$item->id}}" id="uk_xl_{{$item->id}}" value="XL">
                                            <label class="form-check-label" for="uk_xl_{{$item->id}}">
                                                <span style="font-size: 13px" >XL</span>
                                            </label>
                                        </div>
                                    </div>
                                    <span class="mb-0 text-danger" style="font-size: 10px; display: none" id="valid_ukuran_{{$item->id}}" > Pilih ukuran terlebih dahulu! </span>

                                    <button type="button"  class="btn btn-primary btn-sm mt-2 px-3" id="btn-order-{{$item->id}}" onclick="openModal({{$item->id}})">Add to Cart</button>
                                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn" id="remove-btn-{{$item->id}}" style="display: none"><i class="fas fa-trash" aria-hidden="true"></i> Remove Cart</button>

                                    
                                    <div class="quantity" id="quantity_{{$item->id}}" style="display: none">
                                        <div class="d-flex  mt-3">
                                            <p class="mt-1" style="font-size: 13px"> Jumlah </p>
                                            <div class="input-group" style="border: none; justify-content:end">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-outline-plus-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$item->id}}]">
                                                        <i class="fas fa-minus-circle"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="quant[{{$item->id}}]" id="quant_{{$item->id}}" class="input-number" min="1" max="10">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-outline-plus-minus btn-number" data-type="plus" data-field="quant[{{$item->id}}]">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>

                    <input type="hidden" name="data" id="data" value="">

                    <div class="mt-3 center">
                        <button type="submit" class="btn btn-primary" id="btn-submit"> Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $('.btn-number').click(function(e){
            e.preventDefault();
            
            fieldName = $(this).attr('data-field');
            type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if(type == 'minus') {
                    
                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    } 
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if(type == 'plus') {

                    if(currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if(parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {
            
            minValue =  parseInt($(this).attr('min'));
            maxValue =  parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());
            
            name = $(this).attr('name');
            if(valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if(valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            
            
        });
        $(".input-number").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) || 
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                        // let it happen, don't do anything
                        return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
        });

        var pesanan = [];

        function openModal(item_id) {
            var ukuran = $('input[name="ukuran_'+item_id+'"]:checked').val();
            if (ukuran == '' || ukuran == null || ukuran == undefined) {
                $('#valid_ukuran_'+item_id).show();
            } else {
                $("#produk_id_terpilih").val(item_id);
                $('#valid_ukuran_'+item_id).hide();
                $('#form_detail').modal('show');
            }
        }

        function addToCart() {
            var new_pesanan = {};
            var item_id = $("#produk_id_terpilih").val();
            var ukuran = $('input[name="ukuran_'+item_id+'"]:checked').val();
            var nama = $("#nama_siswa").val();
            var lokasi = $("#lokasi").val();
            var kelas = $("#kelas").val();
            if (nama == '') {
                $('#alert_nama').show()
            } else if (lokasi == null) {
                $('#alert_sekolah').show()
            } else if (kelas == '') {
                $('#alert_kelas').show()
            } else {
                new_pesanan['nama_siswa'] = $("#nama_siswa").val();
                new_pesanan['kelas'] = $("#kelas").val();
                new_pesanan['lokasi'] = $("#lokasi").val();
                new_pesanan['produk_id'] = item_id;
                new_pesanan['ukuran'] = ukuran;
                pesanan.push(new_pesanan);
                // console.log(pesanan);
                $('#alert_nama').hide()
                $('#alert_sekolah').hide()
                $('#alert_kelas').hide()

                $('#form_detail').modal('hide');
                $('#quantity_'+item_id).show();
                $('#quant_'+item_id).val(1);
    
                $('#data').val(JSON.stringify(pesanan));
                $('#btn-order-'+item_id).hide();
    
                $('#remove-btn-'+item_id).show();
                $('#remove-btn-'+item_id).attr('onclick', "remove_cart('"+item_id+"')");
            }
        }

        function remove_cart (item_id) {
            pesanan = pesanan.filter(data => data.produk_id !== item_id);
            $('#btn-order-'+item_id).show();
            $('#remove-btn-'+item_id).hide();
            $('#quantity_'+item_id).hide();


            $('#data').val(JSON.stringify(pesanan));
            // console.log(pesanan);

        }


        $(document).ready(function() {
            $("#btn-submit").click(function() {
                // disable button
                $(this).prop("disabled", true);
                // add spinner to button
                $(this).html(
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                $("#simpan_seragam").submit();
            });
        });
      
    </script>
@endsection

<div class="modal fade" id="form_detail" tabindex="-1" role="dialog" aria-labelledby="member_rbn" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="member_rbn">Untuk Siapa Seragam Ini</h5>
            </div>
            <div class="modal-body">
                <div class="form-floating mt-3">
                        <input class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa" required>
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <span id="alert_nama" class="text-danger" style="font-size: 10px; display:none;">Isi nama terlebih dahulu </span>
                </div>

                <div class="form-floating mt-3">
                    <select name="lokasi" id="lokasi" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Sekolah --</option>
                        @foreach ($lokasi as $item)
                            <option value="{{ $item->kode_lokasi }}"> {{ $item->sublokasi }}</option>
                        @endforeach
                    </select>
                    <label for="lokasi" class="form-label">Sekolah</label>
                    <span id="alert_sekolah" class="text-danger" style="font-size: 10px; display:none;">Isi Sekolah terlebih dahulu </span>
                </div>

                <div class="form-floating mt-3">
                    <input class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
                    <label for="kelas" class="form-label">Nama Kelas (contoh: 2 Badar)</label>
                    <span id="alert_kelas" class="text-danger" style="font-size: 10px; display:none;">Isi Kelas terlebih dahulu </span>
                </div>

                <input type="hidden" id="produk_id_terpilih">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" onclick="addToCart()">Simpan</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>