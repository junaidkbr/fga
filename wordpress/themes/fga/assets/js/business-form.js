(function() {
  const forms = document.querySelectorAll('[data-contact-form]');

  if (!forms.length) {
    return;
  }

  forms.forEach(form => {
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      const data = Object.fromEntries(new FormData(event.target).entries());

      jQuery.post(fga_ajax.ajax_url, {
        security: fga_ajax.nonce,
        action: 'business_form',
        data: data
      }, (response) => {
        // Redirect, if available
        const redirectUrl = event.target.dataset.redirectUrl;

        if (redirectUrl) {
          window.location = redirectUrl;
        }
      }).fail((error) => {
        console.error('Failed submitting business.');
      });
    });
  });
})();
