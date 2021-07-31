<?php


App::uses('CakeEmail', 'Network/Email');


/**
 * Description of NewsController
 * @author : Yeu tinh
 * @since Oct 19, 2012
 */
class ContactController extends AppController
{


    public $name = 'Contact';

    public $uses = array('Setting');

    public $components = array('Email');


    public function index()
    {

    }


    function dangkyungvien()
    {

        $this->autoLayout = false;

        if (!isset($_POST['captcha'])) {
            echo '<script language="javascript"> alert("Captcha not exits"); location.href="' . DOMAIN . '";</script>';
        }
        if ($_POST['captcha'] != $this->Session->read('captcha')) {
            echo '<script language="javascript"> alert("Captcha not exits"); location.href="' . DOMAIN . '";</script>';
        } else {
            if ($this->request->is('post')) {
                $setting = $this->Setting->find('first');
                $email = new CakeEmail();
                $email->from(array($_POST['email'] => 'Thông tin đăng ký'));
                $email->to($setting['Setting']['email']);
                $email->subject('Thông tin đăng ký');
                $content = "--------------------------------------------------";
                $content .= 'Họ và tên: ' . $_POST['name'] . "\r\n";
                $content .= 'Giới tính: ' . $_POST['gioitinh'] . "\r\n";
                $content .= 'Ngày sinh: ' . $_POST['ngay'] . '/' . $_POST['thang'] . '/' . $_POST['nam'] . "\r\n";
                $content .= 'Điện thoại: ' . $_POST['phone'] . "\r\n";
                $content .= 'Quê quán: ' . $_POST['quequan'] . "\r\n";
                $content .= 'Chiều cao: ' . $_POST['chieucao'] . ' Mét' . "\r\n";
                $content .= 'Cân nặng: ' . $_POST['cannang'] . ' Kg' . "\r\n";
                $content .= 'Trình độ học vấn: ' . $_POST['trinhdohocvan'] . "\r\n";
                $content .= 'Email: ' . $_POST['email'] . "\r\n";
                $email->sendAs = 'html';
                $email->send($content);
                echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';
            }
        }
    }

    function send1()
    {

        $this->autoLayout = false;


        if ($this->request->is('post')) {

            $setting = $this->Setting->find('first');

            //pr($setting);die;

            $email = new CakeEmail();

            $email->from(array($_POST['email'] => 'Thông tin liên hệ'));

            $email->to($setting['Setting']['email']);

            $email->subject('Thông tin liên hệ khách hàng');

            $content = "--------------------------------------------------";
            $content .= 'Tên bài: ' . $_POST['tieude'] . "\r\n";

            $content .= 'Tên khách hàng: ' . $_POST['name'] . "\r\n";

            $content .= 'Số điện thoại: ' . $_POST['phone'] . "\r\n";

            $content .= 'Email: ' . $_POST['email'] . "\r\n";

            $content .= 'Tiêu đề: ' . $_POST['title'] . "\r\n";

            $content .= 'Nội dung: ' . $_POST['content'] . "\r\n";

            $email->sendAs = 'html';

            $email->send($content);

            echo '<script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';


        }

    }

    function dangkykham()
    {

        $this->autoLayout = false;

        /*if(!isset($_POST['captcha'])){
            echo '<script language="javascript"> alert("Captcha not exits"); location.href="' . DOMAIN . '";</script>';
        }
        if($_POST['captcha'] != $this->Session->read('captcha')){
            echo '<script language="javascript"> alert("Captcha not exits"); location.href="' . DOMAIN . '";</script>';
        }else{*/
        if ($this->request->is('post')) {
            $setting = $this->Setting->find('first');
            $email = new CakeEmail();
            $email->from(array('khambenh@gmail.com' => 'Thông tin đăng ký'));
            $email->to($setting['Setting']['email']);
            $email->subject('Thông tin đăng ký');
            $content = "--------------------------------------------------";
            $content .= 'Họ và tên: ' . $_POST['name'] . "\r\n";
            $content .= 'Điện thoại: ' . $_POST['phone'] . "\r\n";
            $content .= 'Khoa: ' . $_POST['khoa'] . "\r\n";
            $content .= 'Ngày hẹn khám: ' . $_POST['ngayhenkham'] . "\r\n";
            $email->sendAs = 'html';
            $email->send($content);
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';
        }
        //}
    }

    function send()
    {

        $this->autoLayout = false;

//        if (!isset($_POST['captcha'])) {
//            echo '<script language="javascript"> alert("Captcha not exits"); location.href="' . DOMAIN . 'lien-he";</script>';
//        }
//        if ($_POST['captcha'] != $this->Session->read('captcha')) {
//            echo '<script language="javascript"> alert("Captcha not exits"); location.href="' . DOMAIN . 'lien-he";</script>';
//        } else {

            if ($this->request->is('post')) {

                $setting = $this->Setting->find('first');

                //pr($setting);die;

                $email = new CakeEmail();

                $email->from(array($_POST['email'] => 'Thông tin liên hệ'));

                $email->to($setting['Setting']['email']);

                $email->subject('Thông tin liên hệ khách hàng');

                $content = "--------------------------------------------------";

                $content .= 'Tên khách hàng: ' . $_POST['name'] . "\r\n";

                $content .= 'Số điện thoại: ' . $_POST['phone'] . "\r\n";

                $content .= 'Email: ' . $_POST['email'] . "\r\n";

                $content .= 'Tiêu đề: ' . $_POST['title'] . "\r\n";

                $content .= 'Nội dung: ' . $_POST['content'] . "\r\n";

                $email->sendAs = 'html';

                $email->send($content);

                echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';


//            }
        }

    }


