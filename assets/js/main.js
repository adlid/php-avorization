$('.btn-login').click(function(e){
    e.preventDefault();
    $(`input`).removeClass('error'); 
    let login = $('.signinForm__login').val();
    let password = $('.signinForm__pass').val();
    console.log("OK")
    $.ajax({
        url:'vender/signin.php',
        type:'POST',
        dataType:'json',
        data:{
            login: login,
            password: password
        },
        success (data){
            console.log(data);
            if(data.status === true){
                document.location.href = '/inter/profile.php';
            }
            else{
                if(data.type === 1){
                    data.fields.forEach(element => {
                        $(`input[name="${element}"]`).addClass('error');
                    });
                }
                
                $('.success_message').text(data.check);
                $('.success_message').addClass('success_message--active').text(data.message);
                $('.success_message').addClass('success_message--active').text(data.fields);
            }
            
        }
    });
});

$('.btn-register').click(function(e){
    e.preventDefault();
    $(`input`).removeClass('error'); 
    let login = $('.signupForm__log').val();
    let password = $('.signupForm__pass').val();
    let name = $('.signupForm__name').val();
    let email = $('.signupForm__email').val();
    let password_confirm = $('.signupForm__conf').val();
    console.log(email)
    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password_confirm', password_confirm);
    console.log(formData);
    $.ajax({
        url:'vender/signup.php',
        type:'POST',
        dataType:'json',
      
        processData: false,
        contentType: false,
        cache : false,
        data:formData,
        
        success (data){
            console.log(data);
            if(data.status === true){
                document.location.href = '/inter/index.php';
            }
            else{
                if(data.type === 1){
                    data.fields.forEach(element => {
                        $(`input[name="${element}"]`).addClass('error');
                    });
                }
                $('.success_message').removeClass('success_message--active').text(data.message);
            }
            
        }
    });
});

/*
const forms = () => {
    const form = document.querySelectorAll('form'),
        input = document.querySelectorAll('input');
        
    const message = {
        loading: 'Loading',
        success: 'Thank you, we will phone you later',
        failtire: 'Oh sorry...'

    };
    const postDate = async(url, data) => {
        document.querySelector('.status').textContent = message.loading;
        let res = await fetch(url, {
            method: "POST",
            body: data,   
            headers: {
                'Content-type': 'application/json'
            },
        });
        return await res;
    };
    const clearInputs = () => {
        input.forEach(item => {
            item.value = '';
        });
    }
    form.forEach(item => {
        item.addEventListener('submit', (e) => {
            e.preventDefault();

            let statusMessage = document.createElement('div');

            statusMessage.classList.add('status');
            item.appendChild(statusMessage);
            let formDate = new FormData(item);
            let news = document.querySelector("input[name='name']").value;
            console.log(news)
            console.log(formDate);
            const obj ={};
            formDate.forEach((item,i)=>{
                obj[i]=item;
            });
            const json = JSON.stringify(obj);
            console.log(json)
            postDate('vender/signup.php', json).then(data => {
                console.log(data);
                data})
                .then(res => {
                    console.log(res);
                    statusMessage.textContent = message.success;
                })
                .catch(() => {
                    statusMessage.textContent = message.failtire;
                })
                .finally(() => {
                    clearInputs();
                    setTimeout(() => {
                        statusMessage.remove();
                    }, 5000);
                })

        });
    })

};
forms();*/
const signinBtn = document.querySelector('.signinBtn')
const signupBtn = document.querySelector('.signupBtn')
const formBx = document.querySelector('.formBx')
const body = document.querySelector('body');
signupBtn.addEventListener('click',()=>{
    formBx.classList.add('active'); 
    body.classList.add('active'); 
})
signinBtn.addEventListener('click',()=>{
    formBx.classList.remove('active'); 
    body.classList.remove('active'); 
});
