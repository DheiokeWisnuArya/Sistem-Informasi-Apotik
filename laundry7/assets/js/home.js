var nomor = 0;
var test = document.getElementById('test');
function prev() {
	nomor--;
	if (nomor < 0) nomor = 3;
	info();
}
function next() {
	nomor++;
	if (nomor > 3) nomor = 0;
	info();
}
function info(){
	var link = 'res/info' + nomor + '.jpg';
	test.src = link;
	return false;
}
var Y = 0;
var jarak = 20;
function scrol(id){
	var target = document.getElementById(id).offsetTop;

	var anim = setTimeout(function() {scrol(id);}, 10);
	Y = Y + jarak;
	if (Y >= target) {
		clearTimeout(anim);
		Y = 0;
	} else {
		window.scroll(0, Y);
	}
	return false;
}
function hpspel(link){	
	mscConfirm("Hapus Pelanggan ?",function(){
		window.location = 'pelanggan.php?pnometer=' + link;
	});
}
function aktfpel(link){	
	mscConfirm("Aktifkan kembali Pelanggan ?",function(){
		window.location = 'recovery.php?pnometer=' + link;
	});
}
function hpstar(link){	
	mscConfirm("Hapus tarif ?",function(){
		window.location = 'tarif.php?trf=' + link;
	});
}
function hpspgn(link){	
	mscConfirm("Hapus Penggunaan ?",function(){
		window.location = 'penggunaan.php?pgn=' + link;
	});
}
function hpsptgs(link){	
	mscConfirm("Hapus Petugas ?",function(){
		window.location = 'petugas.php?hps=' + link;
	});
}
function aktif(link){	
	mscConfirm("Aktifkan petugas ?",function(){
		window.location = 'petugas.php?id=' + link + '&aktf=1';
	});
}
function nonaktif(link){	
	mscConfirm("NonAktifkan petugas ?",function(){
		window.location = 'petugas.php?id=' + link + '&aktf=0';
	});
}
// document.addEventListener("DOMContentLoaded", function() {
// 	var hapusbtn = document.querySelector("#hapus");
// 	demobtn.addEventListener("click", function() {
//           mscConfirm("De?",function(){
//             mscAlert("Post deleted");
//             window.location = "apapapapa";
//           });
//         });
// }