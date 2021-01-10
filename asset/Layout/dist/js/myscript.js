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
}