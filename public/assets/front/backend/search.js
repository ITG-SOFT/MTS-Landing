const searchField = document.querySelector(`[name="search"]`);
const searchBlock = document.querySelector('.drop-search-block-items ul');
const categoryItems = document.querySelectorAll('.drop-search-block-list ul li a');

const updateSearchResultList = (data) => {
    let container = '';

    for (const data_item of data) {
        const sale_price = Number.parseInt(data_item.sale_price);
        const price = Number.parseInt(data_item.price);

        const item = `<li>
            <div class="drop-search-block-items-link">
                <div class="search-atem-link__image">
                    <img src="${data_item.photo}" alt="${data_item.title}">
                </div>
                <div class="search-atem-link__title">
                    <h5>${data_item.title}</h5>
                </div>
                <div class="search-atem-link__coast">
                    ${(sale_price !== 0) ? `<span>${data_item.sale_price} руб</span>` : `<span>${data_item.price} руб</span>`}
                    ${(sale_price !== 0) ? `<s>${data_item.price} руб</s>` : ''}
                </div>
                <div data-popup="#popup" class="search-atem-link__cart">
                    <svg>
                        <use xlink:href="img/icons/icons.svg#cart"></use>
                    </svg>
                </div>
            </div>
        </li>`;

        container += item;
    }

    searchBlock.innerHTML = '';
    searchBlock.insertAdjacentHTML('beforeend', container);
};

searchField.addEventListener('change', async (event) => {
    const s = event.currentTarget.value;
    const result = await fetch(`/api/search?s=${s}`);

    if (result.ok) {
        const body = await result.json();
        const data = body.data;

        updateSearchResultList(data);
    }
});

categoryItems.forEach((item) => {
    item.addEventListener('click', async (event) => {
        event.preventDefault();
        const value = event.currentTarget.innerText;

        const result = await fetch(`/api/search?s=${value}`);

        if (result.ok) {
            const body = await result.json();
            const data = body.data;

            updateSearchResultList(data);
        }
    });
});
