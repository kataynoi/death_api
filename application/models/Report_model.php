<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Report model
 *
 * @author  Mr.Dechachit Kaewmaung
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */
class Report_model extends CI_Model
{
    public function le7($sex, $provcode)
    {

        if ($sex == 1) {
            $sql_sex = "AND sex = '1'";
        } else if ($sex == 2) {
            $sql_sex = "AND sex = '2'";
        } else {
            $sql_sex = "AND sex = '3'";
        }

        if ($provcode == "") {
            $sql = "SELECT
            a.prov,
            b.changwatname as name,
            a.`no`,
            a.age_gr,
            a.sex,
            a.y2016,
            a.y2017,
            a.y2018,
            a.y2019,
            a.y2020,
            a.y2021
            FROM
            rp_le_home_r7 a
            left join cchangwat b on a.prov = b.changwatcode
            WHERE 
            # 4 = 'เขตสุขภาพที่  7 ,   40  = ขอนแก่น  ,  44  =  มหาสารคาม ,  45  = ร้อยเอ็ด ,  46  = กาฬสินธุ์  
            #Prov = '4' AND 
            # no = อายุเมื่อแรกเกิด
            no = '1' 
            # เพศ   1  = ชาย   2  = หญิง   3  = รวม
            " . $sql_sex;
            //echo $sql;
            $rs = $this->db->query($sql)->result();
            //echo $this->db->last_query();
        }else{
            $sql="SELECT
            a.prov, 
            a.`no`, 
            a.age_gr, 
            a.sex, 
          a.ampur,
            b.ampurname as name,
            a.y2016, 
            a.y2017, 
            a.y2018, 
            a.y2019, 
            a.y2020, 
            a.y2021, 
            a.y2022
        FROM
            rp_le_home_r7_amp a
        LEFT JOIN campur b ON a.ampur = b.ampurcodefull
        WHERE age_gr = '0' 
        AND sex = '".$sex."'  
        AND prov = '".$provcode."'
        ORDER BY `no`";
        $rs = $this->db->query($sql)->result();
        }

        return $rs;
    }

    public function hale7($sex = 0)
    {

        if ($sex == 1) {
            $sql_sex = "AND sex = '1'";
        } else if ($sex == 2) {
            $sql_sex = "AND sex = '2'";
        } else {
            $sql_sex = "AND sex = '3'";
        }

        $provcode = $this->config->item('prov_code');
        $sql = "SELECT
        rp_hale_home_r7.prov,
        rp_hale_home_r7.`no`,
        rp_hale_home_r7.age_gr,
        rp_hale_home_r7.sex,
        rp_hale_home_r7.y2016,
        rp_hale_home_r7.y2017,
        rp_hale_home_r7.y2018,
        rp_hale_home_r7.y2019,
        rp_hale_home_r7.y2020,
        rp_hale_home_r7.y2021
        FROM
        rp_hale_home_r7
        WHERE 
        # 4 = 'เขตสุขภาพที่  7 ,   40  = ขอนแก่น  ,  44  =  มหาสารคาม ,  45  = ร้อยเอ็ด ,  46  = กาฬสินธุ์  
        #Prov = '4' AND 
        # no = อายุเมื่อแรกเกิด
        no = '1' 
        # เพศ   1  = ชาย   2  = หญิง   3  = รวม
        " . $sql_sex;
        //echo $sql;
        $rs = $this->db->query($sql)->result();
        //echo $this->db->last_query();
        return $rs;
    }

    public function yll7($sex = 0, $provcode)
    {

        if ($sex == 1) {
            $sql_sex = "M";
        } else if ($sex == 2) {
            $sql_sex = "F";
        } else {
            $sql_sex = "B";
        }


        $sql = "SELECT
        z5_rp_yll_home2.n,
        z5_rp_yll_home2.prov,
        z5_rp_yll_home2.SEX,
        z5_rp_yll_home2.gr_disease,
        z5_rp_yll_home2.gr_diseaseTH,
        z5_rp_yll_home2.y2018,
        z5_rp_yll_home2.y2019,
        z5_rp_yll_home2.y2020,
        z5_rp_yll_home2.y2021
        FROM
        z5_rp_yll_home2
        WHERE
        #prov  4 = เขต   40 ขอนแก่น    44มหาสารคาม   45ร้อยเอ็ด  46กาฬสินธุ์
        z5_rp_yll_home2.prov = '" . $provcode . "' AND
        # Sex B = ทั้งหมด,   F = หญิง  ,   M = ชาย
        z5_rp_yll_home2.SEX = '" . $sql_sex . "'
        ORDER BY
        z5_rp_yll_home2.y2020 DESC
        LIMIT 20 ";

        $rs = $this->db->query($sql)->result();
        //echo $this->db->last_query();
        return $rs;
    }
}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */