const $ =  document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

const titleItems = $$('.title-item');
const contentItems = $$('.content-item');

titleItems.forEach((item, index) => {
    const contentItem = contentItems[index];
    item.onclick = function() {
       $('.title-item.active-item').classList.remove('active-item')
       this.classList.add('active-item')

       $('.content-item.block').classList.remove('block')
       contentItem.classList.add('block')
    }
})