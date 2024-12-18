
  // Fungsi untuk mengubah pilihan dampak berdasarkan kategori resiko
  function updateImpactOptions() {
    // Ambil elemen kategori resiko dan dampak
    const riskCategory = document.getElementById('risk_category').value;
    const inheritImpact = document.getElementById('inherit_impact');
    const residualImpact = document.getElementById('residual_impact');
    const targetImpact = document.getElementById('target_impact');
    
    // Definisikan opsi dampak berdasarkan kategori resiko
    let options = [];
    if (riskCategory === 'Finansial') {
      options = [
        { value: '1', text: '<=10 juta' },
        { value: '2', text: '10 juta s/d 50 juta' },
        { value: '3', text: '50 juta s/d 200 juta' },
        { value: '4', text: '200 juta s/d 600 juta' },
        { value: '5', text: '>600 juta' }
      ];
    } else if (riskCategory === 'operasional') {
      options = [
        { value: '1', text: 'tidak memengaruhi kegiatan belajar mengajar' },
        { value: '2', text: 'terhambat <10% kegiatan belajar mengajar' },
        { value: '3', text: 'terhambat >10% sd 15% kegiatan belajar mengajar' },
        { value: '4', text: 'terhambat >15% sd 20% kegiatan belajar mengajar' },
        { value: '5', text: 'terhambat >20% kegiatan belajar mengajar' }
      ];
    } else if (riskCategory === 'tujuan') {
      options = [
        { value: '1', text: 'terlambat <10% dari target waktu pencapaian' },
        { value: '2', text: 'terlambat >10% sd 50% dari target waktu pencapaian' },
        { value: '3', text: 'terlambat >50% sd 75% dari target waktu pencapaian' },
        { value: '4', text: 'terlambat >75% sd 100% dari target waktu pencapaian' },
        { value: '5', text: 'terlambat >100% dari target waktu pencapaian' }
      ];
    }else if (riskCategory === 'reputasi') {
      options = [
        { value: '1', text: 'tidak berdampak pada reputasi' },
        { value: '2', text: 'publikasi negatif pada area operasional setempat' },
        { value: '3', text: 'publikasi negatif pada area Yogyakarta' },
        { value: '4', text: 'publikasi negatif pada skala nasional' },
        { value: '5', text: 'publikasi negatif pada skala internasional' }
      ];
    }else if (riskCategory === 'keluhan_pelanggan') {
      options = [
        { value: '1', text: 'skala 4,5 - <5' },
        { value: '2', text: 'skala 4 - <4,5' },
        { value: '3', text: 'skala 3,5 - <4' },
        { value: '4', text: 'skala 3 - <3,5' },
        { value: '5', text: 'skala <3' }
      ];
    }else if (riskCategory === 'kepegawaian') {
      options = [
        { value: '1', text: 'keluhan dapat diselesaikan di sub bagian kerja terkait' },
        { value: '2', text: 'keluhan dapat diselesaikan di bagian kerja terkait' },
        { value: '3', text: 'keluhan dapat diselesaikan di Dekanat/ biro terkait' },
        { value: '4', text: 'keluhan dapat diselesaikan di Bag Kepegawaian/ SPI Rektorat' },
        { value: '5', text: 'keluhan dapat diselesaikan di rapat pimpinan universitas' }
      ];
    }else if (riskCategory === 'peringatan') {
      options = [
        { value: '1', text: 'peringatan verbal' },
        { value: '2', text: 'peringatan tertulis tanpa sanksi' },
        { value: '3', text: 'peringatan tetulis dengan sanksi' },
        { value: '4', text: 'penghentian sementara aktivitas prodi' },
        { value: '5', text: 'penutupan prodi' }
      ];
    }else if (riskCategory === 'daring') {
      options = [
        { value: '1', text: 'tidak berfungsi selama 1 jam' },
        { value: '2', text: 'tidak berfungsi selama 3 jam' },
        { value: '3', text: 'tidak berfungsi selama 1 hari' },
        { value: '4', text: 'tidak berfungsi selama 2 hari' },
        { value: '5', text: 'tidak berfungsi selama 3 hari' }
      ];
    }else if (riskCategory === 'keselamatan') {
      options = [
        { value: '1', text: 'tindakan berbahaya' },
        { value: '2', text: 'cidera kecil (mampu bekerja di hari yang sama' },
        { value: '3', text: 'cidera ringan (tidak mampu bekerja 1 sd 3 hari' },
        { value: '4', text: 'cidera berat (tidak mampu bekerja  >3 hari atau cacat tetap)' },
        { value: '5', text: 'kejadian fatal atau kematian' }
      ];
    } else {
      options = [
        { value: '1', text: 'Rendah' },
        { value: '2', text: 'Sedang' },
        { value: '3', text: 'Tinggi' }
      ];
    }

    // Fungsi untuk memperbarui opsi pada dropdown dampak
    function updateImpactDropdown(dropdown) {
      dropdown.innerHTML = ''; // Hapus opsi lama
      options.forEach(option => {
        const newOption = document.createElement('option');
        newOption.value = option.value;
        newOption.textContent = option.text;
        dropdown.appendChild(newOption);
      });
    }

    // Update dampak untuk semua dropdown yang relevan
    updateImpactDropdown(inheritImpact);
    updateImpactDropdown(residualImpact);
    updateImpactDropdown(targetImpact);
  }

  // Tambahkan event listener untuk perubahan kategori resiko
  document.getElementById('risk_category').addEventListener('change', updateImpactOptions);

  // Panggil fungsi pertama kali untuk inisialisasi
  updateImpactOptions();

