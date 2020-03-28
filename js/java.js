
            function azz(){
                 var item_name = document.formjs.item_name.value;
                 var item_price = document.formjs.item_price.value;
                 var item_detail = document.formjs.item_detail.value;
                 var item_amount = document.formjs.item_amount.value;
                  var num = /^[0-9]+$/;
                if( item_name == ""|| item_price == "" || item_detail == "" || item_amount=="" ){
                    alert("กรอกไม่ตรบ");
                    return false;
                }
                if(item_price.match(num)){}
                    else{
                        alert("ราคาสินค้าตัวเลขเท่านั้น");
                        return false;
                    }
                if(item_amount.match(num)){}
                    else{
                        alert("จำนวนสินค้าตัวเลขเท่านั้น");
                        return false;
                    }
               
        }
     

