function check(){
    var pass = document.getElementById("pass").value
    var fname = document.getElementById("fname").value
    var lname = document.getElementById("lname").value
    var phone = document.getElementById("phone").value
    var letters=/^[A-za-zก-ฮ]+$/;
    var number = /^[0-9]+$/;
    if(fname == ""){
        alert("กรุณาระบุ Name หรือระบุ Name ให้ถูกต้องค่ะ");
        return false;
    }else if(lname == ""){
        alert("กรุณาระบุ นามสกุล หรือระบุ นามสกุล ให้ถูกต้องค่ะ");
        return false;
    }else if (pass == ""){
        alert("กรุณาระบุ Password หรือระบุ Password ให้ถูกต้องค่ะ");
        return false;
    }else if(phone == ""){
        alert("กรุณาระบุ เบอร์โทร หรือระบุ เบอร์โทร ให้ถูกต้องค่ะ");
        return false;
    }else{
        if(fname.match(number)){
            alert("ชื่อ ไม่สามารถใส่ 0-9 หรืออักษรพิเศษได้");
            return false;
    }if(!(lname.match(letters))){
            alert("นามสกุล ไม่สามารถใส่ 0-9 หรืออักษรพิเศษ ได้");
            return false;
    }if(pass.length <7){
            alert("Password length between 7");
            return false;
     }if(!(phone.test(letters))){
            alert("กรุณาระบุ เบอร์ หรือระบุเบอร์ ให้ถูกต้องค่ะ");
            return false;
     }else{
         return true;
         document.Formregister.submit();
     }
     }
}
function checkformInput(){
    var pass = document.getElementById("pass").value
    var fname = document.getElementById("fname").value
    var lname = document.getElementById("lname").value
    var phone = document.getElementById("phone").value
    var status = document.getElementById("status").value
    var letters=/^[A-za-zก-ฮ]+$/;
    var number = /^[0-9]+$/;
     if (pass == ""){
        alert("กรุณาระบุ Password หรือระบุ Password ให้ถูกต้องค่ะ");
        return false;
    }else if(fname == ""){
        alert("กรุณาระบุ ชื่อ หรือระบุ ชื่อ ให้ถูกต้องค่ะ");
        return false;
    }else if(lname == ""){
        alert("กรุณาระบุ นามสกุล หรือระบุ นามสกุล ให้ถูกต้องค่ะ");
        return false;
    }else if(phone == ""){
        alert("กรุณาระบุ เบอร์โทร หรือระบุ เบอร์โทร ให้ถูกต้องค่ะ");
        return false;
    }else if(status == ""){
        alert("กรุณาระบุ สถานะ");
        return false;
    }else{
        if(fname.match(number)){
            alert("ชื่อ ไม่สามารถใส่ 0-9 หรืออักษรพิเศษได้");
            return false;
    }else if(!(lname.match(letters))){
            alert("นามสกุล ไม่สามารถใส่ 0-9 หรืออักษรพิเศษ ได้");
            return false;
    }else if(pass.length <7){
            alert("Password length between 7");
            return false;
     }else if(!(phone.test(letters))){
            alert("กรุณาระบุ เบอร์ หรือระบุเบอร์ ให้ถูกต้องค่ะ");
            return false;
     }else{
         return true;
         document.FormInput.submit();
     }
     }
}
