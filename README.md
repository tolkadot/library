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
- [Remove form fields](https://github.com/Charitable/library/tree/master/general/remove-form-fields.php)
- [Add an "Hours" currency](https://github.com/Charitable/library/blob/master/general/add-hours-currency.php)
- [Add the User Dashboard menu at the top of all User Dashboard pages](https://github.com/Charitable/library/blob/master/general/add-user-dashboard-menu.php)

### Donation form

- [Add a checkbox field to the donation form](https://github.com/Charitable/library/blob/master/donation-form/add-checkbox-field-to-donation-form.php)
- [Add an opt-out for receiving the donation receipt](https://github.com/Charitable/library/blob/master/donation-form/add-donation-receipt-opt-out-checkbox.php)
- [Change State field to Province](https://github.com/Charitable/library/blob/master/donation-form/change-state-to-province.php)
- [Collect National ID number](https://github.com/Charitable/library/blob/master/donation-form/collect-national-id-number.php)
- [Make the donor address fields required](https://github.com/Charitable/library/blob/master/donation-form/make-donor-address-required.php)
- [Remove donation form fields](https://github.com/Charitable/library/blob/master/donation-form/remove-donation-form-fields.php)
- [Remove login form](https://github.com/Charitable/library/blob/master/donation-form/remove-login-form.php)
- [Set the minimum donation amount](https://github.com/Charitable/library/blob/master/donation-form/set-minimum-donation-amount.php)
- [Add campaign title as a header](https://github.com/Charitable/library/blob/master/donation-form/add-campaign-title-to-start.php)
- [Display a specific donation form](https://github.com/Charitable/library/blob/master/donation-form/display-donation-form.php)

### Donation receipt

- [Display a link back to the campaign from the donation receipt](https://github.com/Charitable/library/blob/master/donation-receipt/add-campaign-link.php)
- [Display a summary of the amount raised for the campaign](https://github.com/Charitable/library/blob/master/donation-receipt/add-campaign-raised-summary.php)

### Donations

- [Treat Pending donations as "Approved" donations](https://github.com/Charitable/library/blob/master/donations/add-pending-to-approved-statuses.php)
- [Automatically mark Offline donations as Paid](https://github.com/Charitable/library/blob/master/donations/auto-complete-offline-donations.php)
- [Add a Donate button with modal to your template](https://github.com/Charitable/library/tree/master/donations/add-donate-button.php)

### Emails

- [Copy the donation receipt to the website admin](https://github.com/Charitable/library/blob/master/emails/copy-donation-receipt-to-admin.php)
- [Send donation notifications to admin for Offline donations that are Pending](https://github.com/Charitable/library/blob/master/emails/send-donation-notification-for-pending-offline-donations.php)
- [Send donation receipt to customer for Offline donations that are Pending](https://github.com/Charitable/library/blob/master/emails/send-donation-receipt-for-pending-offline-donations.php)
- [Remove campaign name from donation summaries in emails](https://github.com/Charitable/library/blob/master/emails/remove-campaign-name-from-donation-summary.php)
- [Add a custom campaign field to display in emails](https://github.com/Charitable/library/blob/master/emails/add-custom-campaign-field.php)
- [Add a custom donation field to display in emails](https://github.com/Charitable/library/blob/master/emails/add-custom-donation-field.php)

### Campaigns 

- [Use the Page template for campaigns](https://github.com/Charitable/library/blob/master/campaigns/use-page-template-for-campaigns.php)
- [Add featured image to the top of the campaign](https://github.com/Charitable/library/blob/master/campaigns/add-featured-image.php)
- [Remove campaign summary block](https://github.com/Charitable/library/blob/master/campaigns/remove-stats-summary-block.php)
- [Remove campaign summary block from a specific campaign](https://github.com/Charitable/library/blob/master/campaigns/remove-stats-summary-block-from-specific-campaign.php)
- [Remove the donor count](https://github.com/Charitable/library/blob/master/general/unhook-default-charitable-template-functions.php)
- [Add a progress bar before the campaign summary block](https://github.com/Charitable/library/blob/master/campaigns/add-progress-bar-before-summary.php)
- [Move the campaign summary block below the Extended Description](https://github.com/Charitable/library/blob/master/campaigns/move-campaign-summary-below-content.php)
- [Remove the campaign descriptions from the [campaigns] output](https://github.com/Charitable/library/blob/master/campaign-loop/remove-campaign-description.php)
- [Add a Read More link to the [campaigns] output](https://github.com/Charitable/library/blob/master/campaign-loop/add-read-more-link.php)
- [Change the Thumbnail size in the [campaigns] output](https://github.com/Charitable/library/blob/master/campaign-loop/set-campaign-thumbnail-size.php)
- [Disable description text santization](https://github.com/Charitable/library/blob/master/campaigns/disable-description-text-sanitization.php)
- [Round the percentage donated to a whole number](https://github.com/Charitable/library/blob/master/campaigns/round-percent-donated-to-whole-number.php)
- [Change the campaign slug base](https://github.com/Charitable/library/blob/master/campaigns/change-campaign-slug-base.php)
- [Change the campaign rewrite rules to disable the `with_front` setting](https://github.com/Charitable/library/blob/master/campaigns/change-campaign-rewrite-to-not-use-with-front.php)

### Notifications

- [Send notification emails to the admin & new user when someone registers](https://github.com/Charitable/library/blob/master/notifications/send-notifications-on-user-registration.php) (credit: [altatof](https://github.com/altatof))

### Login form

- [Change the arguments passed to the login form (uses `wp_login_form()`)](https://github.com/Charitable/library/blob/master/login-form/change-login-form-arguments.php)

### Profile form

- [Remove the organisation field](https://github.com/Charitable/library/blob/master/profile-form/remove-organisation-field.php)
- [Add a field to the "Your Details" section](https://github.com/Charitable/library/blob/master/profile-form/add-user-field.php)

### Registration form

- [Send emails to the new user and admin after a user registers](https://github.com/Charitable/library/blob/master/registration-form/send-new-user-notifications.php)
- [Redirect the user to a custom page after registration](https://github.com/Charitable/library/blob/master/registration-form/set-custom-redirection-after-registration.php)
- [Set the role of new users](https://github.com/Charitable/library/blob/master/registration-form/set-new-user-role.php)

### Styles

- [Change the default highlight colour](https://github.com/Charitable/library/blob/master/styles/set-default-highlight-colour.php)

### Export 

- [Remove a column from the Donations export](https://github.com/Charitable/library/blob/master/export/remove-formatted-address-column.php)

### Payment Gateways: PayPal

- [Collect shipping information in PayPal](https://github.com/Charitable/library/blob/master/gateways/paypal/collect-shipping-information.php)

### Payment Gateways: Stripe

- [Set a custom statement descriptor](https://github.com/Charitable/library/blob/master/gateways/stripe/set-statement-descriptor.php)

### Extensions: Charitable Ambassadors 

*Campaign Form*

- [Add description field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-description-field.php)
- [Remove all user fields except for the name & email fields](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-all-user-fields-except-for-basics.php)
- [Automatically approve campaigns](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/auto-approve-campaigns.php)
- [Allow ambassadors to edit the goal of an active campaign](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/edit-live-campaign-goal.php)
- [Change the categories & tags fields into dropdown (select) fields](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-category-field-to-select.php)
- [Remove the categories field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-categories-field.php)
- [Remove the organisation field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-organisation-field.php)
- [Remove the tags field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-tags-field.php)
- [Remove the short description field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-short-description-field.php)
- [Remove the user biography field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/remove-user-biography-field.php)
- [Set default text for full description field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-default-text-for-description-field.php)
- [Set default country for Ambassadors](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-default-ambassador-country.php)
- [Add phone number field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-phone-number-field.php)
- [Change the Campaign Details header](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/rename-campaign-details-section-title.php)
- [Change field labels](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-field-labels.php)
- [Remove the campaign length field and replace with an end date field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/replace-campaign-length-with-end-date-field.php)
- [Automatically set the Suggested Donations and custom donation settings](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/automatically-set-donation-options.php)
- [Add user details to funds recipient information](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-user-details-to-funds-recipient-information.php)
- [Automatically set the campaign parent for all submitted campaigns](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/set-campaign-parent.php)
- [Change the PayPal payout details field](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/change-payout-field.php)
- [Redirect logged out users to the registration page](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/redirect-logged-out-users-to-registration-page.php)
- [Only allow users to create one campaign](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/only-allow-one-campaign-per-user.php)
- [Add a "Gallery" field to the campaign form and display the gallery on the campaign automatically](https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-gallery-field.php)

*My Campaigns Shortcode*
- [Remove the "Actions" block (Edit Campaigns, Export Donors, etc.) from the campaigns](https://github.com/Charitable/library/blob/master/extensions/ambassadors/my-campaigns-shortcode/remove-campaign-actions-block.php)

### Themes: Reach

- [Re-order the social network links](https://github.com/Charitable/library/blob/master/reach/reorder-social-network-links.php)
- [Move the donate button on the campaign page](https://github.com/Charitable/library/blob/master/reach/move-donate-button-campaign-page.php)
- [Change the donation page title](https://github.com/Charitable/library/blob/master/reach/change-donation-page-title.php)