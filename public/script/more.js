if (document.querySelector(".file")) {

    let fake_btn = document.querySelector('#fake-btn').addEventListener('click', function(params) {
        document.querySelector('.file').click();
    })


    ///preview image before submit  for single image
    let img = document.querySelector(".file").addEventListener('change', function(params) {
        let reader = new FileReader();
        reader.onload = (e) => {
            //getting the image viewer
            let viewer = document.querySelector(".show_img");
            viewer.style.display = "block"

            viewer.src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    })

}

if (document.querySelector(".file-multiple")) {
    let fake_btn = document.querySelector('#fake-btn').addEventListener('click', function(params) {
        document.querySelector('.file-multiple').click();
    })


    ///preview image before submit  for multiple image
    document.querySelector(".file-multiple").addEventListener('change', function(e) {
        let hold_img = document.querySelector(".hold_img")
        document.querySelector("#c_u").style.display = "block"
        let files = e.target.files;
        for (let tr = 0; tr < files.length; tr++) {
            const file = files[tr];
            if (!file.type.match("image")) {
                document.querySelector('.img_err').innerHTML = "File Not An Image";
                continue
            }
            let reader = new FileReader();

            reader.addEventListener('load', function(s) {
                let img = document.createElement('img');
                img.src = s.target.result;
                img.className = "pl-2 pt-2"
                img.style.width = "100%";
                img.style.height = "30vh";
                hold_img.append(img);
            })

            reader.readAsDataURL(file);
        }


    })
}


// for deleted post btn
let post_btn = $('#show_deleted_post').on('click', function() {
    this.className = "btn btn-dark"
    $("#deleted_post").show();
    $("#deleted_user").hide()

    document.querySelector("#show_deleted_user").className = "btn btn-light";
})

// for deleted user btn
let user_btn = $('#show_deleted_user').on('click', function() {
        this.className = "btn btn-dark"
        $("#deleted_post").hide();
        $("#deleted_user").show();
        document.querySelector("#show_deleted_post").className = "btn btn-light"
    })
    //hide and show nav//
let lines = document.querySelector('#toggle-nav').addEventListener('click', function() {
    let nav = document.querySelector("#nav")


    if (nav.classList.contains('show')) {
        nav.classList.remove('show', 'now')
        nav.classList.add('now')
    } else {
        nav.classList.add('show')
        nav.classList.remove('now')
    }



})

window.onclick = function(e) {
    if (!(e.target.matches('#toggle-nav') || e.target.matches('.line'))) {
        let nav = document.querySelector("#nav");
        if (nav.classList.contains('now')) {
            nav.classList.add('show')
        }
    }
}
let side_bar = document.querySelector(".page_type")
let user_items = document.querySelectorAll(".user_items");
for (let i = 0; i < user_items.length; i++) {
    const item = user_items[i];
    if (item.id === side_bar.id) {
        item.style.backgroundColor = '#00c3ff'
    }
}

// three dots in gallery

let imgs = document.querySelectorAll(".up_img");
imgs.forEach(img => {
    img.addEventListener("mouseover", function() {
        //  console.log(img.children);
        img.querySelector('.dots').classList.remove('hide')
            //document.querySelector(".hide").classList.remove('hide')
    })
});

let imgds = document.querySelectorAll(".up_img");
imgds.forEach(img => {
    img.addEventListener("mouseout", function() {



        img.querySelector('.dots').classList.add('hide')

    })
}); //clicking dots

let dots = document.querySelectorAll(".dots");
dots.forEach(dot => {
    dot.addEventListener('click', function() {
        dot.parentElement.querySelector(".opts").style.display = "block"
    })
});



//show next form
if (document.querySelector("#next") != null) {


    let next = document.querySelector("#next").addEventListener('click', function() {
        this.style.display = "none"
        document.querySelector(".user-h").style.display = "none"
        document.querySelector("#back").style.display = "inline-block"
        document.querySelector(".e-form").style.display = "block"
    })


    //go back
    document.querySelector("#back").addEventListener('click', function() {
        this.style.display = "none"
        document.querySelector(".user-h").style.display = "inline-block"
        document.querySelector("#next").style.display = "inline-block"
        document.querySelector(".e-form").style.display = "none"
        document.querySelector("#hold_email").value = ''
    })

    //send email
    let send = document.querySelector("#send-email").addEventListener("click", function(e) {
        let arr = [];
        let inds = document.querySelectorAll(".ind-send");
        inds.forEach(ind => {
            if (ind.checked) {
                arr.push(ind.value)
            }
        });
        document.querySelector("#hold_email").value = arr;
    })


}
// blogpost page
if (document.querySelector("#right_btn") != null) {


    let blog_imgs = document.querySelectorAll('.blog_img');

    let b_count = 0;
    blog_imgs[b_count].style.display = "block";


    let right_btn = document.querySelector("#right_btn");


    right_btn.addEventListener("click", function() {

        blog_imgs[b_count].style.display = "none";
        if (b_count == 2) {
            b_count = 0
        } else {
            b_count++
        }
        blog_imgs[b_count].style.display = "block";
        out()
    })




    let left_btn = document.querySelector("#left_btn");


    left_btn.addEventListener("click", function() {
        blog_imgs[b_count].style.display = "none";
        if (b_count == 0) {
            b_count = 2
        } else {
            b_count--
        }
        blog_imgs[b_count].style.display = "block";
        out()
    })

    //automatic

    setInterval(() => {

        blog_imgs[b_count].style.display = "none";
        if (b_count == 2) {
            b_count = 0
        } else {
            b_count++
        }
        blog_imgs[b_count].style.display = "block";
        out()

    }, 3000);

    function out(params) {


        document.querySelector("#blog_img").addEventListener('mouseover', function(params) {
            document.querySelector("#left_btn").style.display = 'block '
            document.querySelector("#right_btn").style.display = 'block '
        })
        document.querySelector("#blog_img").addEventListener('mouseout', function(params) {
            document.querySelector("#left_btn").style.display = 'none'
            document.querySelector("#right_btn").style.display = 'none'
        })
    }
    out()


    //row_post in blog page

    let rows = document.querySelectorAll('.row_posts');
    let holder = document.querySelector('.row_post');
    for (let r_count = 0; r_count < 5; r_count++) {
        const row = rows[r_count];
        let r = row.cloneNode(true)
        holder.append(r)
        r.style.display = "block"
    }

    //move post
    let prev = 0
    let after = 5;
    setInterval(() => {
        let sal = holder.querySelectorAll('.row_posts');
        sal[0].classList.add('rowGo')

        const row = rows[after];
        let r = row.cloneNode(true)
        r.style.display = 'block';


        holder.append(r)
        setTimeout(() => {

            sal[0].remove()
        }, 300);
        if (after == 9) {
            after = 0
        } else {
            after++;
        }




    }, 4000);
    //more post

    let m_p = document.querySelectorAll(".m_p_img");
    m_p.forEach(p => {
        p.addEventListener('mouseover', function() {
            p.classList.add('scale')
        })

        p.addEventListener('mouseleave', function() {
            p.classList.remove('scale')
        })
    });
}
// settings
if (document.querySelector('#c_password') != null) {
    let c_password = document.querySelector('#c_password').addEventListener('click', function() {


            document.querySelector(".change_pass").classList.toggle('play')

        })
        // err_password

    document.querySelector("#close").addEventListener("click", function() {

        this.parentElement.remove()
    })
}
//life search for topic