<script type="text/javascript">
                    function validateForm()
                    {
                        var x=document.forms["contactForm"]["data[Contact][name]"].value;
                        var y=document.forms["contactForm"]["data[Contact][diachi]"].value;
                        var z=document.forms["contactForm"]["data[Contact][sodienthoai]"].value;
                        var i=document.forms["contactForm"]["data[Contact][message]"].value;
                        if (x==null || x=="")
                        {
                            alert("Bạn chưa nhập họ tên");
                            return false;
                        }
                        if (y==null || y=="")
                        {
                            alert("Bạn chưa nhập địa chỉ");
                            return false;
                        }
                        if (z==null || z=="")
                        {
                            alert("Bạn chưa nhập số điện thoại");
                            return false;
                        }
                        if (i==null || i=="")
                        {
                            alert("Bạn chưa nhập nội dung");
                            return false;
                        }
                        var a=document.forms["contactForm"]["data[Contact][email]"].value;
                        var atpos=a.indexOf("@");
                        var dotpos=a.lastIndexOf(".");
                        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=a.length)
                        {
                            alert("Định dạng mail không đúng");
                            return false;
                        }
                    }
                </script>
<div class="bg_titlechung"><div style="padding: 12px; color: #fff; text-transform: uppercase; font-weight: bold;"><?php echo __('lienhe');?></div></div>
<div class="boxmain">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="content"><?php
                    $setting = $this->requestAction('/comment/setting');
                    echo $setting['Setting']['contactinfo'];
                    ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
                <td>
                    <form style="height:370px;"  id="contactIndexForm" name="contactForm" class="form_contact"  onsubmit="return validateForm();" method="post" action="contact">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td width="150" height="30"><span class="field">
                                <label for="Họ tên" class="styled">Họ Tên</label>
                                </span></td>
                            <td><span class="thefield">
                                <input name="name" type="text" id="name" size="40" />
                            </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                <label for="Địa chỉ2" class="styled">Địa chỉ</label>
                                </span></td>
                            <td><span class="thefield">
                                <input name="address" type="text" id="address" size="40" />
                            </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                <label for="Email2" class="styled">Email</label>
                                </span></td>
                            <td><span class="thefield">
                                <input name="email" type="text" id="email" size="40" />
                            </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                <label for="Điện thoại2" class="styled">Số điện thoại</label>
                                </span></td>
                            <td><span class="thefield">
                                <input name="mobile" type="text" id="mobile" size="40" />
                            </span></td>
                        </tr>
                        <tr>
                            <td><span class="field">
                                <label for="Nội dung2" class="styled">Tiêu đề</label>
                                </span></td>
                            <td><span class="thefield">
                                <input name="title" type="text" id="title" size="40" />
                                </span></td>
                        </tr>
                        <tr>
                            <td><span class="field">
                                <label for="Nội dung2" class="styled">Nội dung</label>
                                </span></td>
                                <td style="padding-top: 10px;"><span class="thefield">
                                <textarea name="content"cols="40" rows="8" ></textarea>
                                </span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><button type="submit" value="Gửi mail" name="save"  />
                                Gửi mail
                                </button></td>
                        </tr>
                    </table>
            </form>
                </td>
        </tr>
    </table>
</div>
