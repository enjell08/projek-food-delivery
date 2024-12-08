<?php

namespace App\Controllers;
use App\Models\M_belajar;
use App\Models\M_pesanan;
use TCPDF;


class Home extends BaseController
{


    public function index()
    {
        return view('welcome_message');
    }
    public function detail()
    {
        return view('detail');
    }
    public function profile()
    {
        echo view ('header');
        echo view('users-profile');
    }
    public function login()
    {
        echo view('pages-login');
    }
    public function regis()
    {
        echo view('regis');
    }

    public function aksi_register()
    {
        
        $b=$this->request->getPost('username');
        $c=$this->request->getPost('password');
        $d=$this->request->getPost('level');
        $Joyce= new M_belajar();
        $data = array(
            "username"=>$b,
            "password"=>MD5($c),
            "level"=>$d
        );
        $Joyce->input('user',$data);
        $cek = $Joyce->getWhere('user', $data);
        if ($cek != null) {
            session()->set('id', $cek->id_user);
            session()->set('u', $cek->username);
            session()->set('level', $cek->level);

            //penulisan kode array isinya pakai $cek[isinya]//
            return redirect ()->to('home/dashboard');
        }else{
            return redirect ()->to('home/login');
        }
    }
    public function aksi_login()
    {
        $a=$this->request->getPost('username');
        $b=$this->request->getPost('password');

        $Jocye=new M_belajar;
        $data = array(
            'username' => $a,
            'password' => MD5($b),
        );
        $cek = $Jocye->getWhere('user', $data );
        if ($cek != null) {

            session()->set('id' , $cek->id_user); 
            session()->set('u' ,$cek->username); 
            session()->set('level'  ,$cek->level); 

            return redirect()->to('home/dashboard') ;
        }else{
            return redirect()->to('home/login');
        }     
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('home/login');
    }
    
    public function dashboard()
    {
     $Jocye = new M_belajar;
    $data['takdirestui'] = $Jocye->getMenuItems(); // Ambil data menu makanan
    echo view('header');
    echo view('menu');
    echo view('dashboard', $data); // Kirim data ke view dashboard
    echo view('footer');
}

public function pesanan()
{

    $Jocye= new M_belajar;
    $where= ('id_pesanan');
    $wendy['takdirestui'] = $Jocye->tampil('pesanan', $where);
    echo view('header');
    echo view('menu');
    echo view('pesanan', $wendy);
    echo view('footer');

}

public function order()
{
    $Jocye = new M_belajar;
    $where=('id_order');
    $wendy['takdirestui'] = $Jocye->tampil('order', $where);
    echo view('header');
    echo view('menu');
    echo view('order', $wendy);
    echo view('footer');
}



public function transaksi()
{

    $Jocye= new M_belajar;
    $where= ('id_transaksi');
    $wendy['takdirestui'] = $Jocye->tampil('transaksi', $where);
    echo view('header');
    echo view('menu');
    echo view('transaksi', $wendy);
    echo view('footer');

}

public function nota()
{

    $Jocye= new M_belajar;
    $wendy['takdirestui'] = $Jocye->tampil('nota');
    echo view('header');
    echo view('menu');
    echo view('nota', $wendy);
    echo view('footer');

}
public function user()
{
    $Jocye= new M_belajar;
    $where=('id_user');
    $wendy['takdirestui']=$Jocye->tampil('user', $where);
    echo view('header');
    echo view('menu');
    echo view('user', $wendy);
    echo view('footer');
}




public function menu()
{
    $Jocye = new M_belajar;
    $where=('id_makanan');
    $wendy['takdirestui'] = $Jocye->tampil('makanan', $where);
    echo view('header');
    echo view('menu');
        echo view('tablemenu', $wendy);  // Menampilkan data di view karyawan
        echo view('footer');
    }
    public function inputmenu()
    {

        $Jocye= new M_belajar;
        $where=('id_makanan');
        $wendy['takdirestui'] = $Jocye->tampil('makanan', $where);
        echo view('header');
        echo view('menu');
        echo view('inputmenu', $wendy);
        echo view('footer');
    }
    public function simpan_menu()
    {
        $model = new M_belajar();

        // Ambil data dari form input
        $makanan = $this->request->getPost('makanan');
        $kode = $this->request->getPost('kode');
        $jenis = $this->request->getPost('jenis');
        $status = $this->request->getPost('status');
        $harga = $this->request->getPost('harga');
        $fileFoto = $this->request->getFile('foto'); // Input file untuk foto

        // Pindahkan foto ke folder tujuan
        $newFileName = $fileFoto->getRandomName(); // Generate nama file acak
        $fileFoto->move(WRITEPATH . '../public/img/', $newFileName);

        // Susun data untuk disimpan di database
        $data = [
            'nama_menu' => $makanan,
            'kode_menu'=>$kode,
            'jenis_makanan' => $jenis,
            'status' => $status,
            'harga' => $harga,
            'foto' => $newFileName, // Nama file yang disimpan
        ];

        // Simpan data ke database
        $model->input('makanan', $data);

        // Redirect ke halaman menu dengan pesan sukses
        return redirect()->to('home/menu')->with('success', 'Menu berhasil disimpan dengan foto.');
    }
    public function hapus_menu($id)
    {
        $Jocye= new M_belajar;
        $wece = array('id_makanan' => $id );
        $wendy['takdirestui']=$Jocye->hapus('makanan', $wece);
        return redirect()->to('home/menu');
    }
    public function editmenu($id)
    {
        $Jocye= new M_belajar;
        $wece = array('id_makanan' => $id );
        $wendy['takdirestui']=$Jocye->getWhere('makanan', $wece); //ini nama databasenya
        echo view('header');
        echo view('menu');
        echo view('emenu', $wendy); //ini nama file view nya
        echo view('footer');
    }

