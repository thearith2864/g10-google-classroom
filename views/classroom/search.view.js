//  SEARCH POST
let search = document.querySelector('#search');
search.addEventListener('keyup', function(e) {
    let text = search.value.toLowerCase();
    const itemPosts = document.querySelectorAll('tbody tr');
    for (let post of itemPosts) {
        let title = post.children[0].children[0].children[0].children[1].children[0].textContent.toLocaleLowerCase();
        if (title.indexOf(text) === -1) {
            post.style.display = "none";
        } else {
            post.style.display = "table-row";
        }
    }
    
})

