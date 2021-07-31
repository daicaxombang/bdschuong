<?php


/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class AccountsController extends AppController {

    public $name = 'Accounts';
    public $uses = array('Account');

    public function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->request->params['action'],array('index','search'))) $this->save_url();
    }

    public function index() {
        $this->set('users', $this->Account->find('all'));
    }
    
    public function add() {
        if (!empty($this->request->data)) {
            
            $this->Account->set($this->request->data);
            if ($this->Account->validates()) {
                $this->request->data['Account']['group_id'] = 6;
                $this->Account->save($this->request->data);
                $this->Session->setFlash('Đã thêm tài khoản mới!', 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash('Vui lòng kiểm tra lại thông tin!', 'default', array('class' => 'notification attention png_bg'));
            }
        }
    }

    public function edit_pass($id = null) {
        
        if (!empty($this->request->data)) {
            
            $this->Account->set($this->request->data);
            if ($this->Account->validates()) {
                $this->Account->save($this->request->data);
                $this->Session->setFlash('Đã đổi mật khẩu!', 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash('Vui lòng kiểm tra lại thông tin!', 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else {
            $this->request->data = $this->Account->findById($id);
            if (!$this->request->data) {
                $this->Session->setFlash('Tài khoản không tồn tại!', 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    public function edit_name($id = null) {

        if (!empty($this->request->data)) {
            
            $this->Account->set($this->request->data);
            if ($this->Account->validates()) {
                $this->Account->save($this->request->data);
                $this->Session->setFlash('Đã đổi tên!', 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash('Vui lòng kiểm tra lại thông tin!', 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else {
            $this->request->data = $this->Account->findById($id);
            if (!$this->request->data) {
                $this->Session->setFlash('Tài khoản không tồn tại!', 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    public function edit_mail($id = null) {
        
        if (!empty($this->request->data)) {
            
            $this->Account->set($this->request->data);
            if ($this->Account->validates()) {
                $this->Account->save($this->request->data);
                $this->Session->setFlash('Đã đổi email!', 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash('Vui lòng kiểm tra lại thông tin!', 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else {
            $this->request->data = $this->Account->findById($id);
            if (!$this->request->data) {
                $this->Session->setFlash('Tài khoản không tồn tại!', 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    public function edit_group($id = null) {
        if(!empty($this->request->data)){
            if($this->Account->save($this->request->data)){
                $this->Session->setFlash('Đã đổi nhóm!', 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Có lỗi không xác định!', 'default', array('class' => 'notification attention png_bg'));
            $this->redirect(array('action' => 'index'));
        }
        $this->request->data = $this->Account->read(null, $id);
        if (!$this->request->data) {
            $this->Session->setFlash('Tài khoản không tồn tại!', 'default', array('class' => 'notification error png_bg'));
            $this->redirect(array('action' => 'index'));
        }
        
        // Load model
        $this->loadModel("Group");
        $list_cat = $this->Group->find(
            'list',array()
        );
        $this->set(compact('list_cat'));
    }

    public function delete($id = null) {
        
        $user_id = $this->Session->read("id");
        
        if ($id == 1) {
            $this->Session->setFlash('Không thể xóa tài khoản cơ sở!', 'default', array('class' => 'notification error png_bg'));
            $this->redirect(array('action' => 'index'));
        }
        
        if ($id == $user_id) {
            $this->Session->setFlash('Bạn không thể xóa chính mình!', 'default', array('class' => 'notification error png_bg'));
            $this->redirect(array('action' => 'index'));
        }
        
        if ($user_id == 1) {
            $this->Account->delete($id);
            $this->Session->setFlash('Đã xóa tài khoản!', 'default', array('class' => 'notification success png_bg'));
            $this->redirect(array('action' => 'index')); 
        }
        
        
        if (!empty($this->request->data)) {
            
            $this->Account->set($this->request->data);
            if ($this->Account->validates()) {
                $this->Account->delete($this->request->data['Account']['id']);
                $this->Session->setFlash('Đã xóa tài khoản!', 'default', array('class' => 'notification success png_bg'));
                $this->redirect(array('action' => 'index')); 
            }
            else {
                $this->Session->setFlash('Vui lòng kiểm tra lại thông tin!', 'default', array('class' => 'notification attention png_bg'));
            }
        }
        else {
            $this->request->data = $this->Account->findById($id);
            if (!$this->request->data) {
                $this->Session->setFlash('Tài khoản không tồn tại!', 'default', array('class' => 'notification error png_bg'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    public function theme($theme = null) {
        $this->Account->id = $this->Session->read("id");
        $this->Account->saveField('theme', $theme);
        $this->cancel();
    }
    
    public function login() {

        if($this->request->is('post')) {
			$data['Account'] = $this->data['Account'];
			if (empty($data['Account']['name'])) {
				$this->Session->setFlash('Vui lòng nhập tên đăng nhập!', 'default', array('class' => 'notification attention png_bg modal-err'));
				$this->redirect(array('action' => 'index'));
			} else if (empty($data['Account']['password'])) {
				$this->Session->setFlash('Vui lòng nhập mật khẩu!', 'default', array('class' => 'notification attention png_bg modal-err'));
				$this->redirect(array('action' => 'index'));
			} else {
				$chek = $this->Account->findByName($data['Account']['name']);
                if(!$chek){
                    $this->Session->setFlash('Tài khoản không chính xác!', 'default', array('class' => 'notification error png_bg modal-err'));
				    $this->cancel();
                }
				if ($chek['Account']['id']) {
					if ($chek['Account']['password'] == md5($data['Account']['password'])) {
						$this->Session->write('name', $chek['Account']['name']);
                        $this->Session->write('id', $chek['Account']['id']);
                        
                        $this->Session->setFlash('Đăng nhập thành công!', 'default', array('class' => 'notification success png_bg modal-err'));
                        $this->redirect(DOMAINAD);
					} else {
						$this->Session->setFlash('Mật khẩu không đúng!', 'default', array('class' => 'notification error png_bg modal-err'));
						$this->cancel();
					}
				} else {
						$this->Session->setFlash('Tài khoản không chính xác!', 'default', array('class' => 'notification error png_bg modal-err'));
						$this->cancel();
				}
			}
		}        
    }

    public function logout() {
        $this->Session->delete('id');
        $this->Session->delete('name');
        $this->Session->setFlash('Đã thoát!', 'default', array('class' => 'notification success png_bg'));
        $this->cancel();
    }
}
