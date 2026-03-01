<script>
$(document).ready(function() {

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        let username = $('#username').val().trim();
        let password = $('#password').val().trim();
        let btn = $('#btnSubmit');
        let originalContent = btn.html();

        if(username === '' || password === '') {
            $.alert({
                title: 'แจ้งเตือน',
                content: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                type: 'orange'
            });
            return;
        }

        btn.html('กำลังตรวจสอบ...')
           .prop('disabled', true)
           .addClass('opacity-70 cursor-not-allowed');

        $.ajax({
            url: 'api/login_action.php',   // ✅ ถูกต้อง
            method: 'POST',
            dataType: 'json',
            data: {
                username: username,
                password: password
            },
            success: function(response) {

                btn.html(originalContent)
                   .prop('disabled', false)
                   .removeClass('opacity-70 cursor-not-allowed');

                if(response.success) {

                    $.confirm({
                        title: '🎉 สำเร็จ!',
                        content: 'กำลังพาท่านไปหน้าหลัก...',
                        type: 'green',
                        theme: 'modern',
                        buttons: {
                            ok: {
                                text: 'ไปที่ Dashboard',
                                btnClass: 'btn-green',
                                action: function() {
                                    window.location.href = 'dashboard.php'; // ✅ ถูกต้อง
                                }
                            }
                        }
                    });

                } else {
                    $.alert({
                        title: '🚨 เข้าสู่ระบบไม่สำเร็จ',
                        content: response.message,
                        type: 'red'
                    });
                }
            },
            error: function() {
                btn.html(originalContent)
                   .prop('disabled', false)
                   .removeClass('opacity-70 cursor-not-allowed');

                $.alert({
                    title: 'Server Error',
                    content: 'ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้',
                    type: 'red'
                });
            }
        });

    });

});
</script>