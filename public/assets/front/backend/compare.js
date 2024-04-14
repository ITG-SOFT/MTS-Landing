// document.addEventListener("DOMContentLoaded", function(){
const products = document.querySelectorAll('.main-bestseller .main-bestseller-block__slide');
const compareButtons = document.querySelectorAll('.main-bestseller .main-bestseller-block__slide .compare');
const compareContainerHead = document.querySelector('#compared .compared-block-table thead tr:last-child');

const checkProductInList = (id) => {
    const compareImages = document.querySelectorAll('.compared-block-table .compare-image');

    if (!compareImages || compareImages?.length === 0) {
        return null;
    }

    for (const compareImage of compareImages) {
        if (Number.parseInt(compareImage.dataset.id) === Number.parseInt(id)) {
            return true;
        }
    }

    return false;
};

const removeCompareItem = (id) => {
    const compareImages = document.querySelectorAll(`.compared-block-table .compare-image[data-id='${id}']`);

    for (const compareImage of compareImages) {
        compareImage.remove();
    }

    const attributes = document.querySelectorAll(`.compared-block-table tbody td[data-id='${id}']`);

    for (const attribute of attributes) {
        attribute.remove();
    }

    const haveAttributes = document.querySelector('.compared-block-table tbody .row-compare td:not(.row-compare-title)');
    if (!haveAttributes) {
        const compareAttributes = document.querySelectorAll('.compared-block-table tbody .row-compare');
        for (const compareAttribute of compareAttributes) {
            compareAttribute.remove();
        }
    }

    const compareButton = document.querySelector(`.main-bestseller .main-bestseller-block__slide[data-id="${id}"] .compare`);
    compareButton.classList.remove('compare-active');

    updateProductCount();
    showToast('success', 'Успех', 'Товар удалён из сравнения');
};

const updateProductCount = () => {
    const count = document.querySelectorAll(`.compared-block-table .compare-image`).length ?? 0;
    const compareCount = document.querySelector('.compare-count');

    compareCount.innerText = count;
    if (count === 0) {
        compareCount.style.display = 'none';
    }
};

compareButtons.forEach(function (item) {
    item.addEventListener('click', async function (event) {
        const target = event.currentTarget.closest('.main-bestseller-block__slide');
        const id = target.dataset.id;
        const category = target.dataset.category;

        const compareImage = document.querySelector('.compared-block-table .compare-image:last-child');
        const haveCategory = compareImage ? (compareImage.dataset.category && compareImage.dataset.category !== category) : false;

        const checkProduct = checkProductInList(id);

        if (!haveCategory) {
            if (!checkProduct) {
                const result = await fetch(`/api/products/${id}`);

                if (result.ok) {
                    const body = await result.json();
                    const data = body.data;

                    const img = `<th class="compare-image" data-category="${data.category.id}" data-id="${data.id}">
                        <div class="compare-image-block">
                            <div class="compare-image-block__image">
                                <img src="${data.photo}" alt="Image">
                            </div>
                            <div class="compare-image-block__type">${data.category.title}</div>
                            <div class="compare-image-block__title">
                                <h5>${data.title}</h5>
                            </div>
                            <svg class="compare-image-block__close" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none" style="cursor:pointer;">
                                <rect y="0.5" width="30" height="30" rx="15" fill="white" />
                                <path d="M7.80078 8.5L21.8008 22.5M7.80078 22.5L21.8008 8.5" stroke="#666465" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </th>`;

                    compareContainerHead.insertAdjacentHTML('beforeend', img);

                    const attributeContainer = document.querySelector('#compared .compared-block-table tbody');
                    const haveCompareAttributes = document.querySelector('#compared .compared-block-table tbody .row-compare');

                    const closeButton = document.querySelector('.compared-block-table .compare-image:last-child .compare-image-block__close');
                    closeButton.addEventListener('click', function (event) {
                        removeCompareItem(event.currentTarget.closest('.compare-image').dataset.id);
                    });

                    if (!haveCompareAttributes) {
                        for (const attribute of data.attributes) {
                            const row = `<tr class="row-compare" data-id="${attribute.id}">
                                <td class="row-compare-title">${attribute.title}</td>
                            </tr>`;
                            attributeContainer.insertAdjacentHTML('beforeend', row);
                        }
                    }

                    const attributes = document.querySelectorAll('.compared-block-table tbody .row-compare');
                    const rowTitle = document.querySelector('.compared-block-table tbody .row-title');

                    rowTitle.insertAdjacentHTML('beforeend', `<td data-id="${data.id}"></td>`);

                    for (const attribute of attributes) {
                        let haveValue = false;

                        for (const value of data.attribute_values) {
                            if (Number.parseInt(attribute.dataset.id) === value.attribute.id) {
                                const td = `<td data-id="${data.id}">${value.value}</td>`;
                                attribute.insertAdjacentHTML('beforeend', td);
                                haveValue = true;
                            }
                        }

                        if (!haveValue) {
                            const td = `<td data-id="${data.id}">-</td>`;
                            attribute.insertAdjacentHTML('beforeend', td);
                        }
                    }

                    showToast('success', 'Успех', 'Товар добавлен для сравнения');
                }
            } else {
                removeCompareItem(id);
            }
        } else {
            showToast('error', 'Ошибка', 'Товар должен быть из одной категории');
        }
        updateProductCount();
    });
});
// });