    public function simpan_edit_menu()
    {
        $Jocye= new M_belajar;
        $a=$this->request->getPost('nama');
        $b=$this->request->getPost('jenis');
        $c= $this->request->getPost('status');
        $d= $this->request->getPost('harga');
        $e=$this->request->getPost('kode');
        $fileFoto = $this->request->getFile('foto');
        $id=$this->request->getPost('idmkn');
        

        // Pindahkan foto ke folder tujuan
        $newFileName = $fileFoto->getRandomName(); // Generate nama file acak
        $fileFoto->move(WRITEPATH . '../public/img/', $newFileName);

        $Jocye= new M_belajar;
        $wece = array('id_makanan' => $id );
        $data =array(
         "kode_menu"=>$e,
         "nama_menu"=>$a,
         "jenis_makanan"=>$b,
         "status"=>$c,
         "harga"=>$d,
         'foto' => $newFileName,
     );
        print_r($data);
        $Jocye->edit('makanan', $data, $wece);
        return redirect ()->to('home/menu');
    }


    public function kry()
    {

        $Jocye = new M_belajar;
        $wendy['takdirestui'] = $Jocye->join('karyawan', 'user', 'karyawan.id_user = user.id_user');
        echo view('header');
        echo view('menu');
        echo view('karyawan', $wendy);  // Menampilkan data di view karyawan
        echo view('footer');
    }
public function tkry()
{
    $Jocye= new M_belajar;
    $where=('id_user');
    $wendy['takdirestui']=$Jocye->tampil('user', $where);
    echo view('header');
    echo view('menu');
    echo view('tbkry', $wendy);
    echo view('footer');
}
public function aksi_kry()
{
 $a=$this->request->getPost('nama');
 $b=$this->request->getPost('nik');
 $c= $this->request->getPost('username');
 $d= $this->request->getPost('pass');
 $e= $this->request->getPost('level');
 $f= $this->request->getPost('tempat');
 $g= $this->request->getPost('tanggal');
 $h= $this->request->getPost('jk');
 $i= $this->request->getPost('alamat');
 $j= $this->request->getPost('nohp');
 $k= $this->request->getPost('jabatan');
 $Jocye=new M_belajar(); 
 $data= array(
    "username" =>$c,
    "password"=>MD5($d),
    "level" =>$e,
);
 $Jocye->input('user', $data);
 $wece= array(
    "username" =>$c,
);
 $wendy=$Jocye->getWhere('user', $wece);
 $data2=array(
    "id_user"=>$wendy->id_user,
    "nama"=>$a,
    "nik"=>$b,
    "tempat_lahir"=>$f,
    "tanggal_lahir"=>$g,
    "alamat"=>$i,
    "jenis_kelamin"=>$h,
    "no_handphone"=>$j,
    "jabatan"=>$k,
);
 $Jocye->input('karyawan', $data2);
 return redirect()->to('home/kry');
}

public function editkaryawan($id)
{
    $Jocye= new M_belajar;
    $wece = array('karyawan.id_user' => $id );
    $wendy['takdirestui']=$Jocye->joinw('karyawan', 'user',
     'karyawan.id_user = user.id_user',
     $wece); 
    echo view('header');
    echo view('menu');
    echo view('ekaryawan', $wendy); 
    echo view('footer');
}
public function hapus_karyawan($id)
{
    $Jocye= new M_belajar;
    $wece = array('id_user' => $id );
    $Jocye->hapus('karyawan', $wece);
    $Jocye->hapus('user', $wece);
    return redirect()->to('home/kry');
}

public function simpan_karyawan()
{
    $model= new M_belajar();
    $where = array('id_user' => $this->request->getPost('idu') );

    $data= array(
        'username' =>$this->request->getPost('username'),
        MD5('password') =>$this->request->getPost('password'),
        'level' =>$this->request->getPost('level'),
    );
    $model->edit('user', $data, $where);

    $where = array("username" => $this->request->getPost('username'));
    $wendy = $model->getWhere('user', $where); 
    $Jocye = array('id_karyawan' => $this->request->getPost('idkry'));

    $data2 = array(
        'id_user' => $wendy->id_user,
        'nama'=>$this->request->getPost('nama'),
        'nik'=>$this->request->getPost('nik'),
        'tanggal_lahir'=> $this->request->getPost('tanggal'),
        'tempat_lahir'=> $this->request->getPost('tempat'),
        'alamat'=> $this->request->getPost('alamat'),
        'no_handphone'=> $this->request->getPost('hp'),
        'jenis_kelamin'=> $this->request->getPost('jk'),
        'jabatan'=> $this->request->getPost('jabatan'),
    ); 
    $model->edit('karyawan', $data2, $Jocye);
    return redirect()->to('/home/kry');
}



public function cus()
{
    $Jocye = new M_belajar;
    $wendy['takdirestui'] = $Jocye->join('customer', 'user', 'customer.id_user = user.id_user');
    echo view('header');
    echo view('menu');
        echo view('cus', $wendy);  // Menampilkan data di view karyawan
        echo view('footer');
    } 
    public function tcus()
    {
        $Jocye= new M_belajar;
        $where=('id_user');
        $wendy['takdirestui']=$Jocye->tampil('user', $where);
        echo view('header');
        echo view('menu');
        echo view('tbcus', $wendy);
        echo view('footer');
    }
    public function aksi_cus()
    {
     $a=$this->request->getPost('nama');
     $b=$this->request->getPost('nik');
     $c= $this->request->getPost('username');
     $d= $this->request->getPost('pass');
     $e= $this->request->getPost('tempat');
     $f= $this->request->getPost('tanggal');
     $g= $this->request->getPost('jk');
     $h= $this->request->getPost('alamat');
     $i= $this->request->getPost('nohp');
     $Jocye=new M_belajar(); 
     $data= array(
        "username" =>$c,
        "password"=>MD5($d),
    );
     $Jocye->input('user', $data);
     $wece= array(
        "username" =>$c,
    );
     $wendy=$Jocye->getWhere('user', $wece);
     $data2=array(
        "id_user"=>$wendy->id_user,
        "nama"=>$a,
        "nik"=>$b,
        "tempat_lahir"=>$e,
        "tanggal_lahir"=>$f,
        "Jenis_kelamin"=>$g,
        "Alamat"=>$h,
        "nohp"=>$i,
    );
     $Jocye->input('customer', $data2);
     return redirect()->to('home/cus');
 }
 public function editcustomer($id)
 {
    $Jocye= new M_belajar;
    $wece = array('customer.id_user' => $id );
    $wendy['takdirestui']=$Jocye->joinw('customer', 'user',
     'customer.id_user = user.id_user',
     $wece); 
    echo view('header');
    echo view('menu');
    echo view('ecustomer', $wendy); 
    echo view('footer');
}
public function simpan_cus()
{
    $model= new M_belajar();
    $where = array('id_user' => $this->request->getPost('idu') );

    $data= array(
        'username' =>$this->request->getPost('username'),
        MD5('password') =>$this->request->getPost('password'),
    );
    $model->edit('user', $data, $where);

    $where = array("username" => $this->request->getPost('username'));
    $wendy = $model->getWhere('user', $where); 
    $Jocye = array('id_customer' => $this->request->getPost('idc'));

    $data2 = array(
        'id_user' => $wendy->id_user,
        'nama'=>$this->request->getPost('nama'),
        'nik'=>$this->request->getPost('nik'),
        'tanggal_lahir'=> $this->request->getPost('tanggal'),
        'tempat_lahir'=> $this->request->getPost('tempat'),
        'Alamat'=> $this->request->getPost('alamat'),
        'nohp'=> $this->request->getPost('hp'),
        'Jenis_kelamin'=> $this->request->getPost('jk'),
    );
    $model->edit('customer', $data2, $Jocye);
    return redirect()->to('/home/cus');
}
public function hapus_customer($id)
{
    $Jocye= new M_belajar;
    $wece = array('id_user' => $id );
    $Jocye->hapus('customer', $wece);
    $Jocye->hapus('user', $wece);
    return redirect()->to('home/cus');
}



public function kur()
{
    if (session()->get('level') == 1) {
        $Jocye = new M_belajar;
        $wendy['takdirestui'] = $Jocye->join('kurir', 'user', 'kurir.id_user = user.id_user');
        echo view('header');
        echo view('menu');
        echo view('kur', $wendy);  // Menampilkan data di view karyawan
        echo view('footer');
    } else if (session()->get('level') > 0) {
        return redirect()->to('home/error');
    }
}
public function tkur()
{
    $Jocye= new M_belajar;
    $where=('id_user');
    $wendy['takdirestui']=$Jocye->tampil('user', $where);
    echo view('header');
    echo view('menu');
    echo view('tbkur', $wendy);
    echo view('footer');
}
public function aksi_kur()
{
 $a=$this->request->getPost('nama');
 $b=$this->request->getPost('nik');
 $c= $this->request->getPost('username');
 $d= $this->request->getPost('pass');
 $e= $this->request->getPost('tempat');
 $f= $this->request->getPost('tanggal');
 $g= $this->request->getPost('jk');
 $h= $this->request->getPost('alamat');
 $i= $this->request->getPost('nohp');
 $Jocye=new M_belajar(); 
 $data= array(
    "username" =>$c,
    "password"=>MD5($d),
);
 $Jocye->input('user', $data);
 $wece= array(
    "username" =>$c,
);
 $wendy=$Jocye->getWhere('user', $wece);
 $data2=array(
    "id_user"=>$wendy->id_user,
    "nama_kurir"=>$a,
    "nik"=>$b,
    "tempat_lahir"=>$e,
    "tanggal_lahir"=>$f,
    "jenis_kelamin"=>$g,
    "alamat"=>$h,
    "no_handphone"=>$i,
);
 $Jocye->input('kurir', $data2);
 return redirect()->to('home/kur');
}
public function editkurir($id)
{
    $Jocye= new M_belajar;
    $wece = array('kurir.id_user' => $id );
    $wendy['takdirestui']=$Jocye->joinw('kurir', 'user',
     'kurir.id_user = user.id_user',
     $wece); 
    echo view('header');
    echo view('menu');
    echo view('ekurir', $wendy); 
    echo view('footer');
}
public function simpan_kur()
{
    $model= new M_belajar();
    $where = array('id_user' => $this->request->getPost('idu') );

    $data= array(
        'username' =>$this->request->getPost('username'),
        'password' =>$this->request->getPost ('password'),
    );
    $model->edit('user', $data, $where);

    $where = array("username" => $this->request->getPost('username'));
    $wendy = $model->getWhere('user', $where); 
    $Jocye = array('id_kurir' => $this->request->getPost('idk'));

    $data2 = array(
        'id_user' => $wendy->id_user,
        'nama_kurir'=>$this->request->getPost('nama'),
        'nik'=>$this->request->getPost('nik'),
        'tanggal_lahir'=> $this->request->getPost('tanggal'),
        'tempat_lahir'=> $this->request->getPost('tempat'),
        'alamat'=> $this->request->getPost('alamat'),
        'no_handphone'=> $this->request->getPost('hp'),
        'jenis_kelamin'=> $this->request->getPost('jk'),
    );
    $model->edit('kurir', $data2, $Jocye);
    return redirect()->to('/home/kur');
}
public function hapus_kurir($id)
{
    $Jocye= new M_belajar;
    $wece = array('id_user' => $id );
    $Jocye->hapus('kurir', $wece);
    $Jocye->hapus('user', $wece);
    return redirect()->to('home/kur');
} 

public function tambahPesanan()
{
    // Ambil nama pelanggan
    $nama_pelanggan = $this->request->getPost('nama_pelanggan');
    
    // Ambil menu yang dipilih (array ID menu)
    $menu_terpilih = $this->request->getPost('menu'); 
    
    // Ambil metode pembayaran
    $metode_pembayaran = $this->request->getPost('metode_pembayaran'); 

    // Pastikan ada menu yang dipilih
    if (!empty($menu_terpilih)) {
        $menu_list = [];
        $jumlah_list = [];
        $total_harga = 0;

        foreach ($menu_terpilih as $key => $menu_id) {
            // Ambil data nama menu, harga, dan jumlah dari form
            $nama_menu = $this->request->getPost('nama_menu_' . $menu_id);  // Nama menu untuk setiap ID
            $harga = $this->request->getPost('harga_' . $menu_id);  // Harga untuk setiap ID
            $jumlah = $this->request->getPost('jumlah')[$key]; // Ambil jumlah berdasarkan index menu_id yang dipilih

            // Cek jika data valid
            if ($nama_menu && $harga && $jumlah) {
                // Tambahkan ke list
                $menu_list[] = $nama_menu;
                $jumlah_list[] = $jumlah;
                $total_harga += $jumlah * $harga; // Total harga
            }
        }

        // Gabungkan menu dan jumlah menjadi string
        $menu_string = implode(', ', $menu_list);
        $jumlah_string = implode(', ', $jumlah_list);

        // Siapkan data untuk disimpan
        $data = [
            'nama_pelanggan' => $nama_pelanggan,
            'menu' => $menu_string,
            'jumlah' => $jumlah_string,
            'total_harga' => $total_harga,
            'status' => 'pending',
            'metode_pembayaran' => $metode_pembayaran // Menyimpan metode pembayaran
        ];

        // Simpan data ke database
        $Jocye = new M_belajar();
        $Jocye->input('order', $data);

        // Redirect ke halaman order setelah berhasil
        return redirect()->to(base_url('home/order'));
    } else {
        // Jika tidak ada menu yang dipilih
        return redirect()->to(base_url('home/menu'))->with('error', 'Silakan pilih menu terlebih dahulu!');
    }
}


public function konfirmasiPesanan()
{
    // Ambil data dari form
    $nama_pelanggan = $this->request->getPost('nama_pelanggan');
    $menu_terpilih = $this->request->getPost('menu'); // Array ID menu yang dipilih

    // Validasi apakah ada menu yang dipilih
    if (!empty($menu_terpilih)) {
        $dataOrder = []; // Array untuk menyimpan data pesanan

        // Loop untuk setiap menu yang dipilih
        foreach ($menu_terpilih as $id_menu) {
            $jumlah = $this->request->getPost('jumlah_' . $id_menu);
            $harga = $this->request->getPost('harga_' . $id_menu);
            $nama_menu = $this->request->getPost('nama_menu_' . $id_menu);

            // Buat data array untuk tiap pesanan
            $dataOrder[] = [
                'nama_pelanggan' => $nama_pelanggan,
                'menu' => $nama_menu,
                'jumlah' => $jumlah,
                'total_harga' => $jumlah * $harga,
                'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
                'status' => 'Belum Bayar',
                'tanggal_pesan' => date('Y-m-d H:i:s'),
            ];
        }

        // Load model
        $orderModel = new \App\Models\M_belajar(); // Sesuaikan dengan namespace model

        // Simpan ke database menggunakan insertBatch
        $orderModel->insertBatch($dataOrder);

        // Redirect ke halaman sukses
        return redirect()->to(base_url('home/order'))->with('success', 'Pesanan berhasil ditambahkan!');
    } else {
        // Jika tidak ada menu dipilih
        return redirect()->to(base_url('home/menu'))->with('error', 'Silakan pilih menu terlebih dahulu!');
    }
}

//     public function upload_bukti() {
//     $config['upload_path'] = './uploads/';
//     $config['allowed_types'] = 'jpg|png|jpeg';
//     $config['max_size'] = 2048;  // Maksimum ukuran file dalam KB (2MB)

//     $this->load->library('upload', $config);

//     if ($this->upload->do_upload('bukti_pembayaran')) {
//         $data = $this->upload->data();
//         // Simpan nama file yang diupload ke database
//         $bukti_pembayaran = $data['file_name'];

//         // Lanjutkan dengan penyimpanan data ke database
//         // Contoh: $this->db->insert('table_name', ['bukti' => $bukti_pembayaran]);

//         // Redirect atau tampilkan pesan sukses
//         redirect('home/success_page');
//     } else {
//         // Jika upload gagal
//         $error = $this->upload->display_errors();
//         // Tampilkan pesan error
//         echo $error;
//     }
// }
public function upload_bukti()
{
    $M_belajar = new M_belajar; // Inisialisasi model
    $id_order = $this->request->getPost('ido'); // ID order dari form
    $fileBukti = $this->request->getFile('bukti_pembayaran'); // File yang diunggah

    // Periksa apakah file valid dan belum dipindahkan
    if ($fileBukti->isValid() && !$fileBukti->hasMoved()) {
        // Pindahkan file ke folder tujuan dengan nama acak
        $newFileName = $fileBukti->getRandomName();
        $fileBukti->move(WRITEPATH . '../public/uploads/', $newFileName);

        // Data untuk diperbarui di database
        $data = [
            'bukti' => $newFileName
        ];
        $where = [
            'id_order' => $id_order
        ];

        // Perbarui database menggunakan fungsi edit di model
        $M_belajar->edit('order', $data, $where);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah');
    } else {
        // Redirect kembali dengan pesan error
        return redirect()->back()->with('error', 'Gagal mengunggah bukti pembayaran');
    }
}

public function print_nota()
{
    // Inisialisasi database
    $db = \Config\Database::connect();

    // Ambil data `id_order` dari form
    $id_order = $this->request->getPost('id_order');

    // Query untuk mengambil data order berdasarkan `id_order`
    $query = $db->table('order')->where('id_order', $id_order)->get();
    $order = $query->getRow(); // Ambil satu baris data

    // Jika data tidak ditemukan, kembalikan dengan pesan error
    if (!$order) {
        return redirect()->back()->with('error', 'Data pesanan tidak ditemukan');
    }

    // Siapkan data untuk tampilan
    $data['order'] = $order;

    // Load tampilan HTML untuk PDF
    $html = view('nota_pdf', $data);

    // Inisialisasi TCPDF
    $pdf = new TCPDF();

    // Set metadata PDF
    $pdf->SetCreator('TCPDF');
    $pdf->SetAuthor('Nama Anda');
    $pdf->SetTitle('Nota Pesanan');
    $pdf->SetSubject('Nota PDF');
    $pdf->SetKeywords('TCPDF, PDF, nota, pesanan');

    // Tambahkan halaman baru
    $pdf->AddPage();

    // Render HTML ke PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF ke browser
    $pdf->Output('nota_pesanan_' . $id_order . '.pdf', 'D'); // 'I' untuk menampilkan di browser
}
public function cetak()
{

    echo view('header');
    echo view('menu');
    echo view('cetak');
    echo view('footer');
}    


public function ordercust()
{
    $Jocye = new M_belajar;
    $wendy['takdirestui'] = $Jocye->getOrdersNotSelesai();

    echo view('header');
    echo view('menu');
    echo view('penerima_order', $wendy);
    echo view('footer');
}


