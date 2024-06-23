let src_arr = ["url('../mine/wedding_couple.jpg')", 'url("../mine/wedding_couple2.jpg")', 'url("../mine/wedding_location.jpg")'];
let words = ['Let\'s Make You Beautiful ', 'Don\'t You Wish Ur Babe Looks Like This ', 'Beauty Makes Our World Go Round '];
let count = 0;
if (document.querySelector('.word') != null) {

    setInterval(() => {
            document.querySelector('.word').innerHTML = ' '
            count++
            let w_c = 0;
            let splitted = words[count];
            setInterval(() => {


                document.querySelector('.word').innerHTML += splitted.charAt(w_c)
                w_c++
            }, 100);


            let clas = "show" + count;
            document.querySelector('.holder').classList.add(clas)
            document.querySelector('.holder').style.backgroundImage = src_arr[count];
            setTimeout(() => {
                document.querySelector('.holder').classList.remove(clas)
            }, 2000);

            if (count === 2) {
                count = -1
            }
        },
        6000);


    //sroll animation
    function anim() {
        let imgs = document.querySelectorAll(".anim");
        for (let index = 0; index < imgs.length; index++) {
            const img = imgs[index];
            let cla = img.id;
            let windows_height = window.innerHeight;
            let img_dis = img.getBoundingClientRect().top;
            let visi = 150;
            if (img_dis < windows_height - visi) {
                img.classList.add(cla)
            } else {
                img.classList.remove(cla);
            }

        }

    }
    window.addEventListener('scroll', anim);
    window.addEventListener('scroll', index_active)

    function index_active() {
        let img = document.querySelector(".blogs");

        let windows_height = window.innerHeight;
        let img_dis = img.getBoundingClientRect().top;
        let visi = 150;
        if (img_dis < windows_height - visi) {
            img.classList.add('index-active')
        } else {
            img.classList.remove('index-active');
        }



    }
}