const regis = $('.regist').data('regist');
const invalid = $('.invalidlogin').data('invalid');
const notactive = $('.noactive').data('noactive');
const falsepass = $('.falsepass').data('falsepass');
const suclogin = $('.successlogin').data('successlogin');
const suclogout = $('.successlogout').data('successlogout');

if(regis){
    Swal.fire({
        title: "Silahkan Login!!",
        text: 'Anda Berhasil ' + regis,
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
}