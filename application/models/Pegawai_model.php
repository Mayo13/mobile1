<?php
class Pegawai_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    //CREATE

    function insert_tbl_pegawai($data)
    {
        $this->db->insert("tbl_pegawai", $data);
        return $this->db->insert_id();
    }
    function insert_tbl_pegawai_berkas($data)
    {
        $this->db->insert("tbl_pegawai_berkas", $data);
        return $this->db->insert_id();
    }
    function insert_tbl_pegawai_login($data)
    {
        $this->db->insert("tbl_pegawai_login", $data);
        return $this->db->insert_id();
    }
    function insert_tbl_pegawai_department($data)
    {
        $this->db->insert("tbl_pegawai_department", $data);
        return $this->db->insert_id();
    }

    //READ
    // Data Pegawai
    function get_tbl_pegawai()
    {
        $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }

    function get_tbl_pegawai_pnasn()
    {
        $query = $this->db->query("SELECT * 
        FROM `tbl_pegawai` AS p 
        JOIN `tbl_pegawai_login` AS l
        ON p.`emp_id` = l.`emp_id`
        WHERE l.`role_id` = 4 and l.is_active = 1")->result();
        return $query;
    }

    function get_tbl_pegawai_pnasnKtu($empid)
    {
        $query = $this->db->query("SELECT p.`nama_depan`, p.`nama_belakang`, k.`penilaian`, k.`keterangan`, k.`created_date`, k.periode, k.kinerja_id
        FROM `tbl_pegawai_kinerja` k 
        JOIN `tbl_pegawai` AS p 
        ON k.`emp_id` = p.`emp_id`
        WHERE emp_id_pimp = '$empid'
        ")->result();
        return $query;
    }

    function get_tbl_pegawai_byId_IN($data)
    {
        $query = $this->db->query("SELECT p.nama_depan, p.nama_belakang, p.nik_pegawai, k.kinerja_id,
        k.penilaian, k.keterangan, k.send_date, k.created_date, k.is_send, k.is_read_byAdmin, k.is_process_byAdmin,
         p.emp_id, k.periode, k.send_date
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_kinerja` AS k
        ON p.emp_id = k.emp_id
        WHERE p.emp_id IN ($data) AND k.is_send = 1
        ORDER BY k.send_date DESC")->result();
        return $query;
    }

    // CASE k.periode
    //     WHEN 1 THEN 'Januari'
    //     WHEN 2 THEN 'Februari'
    //     WHEN 3 THEN 'Maret'
    //     WHEN 4 THEN 'April'
    //     WHEN 5 THEN 'Mai'
    //     WHEN 6 THEN 'Juni'
    //     WHEN 7 THEN 'July'
    //     WHEN 8 THEN 'Agustus'
    //     WHEN 9 THEN 'September'
    //     WHEN 10 THEN 'Oktober'
    //     WHEN 11 THEN 'November'
    //     WHEN 12 THEN 'Desember'
    //     END AS periode,
    function get_tbl_pegawai_pimp_bykinerja_isSend($data)
    {
        $query = $this->db->query("SELECT p.nama_depan, p.nama_belakang, p.nip_pegawai, k.kinerja_id,
        k.penilaian, k.keterangan, k.send_date, k.created_date, k.is_send, k.is_read_byAdmin, k.is_process_byAdmin,
        CASE k.periode
        WHEN 1 THEN 'Januari'
        WHEN 2 THEN 'Februari'
        WHEN 3 THEN 'Maret'
        WHEN 4 THEN 'April'
        WHEN 5 THEN 'Mei'
        WHEN 6 THEN 'Juni'
        WHEN 7 THEN 'July'
        WHEN 8 THEN 'Agustus'
        WHEN 9 THEN 'September'
        WHEN 10 THEN 'Oktober'
        WHEN 11 THEN 'November'
        WHEN 12 THEN 'Desember'
        END AS periode, d.nama as nama_dep, ds.nama as nama_subDep, k.emp_id_pimp
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_kinerja` AS k
        ON p.emp_id = k.emp_id_pimp
        JOIN `tbl_pegawai_department` AS pdp
        ON pdp.emp_id = p.emp_id
        JOIN `tbl_department` AS d
        ON d.department_id = pdp.department_id
        JOIN `tbl_department_sub` AS ds
        ON ds.sub_id = pdp.department_id
        WHERE p.emp_id IN ($data) AND k.is_send = '1'        
        GROUP BY p.nip_pegawai, k.kinerja_id
        ORDER BY k.send_date DESC")->result();

        return $query;
    }

    function get_tbl_pegawai_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai where emp_id = '$id' LIMIT 1")->result();
        return $query;
    }

    function get_tbl_pegawai_berkas()
    {
        $value = $this->db->get('tbl_pegawai_berkas')->result();
        return $value;
    }

    function get_tbl_pegawai_berkas_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_berkas where berkas_id = '$id' LIMIT 1")->result();
        return $query;
    }

    function get_tbl_pegawai_with_berkas()
    {
        $value = $this->db->query("SELECT p.nama_depan, p.nama_belakang, b.berkas_kode, b.nama_foto, p.join_date 
        FROM `tbl_pegawai_login` AS l
        JOIN `tbl_pegawai_berkas` AS b
        ON l.`berkas_kode` = b.`berkas_kode`
        JOIN `tbl_pegawai` AS p
        ON l.`emp_id` = p.`emp_id` 
        WHERE p.jabatan_id NOT IN(6,5) and l.is_sys != 1 LIMIT 10")->result();
        return $value;
    }

    function get_tbl_pegawai_total()
    {
        $query = $this->db->query("SELECT * FROM tbl_pegawai_login WHERE role_id NOT IN(1,2,3,5,99) AND is_sys = 1 LIMIT 1")->result();
        return $query;
    }

    function get_tbl_pegawai_Counttotal()
    {
        $query = $this->db->query("SELECT COUNT(emp_login_id) as total FROM tbl_pegawai_login WHERE role_id = 4 and is_active = 1 LIMIT 1")->result();
        return $query;
    }

    function get_tbl_pimp_total()
    {
        $query = $this->db->query("SELECT COUNT(emp_id) AS total FROM tbl_pegawai_login where role_id = 3 and is_active = 1 LIMIT 1")->result();
        return $query;
    }

    function get_tbl_pegawai_byDepartment()
    {
        $query = $this->db->query("SELECT COUNT(l.department_id) AS pegawaiDep, d.`nama`
        FROM tbl_pegawai_login l
        JOIN tbl_department AS d
        ON d.`department_id` = l.`department_id`
        WHERE l.`role_id` NOT IN(1,2,3,5,99) and l.is_active = 1
        GROUP BY l.department_id 
        ORDER BY l.department_id ASC;
        ")->result();
        return $query;
    }

    function get_tbl_ktu_byDepartment()
    {
        $query = $this->db->query("SELECT COUNT(l.department_id) AS pegawaiDep, d.`nama`
        FROM tbl_pegawai_login l
        JOIN tbl_department AS d
        ON d.`department_id` = l.`department_id`
        WHERE l.`role_id` = 3 and l.is_active = 1
        GROUP BY l.department_id 
        ORDER BY l.department_id ASC;
        ")->result();
        return $query;
    }

    // Start KTU Version Dashboard

    function get_JabatanPegawai_byDepSesdit($dep, $sub, $bag)
    {
        $query = $this->db->query("SELECT COUNT(p.jabatan_id) AS jabatanDep, j.nama
        FROM tbl_pegawai AS p
        JOIN tbl_pegawai_login AS pl
        ON p.`emp_id` = pl.`emp_id`
        JOIN tbl_pegawai_jabatan AS j
        ON j.`jabatan_id` = p.`jabatan_id`
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id` 
        WHERE pd.department_id = $dep AND pd.`sub_id` = $sub AND pd.`bagian_id` = $bag AND j.`is_active` = '1' and pl.is_active = 1
        GROUP BY p.jabatan_id
        ")->result();
        return $query;
    }

    function get_JabatanPegawai_byDepDir($dep, $sub)
    {
        $query = $this->db->query("SELECT COUNT(p.jabatan_id) AS jabatanDep, j.nama
        FROM tbl_pegawai AS p
        JOIN tbl_pegawai_login AS pl
        ON p.`emp_id` = pl.`emp_id`
        JOIN tbl_pegawai_jabatan AS j
        ON j.`jabatan_id` = p.`jabatan_id`
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id` 
        WHERE pd.department_id = $dep AND pd.`sub_id` = $sub AND j.`is_active` = '1' and pl.is_active = 1
        GROUP BY p.jabatan_id
        ")->result();
        return $query;
    }

    function get_dataPegawaibyPimpsesdit($idDep, $sub, $bag)
    {
        $query = $this->db->query("SELECT *
        FROM tbl_pegawai_department AS pd
        JOIN tbl_pegawai AS p
        ON pd.`emp_id` = p.`emp_id`
        WHERE pd.`department_id` = $idDep AND pd.`sub_id` = $sub AND pd.`bagian_id` = $bag AND nip_pegawai = -1       
        ")->result();
        return $query;
    }

    function get_dataPegawaibyPimpDir($idDep, $sub)
    {
        $query = $this->db->query("SELECT *
        FROM tbl_pegawai_department AS pd
        JOIN tbl_pegawai AS p
        ON pd.`emp_id` = p.`emp_id`
        WHERE pd.`department_id` = $idDep AND pd.`sub_id` = $sub AND nip_pegawai = -1       
        ")->result();
        return $query;
    }


    function get_totalPegawai_byDepSesdit($dep, $sub, $bag)
    {
        $query = $this->db->query("SELECT COUNT(p.emp_id) AS total        
        FROM tbl_pegawai AS p
        JOIN tbl_pegawai_department AS pd 
        ON pd.`emp_id` = p.`emp_id`
        WHERE pd.department_id = $dep AND pd.`sub_id` = $sub AND pd.`bagian_id` = $bag AND p.jabatan_id != 6 LIMIT 1 ")->result();
        return $query;
    }

    function get_totalPegawai_byDepDir($dep, $sub)
    {
        $query = $this->db->query("SELECT COUNT(p.emp_id) AS total        
        FROM tbl_pegawai AS p
        JOIN tbl_pegawai_department AS pd 
        ON pd.`emp_id` = p.`emp_id`
        WHERE pd.department_id = $dep AND pd.`sub_id` = $sub AND p.jabatan_id != 6 LIMIT 1 ")->result();
        return $query;
    }

    function get_tbl_pegawaiBerkas_byDepSesdit($dep, $sub, $bag)
    {
        $value = $this->db->query("SELECT p.nama_depan, p.nama_belakang, b.berkas_kode, b.nama_foto, p.join_date 
        FROM `tbl_pegawai_login` AS l
        JOIN `tbl_pegawai_berkas` AS b
        ON l.`berkas_kode` = b.`berkas_kode`
        JOIN `tbl_pegawai` AS p
        ON l.`emp_id` = p.`emp_id` 
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id`    
        WHERE pd.department_id = $dep AND pd.`sub_id` = $sub AND pd.`bagian_id` = $bag AND p.jabatan_id != 6 and l.is_active = 1 LIMIT 10")->result();
        return $value;
    }

    function get_tbl_pegawaiBerkas_byDepDir($dep, $sub)
    {
        $value = $this->db->query("SELECT p.nama_depan, p.nama_belakang, b.berkas_kode, b.nama_foto, p.join_date 
        FROM `tbl_pegawai_login` AS l
        JOIN `tbl_pegawai_berkas` AS b
        ON l.`berkas_kode` = b.`berkas_kode`
        JOIN `tbl_pegawai` AS p
        ON l.`emp_id` = p.`emp_id` 
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id`    
        WHERE pd.department_id = $dep AND pd.`sub_id` = $sub AND p.jabatan_id != 6  and l.is_active = 1 LIMIT 10")->result();
        return $value;
    }

    function get_daftarPegawai_eachKTU($dep, $sub, $bag)
    {
        $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id`       
        WHERE j.`is_active` = '1' AND pd.department_id = $dep AND pd.`sub_id` = $sub AND pd.`bagian_id` = $bag")->result();
        return $value;
    }

    function get_totalDaftarPegawai_eachKTU($dep, $sub, $bag)
    {
        $value = $this->db->query("SELECT count(p.emp_id) as total
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id`       
        WHERE j.`is_active` = '1' AND pd.department_id = $dep AND pd.`sub_id` = $sub AND pd.`bagian_id` = $bag")->result();
        return $value;
    }

    function get_daftarPegawai_Kabag()
    {
        $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan, p.join_date, TIMESTAMPDIFF(YEAR,p.join_date,NOW()) masakerja
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id`       
        WHERE j.`is_active` = '1' ")->result();
        return $value;
    }

    function get_daftarPegawai_byLaporan($dep, $sub, $bag)
    {
        $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan, MONTH(lh.waktu) AS bulan, Year(lh.waktu) AS tahun
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id`
        JOIN `tbl_pegawai_laporan_header` AS lh
        ON lh.`emp_id` = p.`emp_id`
        WHERE j.`is_active` = '1' AND pd.department_id = $dep AND pd.`sub_id` = $sub AND pd.`bagian_id` = $bag GROUP BY p.emp_id, MONTH(lh.waktu), Year(lh.waktu) ORDER BY waktu ASC;")->result();
        return $value;
    }

    function get_laporanPegawai($dep, $sub, $bag, $mon, $years, $emp_id)
    {
        $value = $this->db->query("SELECT ld.lap_detail_id, p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan, ld.`pelaksanaan_kegiatan`, ld.`status_kegiatan`, ld.`waktu`, ld.`lokasi_kerja`, ld.keterangan, ld.tindak_lanjut, ld.surat_dikerjakan
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id`
        JOIN `tbl_pegawai_laporan_header` AS lh
        ON lh.`emp_id` = p.`emp_id`
        JOIN `tbl_pegawai_laporan_detail` AS ld
        ON lh.`lap_header_id` = ld.`lap_header_id`
        WHERE j.`is_active` = '1' AND p.emp_id = $emp_id AND pd.department_id = $dep AND pd.`sub_id` = $sub AND pd.`bagian_id` = $bag AND MONTH(lh.`waktu`) = $mon AND YEAR(lh.`waktu`) = $years")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }

    function get_laporanPegawaixxx($dep, $sub, $bag, $mon, $years)
    {
        $value = $this->db->query("SELECT ld.lap_detail_id, p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan, ld.`pelaksanaan_kegiatan`, ld.`status_kegiatan`, ld.`waktu`, ld.`lokasi_kerja`, ld.keterangan, ld.tindak_lanjut
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        JOIN tbl_pegawai_department AS pd
        ON pd.`emp_id` = p.`emp_id`
        JOIN `tbl_pegawai_laporan_header` AS lh
        ON lh.`emp_id` = p.`emp_id`
        JOIN `tbl_pegawai_laporan_detail` AS ld
        ON lh.`lap_header_id` = ld.`lap_header_id`
        WHERE j.`is_active` = '1' AND pd.department_id = $dep AND pd.`sub_id` = $sub AND pd.`bagian_id` = $bag AND MONTH(lh.`waktu`) = $mon AND YEAR(lh.`waktu`) = $years")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }

    // End KTU Version Dashboard

    function get_tbl_pegawai_byJabatan_total()
    {
        $query = $this->db->query("SELECT j.`nama`, COUNT(p.jabatan_id) AS jabatanDep
        FROM tbl_pegawai AS p
        JOIN tbl_pegawai_jabatan AS j
        ON j.`jabatan_id` = p.`jabatan_id`
        WHERE j.`is_active` = '1'
        GROUP BY p.jabatan_id
        ")->result();
        return $query;
    }

    function get_tbl_ktu_byJabatan()
    {
        $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nip_pegawai`, j.`nama` AS jabatan
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        WHERE j.`is_active` = '0'")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }

    function get_tbl_pegawai_byIsKTU()
    {
        $this->db->where('jabatan_id', '6');
        $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }

    function get_ktu_ofpegawai($dep, $sub, $bag)
    {
        $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`
        FROM `tbl_pegawai` AS p 
        JOIN tbl_pegawai_department AS pd
        ON p.`emp_id` = pd.`emp_id`
        WHERE pd.department_id = '$dep' AND pd.sub_id = '$sub' AND pd.bagian_id = '$bag' AND p.jabatan_id = '6'")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }

    function get_pegawaiPenilaian_byPeriode($empPimp, $bulan, $tahun)
    {
        $value = $this->db->query("SELECT *
        FROM `tbl_pegawai_kinerja` AS k
        WHERE emp_id_pimp = '$empPimp' AND periode LIKE '%$bulan%' AND YEAR(created_date) = '$tahun' AND is_send = '1'")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }


    function get_daftarKTUbyEmpList($data)
    {
        $value = $this->db->query("SELECT p.emp_id, p.nama_depan, p.nama_belakang, p.nip_pegawai, d.nama AS nama_dep
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_department` AS dp
        ON p.emp_id = dp.emp_id
        JOIN `tbl_department` AS d
        ON d.department_id = dp.department_id
        WHERE p.emp_id IN ($data)")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }
    function get_tbl_dataKTUJabatan($empId)
    {
        $value = $this->db->query("
        SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nip_pegawai`, p.`address1`, p.`no_telp`, p.`email`, p.`gender`, pd.`department_id`,
        pd.`sub_id`, pd.`bagian_id`, d.`nama` AS unit_name, ds.`nama` AS sub_name, dsb.`nama` AS bag_name
        FROM `tbl_pegawai_department` AS pd 
        JOIN `tbl_pegawai` AS p
        ON p.`emp_id` = pd.`emp_id`
        JOIN `tbl_department` AS d
        ON pd.`department_id` = d.`department_id`
        JOIN `tbl_department_sub`AS ds
        ON pd.`sub_id` = ds.`sub_id`
        JOIN `tbl_department_sub_bagian`AS dsb
        ON pd.`bagian_id` = dsb.`bagian_id`
        WHERE p.`emp_id` = $empId")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }

    function get_tbl_pegawai_byJabatan()
    {
        // $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan
        // FROM `tbl_pegawai` AS p
        // JOIN `tbl_pegawai_jabatan` AS j
        // ON p.`jabatan_id` = j.`jabatan_id`
        // WHERE j.`is_active` = '1'")->result();
        // SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan, p.join_date, TIMESTAMPDIFF(YEAR,p.join_date,NOW()) masakerja
        $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan, d.nama AS lokasi
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        JOIN `tbl_pegawai_login` AS l
        ON p.`emp_id` = l.`emp_id`
        JOIN `tbl_department` AS d
        ON d.`department_id` = l.`department_id` 
        WHERE j.`is_active` = '1' and l.is_active = 1 ")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }

    function get_tbl_pegawai_byJabatanMasaKerja()
    {
        // $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan
        // FROM `tbl_pegawai` AS p
        // JOIN `tbl_pegawai_jabatan` AS j
        // ON p.`jabatan_id` = j.`jabatan_id`
        // WHERE j.`is_active` = '1'")->result();
        $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan, d.nama AS lokasi, TIMESTAMPDIFF(YEAR,p.join_date,NOW()) masakerja
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        JOIN `tbl_pegawai_login` AS l
        ON p.`emp_id` = l.`emp_id`
        JOIN `tbl_department` AS d
        ON d.`department_id` = l.`department_id` 
        WHERE j.`is_active` = '1' and l.is_active = 1")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }

    function get_pnasnAdmin($searchTerm)
    {

        $users = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, p.`nik_pegawai`, j.`nama` AS jabatan, d.nama AS lokasi
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id` AND j.`is_active` = '1'
        JOIN `tbl_pegawai_login` AS l
        ON p.`emp_id` = l.`emp_id`
        JOIN `tbl_department` AS d
        ON d.`department_id` = l.`department_id` 
        WHERE p.`nama_depan` LIKE '%$searchTerm%' OR p.`nama_belakang` LIKE '%$searchTerm%' and l.is_active = 1
        ")->result_array();

        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['emp_id'], "text" => $user['nama_depan'] . " " . $user['nama_belakang']);
        }
        return $data;
        // return $value;

        // $this->db->select('*');
        // $this->db->where("name like '%" . $searchTerm . "%' ");
        // $fetched_records = $this->db->get('users');
        // $users = $fetched_records->result_array();

        // Initialize Array with fetched data
        // $data = array();
        // foreach ($users as $user) {
        //     $data[] = array("emp_id" => $user['emp_id'], "fullname" => $user['nama_depan'] . $user['nama_belakang']);
        // 

        // function getUsers($searchTerm=""){

        //     // Fetch users
        //     $this->db->select('*');
        //     $this->db->where("name like '%".$searchTerm."%' ");
        //     $fetched_records = $this->db->get('users');
        //     $users = $fetched_records->result_array();

        //     // Initialize Array with fetched data
        //     $data = array();
        //     foreach($users as $user){
        //        $data[] = array("id"=>$user['id'], "text"=>$user['name']);
        //     }
        //     return $data;
        //  }

        // return $users;
    }


    function get_tbl_pegawai_Jabatan_byEmpId($empid)
    {
        $value = $this->db->query("SELECT p.`emp_id`, p.`nama_depan`, p.`nama_belakang`, l.`department_id`, p.`nik_pegawai`, j.`nama` AS jabatan
        FROM `tbl_pegawai` AS p
        JOIN `tbl_pegawai_jabatan` AS j
        ON p.`jabatan_id` = j.`jabatan_id`
        JOIN `tbl_pegawai_login` AS l
        on p.`emp_id` = l.`emp_id`
        WHERE p.`emp_id` = $empid and l.is_active = 1")->result();
        // $value = $this->db->get('tbl_pegawai')->result();
        return $value;
    }


    // Data Jabatan
    function get_tbl_jabatan()
    {
        $this->db->where('is_active', '1');
        $value = $this->db->get('tbl_pegawai_jabatan')->result();
        return $value;
    }
    function get_tbl_jabatan_byId($id)
    {
        $query = $this->db->query("SELECT * from tbl_pegawai_jabatan where jabatan_id = '$id' and is_active = '1' LIMIT 1")->result();
        return $query;
    }



    //UPDATE
    function update_tbl_pegawai($data, $id)
    {
        $this->db->where('emp_id', $id);
        $this->db->update('tbl_pegawai', $data);
    }

    function lastVisit($data, $id)
    {
        $this->db->where('emp_id', $id);
        $this->db->update('tbl_pegawai', $data);
    }

    //DELETE
    function delete_tbl_pegawai($id)
    {
        $this->db->where('emp_id', $id);
        $this->db->delete('tbl_pegawai');
    }

    function Custom_Query()
    {
        $value = $this->db->query("SELECT * from `table` where 1")->result();
        return $value;
    }
    function CQ_update_Row_config()
    {
        $query = "UPDATE config SET is_active = 0";
        $this->db->query($query);
    }
}
