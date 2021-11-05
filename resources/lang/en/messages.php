<?php

return [
    /** general translation stuff */
    'dashboard' => 'Dashboard',
    'Temp' => 'Temperature',
    'Hum' => 'Humidity',
    'name' => 'Name',
    'location' => 'Location',
    'street_number' => 'Street, Number',
    'zip_code' => 'ZIP Code',
    'city' => 'City',
    'warning' => 'Warning',
    'warnings' => 'Warnings',
    'address' => 'Address',
    'street' => 'Street',
    'number' => 'Number',

    /** Warnings */
    'limit_values_temp' => 'Limit values for Temperature were exceeded or not reached',
    'limit_values_hum' => 'Limit values for Humidity were exceeded or not reached',
    'limit_values_temp_hum' => 'Limit values for Temperature/Humidity were exceeded or not reached',

    /** User/s */
    'role' => 'Role',
    'admin' => 'Admin',
    'users' => 'Users',
    'user' => 'User',
    'user_list' => 'List of Users',
    'create_user' => 'Create User',
    'email' => 'E-Mail',
    'password' => 'Password',
    'confirm_password' => 'Confirm Password',
    'forgot_pw' => 'Forgot your password?',
    'remember_me' => 'Remember me',
    'edit_user' => 'Edit User',
    'pw_reset_info' => 'Click on button sends mail to user to reset PW',
    'reset_pw' => 'Reset Password',

    /** Client/s */
    'clients' => 'Clients',
    'client_id' => 'Client-ID',
    'clients_list' => 'List of Clients',
    'client_not_activated' => 'This clients is not activated.',
    'click_to_deactivate' => 'Click to DEACTIVATE',
    'click_to_activate' => 'Click to ACTIVATE',
    'delete_client' => 'Delete Client',
    'delete_client_message' => 'Do you really want to delete this Client?',
    'client_down' => 'Client Down',
    'no_data_sent_yet' => 'This Client have not sent data yet.',
    'client_down_icon' => 'Have not sent data in a while',
    'client_down_info' => 'The client ":CLIENT" no longer sends values.',
    'create_client' => 'Create Client',
    'edit_client' => 'Edit Client',

    /** Timeline */
    'timeline' => 'Timeline',
    'timeline_info' => 'Timeline of the values in the last 24 hours',
    'chart_y_axis' => 'Temp in °C + Hum in %',

    /** Action - Buttons */
    'create' => 'Create',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'cancel' => 'Cancel',
    'save' => 'Save',
    'back' => 'Back',
    'log_out' => 'Log out',
    'log_in' => 'Log in',
    'close' => 'Close',

    /** Mail-Notifications */
    'greeting' => 'Hello, ',
    'val_limit_reached_mail' => 'the measured values of :CLIENT has exceeded the following limits:',
    'to_dashboard' => 'Go to the dashboard',
    'client_down_mail' => 'the client :CLIENT has failed. Please check urgently!',
    'reset_pw_mail_info' => 'Your administrator has sent you this mail because of your request to reset your password for your account.',
    'reset_pw_link_expire_info' => 'This password reset link will expire in :count minutes.',
    'reset_pw_no_action' => 'If you did not request a password reset, no further action is required.',
    'regards_mail' => 'Regards, Your Admin',
];
