function check(){
    var user = document.formjs.user.value;
    var pass = document.formjs.pass.value;
    var fname = document.getElementById("fname").value
    var lname = document.getElementById("lname").value
    var phone = document.getElementById("phone").value
    var letters=/^[A-za-zก-ฮ]+$/;
    var number = /^[0-9]+$/;
    if(user == ""){
        alert("Username");
        return false;
    }else if(pass == ""){
        alert("Password");
        return false;
    }
//    if(fname == ""){
//        alert("กรุณาระบุ Name หรือระบุ Name ให้ถูกต้องค่ะ");
//        return false;
//    }else if(lname == ""){
//        alert("กรุณาระบุ นามสกุล หรือระบุ นามสกุล ให้ถูกต้องค่ะ");
//        return false;
//    }else if (pass == ""){
//        alert("กรุณาระบุ Password หรือระบุ Password ให้ถูกต้องค่ะ");
//        return false;
//    }else if(phone == ""){
//        alert("กรุณาระบุ เบอร์โทร หรือระบุ เบอร์โทร ให้ถูกต้องค่ะ");
//        return false;
//    }else{
//        if(fname.match(number)){
//            alert("ชื่อ ไม่สามารถใส่ 0-9 หรืออักษรพิเศษได้");
//            return false;
//    }if(!(lname.match(letters))){
//            alert("นามสกุล ไม่สามารถใส่ 0-9 หรืออักษรพิเศษ ได้");
//            return false;
//    }if(pass.length <7){
//            alert("Password length between 7");
//            return false;
//     }if(!(phone.test(letters))){
//            alert("กรุณาระบุ เบอร์ หรือระบุเบอร์ ให้ถูกต้องค่ะ");
//            return false;
//     }else{
//         return true;
//         document.Formregister.submit();
//     }
//     }
}
function checkformRegister(){
    
    var pass = document.register.pass.value
    var name = document.register.name.value
    var user = document.register.user.value
    var phone = document.register.phone.value
    var add = document.register.address.value
    var gender = document.register.gender.value
    var letters=/^[A-za-zก-ฮ]+$/;
    var eng=/^[ก-ฮ]+$/;
    var number = /^[0-9]+$/;
     if (user == ""){
        alert("กรุณาระบุ Username ด้วยค่ะ");
        return false;
    }else if(user.length <8){
            alert("Username ควรมากกว่า 8 ตัวอักษรค่ะ");
            return false;
     }
    
    else if(pass == ""){
        alert("กรุณาระบุ Password ด้วยค่ะ");
        return false;
    }else if(pass.length <8 ){
            alert("Password ควรมากกว่า 8 ตัวอักษร ");
            return false;
     }
    else if(name == ""){
        alert("กรุณาระบุชื่อด้วยค่ะ");
        return false;
    }
    else if(name.match(number)){
            alert("กรุณาระบุ ชื่อ-นามสกุล ให้ถูกต้องค่ะ");
            return false;
    }
    else if(phone == ""){
        alert("กรุณาระบุ เบอร์โทร ด้วยค่ะ");
        return false;
    }
    else if(phone.match(letters)){
            alert("กรุณาระบุเบอร์โทรให้ครบ 10 ตัวและ0-9 ให้ถูกต้องค่ะ");
            return false;
    }
    
    else if(add == ""){
        alert("กรุณาระบุที่อยู่ด้วยค่ะ");
        return false;
    }
    else if(gender == ""){
        alert("กรุณาระบุเพศด้วยค่ะ");
        return false;
    }
    else{
        alert("สมัครเรียบร้อย");
        return true;
    }
    
        
    
     }

