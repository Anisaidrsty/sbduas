# sbduas
Dari Tugas UTS sebelumnya saya membuat sebuah sistem informasi klinik sederhana dimana dalam sistem tersebut saya akan menampilkan 
- Modul data pasien 

![image](https://user-images.githubusercontent.com/101643559/176889478-90c59706-f11b-4c2a-a7a9-852099866ae2.png)

Dalam tabel pasien saya bisa menambahkan, menghapus dan mengedit data.
Contohnya sebagai berikut :

- Edit

![image](https://user-images.githubusercontent.com/101643559/176889716-6a6b25de-b9bc-4803-ae1c-5dd32e76f4a6.png)

Saya merubah data pasien Anisa menjadi Ambar sari 

![image](https://user-images.githubusercontent.com/101643559/176889779-fe3418bb-3dde-4308-a8a9-5ebf5ae187d1.png)

- Tambah

Saya juga bisa Menambah data pasien sebagai berikut :

![image](https://user-images.githubusercontent.com/101643559/176890170-4d2d5f80-d835-4849-b907-f329494d7c17.png)

- Modul data Dokter

Seperti data pasien data dokter bisa di berikan perintah tamabah, hapus dan juga edit.

![image](https://user-images.githubusercontent.com/101643559/176890486-90d51983-8ed4-49a9-87a5-2283faf17b82.png)


- Modul data Obat

Di dalam modul data obat saya menambahkan Triger 

// IMPLEMENTASI TRIGGER

// table untuk trigger

create table log_obat(id_log int(100) auto_increment primary key, id_obat int(10), nama_obat_lama varchar(100), nama_obat_baru varchar(100), waktu date not null)
// trigger

create trigger update_nama_obat before update on obat for each row insert into log_obat set id_obat=old.id_obat, nama_obat_lama = old.nama_obat, nama_obat_baru=new.nama_obat, waktu = now();

// END IMPLEMENTASI TRIGGER

![image](https://user-images.githubusercontent.com/101643559/176890729-23275beb-8fdb-464f-a063-e1d8ab9c062c.png)

Fungsi dari triger disini untuk menampilkan perubahan nama obat setelah dilakukan proses update.

- Modul data user 

Modul data user dibuat untuk melakukan proses login 

![image](https://user-images.githubusercontent.com/101643559/176892214-7e61b8ad-c8be-40c5-899f-cd675d0ff6d3.png)

![image](https://user-images.githubusercontent.com/101643559/176892247-35d5c990-cddd-4fe4-8b82-0b8c0424e786.png)

Tampilan dashbor yang menampilkan informasi total data. Untuk menampikan total data tersebut saya mengimplementasikan fungsi sebagai berikut :

CREATE FUNCTION `fn_totalUsers`() RETURNS INT(11) UNSIGNED NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER RETURN (SELECT COUNT(id_pasien) FROM pasien)

![image](https://user-images.githubusercontent.com/101643559/176892382-ea1ce487-e5b9-415a-8667-9be09e1b9833.png)

- implementasi view 

// IMPLEMENTASI VIEW

CREATE VIEW viewPenyakit AS SELECT a.id_berobat, b.nama_pasien, b.jenis_kelamin, b.umur, a.keluhan_pasien, a.hasil_diagnosa, a.tgl_berobat, c.nama_dokter FROM berobat a JOIN pasien b ON a.id_pasien=b.id_pasien JOIN dokter c ON a.id_dokter=c.id_dokter WHERE b.jenis_kelamin='L'

// END IMPLEMENTASI VIEW

<img width="835" alt="image" src="https://user-images.githubusercontent.com/101643559/176894418-8795e2c9-1304-4c5a-8ba7-705e3700dd11.png">