    function dangky($id = null)
    {

        $this->autoLayout = false;
        $this->autoRender = false;

        if ($this->request->is('post')) {

            $setting = $this->Setting->find('first');

            //pr($setting);die;

            $email = new CakeEmail();

            $email->from(array($_POST['email'] => 'Thông tin liên hệ giá'));

            $email->to($setting['Setting']['email']);

            $email->subject('Thông tin liên hệ giá khách hàng');

            //$this->loadModel('Product');
            //$product = $this->Product->findByLink($id);

            $content = "--------------------------------------------------";

            $content .= 'Tên khách hàng: ' . $_POST['ten'] . "\r\n";

            $content .= 'Số điện thoại: ' . $_POST['dienthoai'] . "\r\n";

            $content .= 'Email: ' . $_POST['email'] . "\r\n";

            $content .= 'Địa chỉ: ' . $_POST['diachi'] . "\r\n";

            $content .= 'Nội dung: ' . $_POST['noidung'] . "\r\n";

            $email->sendAs = 'html';

            $email->send($content);

            echo '<script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';
        }
    }

    function service()
    {

        $this->autoLayout = false;


        if ($this->request->is('post')) {

            $setting = $this->Setting->find('first');

            //pr($setting);die;

            $email = new CakeEmail();

            $email->from(array($_POST['email'] => 'Thông tin liên hệ dịch vụ'));

            $email->to($setting['Setting']['email']);

            $email->subject('Thông tin liên hệ dịch vụ');

            $content = "--------------------------------------------------";

            $content .= 'Tên khách hàng: ' . $_POST['name'] . "\r\n";

            $content .= 'Số điện thoại: ' . $_POST['phone'] . "\r\n";

            $content .= 'Email: ' . $_POST['email'] . "\r\n";

            $content .= 'Tiêu đề: ' . $_POST['title'] . "\r\n";

            $content .= 'Dịch vụ: ' . $_POST['dichvu'] . "\r\n";

            $content .= 'Nội dung: ' . $_POST['content'] . "\r\n";

            $email->sendAs = 'html';

            $email->send($content);

            echo '<script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';


        }

    }


    function dathang()
    {
        $this->autoLayout = false;
        $this->autoRender = false;
//    if(!isset($_POST['captcha'])){
//        echo '<script language="javascript"> alert("Captcha not exits"); location.href="' . DOMAIN . 'lien-he-mua-hang";</script>';
//    }
//    if($_POST['captcha'] != $this->Session->read('captcha')){
//        echo '<script language="javascript"> alert("Captcha not exits"); location.href="' . DOMAIN . 'lien-he-mua-hang";</script>';
//    }else{
        if ($this->request->is('post')) {
            $this->loadModel('Infocustomer');

            $data = array();
            $data['Infocustomer'] = $this->request->data;
            $this->Infocustomer->save($data['Infocustomer']);

            $id_info = $this->Infocustomer->getInsertID();
            $this->loadModel('Order');
            $setting = $this->Setting->find('first');
            $email = new CakeEmail();
            $email->from(array($_POST['email'] => 'Thông tin đặt hàng'));
            $email->to($setting['Setting']['email']);
            $email->subject('Thông tin đặt hàng hàng');
            $content = "------------------------------------------------------------------------\r\n";
            if (isset($_SESSION['shopingcart'])) {
                $dem = 1;
                foreach ($_SESSION['shopingcart'] as $value) {
                    $cart = array();
                    $cart['Order']['product_id'] = $value['id'];
                    $cart['Order']['info_id'] = $id_info;
                    $cart['Order']['slg'] = $value['sl'];
                    $cart['Order']['size'] = $value['size'];
                    $cart['Order']['color'] = $value['color'];
                    $this->Order->save($cart['Order']);
                    $content .= 'Sản phẩm đặt hàng ' . $dem . ': ' . $value['name'] . "\r\n";
                    $content .= 'Giá sản phẩm là: ' . number_format($value['price']) . ' VNĐ' . "\r\n";
                    $dem++;
                }
            }
            $content .= "------------------------------------------------------------------------\r\n";
            $content .= 'Tổng tiền: ' . number_format($_POST['tt_1sp']) . ' VNĐ' . "\r\n";
            $content .= "------------------------------------------------------------------------\r\n";
            $content .= 'Thông tin khách ' . $_POST['name'] . "\r\n";
            $content .= 'Số điện thoại: ' . $_POST['phone'] . "\r\n";
            $content .= 'Email: ' . $_POST['email'] . "\r\n";
            $content .= 'Địa chỉ: ' . $_POST['address'] . "\r\n";
            $content .= 'Yêu cầu: ' . $_POST['dateto'] . "\r\n";
            $content .= "------------------------------------------------------------------------\r\n";
//            $email->sendAs = 'html';
//            $email->send($content);
            $this->Session->delete('shopingcart');
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language="javascript"> alert("Thành công"); location.href="' . DOMAIN . '";</script>';
//        }
        }
    }


}