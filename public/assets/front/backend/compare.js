const products = document.querySelectorAll('.main-bestseller .main-bestseller-block__slide');
const compareButtons = document.querySelectorAll('.main-bestseller .main-bestseller-block__slide .compare');
const compareContainer = document.querySelectorAll('#compared');

console.log(products);
console.log(compareButtons);

compareButtons.forEach(function (item) {
    item.addEventListener('click', function (event) {
        const target = event.currentTarget.closest('.main-bestseller-block__slide');


        console.log(target);
    });
});
