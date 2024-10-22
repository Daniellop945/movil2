document.addEventListener("DOMContentLoaded",()=>{
    document.getElementById('menu').addEventListener('change', function(){
        var x = document.getElementById('menu').value;     
        if(x == "op1"){          
            document.body.style.backgroundColor = "black";
            let e = document.getElementById("c33");
            let e1 = document.getElementById("c34");
            let e2 = document.getElementById("c35");
            let e3 = document.getElementById("c36");
            e.id = "c3";
            e1.id = "c31";
            e2.id = "c32"; 
            e3.id = "c5";
        }
        else{
            document.body.style.backgroundColor = "white";
            let e = document.getElementById("c3");
            let e1 = document.getElementById("c31");
            let e2 = document.getElementById("c32");
            let e3 = document.getElementById("c5");
            e.id = "c33";
            e1.id = "c34";
            e2.id = "c35";
            e3.id = "c36";
        }
    });
    document.getElementById('practice').addEventListener('click', function(){
        window.location.href = 'practice.php';
    });
    document.getElementById('learn').addEventListener('click', function(){
        window.location.href = 'index.php';
    });
});


