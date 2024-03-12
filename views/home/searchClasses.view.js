//  SEARCH CLASSES
let searchclass = document.querySelector('#searchclass');
searchclass.addEventListener('keyup', function(e){
    let searchtext = searchclass.value.toLowerCase();
    let itemPost = document.querySelectorAll('#classCard');
    for (let posts of itemPost) {
        let titles = posts.children[0].children[1].children[1].children[0].textContent.toLowerCase();
        if (titles.indexOf(searchtext) === -1) {
            posts.style.display = "none";
        } else {
            posts.style.display = "block";
        }
        console.log(titles);
    }
    
})

