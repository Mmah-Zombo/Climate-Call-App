const create_post = document.getElementById('create_post');
const close_post = document.getElementById('close');

close_post.addEventListener('click', () => {
    create_post.classList.toggle('flex');
    create_post.classList.toggle('hidden');
    close_post.classList.toggle('mb-10');
    if (close_post.innerHTML == 'Add Comment') {
        close_post.innerHTML = 'Close';
    } else {
        close_post.innerHTML = 'Add Comment';
    }
})

