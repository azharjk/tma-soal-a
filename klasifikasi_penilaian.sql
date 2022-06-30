-- 50 - 70 = B
SELECT *, IF(penilaian >= 50 and penilaian <= 70, 'B', 
          IF(penilaian >= 75 and penilaian <= 90, 'A', 
          IF(penilaian >= 91 and penilaian <= 100, 'A+', NULL))) as klasifikasi_penilaian FROM karyawan;

-- -- 75 - 90 = A
-- SELECT *, IF(penilaian >= 75 and penilaian <= 90, 'A', NULL) as klasifikasi_penilaian FROM karyawan WHERE penilaian >= 75 and penilaian <= 90;

-- -- 91 - 100 = A+
-- SELECT *, IF(penilaian >= 91 and penilaian <= 100, 'A+', NULL) as klasifikasi_penilaian FROM karyawan WHERE penilaian >= 91 and penilaian <= 100;
