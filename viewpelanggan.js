 function cek_pelanggan(input){
  var num = input.value;

   if(num.length > 5){
    alert('Anda Memasukan lebih dari 5 Digit');
	input.value = input.value.substring(0,input.value.length-1);
   }else if(num.length < 5){
     $('#loaddiv').html('&nbsp; Masukan MIN 5 Karakter')
   }
   else{
   $.post("ajaxnama.php", {
			datawp: num,
		}, function(response){		
			$('#namawp').html(response)
		});
	}
 }
  function cek_barang(input){
  var num = input.value;

   if(num.length > 5){
    alert('Anda Memasukan lebih dari 5 Digit');
	input.value = input.value.substring(0,input.value.length-1);
   }else if(num.length < 5){
     $('#loaddiv2').html('&nbsp; Masukan MIN 5 Karakter')
   }
   else{
   $.post("ajaxbarang.php", {
			databr: num,
		}, function(response){		
			$('#namabr').html(response)
		});
	}
 }
   function cek_barangjual(input){
  var num = input.value;

   if(num.length > 5){
    alert('Anda Memasukan lebih dari 5 Digit');
	input.value = input.value.substring(0,input.value.length-1);
   }else if(num.length < 5){
     $('#loaddiv2').html('&nbsp; Masukan MIN 5 Karakter')
   }
   else{
   $.post("ajaxbarangjual.php", {
			databrj: num,
		}, function(response){		
			$('#namabrj').html(response)
		});
	}
 }
   function cek_barangEOQ(input){
  var num = input.value;

   if(num.length > 5){
    alert('Anda Memasukan lebih dari 5 Digit');
	input.value = input.value.substring(0,input.value.length-1);
   }else if(num.length < 5){
     $('#loaddiv').html('&nbsp; Masukan MIN 5 Karakter')
   }
   else{
   $.post("ajaxbarangEOQ.php", {
			databrEOQ: num,
		}, function(response){		
			$('#namabrEOQ').html(response)
		});
	}
 }
  function cek_supplier(input){
  var num = input.value;

   if(num.length > 5){
    alert('Anda Memasukan lebih dari 5 Digit');
	input.value = input.value.substring(0,input.value.length-1);
   }else if(num.length < 5){
     $('#loaddiv').html('&nbsp; Masukan MIN 5 Karakter')
   }
   else{
   $.post("ajaxsupplier.php", {
			datasp: num,
		}, function(response){		
			$('#namasp').html(response)
		});
	}
 }

function hitungbiayasimpan(){
  bil1 = document.barang.harga_beli.value;
  var hasil = ((20 * eval(bil1)) / 100);
  document.barang.biaya_simpan.value=(hasil.toFixed(0));
}

function hitungeoq(){
bil1 = document.pjl.biaya_pesan.value;
bil2 = document.pjl.permintaanbrg.value;
bil3 = document.pjl.biaya_simpan.value;
bil4 = document.pjl.lead_time.value;
bil5 = document.pjl.harga_beli.value;
var hasil = (Math.sqrt((2 * (bil1 * bil2)) / bil3));
var rop = ((bil4 * bil2) / 12);
document.pjl.totaleoq.value=(hasil.toFixed(0));
document.pjl.totalrop.value=(rop.toFixed(0));
var toteoq = ((bil5 * hasil) + eval(bil1) + eval(bil3));
document.pjl.eoqtotal.value=(toteoq.toFixed(0));

  }
function hitung(){
bil1 = document.pjl.harga_jual.value;
bil2 = document.pjl.jumlah_beli.value;
var hasil = eval(bil1) * eval(bil2);
document.pjl.total_harga.value=(hasil);
  }
function hitungpenjualan(){
bil1 = document.pjl.harga_beli.value;
bil2 = document.pjl.jumlah_beli.value;
var hasil = eval(bil1) * eval(bil2);
document.pjl.total_harga.value=(hasil);
  }
function totalstok(){
bil1 = document.pjl.stok.value;
bil2 = document.pjl.jumlah_beli.value;
var hasil = eval(bil1)+eval(bil2);
document.pjl.total_stok.value=(hasil);
  }
function cek_stok(input){
st = document.pjl.stok.value;
bl = document.pjl.jumlah_beli.value;
var num = input.value;
var stk = eval(st);
var bli = eval(bl);
   if( stk < bli ){
    alert('STOK Tidak Memenuhi, Kurangi Jumlah Pembelian');
	input.value = input.value.substring(0,input.value.length-1);
   }
 }
function cek_isi(input){
bl = document.pjl.harga_jual.value;
var num = input.value;
var bli = eval(bl);
   if( bli <= 0 ){
    alert('Jumlah Beli Harus Lebih Dari 0');
	input.value = input.value.substring(0,input.value.length-num.length);
   }
 }
function cek_isipenjualan(input){
bl = document.pjl.harga_beli.value;
var num = input.value;
var bli = eval(bl);
   if( bli <= 0 ){
    alert('Jumlah Jual Harus Lebih Dari 0');
  input.value = input.value.substring(0,input.value.length-num.length);
   }
 }