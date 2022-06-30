SELECT *, IF(penilaian >= 50 and penilaian <= 70, 'B', 
          IF(penilaian >= 75 and penilaian <= 90, 'A', 
          IF(penilaian >= 91 and penilaian <= 100, 'A+', NULL))) as klasifikasi_penilaian FROM karyawan;
