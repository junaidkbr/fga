(function () {
  const forms = document.querySelectorAll('[data-contact-form]');

  if (!forms.length) {
    return;
  }

  forms.forEach(form => {
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      const data = new FormData();

      data.append('security', fga_ajax.nonce);
      data.append('action', 'business_form');
      data.append('data', JSON.stringify(Object.fromEntries(new FormData(event.target).entries())));

      fetch(fga_ajax.ajax_url, {
        method: 'POST',
        credentials: 'same-origin',
        body: data
      }).then(res => {
        // Redirect, if available
        const redirectUrl = event.target.dataset.redirectUrl;

        if (redirectUrl) {
          window.location = redirectUrl;
        }
      }).catch((error) => {
        console.error(error);
      });
    });
  });
})();
