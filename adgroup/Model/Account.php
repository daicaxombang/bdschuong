<?php

/** ******************************
 * @author  :   Yêu Tinh
 * @email   :   domain.web.online@gmail.com
 * @since   :   8-07-2013
 *********************************/

class Account extends AppModel {

    var $name = 'Account';
    var $displayField = 'name';
    var $validate = array(
        'name' => array(
            'isUnique' => array (
                'rule' => 'isUnique',
                'message' => 'Tên đăng nhập này đã được sử dụng'
            ),
            'custom' => array (
                'rule' => array('custom', '/^[A-Za-z0-9,\.-_]*$/i'), 
                'message' => 'Tên đăng nhập chỉ có thể chứa chữ cái, số, _, - và .'
            ),
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Tên đăng nhập không được để trống',
                'allowEmpty' => false,
            ),
            'minLength' => array(
                'rule' => array('minLength', 3),
                'message' => 'Tên đăng nhập phải có tối thiểu 3 ký tự.')          
        ),
        'email' => array(
            'isUnique' => array (
                'rule' => 'isUnique',
                'message' => 'Email này đã được sử dụng.'
            ),
            'valid' => array (
                'rule' => array('email', false),
                'message' => 'Email không hợp lệ.'
            ),
            'minLength' => array(
                'rule' => array('minLength', 8),
                 'message' => 'Email phải có tối thiểu 8 ký tự.'
            )
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Mật khẩu không được để trống',
                'allowEmpty' => false,
            ),
            'passwordlength' => array(
                'rule' => array('between', 6, 32),
                'message' => 'Mật khẩu phải có 6 -> 32 ký tự.'
            ),      
        ),
        'repassword' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Mật khẩu không được để trống',
                'allowEmpty' => false,
            ),
            'passwordlength' => array(
                'rule' => array('between', 6, 32),
                'message' => 'Mật khẩu phải có 6 -> 32 ký tự.'
            ),
            'passwordequal' => array(
                'rule' => array('checkpassword' ),
                'message' => 'Không khớp.'
            ) 
        ),
        
        
        'password_new' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Mật khẩu mới không được để trống',
                'allowEmpty' => false,
            ),
            'passwordlength' => array(
                'rule' => array('between', 6, 32),
                'message' => 'Mật khẩu phải có 6 -> 32 ký tự.'
            ),      
        ),
        'repassword_new' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Mật khẩu mới không được để trống',
                'allowEmpty' => false,
            ),
            'passwordlength' => array(
                'rule' => array('between', 6, 32),
                'message' => 'Mật khẩu phải có 6 -> 32 ký tự.'
            ),
            'passwordequal' => array(
                'rule' => array('checkpassword_new' ), 
                'message' => 'Không khớp.'
            ) 
        ),
        
        
        'confirm_password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Vui lòng nhập mật khẩu',
                'allowEmpty' => false,
            ),
            'passwordlength' => array(
                'rule' => array('confirm_password' ),
                'message' => 'Mật khẩu không đúng'
            ),      
        ),
    );
    
    function confirm_password()
    {
        $tmp = $this->find('first',array('conditions'=>array('Account.id'=>$this->data['Account']['id'])));
       return !strcmp(md5($this->data['Account']['confirm_password']),$tmp['Account']['password']);
    }

    function checkpassword()
    {
       return !strcmp($this->data['Account']['password'],$this->data['Account']['repassword']);
    }
    
    function checkpassword_new()
    {
       return !strcmp($this->data['Account']['password_new'],$this->data['Account']['repassword_new']);
    }
    
    public function beforeSave($options = array()) {
        
        if(isset($this->data['Account']['password_new'])){
            $this->data['Account']['password'] = md5($this->data['Account']['password_new']);
        }
        else if(isset($this->data['Account']['password'])){
            $this->data['Account']['password'] = md5($this->data['Account']['password']);
        }
        return true;
    }

    var $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id'
        )
    );

}

?>