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
            a.y2021,
            a.y2022
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
        } else {
            $sql = "SELECT
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
        AND sex = '" . $sex . "'  
        AND prov = '" . $provcode . "'
        ORDER BY `no`";
            //echo $sql;
            $rs = $this->db->query($sql)->result();
            //echo $this->db->last_query();
        }

        return $rs;
    }

    public function hale7($sex, $provcode)
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
            a.y2021,
            a.y2022
            FROM
            rp_hale_home_r7 a
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
        } else {
            $sql = "SELECT
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
            rp_hale_home_r7_amp a
        LEFT JOIN campur b ON a.ampur = b.ampurcodefull
        WHERE age_gr = '0' 
        AND sex = '" . $sex . "'  
        AND prov = '" . $provcode . "'
        ORDER BY `no`";
            //echo $sql;
            $rs = $this->db->query($sql)->result();
            //echo $this->db->last_query();
        }

        return $rs;
    }

    public function yll7($sex, $provcode)
    {

        if ($sex == 1) {
            $sql_sex = "M";
        } else if ($sex == 2) {
            $sql_sex = "F";
        } else {
            $sql_sex = "B";
        }


        $sql = "SELECT
        a.n,
        a.prov,
        a.SEX,
        a.gr_disease,
        a.gr_diseaseTH,
        a.y2018,
        a.y2019,
        a.y2020,
        a.y2021,
        a.y2022
        FROM
        z5_rp_yll_home2 a
        WHERE
        #prov  4 = เขต   40 ขอนแก่น    44มหาสารคาม   45ร้อยเอ็ด  46กาฬสินธุ์
        a.prov = '" . $provcode . "' AND
        # Sex B = ทั้งหมด,   F = หญิง  ,   M = ชาย
        a.SEX = '" . $sql_sex . "'
        ORDER BY
        a.y2022 DESC
        LIMIT 20 ";
        //echo $sql;
        $rs = $this->db->query($sql)->result();
        // echo $this->db->last_query();
        return $rs;
    }


    public function yll7_dev($sex, $provcode, $ampcode)
    {

        if ($sex == 1) {
            $sql_sex = "M";
        } else if ($sex == 2) {
            $sql_sex = "F";
        } else {
            $sql_sex = "B";
        }

        if ($ampcode == "") {
            $sql = "SELECT
                a.n,
                b.changwatname as name,
                a.SEX,
                a.gr_disease,
                a.gr_diseaseTH,
                a.y2018,
                a.y2019,
                a.y2020,
                a.y2021,
                a.y2022
                FROM
                z5_rp_yll_home2 a
                left join cchangwat b on a.prov = b.changwatcode
                WHERE
                #prov  4 = เขต   40 ขอนแก่น    44มหาสารคาม   45ร้อยเอ็ด  46กาฬสินธุ์
                a.prov = '" . $provcode . "' AND
                # Sex B = ทั้งหมด,   F = หญิง  ,   M = ชาย
                a.SEX = '" . $sql_sex . "'
                ORDER BY
                a.y2022 DESC
                LIMIT 20 ";
                //echo $sql;
                $rs = $this->db->query($sql)->result();
                // echo $this->db->last_query();
        }else{

            $sql = "SELECT
                a.n,
                b.changwatname as name,
                a.SEX,
                a.gr_disease,
                a.gr_diseaseTH,
                a.y2018,
                a.y2019,
                a.y2020,
                a.y2021,
                a.y2022
                FROM
                z5_rp_yll_home2_amp a
                left join cchangwat b on a.prov = b.changwatcode
                WHERE
                #prov  4 = เขต   40 ขอนแก่น    44มหาสารคาม   45ร้อยเอ็ด  46กาฬสินธุ์
                a.ampur = '" . $ampcode . "' AND 
                # Sex B = ทั้งหมด,   F = หญิง  ,   M = ชาย
                a.SEX = '" . $sql_sex . "'
                ORDER BY
                a.y2022 DESC
                LIMIT 20 ";
                //echo $sql;
                $rs = $this->db->query($sql)->result();
                // echo $this->db->last_query();
        }

        return $rs;
    }
}
