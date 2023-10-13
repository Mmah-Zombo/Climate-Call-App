const create_post = document.getElementById('create_post');
const close_post = document.getElementById('close');
// const edit_btn = document.getElementById('edit_btn');
// const edit = document.getElementById('edit');

close_post.addEventListener('click', () => {
    create_post.classList.toggle('flex');
    create_post.classList.toggle('hidden');
    close_post.classList.toggle('mb-10');
    if (close_post.innerHTML == 'Create a post') {
        close_post.innerHTML = 'Close';
    } else {
        close_post.innerHTML = 'Create a post';
    }
})

// edit_btn.addEventListener('click', () => {
//     edit.classList.toggle('hidden');
// })