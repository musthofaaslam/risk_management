<?php
    class Flasher{
        public static function setFlash($pesan, $aksi, $tipe){
            $_SESSION['flash'] = [
                'pesan' => $pesan,
                'aksi' => $aksi,
                'tipe' => $tipe
            ];
        }
        public static function flash(){
            if (isset($_SESSION['flash'])){
                echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
        <strong>' . $_SESSION['flash']['pesan'].' ' . '</strong>' . $_SESSION['flash']['aksi'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>';
 
                //echo '<div class="alert alert-' .$_SESSION['flash']['tipe']. ' alert-dismissible fade show" role="alert">
                //         <strong>'.$_SESSION['flash']['pesan'].'</strong>' .$_SESSION['flash']['aksi'].
                //         '<button type="button" class="btn-close" data-bs-alert-dismiss="alert" aria-label="Close">
                         
                //         </button>
                //     </div>';
                unset($_SESSION['flash']);
            }
        }
    }
?>
<!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->