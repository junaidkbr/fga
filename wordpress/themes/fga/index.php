<?php get_header(); ?>

  <div class="content-wrapper__column">
    <section class="page-welcome-title">
      <h1 class="page-welcome-title__heading">
        <span class="page-welcome-title__heading-alt-sm">Register or Renew your</span>
        <span class="page-welcome-title__heading-lg">SAM.gov Registration</span>
      </h1>
      <p class="page-welcome-title__paragraph narrow text-xs">A SAM registration is required for any entity to bid
        on and get paid for federal contracts or to receive federal funds. These include for profit businesses,
        nonprofits, government contractors, government subcontractors, state governments, and local municipalities.
      </p>
    </section>

    <section class="reg-choices">
      <div class="reg-choices__new">
        <img class="reg-choices__image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/new.svg" alt="Start a New SAM.gov Registration">
        <h2 class="reg-choices__name">Start a New<br>SAM.gov Registration</h2>
        <p class="reg-choices__paragraph">Start a new System for Award Management (SAM) Registration in order to
          work as a federal contractor or receive business or nonprofit grants. Once approved, your SAM Registration
          will be valid for one year.</p>
        <a href="#" class="reg-choices__button">New Registration</a>
      </div>
      <div class="reg-choices__renew">
        <img class="reg-choices__image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/renew.svg" alt="SAM.gov Registration">
        <h2 class="reg-choices__name">Renew a<br>SAM.gov Registration</h2>
        <p class="reg-choices__paragraph">A System for Award Management (SAM) Registration must be renewed each year
          to remain active and compliant. USFCR recommends renewing 90 days prior to the SAM expiration date to
          avoid service interruptions and penalties.</p>
        <a href="#" class="reg-choices__button">Renew Registration</a>
      </div>
    </section>

    <section class="help-box">
      <h2 class="help-box__heading">Federal Government Advisors Are Here to Help!</h2>
      <hr class="help-box__seperator">
      <p class="help-box__paragraph">Let us know if you have any questions or would like our assistance with federal
        registrations and contracting.</p>
    </section>

    <section class="contact-us">
      <h1 class="contact-us__heading">List Your Business</h1>
      <form class="wpcf7-form init">
        <p>
          <label class="contact-form__label"> First Name<br>
            <span class="wpcf7-form-control-wrap">
              <input type="text">
            </span>
          </label>
        </p>
        <p>
          <label>
            Last Name<br>
            <span class="wpcf7-form-control-wrap">
              <input type="text">
            </span>
          </label>
        </p>
        <p>
          <label>Business Name<br>
            <span class="wpcf7-form-control-wrap">
              <input type="text">
            </span>
          </label>
        </p>
        <p>
          <label>
            Cage<br>
            <span class="wpcf7-form-control-wrap">
              <input type="text" class="wpcf7-not-valid">
              <span class="wpcf7-not-valid-tip">Please fill out this field.</span>
            </span>
          </label>
        </p>
        <div class="full-row">
          <label>Message<br>
            <span class="wpcf7-form-control-wrap" data-name="your-message">
              <textarea class="wpcf7-not-valid" aria-required="true" aria-invalid="false"></textarea>
              <span class="wpcf7-not-valid-tip">Please fill out this field.</span>
            </span>
          </label>
        </div>
        <div class="full-row">
          <input type="submit" value="Submit" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span>
        </div>
      </form>
    </section>

    <section class="sam-search">
      <h2 class="contact-us__heading">Recent Contacts</h2>
      <table class="sam-search__table">
        <thead class="sam-search__thead">
          <tr class="sam-search__tr">
            <th class="sam-search__th">Status</th>
            <th class="sam-search__th">Business Name</th>
            <th class="sam-search__th">CAGE</th>
            <th class="sam-search__th">DUNS</th>
            <th class="sam-search__th"></th>
          </tr>
        </thead>
        <tbody class="sam-search__tbody">
          <tr class="sam-search__tr clickable-row" onclick='window.location="#"'>
            <td class="sam-search__td">
              <span class="mob-status">Status:</span>
              <span class="status__active">Active</span>
            </td>
            <td class="sam-search__td full-with">
              <span class="mob-status">Business Name:</span>
              Mint
            </td>
            <td class="sam-search__td">
              <span class="mob-status">CAGE:</span>
              6R7Y7
            </td>
            <td class="sam-search__td">
              <span class="mob-status">DUNS:</span>
              061263135
            </td>
            <td class="sam-search__td result-arrow">
              <div class="result-arrow__img"></div>
            </td>
          </tr>
          <tr class="sam-search__tr clickable-row" onclick='window.location="#"'>
            <td class="sam-search__td">
              <span class="mob-status">Status:</span>
              <span class="status__expiring">Expiring</span>
            </td>
            <td class="sam-search__td full-with">
              <span class="mob-status">Business Name:</span>
              The Chocolate Mint Foundation Chocolate
            </td>
            <td class="sam-search__td">
              <span class="mob-status">CAGE:</span>
              6R7Y7
            </td>
            <td class="sam-search__td">
              <span class="mob-status">DUNS:</span>
              061263135
            </td>
            <td class="sam-search__td result-arrow">
              <div class="result-arrow__img"></div>
            </td>
          </tr>
          <tr class="sam-search__tr clickable-row" onclick='window.location="#"'>
            <td class="sam-search__td">
              <span class="mob-status">Status:</span>
              <span class="status__expired">Expired</span>
            </td>
            <td class="sam-search__td full-with">
              <span class="mob-status">Business Name:</span>
              Mint Foundation Chocolate Mint Foundation Chocolate Mint Management Co., L.p
            </td>
            <td class="sam-search__td">
              <span class="mob-status">CAGE:</span>
              6R7Y7
            </td>
            <td class="sam-search__td">
              <span class="mob-status">DUNS:</span>
              061263135
            </td>
            <td class="sam-search__td result-arrow">
              <div class="result-arrow__img"></div>
            </td>
          </tr>
          <tr class="sam-search__tr clickable-row" onclick='window.location="#"'>
            <td class="sam-search__td">
              <span class="mob-status">Status:</span>
              <span class="status__expired">Expired</span>
            </td>
            <td class="sam-search__td full-with">
              <span class="mob-status">Business Name:</span>
              Mint Foundation Chocolate
            </td>
            <td class="sam-search__td">
              <span class="mob-status">CAGE:</span>
              6R7Y7
            </td>
            <td class="sam-search__td">
              <span class="mob-status">DUNS:</span>
              061263135
            </td>
            <td class="sam-search__td result-arrow">
              <div class="result-arrow__img"></div>
            </td>
          </tr>
          <tr class="sam-search__tr clickable-row" data-href="#1">
            <td class="sam-search__td">
              <span class="mob-status">Status:</span>
              <span class="status__expired">Expired</span>
            </td>
            <td class="sam-search__td full-with">
              <span class="mob-status">Business Name:</span>
              Mint Foundation Chocolate Mint Management Co., L.p
            </td>
            <td class="sam-search__td">
              <span class="mob-status">CAGE:</span>
              6R7Y7
            </td>
            <td class="sam-search__td">
              <span class="mob-status">DUNS:</span>
              061263135
            </td>
            <td class="sam-search__td result-arrow">
              <div class="result-arrow__img"></div>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </div>

<?php get_footer(); ?>
