const regis = $('.regist').data('regist');
const invalid = $('.invalidlogin').data('invalid');
const notactive = $('.noactive').data('noactive');
const falsepass = $('.falsepass').data('falsepass');
const suclogin = $('.successlogin').data('successlogin');
const suclogout = $('.successlogout').data('successlogout');
const falseoldpass = $('.falseoldpass').data('falseoldpass');
const notmatchnew = $('.notmatchnew').data('notmatchnew');
const sukses = $('.sukses').data('sukses');
const done = $('.done').data('done');
const activate = $('.activate').data('activate');
const add = $('.add').data('add');
const image = $('.image').data('image');
const update = $('.update').data('update');
const del = $('.delete').data('delete');
const cart = $('.cart').data('cart');
const keranjang = $('.keranjang').data('cart');
const pesanan = $('.pesanan').data('pesanan');

if(regis){
    Swal.fire({
        title: "Anda Berhasil "  + regis,
        text: 'Mohon Verifikasi Akun Anda Lebih Dulu, Silahkan Cek Email Anda',
        type: 'success',
        icon: 'success'
    });
}else if(invalid){
    Swal.fire({
        title: "Gagal Masuk!!",
        text: 'User ' + invalid,
        type: 'warning',
        icon: 'warning'
    });
}else if(notactive){
    Swal.fire({
        title: "Gagal Masuk!!",
        text: 'Anda ' + notactive,
        type: 'warning',
        icon: 'warning'
    });
}else if(falsepass){
    Swal.fire({
        title: "Gagal Masuk!!",
        text: 'Password ' + falsepass,
        type: 'warning',
        icon: 'warning'
    });
}else if(suclogin){
    Swal.fire({
        title: 'Selamat Datang ' + suclogin,
        text: 'Berhasil Login',
        type: 'success',
        icon: 'success'
    });
}else if(suclogout){
    Swal.fire({
        title: 'Berhasil ' + suclogout,
        type: 'success',
        icon: 'success'
    });
}else if(falseoldpass){
    Swal.fire({
        title: 'Gagal Ubah Password',
        text: falseoldpass,
        type: 'warning',
        icon: 'warning'
    });
}else if(notmatchnew){
    Swal.fire({
        title: 'Gagal Ubah Password',
        text: notmatchnew,
        type: 'warning',
        icon: 'warning'
    });
}else if(sukses){
    Swal.fire({
        title: 'Password ' + sukses,
        type: 'success',
        icon: 'success'
    });
}else if(done){
    Swal.fire({
        title : 'Request ' + done,
        type: 'success',
        text: 'Mohon Tunggu Hingga Request Sedang Diproses',
        icon: 'success'
    });
}else if(activate){
    Swal.fire({
        title : 'Aktifasi Berhasil',
        type: 'success',
        text: activate + 'Telah Diverifikasi dan Diaktifkan! Silahkan Login',
        icon: 'success'
    });
}else if(add){
    Swal.fire({
        title : 'Berhasil',
        type: 'success',
        text: 'Produk Berhasil ' + add,
        icon: 'success'
    });
}else if(image){
    Swal.fire({
        title : 'Berhasil',
        type: 'success',
        text: 'Foto Produk Berhasil ' + image,
        icon: 'success'
    });
}else if(update){
    Swal.fire({
        title : 'Berhasil',
        type: 'success',
        text: 'Produk Berhasil ' + update,
        icon: 'success'
    });
}else if(del){
    Swal.fire({
        title : 'Berhasil',
        type : 'success',
        text : 'Produk Berhasil ' + del,
        icon : 'success'
    });
}else if(cart){
    Swal.fire({
        title : 'Berhasil',
        type : 'success',
        text : 'Menu ' + cart + ' Keranjang',
        icon : 'success'
    });
}else if(keranjang){
    Swal.fire({
        title : 'Berhasil',
        type : 'success',
        text : 'Menu ' + keranjang + ' Keranjang',
        icon : 'success'
    });
}else if(pesanan){
    Swal.fire({
        title : 'Pesanan Mu Berhasil ' + pesanan,
        type : 'success',
        text : 'Mohon Ditunggu',
        icon : 'success'
    });
}


//tombol hapus product

$('.tombol-hapus').on('click',function(e){
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Product Akan Dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Product'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});