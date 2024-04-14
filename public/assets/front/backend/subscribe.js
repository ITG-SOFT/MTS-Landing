const subscribeForm = document.querySelector('.subscribe form');
const csrf = document.querySelector(`meta[name='csrf']`)?.getAttribute('content');
const email = document.querySelector(`input[name='email']`);

subscribeForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    console.log(email.value);

    const result = await fetch(`/api/mail/submit`, {
        headers: {
            'X-CSRF-TOKEN': csrf,
            'Content-Type': "application/json",
            'Accept': "application/json",
        },
        method: 'POST',
        body: JSON.stringify({
            email: email.value,
        }),
    });

    const body = await result.json();

    if (result.ok) {
        if (body.success) {
            showToast('success', 'Успех', 'Вы подписались на рассылку');
        }
    } else {
        if (body.message) {
            showToast('error', 'Ошибка', body.message);
        } else {
            showToast('error', 'Ошибка', 'Что-то пошло не так');
        }
    }
});
