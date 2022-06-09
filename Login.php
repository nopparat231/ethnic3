<?php include("Connect.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">
    <meta http-eqiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
<style>
    @import url('https://fonts.googleapis.com/css?family=Lato:300,400,700');
* {
    box-sizing: border-box;
}

html,
body{
    /* ลบขอบสีขาวส่วนเกินของขอบกระดาษ */
    margin: 0;
    padding: 0;
    height: 100%;
}

body{
    /* จัดหน้าให้อยู่กึ่งกลาง */
    font-family: 'Lato',sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(120deg, #FFE4B5, #DECBA4); /* ไล่ลีพื้นหลังไล่สี*/
    overflow: hidden;
}
input{
    font-family: inherit;
    border: 0;
    border-bottom: 1px solid #aaa;
    font-size: 12px;
    color: #000;
    border-radius: 0;
}

input[type="text"],
input[type="password"]{
    width: 100%;
    height: 40px;
}

ิีbutton,
input:focus {
    outline: 0; /* ลบขอบสีฟ้าตอนจิ้มที่ช่องกรอกข้อมูล*/
}

.form-group{ /* ระยะห่างระหว่างช่อง*/
    position: relative;
    padding-top: 0px;
    margin-top: 5px;
}

label{
    position: absolute;
    top: 0;
    opacity: 1;
    transform: translateY(5px);
    color: #aaa;
    font-weight: 300;
    font-size: 15px;
    letter-spacing: -0.00933333em;
    transition: .2s ease-in-out;
}
input:placeholder-shown + label{
    opacity: 0;
    transform: translateY(15px);
}

.h1 { /* ตัวอักษร click to register */
    color : #fff;
    opacity: 0.8;
    font-size: 18px;
    font-weight: 400;
    text-transform: uppercase;
    letter-spacing: 0.2405em;
    transition: 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
    text-align: center;
    cursor: pointer;
    position: absolute;
}

.open h1 { /* เรียกใช้ในไฟล์ script เพื่อ slide*/
    transform: translateX(200px) translateZ(0);
}

.h2{
    color: #000;
    font-size: 20px;
    letter-spacing: -0.00933333em;
    font-weight: 500;
    padding-bottom: 15px;
}

.login-wrapper { /* เหลือแค่รูป ปุ่มโดนทับไว้ มั้งง*/
    width: 800px;
    height: 440px;
    background-color: #fff;
    box-shadow: 0px 2px 50px rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    overflow: hidden; 
    position: relative;
}

.login-left { /* ตัวอักษร click to register ขึ้นมาอยู่บนรูป */
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
    overflow: hidden;
}

.login-left img{
    object-fit: cover;
    width: 100%;
    height: 100%;
    display: block;
    transition: 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
    object-position: left;
}


.open .login-left img {
    transform: translateX(280px) translateZ(0);
}
.open .login-left {
    transform: translateX(-410px) translateZ(0);
}


.login-right {
    padding: 10px;
    position: absolute;
    top: 0;
    right: 0;
    width: 400px;
    transform: translateX(400px) translateZ(0);
    transition: 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
}

.open .login-right { /* เมื่อถูกใช้ ฟอร์มจะเลื่อนไปทางซ้าย*/
    transform: translateX(0px) translateZ(0);
}


.button-area {
    display: flex;
    justify-content: flex-end; /* ปุ่มจะอยู่ซ้าย-ขวา*/
    margin-top: 15px;
}

.btn {
    font-family: inherit;
    background-color: transparent;  /* โปร่งใส*/
    border: none;
    border-radius: 2px;
    height: 40px;
    display: flex;
    padding: 10px 35px;
    cursor: pointer;
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing:  -0.00933333em;
}

.btn-primary {
    color: #fff;
    background: linear-gradient(120deg, #3E5151, #DECBA4);
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    
}

.btn-secondary {
    color: #3E5151;
}
</style>
</head>
<body>
    <div class="login-wrapper">
        <div class= "login-left">
            <img src="cover.png">
                <div class="h1">กดเพื่อเข้าสู่ระบบ</div>
        </div>
        
           <div class="login-right">
                <div class="h2">เข้าสู่ระบบ</div>


            <form name="f1" action="checklogin.php" method="post">
                
            <div class="from-group">
                <input name = "Email" type="text" id="Email"placeholder="Email">
                <label for="Email">Email</label>
            </div>

            <div class="from-group">
                <input name="Password" type="Password" id="Password"placeholder="Password">
                <label for="Password">Password</label>
            </div>
            <div class="button-area">
            <button type="submit" name="Submit" class="btn btn-primary">เข้าสู่ระบบ</button>
            </div>
            </form>

                <p>ยังไม่มีบัญชีใช่ไหม? &nbsp;<a href=Register.php>ลงทะเบียน</button></a></p>

        </div>

    </div>

    <script src="script.js"></script>
</body>
</html>