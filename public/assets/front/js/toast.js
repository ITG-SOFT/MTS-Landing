
//========================================================================================================================================================
    // Функция для отображения уведомления
    function showToast(type, title, message) {
		const toastContainer = document.getElementById('toast-container');
		if (toastContainer) {
			 const toast = document.createElement('div');
			 toast.classList.add('toast', type, title);
			 toast.innerHTML = `
				  <div class="toast-status-icon">
						<svg>
							 <use xlink:href="#${type}ToastIcon"></use>
						</svg>
				  </div>
				  <div class="toast-content">
						<span>${type.charAt(0).toUpperCase() + type.slice(1)}</span>
						<span>${title.charAt(0).toUpperCase() + title.slice(1)}</span>
						<p>${message}</p>
				  </div>
				  <button class="toast-close" onclick="closeToast(event)">
						<svg>
							 <use xlink:href="#closeToastIcon"></use>
						</svg>
				  </button>
				  <div class="toast-duration"></div>
			 `;
			 toastContainer.appendChild(toast);
			 closeToastDuration();
		}
  }

  // Функция для закрытия уведомления
  function closeToast(event) {
		let toastClose = event.target;
		toastClose.closest('.toast').remove();
  }

  // Функция для закрытия уведомлений после задержки
  function closeToastDuration() {
		if (document.querySelectorAll('.toast')) {
			 let toasts = document.querySelectorAll('.toast');
			 toasts.forEach(toast => {
				  setTimeout(() => {
						toast.remove();
				  }, 10000); // Устанавливаем задержку в 10 секунд (10000 миллисекунд)
			 });
		}
  }


  // Наблюдение за изменениями внутри контейнера уведомлений
  if (document.getElementById('toast-container')) {
		let mutationObserver = new MutationObserver(function(mutations) {
			 mutations.forEach(function(mutation) {
				  closeToastDuration();
			 });
		});
		mutationObserver.observe(document.getElementById('toast-container'), {
			 attributes: true,
			 characterData: true,
			 childList: true,
			 subtree: true,
			 attributeOldValue: true,
			 characterDataOldValue: true
		});
  }

				
  //пример вызова
  // showToast('success', 'Like added');