  public function selesai()
{
    // Ambil ID order dari POST
    $id_order = $this->request->getPost('id_order');

    // Pastikan user adalah kurir (level 4) atau admin (level 1)
    if (session()->get('level') != 4 && session()->get('level') != 1) {
        return redirect()->to('home'); // Redirect jika bukan kurir atau admin
    }

    if (!$id_order) {
        return redirect()->back()->with('error', 'ID order tidak ditemukan.');
    }

    $Jocye = new M_pesanan();

    // Lakukan pembaruan status order menjadi selesai
    $data = ['status' => 'selesai'];
    $Jocye->updateStatusOrder($id_order, $data);

    // Redirect ke halaman order setelah status diperbarui
    return redirect()->to('home/ordercust')->with('success', 'Status order berhasil diperbarui.');
}


    public function uploadBukti()
{
    $M_belajar = new M_pesanan; // Inisialisasi model
    $id_order = $this->request->getPost('id_order'); // ID order dari form
    $fileBukti = $this->request->getFile('bukti'); // Ambil file bukti

    // Pastikan file ada dan valid
    if ($fileBukti && $fileBukti->isValid() && !$fileBukti->hasMoved()) {
        // Pindahkan file ke folder tujuan dengan nama acak
        $newFileName = $fileBukti->getRandomName();
        $fileBukti->move(WRITEPATH . '../public/uploads/', $newFileName);

        // Data untuk diperbarui di database
        $data = [
            'bukti' => $newFileName
        ];

        // Update database dengan bukti pembayaran
        $M_belajar->updateBuktiPembayaran($id_order, $data);

        return redirect()->to('home/ordercust')->with('success', 'Bukti pembayaran berhasil diunggah');
    } else {
        // Jika tidak ada file atau file tidak valid
        return redirect()->back()->with('error', 'File tidak valid atau gagal diunggah');
    }
}


public function downloadpdf()
{
    // Inisialisasi model
    $model = new M_belajar(); // Ganti dengan nama model kamu

    // Ambil data tanggal awal dan akhir dari form
    $startDate = $this->request->getPost('ta'); // Tanggal awal
    $endDate = $this->request->getPost('tar'); // Tanggal akhir

    // Ambil data berdasarkan filter tanggal
    $data['takdirestui'] = $model->filterByDate('order', 'tanggal_pesan', $startDate, $endDate);

    // Load tampilan HTML untuk PDF
    $html = view('pdf_orders', $data);

    // Inisialisasi TCPDF
    $pdf = new TCPDF();

    // Setel metadata dasar PDF
    $pdf->SetCreator('TCPDF');
    $pdf->SetAuthor('Admin');
    $pdf->SetTitle('Laporan Pesanan');
    $pdf->SetSubject('Laporan PDF');
    $pdf->SetKeywords('TCPDF, PDF, laporan, pesanan');

    // Tambahkan halaman
    $pdf->AddPage();

    // Render HTML ke dalam PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF (D untuk download langsung)
    $pdf->Output('laporan_pesanan.pdf', 'D');
}

public function generatePDF()
{
    $startDate = date('Y-m-d', strtotime($this->request->getPost('ta')));
    $endDate = date('Y-m-d', strtotime($this->request->getPost('tar'))) . ' 23:59:59';


    $data = [
        'startDate' => $startDate,
        'endDate' => $endDate,
        'orders' => $this->M_belajar->filterByDate('order', 'tanggal_pesan', $startDate, $endDate),
    ];

    return view('pdf_orders', $data);
}

public function biasa()
{
    // Inisialisasi model
    $model = new M_belajar(); // Ganti dengan nama model kamu

    // Ambil data tanggal awal dan akhir dari form
    $startDate = $this->request->getPost('ta'); // Tanggal awal
    $endDate = $this->request->getPost('tar'); // Tanggal akhir
    
    // Memanggil fungsi filter dengan parameter yang benar
    $data['takdirestui'] = $model->filterByDate('order', 'tanggal_pesan', $startDate, $endDate);
    echo view('header');
    echo view('printbiasa', $data);
    echo view('footer');
}

public function excellaporan()
{
    // Inisialisasi model
    $model = new M_belajar(); // Ganti dengan nama model kamu

    // Ambil data tanggal awal dan akhir dari form
    $startDate = $this->request->getPost('ta'); // Tanggal awal
    $endDate = $this->request->getPost('tar'); // Tanggal akhir
    
    // Memanggil fungsi filter dengan parameter yang benar
    $data['takdirestui'] = $model->filterByDate('order', 'tanggal_pesan', $startDate, $endDate);
    echo view ('excellaporan',$data);
}

}




































