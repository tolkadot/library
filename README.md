# Charitable Code Snippet library

This is a library of code snippets designed to help end users and theme or plugin developers.

## How to use the code snippets

If you are new to PHP or WordPress development, we recommend adding these code snippets using the [Code Snippets plugin](https://wordpress.org/plugins/code-snippets/). This allows you to add the code directly within your WordPress dashboard.

For those a little more familiar with WordPress development, you can use the snippets to create simple standalone plugins. Read the WordPress documentation about [creating a plugin](https://codex.wordpress.org/Writing_a_Plugin).

Alternatively, you could add the snippets directly to your theme or child theme's `functions.php` file.

## Contributing a snippet

We welcome and encourage everyone to submit their code snippets. If you would like to submit your snippet, please [fork the repository](https://github.com/Charitable/library/fork) and then [create a pull request](https://github.com/Charitable/library/compare/).

## Directory

### General

- [Unhook default Charitable template functions](https://github.com/Charitable/library/tree/master/general/unhook-default-charitable-template-functions.php)
- [Add an "Hours" currency](https://github.com/Charitable/library/blob/master/general/add-hours-currency.php)
- [Add a new currency, with a currency symbol](https://github.com/Charitable/library/blob/master/general/add-currency.php)
- [Add the User Dashboard menu at the top of all User Dashboard pages](https://github.com/Charitable/library/blob/master/general/add-user-dashboard-menu.php)
- [Change plugin text](https://github.com/Charitable/library/blob/master/general/change-plugin-text.php)
- [Load template files in the admin](https://github.com/Charitable/library/blob/master/general/load-template-files-in-admin.php)

### Editing Forms

- [Remove form fields](https://github.com/Charitable/library/tree/master/forms/general/remove-form-fields.php)
- [Change form fields](https://github.com/Charitable/library/tree/master/forms/general/change-form-fields.php)
- [Change the labels of form fields](https://github.com/Charitable/library/tree/master/forms/general/change-form-field-labels.php)
- [Change whether a form field is required](https://github.com/Charitable/library/tree/master/forms/general/make-form-fields-required-not-required.php)
- [Add HTML before form fields](https://github.com/Charitable/library/tree/master/forms/general/add-html-before-form-fields.php)
- [Add HTML after form fields](https://github.com/Charitable/library/tree/master/forms/general/add-html-after-form-fields.php)
- [Add a description/paragraph field to a form](https://github.com/Charitable/library/tree/master/forms/general/add-description-field.php)
- [Add arbitrary HTML to a form](https://github.com/Charitable/library/tree/master/forms/general/add-html.php)
- [Applying a `pattern` attribute to a form field](https://github.com/Charitable/library/blob/master/forms/general/set-pattern-attribute-on-field.php)

### Donation form

#### Registering new fields (examples for charitable 1.5+)

- [Adding a text field (detailed example)](https://github.com/Charitable/library/blob/master/donation-form/register-new-donation-field-1.5.php)
- [Adding a text field (condensed example)](https://github.com/Charitable/library/blob/master/donation-form/collect-national-id-number.php)
- [Adding a checkbox field](https://github.com/Charitable/library/blob/master/donation-form/add-checkbox-field-to-donation-form.php)
- [Adding a select field](https://github.com/Charitable/library/blob/master/donation-form/add-select-field-to-donation-form.php)
- [Adding multiple fields at once](https://github.com/Charitable/library/blob/master/donation-form/register-multiple-donation-fields.php)
- [Adding a new field, but only showing it for a specific campaign](https://github.com/Charitable/library/blob/master/donation-form/register-new-donation-field-for-specific-campaign.php)
- [Adding an "Organisation" field](https://github.com/Charitable/library/blob/master/donation-form/add-organisation-field.php)
- [Adding a dynamicaly populated hidden field to the donation form](https://github.com/Charitable/library/blob/master/donation-form/add-dynamic-hidden-field.php)

#### Changing fields & other

- [Moving fields in relation to each other](https://github.com/Charitable/library/blob/master/donation-form/move-fields.php)
- [Make a donation field required](https://github.com/Charitable/library/blob/master/donation-form/make-single-field-required.php)
- [Make the donor address fields required](https://github.com/Charitable/library/blob/master/donation-form/make-donor-address-required.php)
- [Replace label with placeholder attribute for each donation field](https://github.com/Charitable/library/blob/master/donation-form/add-field-placeholders.php)
- [Remove donation form fields](https://github.com/Charitable/library/blob/master/donation-form/remove-donation-form-fields.php)
- [Remove login form](https://github.com/Charitable/library/blob/master/donation-form/remove-login-form.php)
- [Add campaign title as a header](https://github.com/Charitable/library/blob/master/donation-form/add-campaign-title-to-start.php)
- [Display a specific donation form](https://github.com/Charitable/library/blob/master/donation-form/display-donation-form.php)
- [Change the section headers](https://github.com/Charitable/library/blob/master/donation-form/change-section-headers.php)
- [Move donor details section to end of form, after payment form](https://github.com/Charitable/library/blob/master/donation-form/move-user-fields-in-donation-form.php)
- [Add an opt-out for receiving the donation receipt](https://github.com/Charitable/library/blob/master/donation-form/add-donation-receipt-opt-out-checkbox.php)
- [Show the Offline payment instructions in the donation form](https://github.com/Charitable/library/blob/master/gateways/offline/add-offline-instructions-to-donation-form.php)
- [Change the donation cancellation URL](https://github.com/Charitable/library/blob/master/endpoints/change-donation-cancellation-url.php)
- [Prevent donor fields from being hidden by default for logged in users](https://github.com/Charitable/library/blob/master/donation-form/do-not-hide-donor-fields-for-logged-in-users.php)

##### City
- [Change the City field to a dropdown/select field](https://github.com/Charitable/library/blob/master/donation-form/change-city-field-to-select.php)

##### State
- [Change State field to Province](https://github.com/Charitable/library/blob/master/donation-form/change-state-to-province.php)
- [Change State field to a dropdown list of US states, with a default](https://github.com/Charitable/library/blob/master/donation-form/set-state-field-to-us-states-dropdown-with-default.php)

##### Postcode
- [Change Postcode field to ZIP Code](https://github.com/Charitable/library/blob/master/donation-form/change-postcode-to-zipcode.php)
- [Require a specific format for the Postcode field](https://github.com/Charitable/library/blob/master/forms/general/set-pattern-attribute-on-field.php)

##### Country
- [Change the Countries list to only list a few specific countries](https://github.com/Charitable/library/blob/master/forms/general/change-accepted-countries-list.php)
- [Change the Countries field to a hidden field with a default country for all donors](https://github.com/Charitable/library/blob/master/donation-form/change-country-field-to-hidden.php)
- [Add a default "Select your country" choice to the list of countries](https://github.com/Charitable/library/blob/master/donation-form/add-empty-option-to-countries-list.php)

##### Donation Amounts
- [Change the "Custom amount" field label](https://github.com/Charitable/library/blob/master/donation-form/change-custom-amount-field-label.php)
- [Set fixed donation amount](https://github.com/Charitable/library/blob/master/donation-form/set-fixed-donation-amount.php)
- [Set the default donation amount for all campaigns](https://github.com/Charitable/library/blob/master/donation-form/set-default-donation-amount.php)
- [Set the default donation amount on a per-campaign basis](https://github.com/Charitable/library/blob/master/donation-form/set-default-donation-amount-per-campaign.php)
- [Set the minimum donation amount](https://github.com/Charitable/library/blob/master/donation-form/set-minimum-donation-amount.php)
- [Set the maximum donation amount](https://github.com/Charitable/library/blob/master/donation-form/set-maximum-donation-amount.php)
- [Allow people to make $0 "donations"](https://github.com/Charitable/library/blob/master/donation-form/allow-zero-dollar-donations.php)

##### Terms & Conditions
- [Remove Terms & Conditions, Privacy Policy and User Consent fields](https://github.com/Charitable/library/blob/master/donation-form/remove-terms-fields.php)

#### Admin donation form (manual donations)

- [Allow manual donations without an email address](https://github.com/Charitable/library/blob/master/admin-donation-form/allow-manual-donations-without-email.php)

### Donation receipt

- [Display a link back to the campaign from the donation receipt](https://github.com/Charitable/library/blob/master/donation-receipt/add-campaign-link.php)
- [Display a summary of the amount raised for the campaign](https://github.com/Charitable/library/blob/master/donation-receipt/add-campaign-raised-summary.php)
- [Set a custom donation receipt page](https://github.com/Charitable/library/blob/master/donation-receipt/set-custom-donation-receipt-page.php)
- [Set a custom donation receipt page for offline donations](https://github.com/Charitable/library/blob/master/donation-receipt/set-custom-donation-receipt-page-for-offline-donations.php)
- [Set a custom donation receipt page for recurring donations](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/set-custom-receipt-page-for-recurring.php)

### Donations

- [Treat Pending donations as "Approved" donations](https://github.com/Charitable/library/blob/master/donations/add-pending-to-approved-statuses.php)
- [Automatically mark Offline donations as Paid](https://github.com/Charitable/library/blob/master/donations/auto-complete-offline-donations.php)
- [Add a Donate button with modal to your template](https://github.com/Charitable/library/tree/master/donations/add-donate-button.php)

### Emails

#### General
- [Add email headers](https://github.com/Charitable/library/blob/master/emails/add-email-headers.php)
- [Remove campaign name from donation summaries in emails](https://github.com/Charitable/library/blob/master/emails/remove-campaign-name-from-donation-summary.php)
- [Add a custom campaign field to display in emails](https://github.com/Charitable/library/blob/master/emails/add-custom-campaign-field.php)
- [Add a custom donation field to display in emails](https://github.com/Charitable/library/blob/master/emails/add-custom-donation-field.php)
- [Add a custom email field to show in campaign or donation-specific emails](https://github.com/Charitable/library/blob/master/emails/add-custom-campaign-and-donation-field.php)
- [Add an email tag for an existing field (Donation Fields API)](https://github.com/Charitable/library/blob/master/emails/add-email-tag-for-donation-field.php)
- [Add the offline payment instructions to donation emails](https://github.com/Charitable/library/blob/master/emails/add-offline-instructions-field.php)
- [Add the payment method used for the donation to donation emails](https://github.com/Charitable/library/blob/master/emails/add-gateway-donation-field.php)
- [Change the footer text in all emails](https://github.com/Charitable/library/blob/master/emails/change-footer-text.php)

#### Donation Receipt
- [Send donation receipt to customer for Offline donations that are Pending](https://github.com/Charitable/library/blob/master/emails/send-donation-receipt-for-pending-offline-donations.php)
- [Turn off the donation receipt for Offline donations](https://github.com/Charitable/library/blob/master/emails/disable-donation-receipt-for-offline-donations.php)
- [Copy the donation receipt to the website admin](https://github.com/Charitable/library/blob/master/emails/copy-donation-receipt-to-admin.php)

#### Donation Notification
- [Send donation notifications to admin for Offline donations that are Pending](https://github.com/Charitable/library/blob/master/emails/send-donation-notification-for-pending-offline-donations.php)

### Campaigns

#### Campaign Page
- [Use the Page template for campaigns](https://github.com/Charitable/library/blob/master/campaigns/use-page-template-for-campaigns.php)
- [Add featured image to the top of the campaign](https://github.com/Charitable/library/blob/master/campaigns/add-featured-image.php)
- [Remove campaign summary block](https://github.com/Charitable/library/blob/master/campaigns/remove-stats-summary-block.php)
- [Remove campaign summary block from a specific campaign](https://github.com/Charitable/library/blob/master/campaigns/remove-stats-summary-block-from-specific-campaign.php)
- [Remove the donor count](https://github.com/Charitable/library/blob/master/general/unhook-default-charitable-template-functions.php)
- [Remove the donor count from a specific campaign](https://github.com/Charitable/library/blob/master/campaigns/remove-donor-count-from-specific-campaign.php)
- [Add a progress bar before the campaign summary block](https://github.com/Charitable/library/blob/master/campaigns/add-progress-bar-before-summary.php)
- [Move the campaign summary block below the Extended Description](https://github.com/Charitable/library/blob/master/campaigns/move-campaign-summary-below-content.php)
- [Move the campaign summary block & description below the Extended Description](https://github.com/Charitable/library/blob/master/campaigns/move-campaign-summary-description-below-content.php)
- [Change the campaign finished notice](https://github.com/Charitable/library/blob/master/campaigns/change-campaign-finished-notice.php)

#### Campaign Grid/Loop
- [Remove the funds raised & progress bar in the campaigns grid](https://github.com/Charitable/library/blob/master/campaigns/remove-campaign-stats-loop.php)
- [Remove the campaign descriptions from the campaigns grid](https://github.com/Charitable/library/blob/master/campaign-loop/remove-campaign-description.php)
- [Add a custom field to the campaigns grid](https://github.com/Charitable/library/blob/master/campaign-loop/add-custom-field.php)
- [Add a Read More link to the campaigns grid](https://github.com/Charitable/library/blob/master/campaign-loop/add-read-more-link.php)
- [Change the Thumbnail size in the campaigns grid](https://github.com/Charitable/library/blob/master/campaign-loop/set-campaign-thumbnail-size.php)
- [Display the campaign creator name in the campaign page and [campaigns] output](https://github.com/Charitable/library/blob/master/campaigns/add-creator-name.php)

#### Other
- [Register a Post Parent field](https://github.com/Charitable/library/blob/master/campaigns/add-post-parent-field.php)
- [Disable description text santization](https://github.com/Charitable/library/blob/master/campaigns/disable-description-text-sanitization.php)
- [Round the percentage donated to a whole number](https://github.com/Charitable/library/blob/master/campaigns/round-percent-donated-to-whole-number.php)
- [Change the amount shown as donated to a particular campaign](https://github.com/Charitable/library/blob/master/campaigns/change-amount-donated.php)
- [Change the campaign slug base](https://github.com/Charitable/library/blob/master/campaigns/change-campaign-slug-base.php)
- [Change the campaign rewrite rules to disable the `with_front` setting](https://github.com/Charitable/library/blob/master/campaigns/change-campaign-rewrite-to-not-use-with-front.php)
- [Add a "Campaigns" menu tab to the WordPress dashboard](https://github.com/Charitable/library/blob/master/campaigns/add-campaigns-menu.php)
- [Disable donations to a campaign after it has reached its goal](https://github.com/Charitable/library/blob/master/campaigns/disable-donations-after-goal-is-reached.php)
- [Bulk update campaign end dates](https://github.com/Charitable/library/blob/master/campaigns/bulk-update-campaign-end-dates.php)

### Notifications

- [Send notification emails to the admin & new user when someone registers](https://github.com/Charitable/library/blob/master/notifications/send-notifications-on-user-registration.php) (credit: [altatof](https://github.com/altatof))

### Users

- [Allow admin access for donors and campaign creators](https://github.com/Charitable/library/blob/master/users/allow-admin-access.php)
- [Show the admin bar to donors and campaign creators](https://github.com/Charitable/library/blob/master/users/show-admin-bar.php)

### Login form

- [Change the arguments passed to the login form (uses `wp_login_form()`)](https://github.com/Charitable/library/blob/master/login-form/change-login-form-arguments.php)
- [Redirect to the previous page after logging in](https://github.com/Charitable/library/blob/master/login-form/redirect-to-referer-after-login.php)
- [Use the Charitable login page for `wp_login_url()`](https://github.com/Charitable/library/blob/master/endpoints/set-wp-login-url-to-charitable-login-page.php)

### Profile form

- [Remove a section](https://github.com/Charitable/library/blob/master/profile-form/remove-section.php)
- [Remove the organisation field](https://github.com/Charitable/library/blob/master/profile-form/remove-organisation-field.php)
- [Add a field to the "Your Details" section](https://github.com/Charitable/library/blob/master/profile-form/add-user-field.php)
- [Keep a user's Display Name the same as their Login name](https://github.com/Charitable/library/blob/master/profile-form/keep-username-as-display-name.php)
- [Require a specific format for the Postcode field](https://github.com/Charitable/library/blob/master/forms/general/set-pattern-attribute-on-field.php)
- [Change the Countries list to only list a few specific countries](https://github.com/Charitable/library/blob/master/forms/general/change-accepted-countries-list.php)

### Registration form

- [Add additional fields to the form](https://github.com/Charitable/library/blob/master/registration-form/add-fields.php)
- [Send emails to the new user and admin after a user registers](https://github.com/Charitable/library/blob/master/registration-form/send-new-user-notifications.php)
- [Redirect the user to a custom page after registration](https://github.com/Charitable/library/blob/master/registration-form/set-custom-redirection-after-registration.php)
- [Set the role of new users](https://github.com/Charitable/library/blob/master/registration-form/set-new-user-role.php)

### Widgets

#### Donation Stats

- [Customize the stats to show in the Donation Stats widget](https://github.com/Charitable/library/blob/master/widgets/customize-donation-stats.php)

#### Donors

- [Only show the donor's first name and initial of last name](https://github.com/Charitable/library/blob/master/donors/change-donor-name-display.php)
- [Include donors with pending donations](https://github.com/Charitable/library/blob/master/donors/include-pending-donors.php)

### Styles

- [Change the default highlight colour](https://github.com/Charitable/library/blob/master/styles/set-default-highlight-colour.php)

### Privacy

- [Show whether terms and conditions were accepted in the admin and export](https://github.com/Charitable/library/blob/master/privacy/add-accept-terms-field.php)
- [Remove Terms & Conditions, Privacy Policy and User Consent fields](https://github.com/Charitable/library/blob/master/donation-form/remove-terms-fields.php)

### Export

- [Add a column to the Donations export](https://github.com/Charitable/library/blob/master/export/add-extra-column.php)
- [Remove a column from the Donations export](https://github.com/Charitable/library/blob/master/export/remove-donation-columns.php)
- [Add extra campaign creator columns to the Campaigns export](https://github.com/Charitable/library/blob/master/export/add-campaign-creator-export-fields.php)
- [Format the date in the Date of Donation column](https://github.com/Charitable/library/blob/master/export/format-date.php)

### Payment Gateways

#### PayPal

- [Collect shipping information in PayPal](https://github.com/Charitable/library/blob/master/gateways/paypal/collect-shipping-information.php)
- [Set a custom item name for donations in PayPal](https://github.com/Charitable/library/blob/master/gateways/paypal/set-custom-item-name.php)
- [Set the locale in PayPal](https://github.com/Charitable/library/blob/master/gateways/paypal/set-locale.php)
- [Use a different currency for PayPal](https://github.com/Charitable/library/blob/master/gateways/paypal/use-different-currency.php)

#### Offline

- [Show the Offline payment instructions in the donation form](https://github.com/Charitable/library/blob/master/gateways/offline/add-offline-instructions-to-donation-form.php)
- [Register fields and display them when the donor selects the "Offline" payment method](https://github.com/Charitable/library/blob/master/gateways/offline/add-fields-to-donation-form-for-offline-donations.php)
- [Set a custom donation receipt page for offline donations](https://github.com/Charitable/library/blob/master/donation-receipt/set-custom-donation-receipt-page-for-offline-donations.php)
- [Automatically mark Offline donations as Paid](https://github.com/Charitable/library/blob/master/donations/auto-complete-offline-donations.php)
- [Send the Campaign Creator Donation Notification for Offline donations when they're pending](https://github.com/Charitable/library/blob/master/extensions/ambassadors/emails/send-creator-donation-notification-for-pending-offline-donations.php)
- [Add the offline payment instructions to donation emails](https://github.com/Charitable/library/blob/master/emails/add-offline-instructions-field.php)
- [Disable Offline payment method for recurring donations](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/disable-recurring-offline-donations.php)

#### Stripe

- [Set a custom statement descriptor](https://github.com/Charitable/library/blob/master/gateways/stripe/set-statement-descriptor.php)

#### PayUMoney

- [Modify the arguments sent to PayUMoney](https://github.com/Charitable/library/blob/master/gateways/payumoney/modify-payment-args.php)

#### PayFast

- [Modify the arguments sent to PayFast](https://github.com/Charitable/library/blob/master/gateways/payfast/modify-payment-args.php)
- [Modify the payment reference/description sent to PayFast](https://github.com/Charitable/library/blob/master/gateways/payfast/change-payment-description.php)

### Extensions:

#### Charitable Ambassadors

##### Campaign Form

*Adding, changing and removing fields*
- [Add text field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-text-field.php)
- [Add select field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-select-field.php)
- [Add phone number field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-phone-number-field.php)
- [Add address fields to the "Your Details" section](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-address-fields-to-user-details.php)
- [Add start date field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-start-date-field.php)
- [Add field to "Who Are You Raising Money For?" section](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-field-to-recipient-details.php)
- [Add a "Gallery" field to the campaign form and display the gallery on the campaign automatically](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-gallery-field.php)
- [Change field labels](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-field-labels.php)
- [Change editable fields to non-editable and vice versa](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-field-editable.php)
- [Change the categories & tags fields into dropdown (select) fields](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-category-field-to-select.php)
- [Change the recipient type labels for "Personal Causes" and "Your Organization"](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-recipient-type-labels.php)
- [Change which fields are required in the Campaign Details section](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-campaign-fields-required.php)
- [Change which fields are required in the Your Details section](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-user-fields-required.php)
- [Change all fields to be required](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/make-all-fields-required.php)
- [Change the "Goal" field to be required](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/make-goal-required.php)
- [Change the PayPal payout details field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-payout-field.php)
- [Change the Campaign Details header](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/rename-campaign-details-section-title.php)
- [Change the Who Are You Raising Money For? header](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/rename-campaign-details-section-title.php)
- [Change the "Length" field to an end date field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/replace-campaign-length-with-end-date-field.php)
- [Change the Countries list to only list a few specific countries](https://github.com/Charitable/library/blob/master/forms/general/change-accepted-countries-list.php)
- [Set default campaign name](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-default-campaign-name.php)
- [Set default campaign goal](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-default-campaign-goal.php)
- [Set default text for full description field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-default-text-for-description-field.php)
- [Set default campaign image](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-default-campaign-image.php)
- [Set default campaign video](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-default-campaign-video.php)
- [Set default country for Ambassadors](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-default-ambassador-country.php)
- [Set the default category for new campaign submissions](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-campaign-category.php)
- [Set maximum length of Short Description field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-max-length-of-short-description.php)
- [Remove all user fields except for the name & email fields](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-all-user-fields-except-for-basics.php)
- [Move user fields to the "Campaign Details" section](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/move-user-fields-into-campaign-details-section.php)
- [Remove the categories field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-categories-field.php)
- [Remove the organisation field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-organisation-field.php)
- [Remove the tags field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-tags-field.php)
- [Remove the short description field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-short-description-field.php)
- [Remove the user biography field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-user-biography-field.php)
- [Remove the "Your Details" section](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-user-fields.php)

*Other customizations*

- [Allow ambassadors to edit the goal of an active campaign](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/edit-live-campaign-goal.php)
- [Add recipient type to "Who Are You Raising Money For?" section, with a custom field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-school-recipient-type.php)
- [Automatically set the Suggested Donations and custom donation settings](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/automatically-set-donation-options.php)
- [Automatically set the campaign parent for all submitted campaigns](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-campaign-parent.php)
- [Automatically set the campaign's end date](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/automatically-set-end-date.php)
- [Redirect logged out users to the registration page](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/redirect-logged-out-users-to-registration-page.php)
- [Only allow users to create one campaign](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/only-allow-one-campaign-per-user.php)
- [Prevent users from editing a published campaign](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/prevent-editing-of-published-campaigns.php)
- [Redirect to the campaign after submitting the form](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/redirect-to-campaign-after-submission.php)

##### Fundraiser Form
- [Inherit the parent campaign's categories](https://github.com/Charitable/library/blob/master/extensions/ambassadors/fundraiser-submission-form/inherit-categories-from-parent.php)
- [Add a field to the fundraiser form for a specific parent campaign](https://github.com/Charitable/library/blob/master/extensions/ambassadors/fundraiser-submission-form/add-field-to-specific-fundraiser-form.php)

##### Campaigns

- [Remove the "Edit" link added by some themes](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaigns/remove-edit-post-link-from-campaigns.php)

##### My Campaigns Shortcode

- [Remove the "Actions" block (Edit Campaigns, Export Donors, etc.) from the campaigns](https://github.com/Charitable/library/blob/master/extensions/ambassadors/my-campaigns-shortcode/remove-campaign-actions-block.php)

##### Emails
- [Send the Campaign Creator Donation Notification for Offline donations when they're pending](https://github.com/Charitable/library/blob/master/extensions/ambassadors/emails/send-creator-donation-notification-for-pending-offline-donations.php)

#### Charitable Easy Digital Downloads Connect

- [Add {campaign_donations} email tag](https://github.com/Charitable/library/blob/master/extensions/edd-connect/add-campaign-donations-email-tag.php)
- [Add a custom checkout field for specific campaigns](https://github.com/Charitable/library/blob/master/extensions/edd-connect/add-campaign-donations-email-tag.php)
- [Show the Easy Digital Downloads gateway used for donations](https://github.com/Charitable/library/blob/master/extensions/edd-connect/set-gateway-label.php)

#### Charitable Recurring Donations

- [Change the recurring period to weekly](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/change-recurring-period-to-weekly.php)
- [Change the recurring period to yearly](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/change-recurring-period-to-yearly.php)
- [Set a fixed recurring donation amount](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/set-fixed-recurring-donation-amount.php)
- [Automatically check the "Make it monthly" checkbox in the donation form](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/pre-check-recurring-donation-checkbox.php)
- [Do not send recurring emails for pending donations unless they are offline](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/do-not-send-recurring-emails-for-pending-donations.php)
- [Disable Offline payment method for recurring donations](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/disable-recurring-offline-donations.php)
- [Register recurring donation subscription ID field](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/register-donation-plan-id-field.php)
- [Set a custom donation receipt page for recurring donations](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/set-custom-receipt-page-for-recurring.php)
- [Add an option to set the parent donation when creating/editing a donation manually](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/add-donation-plan-field.php)
- [Do not send any emails for renewal donations](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/do-not-send-emails-for-renewal-donations.php)
- [Add weekly donation support (only tested with Stripe)](https://github.com/Charitable/library/blob/master/extensions/recurring-donations/add-weekly-donations.php)

#### Charitable Newsletter Connect

- [Add subscribers to a particular list without opt-in, when settings are set to require opt-in](https://github.com/Charitable/library/blob/master/extensions/newsletter-connect/add-subscriber-without-optin.php)

##### MailChimp

- [Add MailChimp subscribers to a particular interest group](https://github.com/Charitable/library/blob/master/extensions/newsletter-connect/mailchimp/add-mailchimp-subscriber-to-interest-group.php)
- [Add extra MailChimp list field data for subscriber](https://github.com/Charitable/library/blob/master/extensions/newsletter-connect/mailchimp/add-mailchimp-subscriber-merge-field-data.php)

#### Charitable Stripe Connect

- [Only show Stripe account connect link for users with campaigns](https://github.com/Charitable/library/blob/master/extensions/stripe-connect/hide-stripe-connect-link-profile-form.php)

#### Charitable Authorize.Net

- [Force a wait before executing Recurring Donations request (This can fix OTS Token error)](https://github.com/Charitable/library/blob/master/gateways/authorize.net/force-wait-before-recurring-donation-request.php)
- [Set a custom order description](https://github.com/Charitable/library/blob/master/gateways/authorize.net/set-order-description.php)

#### Charitable User Avatar

- [Add `[user_avatar]` shortcode](https://github.com/Charitable/library/blob/master/extensions/user-avatar/add-user-avatar-shortcode.php)

#### Charitable Donor Comments

- [Remove the donor comments from the Donors shortcode & Donors widget](https://github.com/Charitable/library/blob/master/extensions/donor-comments/hide-donor-comments-in-shortcode-widget.php)
- [Change the Donor Comment field placeholder & required status for a particular campaign](https://github.com/Charitable/library/blob/master/extensions/donor-comments/change-donation-form-field-on-specific-campaign.php)

#### Charitable Anonymous Donations

- [Make the anonymous donations checkbox checked by default](https://github.com/Charitable/library/blob/master/extensions/anonymous-donations/check-anonymous-donations-field-by-default.php)

#### Charitable Gift Aid

- [Add additional titles](https://github.com/Charitable/library/blob/master/extensions/gift-aid/add-additional-titles.php)

### Themes

#### Reach

- [Unhook a template](https://github.com/Charitable/library/blob/master/themes/reach/remove-reach-hooks.php)
- [Add the donate button to campaigns in a grid](https://github.com/Charitable/library/blob/master/themes/reach/add-donate-button-to-campaign-loop.php)
- [Add the read more link to campaigns in a grid](https://github.com/Charitable/library/blob/master/themes/reach/add-read-more-button-to-campaign-loop.php)
- [Re-order the social network links](https://github.com/Charitable/library/blob/master/themes/reach/reorder-social-network-links.php)
- [Add a new social network](https://github.com/Charitable/library/blob/master/themes/reach/add-social-network.php)
- [Move the donate button on the campaign page](https://github.com/Charitable/library/blob/master/themes/reach/move-donate-button-campaign-page.php)
- [Change the donation page title](https://github.com/Charitable/library/blob/master/themes/reach/change-donation-page-title.php)
- [Prevent the donation receipt from loading in the user dashboard](https://github.com/Charitable/library/blob/master/themes/reach/do-not-load-receipt-in-user-dashboard.php)
- [Turn off the campaign archive](https://github.com/Charitable/library/blob/master/themes/reach/turn-off-campaign-archive.php)
- [Change header home link](https://github.com/Charitable/library/blob/master/themes/reach/change-header-home-link.php)

##### Overriding Templates

- [Change campaign stats to show number of donations instead of number of donors](https://github.com/Charitable/library/blob/master/themes/reach/templates/show-number-of-donations-in-campaign-stats.php)

#### 3rd Party Themes

- [Charitas / Charitas Lite - Single campaign page](https://github.com/Charitable/library/blob/master/themes/charitas/single-campaign.php)
- [Alone - Campaign page (add the extended description)](https://github.com/Charitable/library/blob/master/themes/alone/campaign-page-with-extended-description.php)
- [Alone - Campaign grid (removed the progress bar)](https://github.com/Charitable/library/blob/master/themes/alone/campaign-grid-remove-progress-bar.php)
- [Born to Give - Campaign page (remove donation stats, goal & time remaining)](https://github.com/Charitable/library/blob/master/themes/born-to-give/single-campaign.php)
- [GreenCare - Campaign page (remove donation stats and progress bar)](https://github.com/Charitable/library/blob/master/themes/greencare/remove-donation-stats-and-progres-bar.php)

## Tutorials

- []

### Legacy snippets

#### Pre Charitable 1.6

- [Removing donation form fields](https://github.com/Charitable/library/blob/master/donation-form/legacy/remove-donation-form-fields.php)
- [Make all donor address fields required](https://github.com/Charitable/library/blob/master/donation-form/legacy/make-donor-address-required.php)

#### Pre Charitable 1.5

- [Adding a text field (condensed example)](https://github.com/Charitable/library/blob/master/donation-form/legacy/collect-national-id-number.php)
- [Adding a checkbox field](https://github.com/Charitable/library/blob/master/donation-form/legacy/add-checkbox-field-to-donation-form.php)
- [Adding a select field](https://github.com/Charitable/library/blob/master/donation-form/legacy/add-select-field-to-donation-form.php)
- [Add a shortcode for displaying donation forms](https://github.com/Charitable/library/blob/master/donation-form/legacy/add-donation-form-shortcode.php)
- [Set the minimum donation amount](https://github.com/Charitable/library/blob/master/donation-form/legacy/set-minimum-donation-amount.php)
- [Removing a field from the donations export](https://github.com/Charitable/library/blob/master/export/legacy/remove-formatted-address-column.php)
- [Add a column to the Donations export](https://github.com/Charitable/library/blob/master/export/legacy/add-extra-column.php)

#### Pre Charitable Ambassadors 2.0
- [Automatically approve campaigns](https://github.com/Charitable/library/blob/master/extensions/ambassadors/legacy/auto-approve-campaigns.php)
- [Add user details to funds recipient information](https://github.com/Charitable/library/blob/master/extensions/ambassadors/legacy/add-user-details-to-funds-recipient-information.php)
- [Allow campaign creators to select the campaign parent](https://github.com/Charitable/library/blob/master/extensions/ambassadors/legacy/add-parent-select-field.php)
- [Add a "Terms and Conditions" section to the campaign form](https://github.com/Charitable/library/blob/master/extensions/ambassadors/legacy/add-terms-field.php)
- [Change editable fields to non-editable and vice versa](https://github.com/Charitable/library/blob/master/extensions/ambassadors/legacy/change-field-editable.php)