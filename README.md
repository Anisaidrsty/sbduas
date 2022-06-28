# sbduas
![image](https://user-images.githubusercontent.com/101643559/176197223-383eb957-083a-41bd-8ef8-04485baf54a3.png)

Implementasi Fungsi dalam Sql 
// IMPLEMENTASI FUNCTION (untuk menampilkan total pasien pada halaman http://localhost/klinikanisa/home/home.php)
CREATE FUNCTION `fn_totalUsers`() RETURNS INT(11) UNSIGNED NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER RETURN (SELECT COUNT(id_pasien) FROM pasien)
// END IMPLEMENTASI FUNCTION



// IMPLEMENTASI TRIGGER
// table untuk trigger
create table log_obat(id_log int(100) auto_increment primary key, id_obat int(10), nama_obat_lama varchar(100), nama_obat_baru varchar(100), waktu date not null)
// trigger
create trigger update_nama_obat before update on obat for each row insert into log_obat set id_obat=old.id_obat, nama_obat_lama = old.nama_obat, nama_obat_baru=new.nama_obat, waktu = now();
// END IMPLEMENTASI TRIGGER



// IMPLEMENTASI VIEW
CREATE VIEW viewPenyakit AS SELECT a.id_berobat, b.nama_pasien, b.jenis_kelamin, b.umur, a.keluhan_pasien, a.hasil_diagnosa, a.tgl_berobat, c.nama_dokter FROM berobat a JOIN pasien b ON a.id_pasien=b.id_pasien JOIN dokter c ON a.id_dokter=c.id_dokter WHERE b.jenis_kelamin='L'
// END IMPLEMENTASI VIEW



