<?php 
session_start();
if( !isset($_SESSION["login"])){
    header("Location: loginsession.php");
    exit;
}
require_once 'model_role/role_model.php';
require_once 'model_role/user_model.php';
require_once 'model_role/barang_model.php';
require_once 'model_role/modelTransaksi.php';
require_once 'model_role/model_detal_transaksi.php';



if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

switch ($modul) {

    case 'dashboard':
        include 'view/dashboard.php';
        break;

    case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_roles = new ModelRole();

        switch ($fitur) {
            case 'add':
                $role_name = $_POST['role_name'];
                $role_description = $_POST['role_description'];
                $role_status = $_POST['role_status'];
                $obj_roles->addRole($role_name, $role_description, $role_status);
                
                
                echo "<script>
                        alert('Data role berhasil ditambahkan!');
                        window.location.href = 'index.php?modul=role';
                      </script>";
                exit;

            case 'delete':
                $role_id = $_POST['role_id'];
                $delete_result = $obj_roles->deleteRole($role_id);

                if ($delete_result) {
                    echo "<script>
                            alert('Data role berhasil dihapus!');
                            window.location.href = 'index.php?modul=role';
                          </script>";
                } else {
                    echo "<script>
                            alert('Gagal menghapus data role. Silakan coba lagi.');
                            window.location.href = 'index.php?modul=role';
                          </script>";
                }
                exit;

            case 'edit':
                $role_id = $_GET['role_id'];
                $obj_roles = $obj_roles->getRoleById($role_id);
                include 'view/role_update.php';
                break;

            case 'update':
                $role_id = $_POST['role_id'];
                $role_name = $_POST['role_name'];
                $role_description = $_POST['role_description'];
                $role_status = $_POST['role_status'];

                $update_result = $obj_roles->updateRole($role_id, $role_name, $role_description, $role_status);

                if ($update_result) {
                    echo "<script>
                            alert('Data role berhasil diperbarui!');
                            window.location.href = 'index.php?modul=role'; 
                          </script>";
                } else {
                    echo "<script>
                            alert('Gagal memperbarui data role. Silakan coba lagi.');
                            window.location.href = 'index.php?modul=role&fitur=edit&role_id={$role_id}'; 
                          </script>";
                }
                exit;

            default:
                $Roles = $obj_roles->getAllRoles();
                include 'view/role_list.php';
                break;
        }
        break;

    case 'user':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_users = new modelUser();
        $obj_roles = new ModelRole();

        switch ($fitur) {

            case 'input' :
            $roles = $obj_roles->getAllRoles();
            $users = $obj_users->getAllUser();
            include_once "view/user_input.php";
            exit;


            case 'add':
                $user_name = $_POST['user_name'];
                $user_password = $_POST['user_password'];
                $role_id = $_POST['role_id'];
                
                

                $obj_users->adduser($user_name, $user_password,$role_id);
                
                
                echo "<script>
                        alert('Data user berhasil ditambahkan!');
                        window.location.href = 'index.php?modul=user';
                      </script>";
                exit;

            case 'delete':
                $user_id = $_POST['user_id'];
                $delete_result = $obj_users->deleteUser($user_id);

                if ($delete_result) {
                    echo "<script>
                            alert('Data user berhasil dihapus!');
                            window.location.href = 'index.php?modul=user';
                          </script>";
                } else {
                    echo "<script>
                            alert('Gagal menghapus data user. Silakan coba lagi.');
                            window.location.href = 'index.php?modul=user';
                          </script>";
                }
                exit;

            case 'edit':
                $user_id = $_GET['user_id'];
                $obj_users = $obj_users->getUserById($user_id);
                $roles = $obj_roles->getAllRoles();
                include 'view/user_update.php';
                break;

            case 'update':
                // die(var_dump($_POST));
                $user_id = $_POST['user_id'];
                $user_name = $_POST['user_name'];
                $user_password = $_POST['user_password'];
                $role_id = $_POST['role_id'];

                $update_result = $obj_users->updateuser($user_id, $user_name, $user_password, $role_id);

                // die(var_dump(...$obj_users->getAllUser()));
                if ($update_result) {
                    echo "<script>
                            alert('Data user berhasil diperbarui!');
                            window.location.href = 'index.php?modul=user'; 
                          </script>";
                } else {
                    echo "<script>
                            alert('Gagal memperbarui data user. Silakan coba lagi.');
                            window.location.href = 'index.php?modul=user&fitur=edit&user_id={$user_id}'; 
                          </script>";
                }
                exit;

            default:
                $users = $obj_users->getAllUser();
                include 'view/user_list.php';
                break;
        }
        break;

    case 'barang':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_barangs = new modelBarang();

        switch ($fitur) {
            case 'add':
                $barang_name = $_POST['barang_name'];
                $barang_stock = $_POST['barang_stock'];
                $barang_harga = $_POST['barang_harga'];
                $obj_barangs->addbarang($barang_name, $barang_stock, $barang_harga);
                
                
                echo "<script>
                        alert('Data barang berhasil ditambahkan!');
                        window.location.href = 'index.php?modul=barang';
                      </script>";
                exit;

            case 'delete':
                $barang_id = $_POST['barang_id'];
                $delete_result = $obj_barangs->deletebarang($barang_id);

                if ($delete_result) {
                    echo "<script>
                            alert('Data barang berhasil dihapus!');
                            window.location.href = 'index.php?modul=barang';
                          </script>";
                } else {
                    echo "<script>
                            alert('Gagal menghapus data barang. Silakan coba lagi.');
                            window.location.href = 'index.php?modul=barang';
                          </script>";
                }
                exit;

            case 'edit':
                $barang_id = $_GET['barang_id'];
                $obj_barangs = $obj_barangs->getbarangById($barang_id);
                include 'view/barang_update.php';
                break;

            case 'update':
                $barang_id = $_POST['barang_id'];
                $barang_name = $_POST['barang_name'];
                $barang_stock = $_POST['barang_stock'];
                $barang_harga = $_POST['barang_harga'];

                $update_result = $obj_barangs->updatebarang($barang_id, $barang_name, $barang_stock, $barang_harga);

                if ($update_result) {
                    echo "<script>
                            alert('Data barang berhasil diperbarui!');
                            window.location.href = 'index.php?modul=barang'; 
                          </script>";
                } else {
                    echo "<script>
                            alert('Gagal memperbarui data barang. Silakan coba lagi.');
                            window.location.href = 'index.php?modul=barang&fitur=edit&barang_id={$barang_id}'; 
                          </script>";
                }
                exit;

            default:
                $barangs = $obj_barangs->getAllbarang();
                include 'view/barang_list.php';
                break;
        }
        break;

        case 'transaksi':
            $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
            $obj_transaksi = new ModelTransaksi(); // Inisialisasi objek transaksi
            $obj_users = new modelUser(); // Pastikan juga ada objek untuk user jika diperlukan
            $obj_barangs = new modelBarang(); // Inisialisasi objek barang jika diperlukan
            $obj_detail_transaksi = new ModelDetailTransaksi();
            $customer = $obj_users->getAllUser();
            switch ($fitur) {
                case 'input':
                    $transaksis = $obj_transaksi->getAllTransaksi();
                    $customers = $obj_users->getAllUser();
                    $barangs = $obj_barangs->getAllbarang();
                    
                    include 'view/transaksi_input.php';
                    break;
    
                case 'add':
                    $user_id = $_POST['customer'];
                    $kasir_name = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';

                    //$kasir_id = $_SESSION['kasir'];
                    // $kasir_id = $_SESSION['kasir'];
                    $barang_ids = $_POST['barang'];
                    $jumlahs = $_POST['jumlah'];
                    

    
                    $detail_transaksis = [];
                    foreach ($barang_ids as $key => $barang_id) {
                        $barang = $obj_barangs->getBarangById($barang_id);
                        // $id_transaksi = $obj_transaksi->getMaxTransaksiId();
                        $detail_transaksi = new DetailTransaksi(1, $barang, $jumlahs[$key], $obj_detail_transaksi->getSubtotal($barang_id, $jumlahs[$key]));
                        $detail_transaksis[] = $detail_transaksi;
                    }
    
                    if (!empty($detail_transaksis)) {
                        $obj_transaksi->addTransaksi($user_id,$kasir_name, $detail_transaksis);
                        // var_dump($user);  // Menampilkan tipe objek
                        
                        header("Location: index.php?modul=transaksi");
                    // print_r($obj_transaksi);

                    } else {
                        echo "Detail transaksi tidak lengkap!";
                        exit;
                    }
                    break;
                default:
                
                $transaksis = $obj_transaksi->getAllTransaksi();
                // var_dump($kasir);
                // var_dump($customer);  
                    // echo "<pre>";
                    // print_r($transaksis);
                    // echo "</pre>";
                    include 'view/transaksi_list.php';
                    break;
            }
}
?>
